$(document).ready(

function() {

var numeroImagenes;

var contenidoInicial=$('.bloque-imagenes').html();

var margenTop;
var ancho;
var anchoOriginal=$('.bloque-imagenes').css('width');
anchoOriginal=anchoOriginal.split('p');

function carrusel(){

margenTop=$('.bloque-imagenes').css('margin-left');

margenTop=margenTop.split('p');
margenTop[0]=margenTop[0] - 1;

ancho=$('.bloque-imagenes').css('width');;
ancho=ancho.split('p');



if((($('.bloque-imagenes').children().size() - 4) * 73) < Math.abs(margenTop[0])){

$('.bloque-imagenes').append(contenidoInicial);
$('.bloque-imagenes').css('width',(parseInt(ancho[0]) + parseInt(anchoOriginal)) + 'px');

};

$('.bloque-imagenes').css('margin-left',margenTop[0] +'px');

}


var parar=setInterval(function mover() {carrusel();},70);


$('.bloque-imagenes').mouseover(function(){
	clearInterval(parar);

});

$('.bloque-imagenes').mouseout(function(){
	parar=setInterval(function mover() {carrusel();},70);
});

});