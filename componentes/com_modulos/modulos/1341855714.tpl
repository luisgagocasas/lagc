<?php
function _ContarComent($val){
	$rptcoment = mysql_query("select * from video_comentarios where coment_video='".$val."'");
    return mysql_num_rows($rptcoment);
}
?>
<div class="topgames widget">
  <div class="title-caption">
    <h3>Videos</h3>
  </div>
  <div class="entry-holder">
    <div class="tabs-2">
      <ul class="tabs-nav tabs-2 clearfix">
        <li><a href="#tab7">Nuevos</a></li>
        <li><a href="#tab8">Populares</a></li>
      </ul>
      <div class="tabs-container">
        <div class="tab-content" id="tab7">
          <ul class="rate">
          <?php
          $rptrvideo = mysql_query("select * from video_videos where vi_estado='1' order by vi_id DESC limit 6");
          while($rvideo = mysql_fetch_array($rptrvideo)){
          echo "<li> <a class=\"zoom\" href=\"".LGlobal::Tipo_URL('com_videos', $rvideo['vi_id'], $rvideo['vi_titulo'])."\"> <img src=\"".$rvideo['vi_imagen']."\" width=\"94\" height=\"60\" alt=\"".$rvideo['vi_titulo']."\" /> </a>
          <div class=\"teaser-content\">
          <h6><a class=\"title\" href=\"".LGlobal::Tipo_URL('com_videos', $rvideo['vi_id'], $rvideo['vi_titulo'])."\">".$rvideo['vi_titulo']."</a></h6>
          <div class=\"star\"></div>
          </div>
          <div class=\"clear\"></div>
          </li>";
          }
          ?>
          </ul>
        </div>
        <div class="tab-content" id="tab8">
          <ul class="rate">
          <?php
          $rptrvideo = mysql_query("select * from video_videos where vi_estado='1' order by vi_id DESC limit 6");
          while($rvideo = mysql_fetch_array($rptrvideo)){
          if(_ContarComent($rvideo['vi_id'])>0){
          	echo "<li> <a class=\"zoom\" href=\"".LGlobal::Tipo_URL('com_videos', $rvideo['vi_id'], $rvideo['vi_titulo'])."\"> <img src=\"".$rvideo['vi_imagen']."\" width=\"94\" height=\"60\" alt=\"".$rvideo['vi_titulo']."\" /> </a>
            <div class=\"teaser-content\">
            <h6><a class=\"title\" href=\"".LGlobal::Tipo_URL('com_videos', $rvideo['vi_id'], $rvideo['vi_titulo'])."\">".$rvideo['vi_titulo']."</a></h6>
            <div class=\"star\"></div>
            </div>
            <div class=\"clear\"></div>
            </li>";
            }
          }
          ?>
          </ul>
        </div>
        <a href="/videos" class="see-all">Mas Videos &raquo;</a> </div>
    </div>
  </div>
</div>