<?php
$config = new LagcConfig();
$facebook = new Facebook(array('appId'  => $config->lagcfbid,'secret' => $config->lagcfbsecret));
$user = $facebook->getUser();
if ($user) {
	try { $user_profile = $facebook->api('/me'); } catch (FacebookApiException $e) { $user = null; }
}
?>
<div id="fb-root-xth"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
	appId: '<?=$facebook->getAppID(); ?>',
	cookie: true,
	xfbml: true,
	oauth: true
  });
  FB.Event.subscribe('auth.login', function(response) {
	window.location.reload();
  });
  FB.Event.subscribe('auth.logout', function(response) {
	window.location.reload();
  });
};
(function() {
  var e = document.createElement('script'); e.async = true;
  e.src = document.location.protocol + '//connect.facebook.net/es_LA/all.js';
  document.getElementById('fb-root-xth').appendChild(e);
}());
</script>
<?php if (empty($_COOKIE['usuario_lagc']) and !empty($user)) { ?>
<script type="text/javascript"> setTimeout("window.top.location='<?=$_SERVER['REQUEST_URI']; ?>'", 0) </script>
<?php } ?>
<div>
<?php if (!empty($_COOKIE['tmpmsj'])) { ?><div class="mensajetmp"><?=$_COOKIE['tmpmsj']; ?></div><?php } ?>
<?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
<div class="title-caption">
<h3>Bloque de Usuario</h3>
</div><br />
<table border="0">
<tr><td>
<img src="<?=LGlobal::IMG_Usuario($_COOKIE["user_lagc"], "plantillas/radio-xth/imagenes"); ?>" width="100" border="0" align="left" />
Bienvenid@: <?=LGlobal::Url_Usuario($_COOKIE["user_lagc"], true, false, "", ""); ?><br />
<u>Opciones</u><br />
<ul>
	<li>&raquo; <a href="?lagc=com_blog&id=redactar">Crear articulo</a></li>
    <li>&raquo; <a href="">Publicar Video</a></li>
</ul><br /></td></tr>
<tr><td>
Tipo de Cuenta:
<?php if ($_COOKIE["tipo_lagc"]==1) { ?>
<strong><a href="/administrador/" target="_blank">Administrador</a></strong>
<?php } if ($_COOKIE["tipo_lagc"]==2) { ?>
Normal
<?php } if ($_COOKIE["tipo_lagc"]==3) { ?>
<strong><a href="https://www.facebook.com/<?=$user_profile['username'];?>" target="_blank">Facebook</a></strong>
<?php } ?><br /><br />
<table width="250" align="center" border="0">
<tr><td align="center" valign="middle">
<?php
$rptslam = mysql_query("select * from usuarios_publicaciones where user_para='".$_COOKIE["user_lagc"]."' and user_estado='2'"); $slamc = mysql_num_rows($rptslam);
if ($slamc!=0){
	echo "<div class=\"mensajenuevo slamn\"><a href=\"?lagc=com_usuarios&id=".$_COOKIE["user_lagc"]."&ver=".$_COOKIE["usuario_lagc"]."&slamaprobar=true\">Slam: [".$slamc."]</a></div>";
}
?>
</td>
<td align="center" valign="middle">
<?php
$rptamigos = mysql_query("select * from usuarios_amigos where amg_iduserpara='".$_COOKIE["user_lagc"]."' and amg_aprobado='2'"); $aproamg = mysql_num_rows($rptamigos);
if ($aproamg!=0){
	echo "<div class=\"mensajenuevo usuarion\"><a href=\"?lagc=com_usuarios&id=".$_COOKIE["user_lagc"]."&ver=".$_COOKIE["usuario_lagc"]."&amgaprobar=true\">Amigos: [".$aproamg."]</a></div>";
}
?>
</td></tr></table>
</td></tr></table>
<div style="text-align:right;">&raquo; <a href="?logout=true">Desconectar</a></div>
<?php } else { ?>
<div class="title-caption">
<h3>Identificate</h3>
</div>
<form action="" method="post">
  <input name="url" type="hidden" value="<?=$_SERVER['REQUEST_URI']; ?>" />
  <table border="0">
  <tr>
  <td>Usuario ó E-mail:</td>
  <td><input name="lgusuario" type="text" size="27" /></td>
  </tr>
  <tr>
  <td>Contraseña:</td>
  <td><input name="password" type="password" size="27" /></td>
  </tr>
  </table>
  <center>
  <input type="button" value="Entrar" class="button small dark" onclick="this.disabled=true; this.value='Conectando...'; this.form.submit()" />
  </center>
</form>
&raquo; <a href="?lagc=com_usuarios&id=registro">Registrate</a><br />
&raquo; <a href="?lagc=com_usuarios&id=perdiocontra">¿Olvido su Contraseña?</a>
	<?php if (!$user) { ?>
    <center>ó <br /><fb:login-button scope="email,user_checkins,user_about_me,user_birthday,user_relationships,user_status,friends_interests,user_photos">Conectate con Facebook</fb:login-button></center>
    <?php } ?>
<?php } ?>
</div>
<br />