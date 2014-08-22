<link href="componentes/com_whois/estilos.css" rel="stylesheet" type="text/css" />
<?php include "componentes/com_whois/class.sistema.php"; ?>
<?php if (!isset($_GET['id'])) { whois::Inicio(); } ?>
<?php if($_GET['id']=="planes") { whois::PlanesHost(); } ?>
<?php if($_GET['id']=="enviar_orden") { whois::EnvioCopiaPlanB(); } ?>
<?php if($_GET['id']=="orden_confirmar") { whois::EnvioCopiaPlanB(); } ?>
<?php if($_GET['id']=="dominios") { whois::DominiosInicio(); } ?>
<?php if($_GET['id']=="compar_dominio") { whois::Comprar_Dominio(); } ?>