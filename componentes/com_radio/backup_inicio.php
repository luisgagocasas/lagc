<?php $config = new LagcConfig();
class RadioLG{
	function Emisora(){
		$cont = mysql_query("select * from radio_emosoras where rd_estado='1'"); $radio = mysql_fetch_array($cont);
		return $radio['rd_url'];
	}
}
?>
<!-- nuevo -->
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
<style>
#recargado {
	margin:auto;
	padding:10px;
	text-align:center;
	color:#990000;
	font-weight:bold;
}
.topchat{
	background:#3B5998;
	color:#EDF0F5;
	font-weight:bold;
	padding:5px 10px;
	margin:0px 0px 0px 0px;
	height:20px;
	font-size:15px;
	position:relative;
	-moz-border-radius:5px 5px 0px 0px;
	-webkit-border-radius:5px 5px 0px 0px;
	border-radius:5px 5px 0px 0px;
	padding:5px 5px 5px 5px;
	-moz-box-shadow:0px 0px 10px 0px #666;
	-webkit-box-shadow:0px 0px 10px 0px #666;
	box-shadow:0px 0px 10px 0px #666;
	font-family: 'Droid Sans', sans-serif;
}
#chats{
  height: 500px;
  overflow-y: scroll;
  border: 1px #CCC solid;
  -moz-border-radius:0px 0px 5px 5px;
  -webkit-border-radius:0px 0px 5px 5px;
  border-radius:0px 0px 5px 5px;
  padding:10px 5px 5px 5px;
  -moz-box-shadow:0px 0px 10px 0px #666;
  -webkit-box-shadow:0px 0px 10px 0px #666;
  box-shadow:0px 0px 10px 0px #666;
}
.Rproductor{
	width: 550px;
	height: 135px;
	border: 1px #CCC solid;
	-moz-border-radius:0px 0px 5px 5px;
	-webkit-border-radius:0px 0px 5px 5px;
	border-radius:0px 0px 5px 5px;
	padding:5px 5px 5px 5px;
	-moz-box-shadow:0px 0px 10px 0px #666;
	-webkit-box-shadow:0px 0px 10px 0px #666;
	box-shadow:0px 0px 10px 0px #666;
	color: #ffffff;
	background: #000000;
	margin: 0px auto;
}
#msg{
  font-size: 25px;
  width: 99%;
  border: 1px solid #CCC;
  border-radius: 5px;
  -moz-border-radius: 5px;
  font-family: Arial, Helvetica, sans-serif;
  margin: 5px auto 20px;
  padding: 5px;
  vertical-align: baseline;
  border-image: initial;
  font-family: 'Droid Sans', sans-serif;
}
.msgln{
  padding: 5px 0px;
  margin: 5px 0px;
  font-family: 'Droid Sans', sans-serif;
}
.msgln:nth-child(odd){
  background-color: #EAEAEA;
}
.msgln img{
  float:left;
  margin: -5px 5px;
}
#fb{
  font-family: 'Droid Sans', sans-serif;
}
.fechar{
  float: right;
  font-size: 12px;
  color:  #CCC;
}
</style>
<script src="componentes/com_radio/simpleFacebookGraph.js"></script>
<!-- fin de nuevo -->
<script type="text/javascript" language="javascript">
function refreshDivs(divid,secs,url){
	var divid,secs,url,fetch_unix_timestamp;
	if(divid == ""){ alert('Error: escribe el id del div que quieres refrescar'); return;}
	else if(!document.getElementById(divid)){ alert('Error: el Div ID selectionado no esta definido: '+divid); return;}
	else if(secs == ""){ alert('Error: indica la cantidad de segundos que quieres que el div se refresque'); return;}
	else if(url == ""){ alert('Error: la URL del documento que quieres cargar en el div no puede estar vacia.'); return;}
	// The XMLHttpRequest object
	var xmlHttp;
	try{
		xmlHttp=new XMLHttpRequest();
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
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
	fetch_unix_timestamp = function(){
		return parseInt(new Date().getTime().toString().substring(0, 10))
	}
	var timestamp = fetch_unix_timestamp();
	var nocacheurl = url+"?t="+timestamp;
	xmlHttp.onreadystatechange=function(){
		if(xmlHttp.readyState==4){
			document.getElementById(divid).innerHTML=xmlHttp.responseText;
			setTimeout(function(){refreshDivs(divid,secs,url);},secs*1000);
		}
	}
	xmlHttp.open("GET",nocacheurl,true);
	xmlHttp.send(null);
}
window.onload = function startrefresh(){
	refreshDivs('recargado',10,'componentes/com_radio/comentario.php');
	refreshDivs('contador',2,'componentes/com_radio/procesar_visitas.php');
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
<div class="Rproductor">
	<center><h5>Somos los que te levantamos :O ....... Tu estado de Animo ^^!</h5></center>
<center>
	<table cellpadding="5" cellspacing="5"><tr><td><img width="100" src="http://i950.photobucket.com/albums/ad343/elrinconcito/gifs/Musica/Parlantes/GIF009.gif"></td>
	<td valign="middle" style="vertical-align: middle;">&nbsp;&nbsp;
	<div id="Rradio"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
	<script type="text/javascript" src="http://servidor.net63.net/web/player/swfobject.js"></script>
	<script type="text/javascript">
	var s1 = new SWFObject("http://servidor.net63.net/web/player/player.swf","ply","300","20","10","#FFFFFF");
	s1.addParam("allowfullscreen","false");
	s1.addParam("allowscriptaccess","always");
	s1.addParam("flashvars","file=<?=RadioLG::Emisora(); ?>&type=mp3&volume=100&autostart=true&frontcolor=0xffffff&backcolor=0x000000&lightcolor=0x000000");
	s1.write("Rradio");
	</script>&nbsp;&nbsp;</td>
	<td><img width="100" src="http://i950.photobucket.com/albums/ad343/elrinconcito/gifs/Musica/Parlantes/GIF009.gif"></td>
	</tr></table>
</center>
</div>
<center>
	<div id="recargado">Bienvenido a Radio XtH</div>
<table align="center" border="0" style="margin:0px auto;">
<tr>
<td><div style="margin:-12px 30px;"></div><g:plusone href="<?=$config->lagcurl;?>radio/" size="tall"></g:plusone></td>
<td><div style="margin:0px 40px;"></div><a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="portuhermana" data-text="#portuhermana">Tweet</a></td>
<td><div class="fb-like" data-href="http://www.facebook.com/portuhermana" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div></td>
<td align="center" valign="middle" style="vertical-align: middle;">
<div style="font-family:PFStampsPro-Metal; font-size:20px; padding:10px;">
<img src="componentes/com_radio/imagenes/useronline.gif" border="0" /> <div id="contador" style="display:inline;">0</div> Escuchando
</div>
</td>
</tr>
</table>
<br>
<div class="topchat">Comenta en el chat</div>
</center>
<!-- nuevo -->
<script>
var userfbid = '';
fb.ready(function(){
  if (fb.logged)  {
  	username = fb.user.name;
    userfbid = fb.user.id;
    userfbname = fb.user.username;
    html = "Hola <b>" + fb.user.name + ":</b> <img src=\"" + fb.user.picture + "\"/>";
    html += '<input type="text" name="text" maxlength="450" id="msg" autocomplete="off" />';
    document.getElementById("fb").innerHTML = html;
  }
});
function login() {
  fb.login(function(){
    if (fb.logged) {
        username = fb.user.name;
        userfbid = fb.user.id;
        userfbname = fb.user.username;
        html = "Hola <b>" + fb.user.name + ":</b> <img src=\"" + fb.user.picture + "\"/>";
        html += '<input type="text" name="text" maxlength="450" id="msg" autocomplete="off" />';
        document.getElementById("fb").innerHTML = html;
    } else {
    	alert("No se pudo identificar al usuario");
    }
  })
};
</script>
<center>
<?php $room = "radio"; ?>
</center>
<div id="chats"></div><br>
<form onsubmit="javascript:sendMsg(); return false;">
  <div id="fb"><br><center><a href="#" style="font-size:18px;" onclick="login(); return false;">"Iniciar sesi&oacute;n"</a></center><br><br></div>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
var username = '';
function sendMsg(){
  var msg = document.getElementById("msg").value;
  if(!msg){
    return;
  }
  document.getElementById("chats").innerHTML+='<div class="msgln"><a href="https://www.facebook.com/'+userfbname+'" target="_blank"><img src="https://graph.facebook.com/'+userfbid+'/picture" /></a><div class="fechar"><?=date("g:i:s a"); ?></div><b>'+username+'</b>: <br>'+msg+'<br/></div>';
  $("#chats").animate({scrollTop: $("#chats")[0].scrollHeight});
  $.get('componentes/com_radio/server.php?msg='+msg+'&user='+username+'&userimgfb='+userfbid+'&room=<?=$room; ?>&username='+userfbname+'', function(data) {
    document.getElementById("msg").value = '';
  });
}
var old = '';
var source = new EventSource('componentes/com_radio/server.php?room=<?=$room; ?>');
source.onmessage = function(e){
  if(old!=e.data){
    document.getElementById("chats").innerHTML='<span>'+e.data+'</span>';
    old = e.data;
  }
};
function strip(html){
  var tmp = document.createElement("DIV");
  tmp.innerHTML = html;
  return tmp.textContent||tmp.innerText;
}
</script>
<!-- fin de nuevo -->
<center>
<img src="componentes/com_radio/imagenes/propaganda.png" width="540" border="0" />
</center>