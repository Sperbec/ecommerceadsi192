/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */







$(function(){

$(".nuevoTelefono").on("click", function(){

$("#tablaProveedor")
        .append
        (
             "<tr><td><div id='borrarTelefono'><img src='Vista/src/eliminarIcono.png' width='30px' title='Eliminar Numero' alt=''></div></td><td><input class='campo' type='text' name='TelProNum[]' required autocomplete='off'></td></tr>"
)



});

$(".nuevoTelefono1").on("click", function(){

$("#tablaTelefono")
        .append
        (
             "<tr><td><div id='borrarTelefono'><img src='Vista/src/eliminarIcono.png' width='30px' title='Eliminar Numero' alt=''></div></td><td><input class='campo' type='text' name='TelProNum[]' required autocomplete='off'></td></tr>"
)



});

$(".borrarTelefono").on("click", function(){
                $(this).parent().parent().fadeOut("slow", function () {
        $(this).remove();



});

});


});


