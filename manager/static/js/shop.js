function changeTab(tabName){
    try{
        if(null != tabName){
            var shopId = $("#shopId").val();
            var url = "/shop/" + tabName + "?shopId=" + shopId;
            if(tabName == 'orderList')
                url = "/order/" + tabName + "?shopId=" + shopId;
            if(tabName == 'employeeList')
                url = "/user/" + tabName + "?shopId=" + shopId;
            $.ajax({	
                type: 'GET', 
                url: url, 
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){ 
                    $("div[id*='contentTab']").html(data);
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
    var url = "/shop/productList?shopId=" + shopId;
    $.ajax({	
        type: 'GET', 
        url: url, 
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){ 
            $("div[id*='contentTab']").html(data);
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