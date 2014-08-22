$(document).ready(function(){
  $("a.new_window").attr("target", "_blank");
 });
/* Scroll*/
$(window).scroll(function(){
		if (window.pageYOffset >= 300) { /*De aqui cuadramos cuando queremos que aparezca el scroll*/
			$('#scroll-up:not(:visible)').fadeIn();
		} else {
			$('#scroll-up:visible').fadeOut();
		}
	});
/* Scroll*/