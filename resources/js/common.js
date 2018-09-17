$(document).ready(function(){
    $(window).scroll(function() {
        if($(window).scrollTop() == ($(document).height() - $(window).height() - 500)) {

        }
    });
    
    $(".numbers").each(function(c, obj){
        $(obj).text(addCommas(parseFloat($(obj).text())));
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