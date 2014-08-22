<?php include "componentes/com_enlace/class.enlaces.php";
if (!isset($_GET['enlace'])) { Enlace::Inicie(); }
if(isset($_GET['enlace']) && $_GET['crear_enlace']) { Enlace::Nuevo(); }
if(isset($_GET['enlace']) && $_GET['editar_enlace']) { Enlace::Editar($_GET['enlace'], $_GET['editar_enlace']); }
if(isset($_GET['enlace']) && $_GET['borrar_enlace']) { Enlace::Borrar($_GET['enlace'], $_GET['borrar_enlace']); } ?>