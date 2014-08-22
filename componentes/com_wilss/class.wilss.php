<?php
class Wilss{
	function Inicio(){
		//echo "aqui el inicio";
	}
	function Correas(){ $config = new LagcConfig(); ?>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=117397565009018";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
<?php
$rptarti = mysql_query("select * from wilss_correas where co_estado='1' ORDER BY co_id ASC");
while($verfuncti=mysql_fetch_array($rptarti)){ ?>
function mostrar<?=$verfuncti['co_id']; ?>() {
	<?php if(!empty($verfuncti['co_img1'])) { ?>document.getElementById('img1').src = 'componentes/com_imagenes/imagenes/<?=$verfuncti['co_img1']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['co_img2'])) { ?>document.getElementById('img2').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['co_img2']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['co_img3'])) { ?>document.getElementById('img3').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['co_img3']; ?>'; <?php } ?>
}
<?php } ?>
</script>
<script type="text/javascript">
function rotar1() {
	document.getElementById('img1').src = document.getElementById('img2').src
}
function rotar2() {
	document.getElementById('img1').src = document.getElementById('img3').src
}
</script>
<script type="text/javascript" src="componentes/com_wilss/jquery.js"></script>
<script type="text/javascript" src="componentes/com_wilss/funciones.js"></script>
<div class="marqueephotos"><br />
	<div class="carrusel">
    	<ul class="bloque-imagenes">
         <?php
		 $rptconte = mysql_query("select * from wilss_correas where co_estado='1' ORDER BY co_id ASC");
		 while($conte=mysql_fetch_array($rptconte)){
			 echo "<li><a onClick=\"mostrar".$conte['co_id']."();\"><img src=\"componentes/com_imagenes/thumbnails/".$conte['co_img1']."\" alt=\"\"/></a></li>\n";
		}
		?>
        </ul>
    </div>
</div>
  <center>
  <?php $rptprimerac = mysql_query("select * from wilss_correas where co_estado='1' ORDER BY co_id ASC limit 1"); $pricorrea=mysql_fetch_array($rptprimerac); ?>
    <table width="900" border="0" align="center">
      <tr>
        <td rowspan="24" align="center" valign="top">
        <img src="componentes/com_imagenes/imagenes/<?=$pricorrea['co_img1']; ?>" class="showimg" id="img1" width="600" border="0" />
            <center>
            <table border="0" align="center">
            <tr>
            <td><div class="redesmargen"><g:plusone href="<?=$config->lagcurl; ?>" size="tall"></g:plusone></div></td>
            <td><div class="redesmargen"><a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="lagcperu" data-text="<?=$config->lagctitulo; ?>">Tweet</a></div></td>
            <td><div class="redesmargen"><div class="fb-like" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_wilss', $_GET['id'], $_GET['ver']);?>" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div></div></td>
            </tr>
            </table>
            </center>
        </td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['co_img2']; ?>" onclick="rotar1();" class="showimgthum" id="img2" width="150" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['co_img3']; ?>" onclick="rotar2();" class="showimgthum" id="img3" width="150" border="0" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <div class="about">
        &laquo; <a href="." style="color:#060;">Portada</a>&raquo;<br />
        <a href="?lagc=com_wilss&id=billeteras"><img src="plantillas/wilss/imagenes/billeteraMov.png" border="0" /> Billeteras</a>
        <a href="?lagc=com_wilss&id=carteras"><img src="plantillas/wilss/imagenes/bolsoMov.png" border="0" /> Carteras</a>
        <a href="?lagc=com_wilss&id=sobres"><img src="plantillas/wilss/imagenes/monederoMov.png" border="0" /> Sobres</a>
        </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <div class="about">
        <center>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="300" height="15" id="xspf_player" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" />
<param name="quality" value="high" />
<param name="bgcolor" value="#FFFFFF" />
<embed src="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" quality="high" bgcolor="#FFFFFF" width="300" height="15" name="xspf_player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<div style="margin: -10px 0px;">&nbsp;</div>
	</center>

    </div>
        </td>
      </tr>
    </table>
  </center>
<?php
	}
	function Billeteras(){ ?>
<script type="text/javascript">
<?php
$rptarti = mysql_query("select * from wilss_billeteras where bi_estado='1' ORDER BY bi_id ASC");
while($verfuncti=mysql_fetch_array($rptarti)){ ?>
function mostrar<?=$verfuncti['bi_id']; ?>() {
	<?php if(!empty($verfuncti['bi_img1'])) { ?>document.getElementById('img1').src = 'componentes/com_imagenes/imagenes/<?=$verfuncti['bi_img1']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['bi_img2'])) { ?>document.getElementById('img2').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['bi_img2']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['bi_img3'])) { ?>document.getElementById('img3').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['bi_img3']; ?>'; <?php } ?>
}
<?php } ?>
</script>
<script type="text/javascript">
function rotar1() {
	document.getElementById('img1').src = document.getElementById('img2').src
}
function rotar2() {
	document.getElementById('img1').src = document.getElementById('img3').src
}
</script>
<div class="marqueephotos">
  <center>
    <marquee align="top" direction="left" onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay="8" style="margin:8px 0px;" width="980">
    <?php
	$rptconte = mysql_query("select * from wilss_billeteras where bi_estado='1' ORDER BY bi_id ASC");
	while($conte=mysql_fetch_array($rptconte)){
		echo "<a onClick=\"mostrar".$conte['bi_id']."();\"><img src=\"componentes/com_imagenes/thumbnails/".$conte['bi_img1']."\"></a>";
	}
	?>
    </marquee>
  </center>
</div>
  <center>
  <?php $rptprimerac = mysql_query("select * from wilss_billeteras where bi_estado='1' ORDER BY bi_id ASC limit 1"); $pricorrea=mysql_fetch_array($rptprimerac); ?>
    <table width="900" border="0" align="center">
      <tr>
        <td rowspan="24" align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['bi_img1']; ?>" class="showimg" id="img1" width="600" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['bi_img2']; ?>" onclick="rotar1();" class="showimgthum" id="img2" width="150" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['bi_img3']; ?>" onclick="rotar2();" class="showimgthum" id="img3" width="150" border="0" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <div class="about">
        <a href=".">&laquo; Portada</a><br />
        <a href="?lagc=com_wilss&id=correas">Correas</a> |
        <a href="?lagc=com_wilss&id=carteras">Carteras</a> |
        <a href="?lagc=com_wilss&id=sobres">Sobres</a>
        </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <center>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="150" height="15" id="xspf_player" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" />
<param name="quality" value="high" />
<param name="bgcolor" value="#e6e6e6" />
<embed src="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" quality="high" bgcolor="#e6e6e6" width="150" height="15" name="xspf_player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
	</center>
        </td>
      </tr>
    </table>
  </center>
<?php
	}
	function Carteras(){ ?>
<script type="text/javascript">
<?php
$rptarti = mysql_query("select * from wilss_carteras where ca_estado='1' ORDER BY ca_id ASC");
while($verfuncti=mysql_fetch_array($rptarti)){ ?>
function mostrar<?=$verfuncti['ca_id']; ?>() {
	<?php if(!empty($verfuncti['ca_img1'])) { ?>document.getElementById('img1').src = 'componentes/com_imagenes/imagenes/<?=$verfuncti['ca_img1']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['ca_img2'])) { ?>document.getElementById('img2').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['ca_img2']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['ca_img3'])) { ?>document.getElementById('img3').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['ca_img3']; ?>'; <?php } ?>
}
<?php } ?>
</script>
<script type="text/javascript">
function rotar1() {
	document.getElementById('img1').src = document.getElementById('img2').src
}
function rotar2() {
	document.getElementById('img1').src = document.getElementById('img3').src
}
</script>
<div class="marqueephotos">
  <center>
    <marquee align="top" direction="left" onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay="8" style="margin:8px 0px;" width="980">
    <?php
	$rptconte = mysql_query("select * from wilss_carteras where ca_estado='1' ORDER BY ca_id ASC");
	while($conte=mysql_fetch_array($rptconte)){
		echo "<a onClick=\"mostrar".$conte['ca_id']."();\"><img src=\"componentes/com_imagenes/thumbnails/".$conte['ca_img1']."\"></a>";
	}
	?>
    </marquee>
  </center>
</div>
  <center>
  <?php $rptprimerac = mysql_query("select * from wilss_carteras where ca_estado='1' ORDER BY ca_id ASC limit 1"); $pricorrea=mysql_fetch_array($rptprimerac); ?>
    <table width="900" border="0" align="center">
      <tr>
        <td rowspan="24" align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['ca_img1']; ?>" class="showimg" id="img1" width="600" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['ca_img2']; ?>" onclick="rotar1();" class="showimgthum" id="img2" width="150" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['ca_img3']; ?>" onclick="rotar2();" class="showimgthum" id="img3" width="150" border="0" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <div class="about">
        <a href=".">&laquo; Portada</a><br />
        <a href="?lagc=com_wilss&id=correas">Correas</a> |
        <a href="?lagc=com_wilss&id=billeteras">Billeteras</a> |
        <a href="?lagc=com_wilss&id=sobres">Sobres</a>
        </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <center>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="150" height="15" id="xspf_player" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" />
<param name="quality" value="high" />
<param name="bgcolor" value="#e6e6e6" />
<embed src="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" quality="high" bgcolor="#e6e6e6" width="150" height="15" name="xspf_player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
	</center>
        </td>
      </tr>
    </table>
  </center>
<?php
	}
	function Sobres(){ ?>
<script type="text/javascript">
<?php
$rptarti = mysql_query("select * from wilss_sobres where so_estado='1' ORDER BY so_id ASC");
while($verfuncti=mysql_fetch_array($rptarti)){ ?>
function mostrar<?=$verfuncti['so_id']; ?>() {
	<?php if(!empty($verfuncti['so_img1'])) { ?>document.getElementById('img1').src = 'componentes/com_imagenes/imagenes/<?=$verfuncti['so_img1']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['so_img2'])) { ?>document.getElementById('img2').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['so_img2']; ?>'; <?php } ?>
	<?php if(!empty($verfuncti['so_img3'])) { ?>document.getElementById('img3').src = 'componentes/com_imagenes/thumbnails/<?=$verfuncti['so_img3']; ?>'; <?php } ?>
}
<?php } ?>
</script>
<script type="text/javascript">
function rotar1() {
	document.getElementById('img1').src = document.getElementById('img2').src
}
function rotar2() {
	document.getElementById('img1').src = document.getElementById('img3').src
}
</script>
<div class="marqueephotos">
  <center>
    <marquee align="top" direction="left" onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay="8" style="margin:8px 0px;" width="980">
    <?php
	$rptconte = mysql_query("select * from wilss_sobres where so_estado='1' ORDER BY so_id ASC");
	while($conte=mysql_fetch_array($rptconte)){
		echo "<a onClick=\"mostrar".$conte['so_id']."();\"><img src=\"componentes/com_imagenes/thumbnails/".$conte['so_img1']."\"></a>";
	}
	?>
    </marquee>
  </center>
</div>
  <center>
  <?php $rptprimerac = mysql_query("select * from wilss_sobres where so_estado='1' ORDER BY so_id ASC limit 1"); $pricorrea=mysql_fetch_array($rptprimerac); ?>
    <table width="900" border="0" align="center">
      <tr>
        <td rowspan="24" align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['so_img1']; ?>" class="showimg" id="img1" width="600" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['so_img2']; ?>" onclick="rotar1();" class="showimgthum" id="img2" width="150" border="0" /></td>
        <td align="center" valign="top"><img src="componentes/com_imagenes/imagenes/<?=$pricorrea['so_img3']; ?>" onclick="rotar2();" class="showimgthum" id="img3" width="150" border="0" /></td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <div class="about">
        <a href=".">&laquo; Portada</a><br />
        <a href="?lagc=com_wilss&id=correas">Correas</a> |
        <a href="?lagc=com_wilss&id=billeteras">Billeteras</a> |
        <a href="?lagc=com_wilss&id=carteras">Carteras</a> |
        </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle">
        <center>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="150" height="15" id="xspf_player" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" />
<param name="quality" value="high" />
<param name="bgcolor" value="#e6e6e6" />
<embed src="plantillas/wilss/xspf_player_slim.swf?playlist_url=plantillas/wilss/listas.xml&autoload=true&autoplay=true" quality="high" bgcolor="#e6e6e6" width="150" height="15" name="xspf_player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
	</center>
        </td>
      </tr>
    </table>
  </center>
<?php
	}
}
?>
