<?php include "componentes/com_musica/class.contenidos.php"; ?>
<link href="componentes/com_musica/estilos.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
<?php if (!isset($_GET['id'])) { Musica::Inicio(); } ?>
<?php if($_GET['id'] && $_GET['cantante']) { Musica::Cantante($_GET['id'], $_GET['cantante']); } ?>
<?php if($_GET['id'] && $_GET['genero']) { Musica::Genero($_GET['id'], $_GET['genero']); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Musica::Cancion($_GET['id'], $_GET['ver']); } ?>