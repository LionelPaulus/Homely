// Sliding menu
$("body").click(function(evt){
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