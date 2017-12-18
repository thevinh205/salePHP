function changeTab(tabName){
    try{
        if(null != tabName){
            var shopId = $("#shopId").val();
            var url = "";
            if(tabName == 'productList')
                url = "product_list.php?shopId=" + shopId;
            if(tabName == 'orderList')
                url = "order_list.php?shopId=" + shopId;
            if(tabName == 'employeeList')
                url = "employee.php?shopId=" + shopId;
            $.ajax({	
                type: 'POST', 
                url: url, 
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    shopId: shopId, 
                    page: 1,
                    productId :'', 
                    productName: '',
                    productType: 'all',
                    orderId: '',
                    totalPriceOrder:0
                },
                success: function(data){ 
                    $("div[id*='contentTab']").html(data);
                    $(".numbers").each(function(c, obj){
                        $(obj).text(addCommas(parseFloat($(obj).text())));
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                }
            }); 
        }
    }catch (e) {
            // TODO: handle exception
    }
}

$(document).ready(function(){
    var shopId = $("#shopId").val();
    var url = "product_list.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { 
            shopId: shopId, 
            page: 1,
            productId :'', 
            productName: '',
            productType: 'all'
        },
        success: function(data){ 
            $("div[id*='contentTab']").html(data);
            $(".numbers").each(function(c, obj){
                $(obj).text(addCommas(parseFloat($(obj).text())));
            });
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
});

function statisticAction() {
    var shopId = $("#shopId").val();
    var fromDate = $(".fromDate").val();
    var toDate = $(".toDate").val();
    var url = "/shop/statistic?shopId=" + shopId;
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            fromDate : fromDate, 
            toDate: toDate},
        success: function(data){ 
            $("div[id*='contentTab']").html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}