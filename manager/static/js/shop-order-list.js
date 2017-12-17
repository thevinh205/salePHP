var listProductId = "";

$(document).ready(function(){
    $(".btnSearchOrder").click( function(){
        var shopId = $("#shopId").val();
        var orderId = $("input[name*='orderId']").val();
        var fromDate = $("input[name*='fromDate']").val();
        var toDate = $("input[name*='toDate']").val();
        var url = "/order/search";
        $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { shopId: shopId, 
                orderId : orderId, 
                fromDate: fromDate,
                toDate: toDate},
            success: function(data){ 
                $("div[id*='contentTab']").html(data);
                $('input.numbers').keyup(function(event) {

                    // skip for arrow keys
                    if(event.which >= 37 && event.which <= 40) return;

                    // format number
                    $(this).val(function(index, value) {
                      return value
                      .replace(/\D/g, "")
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                      ;
                    });
              });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    });
    
    $(".search-product-add").click( function(){
        var productId = $("input[name*='productIdAdd']").val();
        var productName = $("input[name*='productNameAdd']").val();
        var shopId = $("#shopId").val();
        
        var url = "/shop/searchProductAddOrder";
        $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                shopId:shopId,
                productId : productId, 
                productName: productName},
            success: function(data){ 
                $("div[class*='list-product-add']").html(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    });
    
    $(".btn-show-list-product").click( function(){
        $("#addProduct").modal('toggle');
    });
});

function addProductToShop(e) {
    var rowSelect = $(e).closest("tr");
    var productId = $(rowSelect).find(".productId").text();
    var productName = $(rowSelect).find(".productName").text();
    var price = $(rowSelect).find(".priceSell").text();
    var count = $(rowSelect).find(".count").val();
    var shopId = $("#shopId").val();
    var totalProduct = price.replace(/\,/g, '');
    totalProduct = totalProduct * count;
    var totalProductFormat = totalProduct.toString();
    totalProductFormat = totalProductFormat.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    var countInShop = $(rowSelect).find(".count-pd-shop").val();
    
    if(count == 0) {
        $(rowSelect).find(".count").focus();
        $(rowSelect).find(".count").addClass("input-error");
    } else if(count > countInShop){
        alert("Số lượng thêm không được lớn hơn số lượng có trong shop")
        $(rowSelect).find(".count").focus();
        $(rowSelect).find(".count").addClass("input-error");
    } else {
        var row = "<tr>";
        var col1 = "<td class='text-center product-index'>" + "#" + "</td>";
        var col2 = "<td class='product-id'>" + productId + "</td>";
        var col3 = "<td class='product-name'>" + productName + "</td>";
        var col4 = "<td class='price'>" + price + "</td>";
        var col5 = "<td class='count'>" + count + "</td>";
        var col6 = "<td class='total'>" + totalProductFormat + "</td>";
        var col7 = "<td class='text-center'>\n\
                        <a href='javascript:void(0)' onclick='deleteProductOrder(this)'>\n\
                            <i class='glyphicon glyphicon-remove' title='Xóa'></i>\n\
                        </a>\n\
                    </td>";
        row = row + col1 + col2 + col3 + col4 + col5 + col6 + col7 + "<tr>";
        $('.list-product-order tr:last').after(row);
        alert("Thêm sản phẩm thành công");
        $(rowSelect).find(".count").val("");
        var priceTotal = $(".price-total-add").val();
        priceTotal = priceTotal.replace(/\,/g, '');
        priceTotal = parseInt(priceTotal) + parseInt(totalProduct);
        
        priceTotal = priceTotal.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $(".price-total-add").val(priceTotal);
        listProductId += (productId + ":" + count + ";");
    }
}

function deleteProductOrder(e) {
    var row = $(e).closest("tr");
    var priceProduct = $(row).find(".total").text();
    var productId = $(row).find(".product-id").text();
    var count = $(row).find(".count").text();
    priceProduct = priceProduct.replace(/\,/g, '');
    
    var priceTotal = $(".price-total-add").val();
    priceTotal = priceTotal.replace(/\,/g, '');
    priceTotal = parseInt(priceTotal) - parseInt(priceProduct);
    priceTotal = priceTotal.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $(".price-total-add").val(priceTotal);
    
    $(row).remove();
    var replace = productId + ":" + count + ";";
    listProductId = listProductId.replace(replace, '');
}

function createOrderAction() {
    var shopId = $("#shopId").val();
    var priceTotal = $(".price-total-add").val();
    priceTotal = priceTotal.replace(/\,/g, '');
    var url = "/order/add";
    $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                shopId : shopId, 
                priceTotal: priceTotal,
                listProductId: listProductId},
            success: function(data){ 
                $('#popupCreateOrder').modal('toggle');
                showNotificationHeader("Tạo đơn hàng thành công");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
}

function showListProductOfOrder(e) {
    var row = $(e).closest("tr");
    var orderId = $(row).find(".orderId").text();
    var url = "/order/productListOfOrder";
    $.ajax({	
            type: 'GET', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                orderId : orderId},
            success: function(data){ 
                $("div[class*='product-order-list']").html(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
}

function showEditOrder(e) {
    var row = $(e).closest("tr");
    row.find(".order-total-text").addClass("hide");
    row.find(".order-total-input").removeClass("hide");
    row.find(".btn-edit-order").removeClass("hide");
    row.find(".btn-show-edit-order").addClass("hide");
    row.find(".status-order").removeAttr("disabled");
}

function cancelEditOrder(e) {
    var row = $(e).closest("tr");
    var orderStatus = row.find(".order-status-text").val();
    row.find(".order-total-text").removeClass("hide");
    row.find(".order-total-input").addClass("hide");
    row.find(".btn-edit-order").addClass("hide");
    row.find(".btn-show-edit-order").removeClass("hide");
    row.find(".status-order").attr("disabled","disabled");
    row.find(".status-order").val(orderStatus);
}

function editOrderAction(e) {
    var row = $(e).closest("tr");
    var orderId = $(row).find(".orderId").text();
    var total = row.find(".order-total-input").val();
    var status = row.find(".status-order").val();
    var url = "/order";
    $.ajax({	
        type: 'PUT', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            orderId : orderId,
            total : total,
            status : status
        },
        success: function(data){ 
            row.find(".order-total-text").removeClass("hide");
            row.find(".order-total-input").addClass("hide");
            row.find(".btn-edit-order").addClass("hide");
            row.find(".btn-show-edit-order").removeClass("hide");
            row.find(".status-order").attr("disabled","disabled");
            row.find(".order-total-text").text(total);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    });
}