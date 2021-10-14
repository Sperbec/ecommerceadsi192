



$(function(){
    $(".nuevoReporte").on("click", function(){
      $(".ventanaReporte").css({
          display: 'block'
      }) 
   });
   
   $(".cerrarReporte").on("click", function(){
      $(".ventanaReporte").css({
          display: 'none'
      }) 
   });
});
