var oldImgSelected;

     
$(document).ready(function(){
    
    var obj = $("img[name*='imagename']");
    obj.src = obj.src + "?" + Math.random();
    
    $('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).closest('.fpro').find("img").eq(0);
        var productId = $(this).closest('.fpro').find(".product-id").val();
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                var countProduct = $(".shopping-cart").text();
                countProduct = parseInt(countProduct) + 1;
                $(".shopping-cart").text(countProduct);
                var url = "cart.php";
                $.ajax({
                    type: 'POST', 
                    url: url, 
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    data: {
                        productId: productId, 
                        count: 1,
                        type: 'addProduct'
                    },
                    success: function(data){ 
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                    }
                }); 
                
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
    
    $(window).scroll(function() {
        if($(window).scrollTop() == $(document).height() - $(window).height()) {
        }
    });
    
    $(".numbers").each(function(c, obj){
        $(obj).text(addCommas(parseFloat($(obj).text())));
    });
    
    $(".count-product").focus(function() {
    }).blur(function() {
        var count = $(this).val();
        var productPrice = $(this).closest('.item-order').find(".product-price").text();
        productPrice = productPrice.replace(/\./g, '');
        var priceOneProduct =$(this).closest('.item-order').find(".price-one-product").val();
        
        var totalProduct = $(this).closest('#block1').find("#carttotal").text();
        var total = $(this).closest('#block1').find("#cartsumtotalfinal").text();
        totalProduct = totalProduct.replace(/\./g, '');
        total = total.replace(/\./g, '');
        
        var productPriceNew = count * priceOneProduct;
        totalProduct = totalProduct - productPrice + productPriceNew;
        total = total - productPrice + productPriceNew;
        
        productPriceNew = addCommas(productPriceNew);
        totalProduct = addCommas(totalProduct);
        total = addCommas(total);
        $(this).closest('.item-order').find(".product-price").text(productPriceNew);
        $(this).closest('#block1').find("#carttotal").text(totalProduct);
        $(this).closest('#block1').find("#cartsumtotalfinal").text(total);

    });
    
    $(".desc-count").click( function(){
        var count = $(this).closest('div').find('.count-product').val();
        count -= 1;
        if(count < 1)
        	count = 1;
        $(this).closest('div').find('.count-product').val(count);
        updateCount(this, count);
    });
    
    $(".inc-count").click( function(){
        var count = $(this).closest('div').find('.count-product').val();
        count = parseInt(count) + 1;
        $(this).closest('div').find('.count-product').val(count);
        updateCount(this, count);
    });
    
    $(".down").click( function(){
        var count = $("input[name*='txtQuantity']").val();
        count -= 1;
        if(count < 0)
            count = 0;
        $("input[name*='txtQuantity']").val(count);
    });
    
    $(".up").click( function(){
        var count = $("input[name*='txtQuantity']").val();
        count = parseInt(count) + 1;
        $("input[name*='txtQuantity']").val(count);
    });
    
    $('#ProfileItems_0_DistrictId').on('change', function() {
        var shipFee = $("#cartshipfee").text();
        var total = $("#cartsumtotalfinal").text();
        shipFee = shipFee.replace(/\./g, '');
        total = total.replace(/\./g, '');
        if(this.value == 79) {         
            if(shipFee != 20000) {
                shipFee = '20.000';
                total = total - 30000 + 20000;
            }
        } else {
            if(shipFee == 20000) {
                shipFee = '30.000';
                total = total - 20000 + 30000;
            }
        }
        total = addCommas(total);
        $("#cartshipfee").text(shipFee);
        $("#cartsumtotalfinal").text(total);
    });
    
    $(".od-delete-product").click( function(){
        var productId = $(this).closest('.item-order').find(".product-id").val();
        var e = this;
        var url = "cart.php";
        $.ajax({
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                productId: productId, 
                type: 'removeProduct'
            },
            success: function(data){ 
                var totalProduct = $("#carttotal").text();
                var total = $("#cartsumtotalfinal").text();
                var productPrice = $(e).closest('.item-order').find(".product-price").text();

                totalProduct = totalProduct.replace(/\./g, '');
                total = total.replace(/\./g, '');
                productPrice = productPrice.replace(/\./g, '');

                totalProduct = totalProduct - productPrice;
                total = total - productPrice;

                totalProduct = addCommas(totalProduct);
                total = addCommas(total);

                $("#carttotal").text(totalProduct);
                $("#cartsumtotalfinal").text(total);
                
                var countInCart = $(".shopping-cart").text();
                countInCart -= 1;
                $(".shopping-cart").text(countInCart);

                $(e).closest('.item-order').remove();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    });
    
    $(".btn-pay-home").click( function(){
        var priceTotal = $("#carttotal").text();
        var shipmentFee = $("#cartshipfee").text();
        var customer = $("#customerName").val();
        var phoneNumber = $("#phoneNumber").val();
        var email = $("#email").val();
        var note = $("#customerNote").val();
        var address = $("#customerAddress").val();
        var statusOrder = 'new';
        var province = $("#ProfileItems_0_DistrictId option:selected").text();
        
        priceTotal = priceTotal.replace(/\./g, '');
        shipmentFee = shipmentFee.replace(/\./g, '');
        
        if( address == '' || address.trim() == '') {
            $("#customerAddress").focus();
            $("#customerAddress").addClass("error-order");
        } else if (customer == '' || customer.trim() == '') {
            $("#customerAddress").removeClass("error-order");
            $("#customerName").focus();
            $("#customerName").addClass("error-order");
        } else if (phoneNumber == '' || phoneNumber.trim() == '') {
            $("#customerAddress").removeClass("error-order");
            $("#customerName").removeClass("error-order");
            $("#phoneNumber").focus();
            $("#phoneNumber").addClass("error-order");
        } else {
            address = address + ", " + province;
            var url = "cart.php";
            $.ajax({
                type: 'POST', 
                url: url, 
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    priceTotal: priceTotal, 
                    shipmentFee: shipmentFee, 
                    customer: customer, 
                    phoneNumber: phoneNumber, 
                    email: email, 
                    note: note, 
                    address: address, 
                    statusOrder: statusOrder, 
                    type: 'createOrder'
                },
                success: function(data){ 
                    window.location.href = "order-success";
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                }
            }); 
        }
    });
    
    oldImgSelected = $(".img-first");
});

function addCommas(nStr){
   nStr += '';
   var x = nStr.split('.');
   var x1 = x[0];
   var x2 = x.length > 1 ? '.' + x[1] : '';
   var rgx = /(\d+)(\d{3})/;
   while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
   }
   return x1 + x2;
}

function addProductAndToCart() {
    var productId = $("input[id*='product_id']").val();
    var count = $("input[name*='txtQuantity']").val();
    
    var url = "cart.php";
    $.ajax({
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            productId: productId, 
            count: count,
            type: 'addProduct'
        },
        success: function(data){ 
            window.location.href = "order.php";
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function updateCount(e, count) {
    var productPrice = $(e).closest('.item-order').find(".product-price").text();
    productPrice = productPrice.replace(/\./g, '');
    var priceOneProduct =$(e).closest('.item-order').find(".price-one-product").val();

    var totalProduct = $(e).closest('#block1').find("#carttotal").text();
    var total = $(e).closest('#block1').find("#cartsumtotalfinal").text();
    totalProduct = totalProduct.replace(/\./g, '');
    total = total.replace(/\./g, '');

    var productPriceNew = count * priceOneProduct;
    totalProduct = totalProduct - productPrice + productPriceNew;
    total = total - productPrice + productPriceNew;

    productPriceNew = addCommas(productPriceNew);
    totalProduct = addCommas(totalProduct);
    total = addCommas(total);
    $(e).closest('.item-order').find(".product-price").text(productPriceNew);
    $(e).closest('#block1').find("#carttotal").text(totalProduct);
    $(e).closest('#block1').find("#cartsumtotalfinal").text(total);
}

function changeImageShow(e) {
    var srcNew  = $(e).attr("src");
    $(".pri-avatar").attr("src", srcNew);
    $(e).closest('div').addClass("img-selected");
    if(oldImgSelected != null)
        $(oldImgSelected).closest('div').removeClass("img-selected");
    oldImgSelected = e;
}

function sendMessage() {
	$("#btnSendMessage").attr("disabled", true);
	var customerName = $("input[name*='customerName']").val();
	var customerPhone = $("input[name*='customerPhone']").val();
	var customerMessage = $("textarea[name*='customerMessage']").val();
	
	if(!customerName.trim()) {
		$("input[name*='customerName']").focus();
		$("#btnSendMessage").attr("disabled", false);
		return;
	}
	
	if(!customerPhone.trim()) {
		$("input[name*='customerPhone']").focus();
		$("#btnSendMessage").attr("disabled", false);
		return;
	}
	
	if(!customerMessage.trim()) {
		$("textarea[name*='customerMessage']").focus();
		$("#btnSendMessage").attr("disabled", false);
		return;
	}
	
	$("input[name*='customerName']").val('');
	$("input[name*='customerPhone']").val('');
	$("textarea[name*='customerMessage']").val('');
	
	$("#sendMsgSuccess").show("slow");
	setTimeout(
			  function() 
			  {
				  $("#sendMsgSuccess").hide("slow");
			  }, 5000);
	
	$("#btnSendMessage").attr("disabled", false);
}

