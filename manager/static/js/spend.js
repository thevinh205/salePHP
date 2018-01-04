
$(document).ready(function(){
    $(".btnSearchSpend").click( function(){
        searchSpend(1);
    });
    
    $('input.numbers').keyup(function(event) {
            if(event.which >= 37 && event.which <= 40) return;
            $(this).val(function(index, value) {
              return value
              .replace(/\D/g, "")
              .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
              ;
            });
      });
});

function searchSpend(page) {
    var shopId = $("#shopId").val();
    var fromDate = $("input[name*='fromDate']").val();
    var toDate = $("input[name*='toDate']").val();
    var url = "spend.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { shopId: shopId, 
            fromDate: fromDate,
            toDate: toDate,
            page: page
        },
        success: function(data){ 
            $("div[id*='contentTab']").html(data);
            $('input.numbers').keyup(function(event) {
                if(event.which >= 37 && event.which <= 40) return;
                $(this).val(function(index, value) {
                  return value
                  .replace(/\D/g, "")
                  .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                  ;
                });
          });
          $(".numbers").each(function(c, obj){
            $(obj).text(addCommas(parseFloat($(obj).text())));
        });
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function createSpendAction() {
    var shopId = $("#shopId").val();
    var total = $("input[name*='totalAdd']").val();
    total = total.replace(/\,/g, '');
    var content = $("textarea[name*='contentAdd']").val();
    var url = "shop.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            shopId : shopId, 
            total: total,
            content: content,
            type : 'createSpend'
        },
        success: function(data){ 
            $('#spendPopup').modal('toggle');
            showNotificationHeader("Tạo chi tiêu mới thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function showEditSpend(e) {
    var row = $(e).closest("tr");
    row.find(".content-text").addClass("hide");
    row.find(".content-input").removeClass("hide");
    
    row.find(".total-text").addClass("hide");
    row.find(".total-input").removeClass("hide");
    
    row.find(".btn-edit-spend").removeClass("hide");
    row.find(".btn-show-edit-spend").addClass("hide");
    
    row.find(".order-total-input").keyup(function(event) {
            if(event.which >= 37 && event.which <= 40) return;
            $(this).val(function(index, value) {
              return value
              .replace(/\D/g, "")
              .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
              ;
            });
      });
      
}

function cancelEditSpend(e) {
    var row = $(e).closest("tr");
    row.find(".content-text").removeClass("hide");
    row.find(".content-input").addClass("hide");
    
    row.find(".total-text").removeClass("hide");
    row.find(".total-input").addClass("hide");
    
    row.find(".btn-edit-spend").addClass("hide");
    row.find(".btn-show-edit-spend").removeClass("hide");
}

function editSpendAction(e) {
    var row = $(e).closest("tr");
    var spendId = row.find(".spend-id").text();
    var content = row.find(".content-input").val();
    var total = row.find(".total-input").val();
    var url = "shop.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            spendId : spendId,
            total : total.replace(/\,/g, ''),
            content : content,
            type : 'updateSpend'
        },
        success: function(data){ 
            alert(data);
            cancelEditSpend(e);
            showNotificationHeader("Chỉnh sửa đơn hàng thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    });
}