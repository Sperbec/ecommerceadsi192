/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
    $(".nuevoProveedor").on("click", function(){
      $(".ventanaProveedor").css({
          display: 'block'
      }) 
   });
   
   $(".cerrarProveedor").on("click", function(){
      $(".ventanaProveedor").css({
          display: 'none'
      }) 
   });
   
     $(".añadirTelefono").on("click", function(){
      $(".ventanaNuevoLineaProducto").css({
          display: 'block'
      }) 
   });
   
   $(".cerrarTelefono").on("click", function(){
      $(".ventanaNuevoLineaProducto").css({
          display: 'none'
      }) 
   });
   
});

