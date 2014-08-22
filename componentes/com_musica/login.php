<?php
require "../../administrador/configuracion.lagc.php";
require "../../administrador/componentes/com_sistema/function.globales.php"; $config = new LagcConfig(); //Conexion
$rptMusica = mysql_query("select * from music_canciones where song_id='".$_GET['cantanteid']."'");
$Musica = mysql_fetch_array($rptMusica);
if (!empty($Musica['song_id']) and $_GET['cantantetitle']==LGlobal::Url_Amigable($Musica['song_titulo'])) {
?>
<form action="" method="post">
  <input name="url" type="hidden" value="<?=$config->lagcurl.LGlobal::Tipo_URL('com_musica', $Musica['song_id'], $Musica['song_titulo']); ?>" />
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
<?php } else {
  echo "Se produjo un error. REPORTELO";
}
?>