<?php
function _ContarArt($art){
	$rptcontco = mysql_query("select * from video_videos where vi_categoria='$art'");
     return mysql_num_rows($rptcontco);
}
?>
<div class="categories widget clearfix">
  <div class="title-caption">
    <h3>Videos: Categorias</h3>
  </div>
  <ul>
<?php
$rptblog = mysql_query("select vi_ca_titulo,vi_ca_id from video_categorias where vi_ca_estado='1' order by vi_ca_titulo DESC limit 8");
while($catblog = mysql_fetch_array($rptblog)){
    echo "<li><div><a href=\"?lagc=com_videos&id=".$catblog['vi_ca_id']."&categoria=".LGlobal::Url_Amigable($catblog['vi_ca_titulo'])."\">".$catblog['vi_ca_titulo']."</a><span>("._ContarArt($catblog['vi_ca_id']).")</span></div></li>";
}
?>
  </ul>
</div>