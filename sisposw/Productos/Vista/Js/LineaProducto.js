/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    $(".nuevo").on("click", function(){
      $(".ventana").css({
          display: 'block'
      }) 
   });
   
   $(".cerrar").on("click", function(){
      $(".ventana").css({
          display: 'none'
      }) 
   });
});

