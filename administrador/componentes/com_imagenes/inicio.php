<?php include "componentes/com_imagenes/class.imagenes.php";
if (!isset($_GET['img'])) { Img::Inicio(); }
if(isset($_GET['img']) && $_GET['borrar_img']) { Img::BorrarImg($_GET['img'], $_GET['borrar_img']); } ?>