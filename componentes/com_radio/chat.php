<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
<style>
body{
  width: 99%;
  margin: 0 auto;
}
#chats{
  height: 500px;
  overflow-y: scroll;
}
#msg{
  font-size: 25px;
  width: 98%;
  border: 1px solid rgba(100, 100, 100, 0.60);
  border-radius: 5px;
  outline: 0;
  border-radius: 5px;
  -moz-border-radius: 5px;
  font-family: Arial, Helvetica, sans-serif;
  margin: 5px auto 20px;
  padding: 5px;
  vertical-align: baseline;
  border-image: initial;
  font-family: 'Droid Sans', sans-serif;
}
#msg:focus{
  border-color: rgba(82, 168, 236, 0.8);
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(82, 168, 236, 0.6);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(82, 168, 236, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(82, 168, 236, 0.6);
  outline: 0;
  outline: thin dotted 9;
}
.msgln{
  padding: 5px 0px;
  margin: 5px 0px;
  font-family: 'Droid Sans', sans-serif;
  overflow: hidden;
}
.msgln:nth-child(odd){
  background-color: #EAEAEA;
}
.msgln img{
  float:left;
  padding: 0px 3px;
}
#fb{
  font-family: 'Droid Sans', sans-serif;
}
.fechar{
  float: right;
  font-size: 12px;
  -webkit-transition: 0.2s;
  opacity: 0;
}
.msgln:hover .fechar{
  color:  #666;
  opacity: 1;
  -moz-opacity: 1;
  filter:alpha(opacity=1);
}
.horizontalb{
  width: auto;
  background:url("imagenes/borde-patron.png") repeat;
  padding: 5px 0px;
  margin: 5px 0px;
}
</style>
<script>
function Campo($texto){ document.chatfb.msg.value = document.chatfb.msg.value + " " + $texto + " "; document.chatfb.msg.focus(); }
function Iconos(){
  window.open("iconos.html","iconoschat","width=300,height=600,menubar=no");
}
</script>
<script src="simpleFacebookGraph.js"></script>
</head>
<body>
<script>
var userfbid = '';
fb.ready(function(){
  if (fb.logged)  {
  	username = fb.user.name;
    userfbid = fb.user.id;
    userfbname = fb.user.username;
    html = "<img src=\"" + fb.user.picture + "\"/><b>" + fb.user.name + ":</b>";
    html += '<div style="float:right;"><a href="#" onclick="Iconos();">Iconos</a></div>';
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
        html = "<img src=\"" + fb.user.picture + "\"/><b>" + fb.user.name + ":</b>";
        html += '<div style="float:right;"><a href="#" onclick="Iconos();">Iconos</a></div>';
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
<div class="horizontalb"></div>
<form onsubmit="javascript:sendMsg(); return false;" name="chatfb">
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
  document.getElementById("chats").innerHTML+='<div class="msgln"><a href="https://www.facebook.com/'+userfbname+'" target="_blank"><img src="https://graph.facebook.com/'+userfbid+'/picture" /></a><div class="fechar"><?=date("F j, Y, g:i:s a"); ?></div><b>'+username+'</b>: <br>'+msg+'<br/></div>';
  $("#chats").animate({scrollTop: $("#chats")[0].scrollHeight});
  $.get('server.php?msg='+msg+'&user='+username+'&userimgfb='+userfbid+'&room=<?=$room; ?>&username='+userfbname+'', function(data) {
    document.getElementById("msg").value = '';
  });
}
var old = '';
var source = new EventSource('server.php?room=<?=$room; ?>');
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
</body>
</html>