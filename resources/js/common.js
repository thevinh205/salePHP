$(document).ready(function(){
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
        if($(window).scrollTop() == ($(document).height() - $(window).height() - 500)) {

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
        $(this).closest('div').find('.count-product').val(count);
        updateCount(this, count);
    });
    
    $(".inc-count").click( function(){
        var count = $(this).closest('div').find('.count-product').val();
        count = parseInt(count) + 1;
        $(this).closest('div').find('.count-product').val(count);
        updateCount(this, count);
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

                $(e).closest('.item-order').remove();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    });
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



