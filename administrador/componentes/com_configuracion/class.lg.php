<?php include "componentes/com_configuracion/class.luisgago.php"; ?>
<?php if (!isset($_GET['lg'])) { Configuracion::ConfigSitio(); } ?>
<?php if (isset($_GET['lg']) && $_GET['phpinfo']) { Configuracion::PhpInfo(); } ?>