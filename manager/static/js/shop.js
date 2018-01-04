function changeTab(tabName){
    try{
        if(null != tabName){
            var shopId = $("#shopId").val();
            var url = "";
            if(tabName == 'productList')
                url = "product_list.php";
            if(tabName == 'orderList')
                url = "order_list.php";
            if(tabName == 'employeeList')
                url = "employee_list.php";
            if(tabName == 'statistic')
                url = "statistic.php";
            if(tabName == 'spend')
                url = "spend.php";
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
                    totalPriceOrder:0,
                    fromDate:'',
                    toDate: '',
                    customer: '',
                    status: ''
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
    var url = "statistic.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            fromDate : fromDate, 
            toDate: toDate,
            shopId : shopId
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