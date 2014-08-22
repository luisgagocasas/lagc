$(document).ready(

function() {

var numeroImagenes;

var contenidoInicial=$('.bloque-imagenes').html();

var margenTop;

function carrusel(){

margenTop=$('.bloque-imagenes').css('margin-top');


margenTop=margenTop.split('p');
margenTop[0]=margenTop[0] - 1;


if((($('.bloque-imagenes').children().size() - 4) * 73) < Math.abs(margenTop[0])){

$('.bloque-imagenes').append(contenidoInicial);

};

$('.bloque-imagenes').css('margin-top',margenTop[0] +'px');

}


var parar=setInterval(function mover() {carrusel();},100);


$('.bloque-imagenes').mouseover(function(){
	clearInterval(parar);

});

$('.bloque-imagenes').mouseout(function(){
	parar=setInterval(function mover() {carrusel();},100);
});

});