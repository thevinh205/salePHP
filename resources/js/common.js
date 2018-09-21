$(document).ready(function(){
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
        count += 1;
        $(this).closest('div').find('.count-product').val(count);
        updateCount(this, count);
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



