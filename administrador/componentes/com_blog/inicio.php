<?php include "componentes/com_blog/class.blog.php";
if (!isset($_GET['blog'])) { Blog::Inicib(); }
if(isset($_GET['blog']) && $_GET['crear_blog']) { Blog::Nuevo(); }
if(isset($_GET['blog']) && $_GET['editar_blog']) { Blog::Editar($_GET['blog'], $_GET['editar_blog']); }
if(isset($_GET['blog']) && $_GET['borrar_blog']) { Blog::Borrar($_GET['blog'], $_GET['borrar_blog']); }
if(isset($_GET['blog']) && $_GET['ver_blog']) { Blog::Ver_blog($_GET['blog'], $_GET['ver_blog']); }
if(isset($_GET['blog']) && $_GET['categoria_blog']) { Categorias::Inicio(); }
if(isset($_GET['blog']) && $_GET['categoria_nuevo']) { Categorias::Nuevo(); }
if(isset($_GET['blog']) && $_GET['categoria_editar']) { Categorias::Editar($_GET['blog'], $_GET['categoria_editar']); }
if(isset($_GET['blog']) && $_GET['categoria_borrar']) { Categorias::Borrar($_GET['blog'], $_GET['categoria_borrar']); }
if(isset($_GET['blog']) && $_GET['comentarios']) { Comentarios::Inicio(); }
if(isset($_GET['blog']) && $_GET['comentarios_aprobar']) { Comentarios::Aprobarc($_GET['blog'], $_GET['comentarios_aprobar']); }
if(isset($_GET['blog']) && $_GET['comentarios_borrar']) { Comentarios::Borrar($_GET['blog'], $_GET['comentarios_borrar']); } ?>