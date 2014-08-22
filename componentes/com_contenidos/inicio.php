<?php include "componentes/com_contenidos/class.contenidos.php"; ?>
<link href="componentes/com_contenidos/estilos.css" rel="stylesheet" type="text/css" />
<?php if (!isset($_GET['id'])) { Articulos::Inicio(10); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Articulos::Ver($_GET['id'], $_GET['ver']); }?>
<?php /*?><?php if($_GET['id'] && $_GET['ver']) {
	if(!empty($_SESSION['lagc_usuario_sitio'])) { Articulos::Ver($_GET['id'], $_GET['ver']); }
	else { ?>
    
<form action="?lagc=com_usuarios&usuario=validar_usuario" method="post">
<h2>Identificate</h2>
<input name="url" type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
<center>
  Email:
  <input name="usuario" type="text" />
  Contrase&ntilde;a:
  <input name="password" type="password" /><br /><br />
  <input type="image" src="plantillas/nuezindia/imagenes/ingresar.jpg" />
</center>
</form>
<center>
<h2>&oacute;</h2>
<a href="?lagc=com_usuarios&usuario=registro">REGISTRATE</a>
</center>
<?php }
} ?><?php */?>