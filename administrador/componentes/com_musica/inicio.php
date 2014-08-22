<?php include "componentes/com_musica/class.musica.php";
if (!isset($_GET['musica'])) { musica::Inicib(); }
if(isset($_GET['musica']) && $_GET['selec_serv_musica']) { musica::NuevoSelec(); }
if(isset($_GET['musica']) && $_GET['crear_musica']) { musica::Nuevo(); }
if(isset($_GET['musica']) && $_GET['editar_musica']) { musica::Editar($_GET['musica'], $_GET['editar_musica']); }
if(isset($_GET['musica']) && $_GET['borrar_musica']) { musica::Borrar($_GET['musica'], $_GET['borrar_musica']); }
if(isset($_GET['musica']) && $_GET['genero_musica']) { Generos::Inicio(); }
if(isset($_GET['musica']) && $_GET['genero_nuevo']) { Generos::Nuevo(); }
if(isset($_GET['musica']) && $_GET['genero_editar']) { Generos::Editar($_GET['musica'], $_GET['genero_editar']); }
if(isset($_GET['musica']) && $_GET['genero_borrar']) { Generos::Borrar($_GET['musica'], $_GET['genero_borrar']); }
if(isset($_GET['musica']) && $_GET['cantante_musica']) { Cantantes::Inicio(); }
if(isset($_GET['musica']) && $_GET['cantante_nuevo']) { Cantantes::Nuevo(); }
if(isset($_GET['musica']) && $_GET['cantante_editar']) { Cantantes::Editar($_GET['musica'], $_GET['cantante_editar']); }
if(isset($_GET['musica']) && $_GET['cantante_borrar']) { Cantantes::Borrar($_GET['musica'], $_GET['cantante_borrar']); }
if(isset($_GET['musica']) && $_GET['servidor_musica']) { Servidores::Inicio(); }
if(isset($_GET['musica']) && $_GET['servidor_nuevo']) { Servidores::Nuevo(); }
if(isset($_GET['musica']) && $_GET['servidor_editar']) { Servidores::Editar($_GET['musica'], $_GET['servidor_editar']); }
if(isset($_GET['musica']) && $_GET['servidor_borrar']) { Servidores::Borrar($_GET['musica'], $_GET['servidor_borrar']); }
if(isset($_GET['musica']) && $_GET['comentarios']) { Comentarios::Inicio(); }
if(isset($_GET['musica']) && $_GET['comentarios_aprobar']) { Comentarios::Aprobarc($_GET['musica'], $_GET['comentarios_aprobar']); }
if(isset($_GET['musica']) && $_GET['comentarios_borrar']) { Comentarios::Borrar($_GET['musica'], $_GET['comentarios_borrar']); } ?>