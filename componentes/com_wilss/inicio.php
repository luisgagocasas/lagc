<?php include "componentes/com_wilss/class.wilss.php"; ?>
<link href="componentes/com_wilss/estilos.css" rel="stylesheet" type="text/css" />
<?php
if (!isset($_GET['id'])) { Wilss::Inicio(); }
if($_GET['id']=="correas") { Wilss::Correas(); }
if($_GET['id']=="billeteras") { Wilss::Billeteras(); }
if($_GET['id']=="carteras") { Wilss::Carteras(); }
if($_GET['id']=="sobres") { Wilss::Sobres(); }
/*if($_GET['id'] && $_GET['ver']) { Wilss::Ver($_GET['id'], $_GET['ver']); }*/
?>