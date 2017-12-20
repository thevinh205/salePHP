$(function(){

	$('#slide-submenu').on('click',function() {			        
        $(this).closest('.list-group').fadeOut('slide',function(){
        	$('.mini-submenu').fadeIn();	
        });
        
      });

	$('.mini-submenu').on('click',function(){		
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
	})
})

$(document).ready(function(){
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
});

function showNotificationHeader(message) {
    $("#notifycationTextHeader").text(message);
    $("#notifycationHeader").removeClass("hide"); 
    setTimeout(function() {     
        $("#notifycationHeader").addClass("hide"); 
    },5000);
}

function addCommas(nStr){
   nStr += '';
   var x = nStr.split('.');
   var x1 = x[0];
   var x2 = x.length > 1 ? '.' + x[1] : '';
   var rgx = /(\d+)(\d{3})/;
   while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
   }
   return x1 + x2;
}

function login() {
    var username = $("input[name*='username']").val();
    var password = $("input[name*='password']").val();
    var url = "login.php";
    $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                username: username, 
                password: password
            },
            success: function(data){ 
                if(data == "success"){
                    window.location.replace("../product/product_list.php");
                } else {
                    $(".message-login-fail").removeClass("hidden");
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
}

function logoutPopup() {
    document.getElementById('light').style.display='block';
}