<?php include "componentes/com_radio/class.radio.php"; ?>
<link href="componentes/com_radio/estilos.css" rel="stylesheet" type="text/css" />
<?php
if (!isset($_GET['radiolg'])) { RadioLG::InicioR(); }
if(isset($_GET['radiolg']) && $_GET['lista_radio']) { RadioLG::ListarRadios($_GET['radiolg'], $_GET['lista_radio']); }
if(isset($_GET['radiolg']) && $_GET['salu2_radio']) { RadioLG::MendarSalu2($_GET['radiolg'], $_GET['salu2_radio']); }
if(isset($_GET['radiolg']) && $_GET['crear_radio']) { RadioLG::Nuevo($_GET['radiolg'], $_GET['crear_radio']); }
if(isset($_GET['radiolg']) && $_GET['editar_radio']) { RadioLG::Editar($_GET['radiolg'], $_GET['editar_radio']); }
if(isset($_GET['radiolg']) && $_GET['borrar_radio']) { RadioLG::Borrar($_GET['radiolg'], $_GET['borrar_radio']); }
if(isset($_GET['radiolg']) && $_GET['usar_radio']) { RadioLG::UsarEmisora($_GET['radiolg'], $_GET['usar_radio']); } ?>
<!--
Desarrollado por Luis Gago Casas = Lagc Perú
-->