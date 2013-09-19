$(document).ready(function(){
  $("a").click(function(){
    $($(this).attr("href")).fadeToggle();
  });
});