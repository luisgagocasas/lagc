<?php $config = new LagcConfig();
class RadioLG{
	function Emisora(){
		$cont = mysql_query("select * from radio_emosoras where rd_estado='1'"); $radio = mysql_fetch_array($cont);
		return $radio['rd_url'];
	}
}
?>
<link rel="stylesheet" href="componentes/com_radio/jplayer.blue.monday.css" type="text/css" media="all">
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>-->
<script type="text/javascript" src="componentes/com_radio/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" language="javascript">
function refreshDivs(divid,secs,url){
	// define our vars
	var divid,secs,url,fetch_unix_timestamp;
	// Chequeamos que las variables no esten vacias..
	if(divid == ""){ alert('Error: escribe el id del div que quieres refrescar'); return;}
	else if(!document.getElementById(divid)){ alert('Error: el Div ID selectionado no esta definido: '+divid); return;}
	else if(secs == ""){ alert('Error: indica la cantidad de segundos que quieres que el div se refresque'); return;}
	else if(url == ""){ alert('Error: la URL del documento que quieres cargar en el div no puede estar vacia.'); return;}
	// The XMLHttpRequest object
	var xmlHttp;
	try{
		xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}
	// Timestamp para evitar que se cachee el array GET
	fetch_unix_timestamp = function(){
		return parseInt(new Date().getTime().toString().substring(0, 10))
	}
	var timestamp = fetch_unix_timestamp();
	var nocacheurl = url+"?t="+timestamp;
	// the ajax call
	xmlHttp.onreadystatechange=function(){
		if(xmlHttp.readyState==4){
			document.getElementById(divid).innerHTML=xmlHttp.responseText;
			setTimeout(function(){refreshDivs(divid,secs,url);},secs*1000);
		}
	}
	xmlHttp.open("GET",nocacheurl,true);
	xmlHttp.send(null);
}
// LLamamos las funciones con los repectivos parametros de los DIVs que queremos refrescar.
window.onload = function startrefresh(){
	refreshDivs('recargado',10,'componentes/com_radio/comentario.php');
	refreshDivs('contador',2,'componentes/com_radio/procesar_visitas.php');
}
</script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3: "<?=RadioLG::Emisora(); ?>"
			}).jPlayer("play");
		},
		ended: function (event) {
			$(this).jPlayer("play");
		},
		swfPath: "js",
		supplied: "mp3"
	});
});
//]]>
</script>
<script>
function ChatFlotante(){
  window.open("<?=$config->lagcurl; ?>componentes/com_radio/chat.php","chatxth","width=600,height=670,menubar=no");
}
</script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=109288145776036";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<br />
<h2>Radio XtH</h2>
	<center><h5>Somos los que te levantamos :O ....... El buen estado de Animo ^^!</h5></center>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div class="jp-audio" style="margin:0px auto;">
  <div class="jp-type-single">
    <div id="jp_interface_1" class="jp-interface">
      <ul class="jp-controls">
        <li><a href="#" class="jp-play" tabindex="1">play</a></li>
        <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
        <li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
        <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
        <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
      </ul>
      <div class="jp-progress">
        <div class="jp-seek-bar">
          <div class="jp-play-bar"></div>
        </div>
      </div>
      <div class="jp-volume-bar">
        <div class="jp-volume-bar-value"></div>
      </div>
      <div class="jp-current-time"></div>
      <div class="jp-duration"></div>
    </div>
  </div>
</div>
<center><br>
	<div id="recargado">Bienvenido a Radio XtH</div>
<div class="fondoimg">
<table align="center" border="0" style="margin:0px auto;">
<tr>
<td><div style="margin: 0px 10px;position: relative;padding: 10px 0px;"><a href="<?=$config->lagcurl; ?>componentes/com_radio/radio-xth.pls" target="_blank"><img src="<?=$config->lagcurl; ?>componentes/com_radio/imagenes/icon_winamp.gif" alt="Escuchar con tu reproductor de la pc"></a></div><?=$_SERVER['HTTP_USER_AGENT']." - ".LGlobal::getBrowser(); ?></td>
<td><div style="margin:-12px 30px;"></div><g:plusone href="<?=$config->lagcurl;?>radio/" size="tall"></g:plusone></td>
<td><div style="margin:0px 40px;"></div><a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="portuhermana" data-text="#portuhermana">Tweet</a></td>
<td><div style="margin:0px 40px;"></div><div class="fb-like" data-href="http://www.facebook.com/portuhermana" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div></td>
<td><div style="margin:0px 50px;"></div><div class="fb-like" data-href="<?=$config->lagcurl; ?>radio/" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false" data-action="recommend"></div></td>
<td align="center" valign="middle" style="vertical-align: middle;">
<div style="font-family:PFStampsPro-Metal; font-size:20px;">
<img src="componentes/com_radio/imagenes/useronline.gif" border="0" /> <div id="contador" style="display:inline;">0</div> Escuchando
</div>
</td>
</tr>
</table>
<br /><div class="popup"><a href="#" onclick="ChatFlotante(); return false;">hola</a></div>
<div class="topchat">Participa en el chat</div>
</div>
</center>
<iframe src="<?=$config->lagcurl; ?>componentes/com_radio/chat.php" class="iframe" scrolling="no" width="635" height="650"></iframe>
<center>
<img src="componentes/com_radio/imagenes/propaganda.png" width="540" border="0" />
</center>