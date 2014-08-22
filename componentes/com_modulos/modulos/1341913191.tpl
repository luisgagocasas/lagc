<div class="scroll-container">
  <h3>Conoce de Socabaya - <a href="?lagc=com_blog&id=1&categoria=socabaya">Ver todo</a></h3>
  <div class="scroller_wrap">
    <div class="scroller_block">
      <ul style="width:1980px">
      <?php
      $rptsocainfo = mysql_query("select * from blog_articulos where b_categoria='1' order by rand(".time()." * ".time().") limit 8");
      while($socainfo = mysql_fetch_array($rptsocainfo)){
      	echo "<li> <a href=\"".LGlobal::Tipo_URL('com_blog', $socainfo['b_id'], $socainfo['b_titulo'])."\">
        	<img class=\"small-custom-frame\" src=\"componentes/com_imagenes/thumbnails/".$socainfo['b_img']."\" width=\"222\" height=\"137\" alt=\"".$socainfo['b_titulo']."\" /></a>
        	<div class=\"scroll-caption\"> <span>".$socainfo['b_palabras']."</span>
        	<h6><a href=\"".LGlobal::Tipo_URL('com_blog', $socainfo['b_id'], $socainfo['b_titulo'])."\">".$socainfo['b_titulo']."</a></h6>
        	<div class=\"star\"></div>
        	</div>
        </li>";
      }
      ?>
      </ul>
    </div>
    <div class="scroller_slider"> <a href="#" class="scroller_slider_prev"></a> <a href="#" class="scroller_slider_next"></a>
      <div class="scroller_slider_bar"></div>
    </div>
  </div>
</div>