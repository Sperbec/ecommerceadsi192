/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
    $(".nuevoProducto").on("click", function(){
      $(".ventanaNuevoProducto").css({
          display: 'block'
      }) 
   });
   
   $(".cerrarNuevoProducto").on("click", function(){
      $(".ventanaNuevoProducto").css({
          display: 'none'
      }) 
   });
   
   
   
   
   
   $(".nuevoLineaProducto").on("click", function(){
      $(".ventanaNuevoLineaProducto").css({
          display: 'block'
      }) 
   });
   
   $(".cerrarNuevoLineaProducto").on("click", function(){
      $(".ventanaNuevoLineaProducto").css({
          display: 'none'
      }) 
   });
   
   
   
   $(".nuevoSubLineaProducto").on("click", function(){
      $(".ventanaNuevoSubLineaProducto").css({
          display: 'block'
      }) 
   });
   
   $(".cerrarNuevoSubLineaProducto").on("click", function(){
      $(".ventanaNuevoSubLineaProducto").css({
          display: 'none'
      }) 
   });
   
 /*  $(".enviar").on("click",function(){
       $(".disabled").attr("disabled", false)
   });*/
   
   
});

