<div id="showcase" class="showcase">
<?php
$rptsocainfo = mysql_query("select * from blog_articulos where b_categoria='2' order by b_id DESC limit 8");
while($socainfo = mysql_fetch_array($rptsocainfo)){
  echo "<div class=\"showcase-slide\">
    <div class=\"showcase-entry\"> <img src=\"componentes/com_imagenes/imagenes/".$socainfo['b_img']."\" width=\"730\" height=\"460\" alt=\"".$socainfo['b_id']."\" /> </div>
    <div class=\"showcase-thumbnail\"> <img src=\"componentes/com_imagenes/thumbnails/".$socainfo['b_img']."\" width=\"86\" height=\"52\" alt=\"".$socainfo['b_id']."\" /> <span class=\"showcase-thumbnail-console\">".$socainfo['b_palabras']."</span>
      <h6 class=\"showcase-thumbnail-title\"><a>".$socainfo['b_titulo']."</a></h6>
    </div>
    <div class=\"showcase-caption clearfix\">
      <h2>".$socainfo['b_titulo']."</h2>
      <div class=\"showcase-description\"> ".$socainfo['b_resumen']." </div>
      <a href=\"".LGlobal::Tipo_URL('com_blog', $socainfo['b_id'], $socainfo['b_titulo'])."\" class=\"button small red align-btn-right\">Leer m&aacute;s...</a>
      <!-- <div class=\"star\"></div> -->
    </div>
  </div>";
}
?>
</div>