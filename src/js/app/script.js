// Sliding menu
var ua =  navigator.userAgent,
          event = (ua.match(/iPhone/i)) ? "touchstart" : "click";
$("body").on(event, function(evt){
  if(!$(evt.target).hasClass("menuBtn")){
    $(".sidebar").css("left","-295px");
    $(".sidebar").css("opacity","0");
    mui.overlay('off');
  }else{
    $(".sidebar").css("left","0px");
    $(".sidebar").css("opacity","1");
    mui.overlay('on');
  }
 });