<?php
class Musica{
	function Inicio(){ ?>
		<div class="title-caption-large">
			<h3>Canciones</h3>
		</div>
    <?php Musica::_Generos(""); Musica::_CodeRepro(); ?>
  <div id="contenedor">
    <div id="cabecera"></div>
    <div id="cuerpo">
      <div id="lateral">
        <div class="bloque titulo">Cantantes o Grupos (Aleatorio)</div>
        <ul class="RCantantes">
          <?php
          $rptcantantesA = mysql_query("select * from music_cantantes where cantan_activo=1 order by rand(".time()." * ".time().") limit 20");
          while($ACantantes = mysql_fetch_array($rptcantantesA)) {
            echo "<li><a href=\"?lagc=com_musica&id=".$ACantantes['cantan_id']."&cantante=".LGlobal::Url_Amigable($ACantantes['cantan_nombre'])."\">".$ACantantes['cantan_nombre']."</a></li>\n";
          }
          ?>
        </ul>
      </div>
      <div id="otrolado">
        <div class="bloquederecha titulo">Detalles de la Cancion</div>
          <?php
          $rptprireg = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' order by rand(".time()." * ".time().") limit 20");
          $prireg = mysql_fetch_array($rptprireg);
          ?>

          <script type="text/javascript">
          jQuery(document).ready(function(){
            $("#cancion<?=$prireg['song_id']; ?>").show();
          });
          </script>

          <?php
          $rptale = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' order by rand(".time()." * ".time().") limit 20");
          while ($Maleat = mysql_fetch_array($rptale)) {
            echo "\t<div id=\"cancion".$Maleat['song_id']."\" class=\"oculto minicont\">
            <b>Nombre:</b> ".$Maleat['song_titulo'];
            echo "<span class=\"showhidden\" style=\"float:right; margin: 0px 0px; padding: 1px 5px;\">
            <a href=\"".LGlobal::Tipo_URL('com_musica', $Maleat['song_id'], $Maleat['song_titulo'])."\">Ver Completo</a>
            </span>";
            if(!empty($Maleat['song_album'])) {
              echo "<div class=\"cont_divisor\"></div>";
              echo "<b>Album:</b> ";
              echo Musica::_LGMAlbum($Maleat['song_album'], false);
            }
            if(!empty($Maleat['song_video'])) {
            echo "<object style=\"height: 250px; width: 390px\">
            <param name=\"movie\" value=\"https://www.youtube.com/v/".$Maleat['song_video']."?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0\">
            <param name=\"allowFullScreen\" value=\"true\">
            <param name=\"allowScriptAccess\" value=\"always\">
            <embed src=\"https://www.youtube.com/v/".$Maleat['song_video']."?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowScriptAccess=\"always\" width=\"390\" height=\"250\">
            </object>
            ";
            }
            echo "<div class=\"cont_divisor\"></div>";
            echo "<div class=\"scrollletra\">
                  ".$Maleat['song_letra']."
                </div>";
            echo "<div class=\"cont_divisor\"></div>";
            echo "</div>\n";
          }
          ?>
      </div>
      <div id="principal">
        <div class="bloquecentral titulo">Canciones aleatorias</div>
        <audio preload></audio>
        <ol>
          <?php
          $rptale = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' order by rand(".time()." * ".time().") limit 20");
          while ($Maleat = mysql_fetch_array($rptale)) {
            echo "\t<li href=\"#cancion".$Maleat['song_id']."\" class=\"detalles\"><a data-src=\"http://".Musica::_LGMSevidor($Maleat['song_id_servidor'],"serv_url", "").$Maleat['song_url']."\">".Musica::_LGMCantante($Maleat['song_id_cantante'], "cantan_nombre")." - ".$Maleat['song_titulo']."</a></li>\n";
          }
          ?>
        </ol>
        <div class="contc_teclas">
          <span class="showhidden">-></span> Tecla de Derecha(Siguiente)<br>
          <span class="showhidden"><-</span> Tecla de Izquierda(Anterior)<br>
          <span class="showhidden">_|</span> Tecla Enter(Play/Pausa)
        </div>
      </div>
    </div>
    <div id="pie"></div>
  </div>
	<?php
	}
  function Cantante($id, $ver) { $config = new LagcConfig();
    $rptMusica = mysql_query("select * from music_cantantes where cantan_id='".$id."'");
    $Musica = mysql_fetch_array($rptMusica);
    if (!empty($Musica['cantan_id']) and $ver==LGlobal::Url_Amigable($Musica['cantan_nombre'])) { ?>
    <div class="title-caption-large">
    <h3><a style="color:#fff;" href="/musica/">Canciones</a> &#187; <?=Musica::__Generos($Musica['cantan_generos'], true); ?> &#187; <?=$Musica['cantan_nombre']; ?></h3>
    </div>
    <?php Musica::_Generos(true); Musica::_CodeRepro(); ?>
    <div id="contenedor">
      <div id="cabecera"></div>
      <div id="cuerpo">
        <div id="lateral">
          <div class="bloque titulo">Cantantes (Segun Genero)</div>
          <ul class="RCantantes">
            <?php
            $rptcantantesAA = mysql_query("select * from music_cantantes where cantan_id=".$_GET['id']."");
            $ACantantess = mysql_fetch_array($rptcantantesAA);
            ?>
            <?=Musica::_LGMCantLista($ACantantess['cantan_generos']);
            ?>
          </ul>
        </div>
        <div id="otrolado">
          <div class="bloquederecha titulo">Detalles del Artista o Grupo</div>
          <table width="390" border="1">
          <tr>
            <td width="160" align="center" valign="top">
              <img src="<?=Musica::__LGMVerIMG($Musica['cantan_img']); ?>" class="imgcantant">
            </td>
            <td align="left" valign="top" width="214" style="vertical-align: top;">
              <div class="minicont">
                <div class="cont_min"><b>Genero(s):</b> <?=Musica::__Generos($Musica['cantan_generos'], false); ?></div>
                <div class="cont_divisor"></div>
                <div class="cont_min"><b>Album:</b> <?=Musica::__LGMAlbum($_GET['id']); ?></div>
                <div class="cont_divisor"></div>
                <div class="cont_min"><b># Canciones:</b> <?=Musica::__LGMRowsCanciones($_GET['id']); ?></div>
              </div>
              </td>
          </tr>
          </table>
          <div class="bloquederecha titulo">Detalles de la Cancion</div>
          <?php
          $rptprireg = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' and song_id_cantante='".$_GET['id']."' order by song_titulo limit 0,1");
          $prireg = mysql_fetch_array($rptprireg);
          ?>

          <script type="text/javascript">
          jQuery(document).ready(function(){
            $("#cancion<?=$prireg['song_id']; ?>").show();
          });
          </script>

          <?php
          $rptale = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' and song_id_cantante='".$_GET['id']."' order by song_titulo");
          while ($Maleat = mysql_fetch_array($rptale)) {
            echo "\t<div id=\"cancion".$Maleat['song_id']."\" class=\"oculto minicont\">
            <b>Nombre:</b> ".$Maleat['song_titulo'];
            echo "<span class=\"showhidden\" style=\"float:right; margin: 0px 0px; padding: 1px 5px;\">
            <a href=\"".LGlobal::Tipo_URL('com_musica', $Maleat['song_id'], $Maleat['song_titulo'])."\">Ver Completo</a>
            </span>";
            if(!empty($Maleat['song_album'])) {
              echo "<div class=\"cont_divisor\"></div>";
              echo "<b>Album:</b> ";
              echo Musica::_LGMAlbum($Maleat['song_album'], false);
            }
            if(!empty($Maleat['song_video'])) {
            echo "<object style=\"height: 250px; width: 390px\">
            <param name=\"movie\" value=\"https://www.youtube.com/v/".$Maleat['song_video']."?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0\">
            <param name=\"allowFullScreen\" value=\"true\">
            <param name=\"allowScriptAccess\" value=\"always\">
            <embed src=\"https://www.youtube.com/v/".$Maleat['song_video']."?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowScriptAccess=\"always\" width=\"390\" height=\"250\">
            </object>
            ";
            }
            echo "<div class=\"cont_divisor\"></div>";
            echo "<div class=\"scrollletra\">
                  ".$Maleat['song_letra']."
                </div>";
            echo "<div class=\"cont_divisor\"></div>";
            echo "</div>\n";
          }
          ?>
        </div>
        <div id="principal">
          <div class="bloquecentral titulo"><?=$Musica['cantan_nombre']; ?></div>
          <audio preload></audio>
          <ol>
            <?php
            $rptale = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' and song_id_cantante='".$_GET['id']."' order by song_titulo");
            while ($Maleat = mysql_fetch_array($rptale)) {
              echo "\t<li href=\"#cancion".$Maleat['song_id']."\" class=\"detalles\"><a data-src=\"http://".Musica::_LGMSevidor($Maleat['song_id_servidor'],"serv_url", "").$Maleat['song_url']."\">".$Maleat['song_titulo'].Musica::_LGMAlbum($Maleat['song_album'], true)."</a></li>\n";
            }
            ?>
          </ol>
          <div class="contc_teclas">
            <span class="showhidden">-></span> Tecla de Derecha(Siguiente)<br>
            <span class="showhidden"><-</span> Tecla de Izquierda(Anterior)<br>
            <span class="showhidden">_|</span> Tecla Enter(Play/Pausa)
          </div>
        </div>
      </div>
      <div id="pie"></div>
    </div>
    <?php
    }
    else { echo "<em>No existe el Cantante.</em>"; }
  }
  function Genero($id, $ver) { $config = new LagcConfig();
    $rptGenero = mysql_query("select * from music_genero where genero_id='".$id."'");
    $Musica = mysql_fetch_array($rptGenero);
    if (!empty($Musica['genero_id']) and $ver==LGlobal::Url_Amigable($Musica['genero_nombre'])) { ?>
    <div class="title-caption-large">
    <h3><a style="color:#fff;" href="/musica/">Canciones</a> &#187; (<?=$Musica['genero_nombre']; ?>)</h3>
    </div>
    <?php Musica::_Generos(true); Musica::_CodeRepro(); ?>
    <div id="contenedor">
      <div id="cabecera"></div>
      <div id="cuerpo">
        <div id="lateral">
          <div class="bloque titulo">Interpretes del Genero</div>
          <ul class="RCantantes">
            <?=Musica::_LGMCantLista($_GET['id']); ?>
          </ul>
        </div>
        <div id="otrolado">
          <div class="bloquederecha titulo">Detalles del Artista o Grupo</div>
          <table width="390" border="1">
          <tr>
            <td width="160" align="center" valign="top">
              <img src="<?=Musica::__LGMVerIMG($Musica['genero_img']); ?>" class="imgcantant">
            </td>
            <td align="left" valign="top" width="214" style="vertical-align: top;">
              <div class="minicont">
                <div class="cont_min"><b>Genero:</b> <?=Musica::__Generos($Musica['genero_id'], false); ?></div>
                <div class="cont_divisor"></div>
                <div class="cont_min"><b>Descripcion:</b> <?=$Musica['genero_descripcion']; ?></div>
                <div class="cont_divisor"></div>
                <div class="cont_min"><b># Canciones:</b> <?=Musica::__LGMRowsGeneroCanciones($_GET['id']); ?></div>
              </div>
              </td>
          </tr>
          </table>
          <div class="bloquederecha titulo">Detalles de la Cancion</div>
          <?php
          $rptprireg = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' and song_id_genero='".$_GET['id']."' order by song_titulo limit 0,1");
          $prireg = mysql_fetch_array($rptprireg);
          ?>

          <script type="text/javascript">
          jQuery(document).ready(function(){
            $("#cancion<?=$prireg['song_id']; ?>").show();
          });
          </script>

          <?php
          $rptale = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' and song_id_genero='".$_GET['id']."' order by song_titulo");
          while ($Maleat = mysql_fetch_array($rptale)) {
            echo "\t<div id=\"cancion".$Maleat['song_id']."\" class=\"oculto minicont\">
            <b>Nombre:</b> ".$Maleat['song_titulo'];
            echo "<span class=\"showhidden\" style=\"float:right; margin: 0px 0px; padding: 1px 5px;\">
            <a href=\"".LGlobal::Tipo_URL('com_musica', $Maleat['song_id'], $Maleat['song_titulo'])."\">Ver Completo</a>
            </span>";
            if(!empty($Maleat['song_album'])) {
              echo "<div class=\"cont_divisor\"></div>";
              echo "<b>Album:</b> ";
              echo Musica::_LGMAlbum($Maleat['song_album'], false);
            }
            if(!empty($Maleat['song_video'])) {
            echo "<object style=\"height: 250px; width: 390px\">
            <param name=\"movie\" value=\"https://www.youtube.com/v/".$Maleat['song_video']."?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0\">
            <param name=\"allowFullScreen\" value=\"true\">
            <param name=\"allowScriptAccess\" value=\"always\">
            <embed src=\"https://www.youtube.com/v/".$Maleat['song_video']."?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowScriptAccess=\"always\" width=\"390\" height=\"250\">
            </object>
            ";
            }
            echo "<div class=\"cont_divisor\"></div>";
            echo "<div class=\"scrollletra\">
                  ".$Maleat['song_letra']."
                </div>";
            echo "<div class=\"cont_divisor\"></div>";
            echo "</div>\n";
          }
          ?>
        </div>
        <div id="principal">
          <div class="bloquecentral titulo"><?=$Musica['genero_nombre']; ?></div>
          <audio preload></audio>
          <ol>
            <?php
            $rptale = mysql_query("select * from music_canciones where song_id_servidor!='1' and song_activo='1' and song_id_genero='".$_GET['id']."' order by song_titulo");
            while ($Maleat = mysql_fetch_array($rptale)) {
              echo "\t<li href=\"#cancion".$Maleat['song_id']."\" class=\"detalles\"><a data-src=\"http://".Musica::_LGMSevidor($Maleat['song_id_servidor'],"serv_url", "").$Maleat['song_url']."\">".$Maleat['song_titulo'].Musica::_LGMAlbum($Maleat['song_album'], true)."</a></li>\n";
            }
            ?>
          </ol>
          <div class="contc_teclas">
            <span class="showhidden">-></span> Tecla de Derecha(Siguiente)<br>
            <span class="showhidden"><-</span> Tecla de Izquierda(Anterior)<br>
            <span class="showhidden">_|</span> Tecla Enter(Play/Pausa)
          </div>
        </div>
      </div>
      <div id="pie"></div>
    </div>
    <?php
    }
    else { echo "<em>No existe el Genero.</em>"; }
  }
  function Cancion($id, $ver) { $config = new LagcConfig();
    $rptMusica = mysql_query("select * from music_canciones where song_id='".$id."'");
    $Musica = mysql_fetch_array($rptMusica);
    if (!empty($Musica['song_id']) and $ver==LGlobal::Url_Amigable($Musica['song_titulo'])) { ?>
    <script type="text/javascript" src="componentes/com_musica/thickbox-compressed.js"></script>
    <script type="text/javascript">
      $(document).ready(loadWall(0));
      function loadWall(limite){
        $("#msg").val("")
        var url="componentes/com_musica/wall.php";
        $.post(url,{limite: limite, cancion: <?=$Musica['song_id']; ?>},function (responseText){
          $("#wall").html(responseText);
        });
    }
    $(document).ready(function(){
      loadWall(0);
    });
    </script>

    <div class="title-caption-large">
    <h3><a style="color:#fff;" href="/musica/">Canciones</a> &#187;
      <a href="?lagc=com_musica&id=<?=$Musica['song_id_cantante']; ?>&cantante=<?=LGlobal::Url_Amigable(Musica::_LGMCantante($Musica['song_id_cantante'], 'cantan_nombre')); ?>"><?=Musica::_LGMCantante($Musica['song_id_cantante'], 'cantan_nombre'); ?></a> &#187;
      <?=$Musica['song_titulo']; ?>
    </h3>
    </div>
    <script type="text/javascript">
    function scrollabajo(){ $('html,body').animate({scrollTop: $('#otroladof').offset().top}, 2000); $("#msg").focus(); }
    function scrollarriba(){ $('html,body').animate({scrollTop: $('#scmenu').offset().top}, 2000); }
    </script>
    <?php Musica::_Generos(true); ?>
    <div id="contenedor">
      <div id="cuerpo">
        <div class="btncancion izquierda"><a href="<?=Musica::_CAnterior($_GET['id']); ?>" title="Cancion Anterior">&laquo;</a></div>
        <div class="btncancion derecha"><a href="<?=Musica::_CSiguiente($_GET['id']); ?>" title="Siguiente Cancion">&raquo;</a></div>
        <div class="btncancion derecha" style="margin: 0px 20px;"><a href="<?=Musica::_Caleatoria(); ?>" title="Cancion Aleatoria"><img src="componentes/com_musica/imagenes/arrow_circle.png" style="margin: 3px 0px;"></a></div>
        <div class="navi1" id="scmenu">
        <ul>
          <li class="sm1">
            <?php if(!empty($_COOKIE["user_lagc"])) { ?>
            <a href="componentes/com_musica/dedicar.php?height=350&width=450&cantanteid=<?=$Musica['song_id']; ?>&cantantetitle=<?=LGlobal::Url_Amigable($Musica['song_titulo']); ?>&KeepThis=true&TB_iframe=true" class="thickbox"></a>
            <?php } else { ?>
            <a href="componentes/com_musica/login.php?height=140&width=320&cantanteid=<?=$Musica['song_id']; ?>&cantantetitle=<?=LGlobal::Url_Amigable($Musica['song_titulo']); ?>" class="thickbox"></a>
            <?php } ?>
            </li>
          <li class="sm2"><a href="componentes/com_musica/dedicar.php?height=300&width=600" class="thickbox"></a></li>
          <li class="sm3"><a href=""></a></li>
          <li class="sm4"><a onclick="scrollabajo();"></a></li>
          <li class="sm5"><a href=""></a></li>
        </ul>
        </div>
      </div>
    <div id="cabecera2"><!--style="background-color: <? // Musica::randomColor(); ?>"-->
      <table width="960" border="0">
      <tr>
        <td width="160" align="center" valign="top">
          <img src="<?=Musica::__LGMVerIMG($Musica['song_id_cantante']); ?>" class="imgcantant">
        </td>
        <td align="left" valign="top" width="214" style="vertical-align: top;">
          <div class="minicont">
            <div class="cont_min"><b>Cantante:</b> <?=Musica::_LGMCantante($Musica['song_id_cantante'], "cantan_nombre"); ?></div>
            <div class="cont_divisor"></div>
            <div class="cont_min"><b>Genero:</b> <?=Musica::__Generos($Musica['song_id_genero'], false); ?></div>
            <div class="cont_divisor"></div>
            <div class="cont_min"><b>Album:</b> <?=Musica::__LGMAlbum2($Musica['song_album']); ?></div>
            <div class="cont_divisor"></div>
            <div class="cont_min"><b>A&ntilde;o:</b> <?=$Musica['song_anio']; ?></div>
          </div>
        </td>
        <td align="left" valign="top" style="vertical-align: top;">
          <script src="https://apis.google.com/js/plusone.js"></script>

          <aside id="social">
            <div class="btn_twitter">
              <a href="http://twitter.com/share" class="twitter-share-button" data-text="Yo escucho musica en @portuhermana" data-url="<?=$config->lagcurl.LGlobal::Tipo_URL('com_musica', $Musica['song_id'], $Musica['song_titulo']); ?>" data-count="vertical" data-related="portuhermana">Twittear</a>
              <script src="https://platform.twitter.com/widgets.js"></script>
            </div>
            <div id="fb-root" class="btn_facebook">
              <script src="https://connect.facebook.net/es_ES/all.js#xfbml=1"></script>
              <fb:like href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_musica', $Musica['song_id'], $Musica['song_titulo']); ?>" send="false" layout="box_count" width="80" show_faces="false" ></fb:like>
            </div>
            <div class="btn_googlemas">
              <g:plusone size="tall" href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_musica', $Musica['song_id'], $Musica['song_titulo']); ?>"></g:plusone>
            </div>
          </aside>

        </td>
      </tr>
      </table>
    </div>
      <div id="cuerpo">
        <div id="lateralc">
          <?php if(!empty($Musica['song_video'])) { ?><br><br><br>
            <object style="height: 378px; width: 490px">
            <param name="movie" value="https://www.youtube.com/v/<?=$Musica['song_video']; ?>?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0">
            <param name="allowFullScreen" value="true">
            <param name="allowScriptAccess" value="always">
            <embed src="https://www.youtube.com/v/<?=$Musica['song_video']; ?>?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="490" height="378">
            </object>
            <div class="cont_divisor"></div>
          <?php } else "Sin Video"; ?>
        </div>
        <div id="otroladoc">
          <script src="componentes/com_musica/audiojs/audio.js"></script>
          <script>
            audiojs.events.ready(function() {
              audiojs.createAll();
            });
          </script>
          <center>
            <audio src="http://<?=Musica::_LGMSevidor($Musica['song_id_servidor'],"serv_url", "").$Musica['song_url']; ?>" preload="auto"></audio>
          </center>
          <div style="margin: 10px 0px;"></div>
          <div class="scrollletrac">
            <?=$Musica['song_letra']; ?>
          </div>
          <div class="cont_divisor"></div>
        </div>
      </div>

      <div id="cuerpo">
        <div id="lateralf">
          <br>
          <article class="widget-list">
            <nav class="widget-content">
              <ul>
                <?=Musica::_CancionesDCantante($Musica['song_id_cantante']); ?>
              </ul>
            </nav>
          </article>

        </div>
        <div id="otroladof">

          <div id="form">
            <div style="float: right; margin: 3px 30px;">
              <a onclick="scrollarriba();" class="showhidden" style="cursor: pointer;" id="Mostrar">Arriba</a>
            </div><br>
            <?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
            <form action="javascript: addMessage();" method="post" id="form_wall">
              <div class="triangle-border">
              <input type="text" placeholder="Comenta sobre esta canci&#243;n" name="msg" id="msg" maxlength="254" />
              </div>
            </form>
            <?php }
            else { ?>
              <div class="registrate-border">
                &#161;Reg&#237;strate Primero&#33; <a href="componentes/com_musica/login.php?height=140&width=320&cantanteid=<?=$Musica['song_id']; ?>&cantantetitle=<?=LGlobal::Url_Amigable($Musica['song_titulo']); ?>" class="thickbox">Clic Aqui...</a>
              </div>
            <?php
            } ?>
            <div id="loading"><img src="componentes/com_musica/imagenes/loading.gif" /></div>
          </div>
          <div id="wall"></div>
          <script type="text/javascript">
            function addMessage(){
              var msg = $("#msg").val();
              $("#loading").ajaxStart(function(){
                 $("#loading").show();
              });
              $("#loading").ajaxStop(function(){
                 $("#loading").hide();
              });
              $.ajax({
                 url: 'componentes/com_musica/action.php',
                 data: { msg: msg, usuario: <?=$_COOKIE["user_lagc"]; ?>, cancion: <?=$Musica['song_id']; ?> },
                 type: 'post',
                 error: function(obj, msg, obj2){
                    alert(msg);
                 },
                 success: function(data){
                    loadWall(0);
                 }
              });
            };
          </script>

        </div>
      </div>
      <div class="pie">
      </div>
    </div>
    <?php
    }
    else { echo "<em>No existe la cancion.</em>"; }
  }
  function _Generos($val1){
    if($val1==true){ $val2 = " style=\"display: none;\""; }
    $rptgeneros = mysql_query("select * from music_genero where genero_activo=1 order by genero_nombre ASC"); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $("#Mostrar").click(function(){
            $("#Ocultar_Genero").show("bounce", { times:3 }, 250);
            return false;
        });
        $("#Ocultar").click(function(){
            $("#Ocultar_Genero").hide("bounce", { times:3 }, 250);
            return false;
        });
    });
    jQuery(document).ready(function(){
      $(".oculto").hide();
      $(".detalles").click(function(){
        var nodo = $(this).attr("href");
        if ($(nodo).is(":visible")){
          $(nodo).hide();
          return false;
        }
        else{
          $(".oculto").hide();
          $(nodo).fadeToggle("slow");
          return false;
        }
      });
    });
    </script>
    <div style="float: right; margin: 3px 30px;">
      <a href="" class="showhidden" id="Mostrar">Mostrar</a>
      <a href="" class="showhidden" id="Ocultar">Ocultar</a>
    </div>
    <div class="bg-genero" style="display: hidden;"><h4>Generos</h4>
    <center>
    <table border="0" cellspacing="0"<?=$val2; ?> cellpadding="0" align="center" id="Ocultar_Genero">
      <tr>
        <?php $ni = 1;
        while($listgeneros = mysql_fetch_array($rptgeneros)) {
          if ($ni > 8) {
            echo "</tr><tr>"; $ni = 1;
          }
          echo "<td align=\"center\" valign=\"middle\"><div class=\"listargenero\"><a href=\"?lagc=com_musica&id=".$listgeneros['genero_id']."&genero=".LGlobal::Url_Amigable($listgeneros['genero_nombre'])."\">".$listgeneros['genero_nombre']."</a></div></td>";
          $ni++;
        } ?>
      </tr>
    </table>
    </center>
    </div>
    <?php
  }
  function _CodeRepro(){ ?>
<script src="componentes/com_musica/audiojs/audio.min.js"></script>
<script>
  $(function() {
    var a = audiojs.createAll({
      trackEnded: function() {
        var next = $('ol li.playing').next();
        if (!next.length) next = $('ol li').first();
        next.addClass('playing').siblings().removeClass('playing');
        audio.load($('a', next).attr('data-src'));
        audio.play();
      }
    });
    var audio = a[0];
    first = $('ol a').attr('data-src');
    $('ol li').first().addClass('playing');
    audio.load(first);
    $('ol li').click(function(e) {
      e.preventDefault();
      $(this).addClass('playing').siblings().removeClass('playing');
      audio.load($('a', this).attr('data-src'));
      audio.play();
    });// Keyboard
    $(document).keydown(function(e) {
      var unicode = e.charCode ? e.charCode : e.keyCode;//--
      if (unicode == 39) {
        var next = $('li.playing').next();
        if (!next.length) next = $('ol li').first();
        next.click();//--
      } else if (unicode == 37) {
        var prev = $('li.playing').prev();
        if (!prev.length) prev = $('ol li').last();
        prev.click();//---
      } else if (unicode == 13) {
        audio.playPause();
      }
    })
  });
</script>
  <?php
  }
  private function _LGMSevidor($val1, $val2, $val3){
    $rptserv = mysql_query("select * from music_servidor where serv_id='".$val1."' and serv_activo='1'");
    $SerVer = mysql_fetch_array($rptserv);
    if($val1==$SerVer['serv_id']){
      return $SerVer[$val2]."/".$SerVer[$val3];
    }
  }
  private function _LGMAlbum($val1, $val2){
    $rptcant = mysql_query("select * from music_album where album_id='".$val1."' and album_activo='1'");
    $Album = mysql_fetch_array($rptcant);
    if($val1==$Album['album_id']){
      if($val2==true){
        return " - <b title=\"Album: ".$Album['album_nombre']."\">(".$Album['album_nombre'].")</b>";
      }else if($val2==false){
        return $Album['album_nombre'];
      }
    }
  }
  public function _LGMCantante($val1, $val2){
    $rptcant = mysql_query("select * from music_cantantes where cantan_id='".$val1."' and cantan_activo='1'");
    $Cantante = mysql_fetch_array($rptcant);
    if($val1==$Cantante['cantan_id']){
      return $Cantante[$val2];
    }
  }
  private function _SelectCantante($val1){ //para seleccionar el cantante
    $val1 = LGlobal::Url_Amigable($val1);
    if($val1==$_GET['cantante']){
      return " id=\"RCantSelect\"";
    }
  }
  private function __Generos($compo, $val4){
    $respcomp = mysql_query("select * from music_genero where genero_activo='1' ORDER BY genero_nombre ASC");
    while($comp = mysql_fetch_array($respcomp)) {
      $permisoss=split("/",$compo);
      $var2 = 0;
      $contsplit = count($permisoss);
      for($n=0;$n<$contsplit;$n++) {
        if ($permisoss[$n] == $comp['genero_id']) {
          $var2 = 1;
          break;
        }
      }
      if ($var2 == 1) {
        $val2 = $n;
        $val2 = $val2+1;
        $val3 = $contsplit;
        $val3 = $val3-1;
        $val1 = 1;
        if($n==0 and $val4==true) { echo "("; }
        echo $comp['genero_nombre'];
        if($val1>=1 and $n<$val3){ echo ", "; }
        if($val2==$contsplit and $val4==true) { echo ")"; }
        $val1 = $val1+1;
      }
    }
    if(empty($compo)){ echo "Ninguno"; }
  }
  private function __LGMAlbum($val1){
    $rptcant = mysql_query("select * from music_album where album_cantante='".$val1."' and album_activo='1'");
    $contar = mysql_num_rows($rptcant);
    $val2 = 1;
    while($Cantante = mysql_fetch_array($rptcant)){
      if($val1==$Cantante['album_cantante']){
        echo $Cantante['album_nombre'];
        if($val2!=$contar){ echo ", "; }
        $val2 = $val2+1;
      }
    }
    if($contar==0){ echo "Ninguno"; }
  }
  private function __LGMAlbum2($val1){
    $rptcant = mysql_query("select * from music_album where album_id='".$val1."' and album_activo='1'");
    $Cantante = mysql_fetch_array($rptcant);
      if($val1==$Cantante['album_id']){
        echo $Cantante['album_nombre'];
      }
      else{
        echo "Ninguno";
      }
  }
  private function __LGMRowsCanciones($val1){
    $rptcant = mysql_query("select * from music_canciones where song_id_cantante='".$val1."' and song_activo='1'");
    $contar = mysql_num_rows($rptcant);
    return $contar;
  }
  private function __LGMRowsGeneroCanciones($val1){
    $rptcant = mysql_query("select * from music_canciones where song_id_genero='".$val1."' and song_activo='1'");
    $contar = mysql_num_rows($rptcant);
    return $contar;
  }
  private function __LGMVerIMG($val1){
    $rptimgc = mysql_query("select * from music_cantantes where cantan_id='".$val1."'");
    $imgc = mysql_fetch_array($rptimgc);
    if(!empty($val1)){
      if($imgc['cantan_id']==$val1){
        return "componentes/com_imagenes/thumbnails/".$imgc['cantan_img'];
      }
      else {
        return "componentes/com_musica/imagenes/sin_cantante.jpg";
      }
    }
    else {
      return "componentes/com_musica/imagenes/sin_cantante.jpg";
    }
  }
  private function _LGMCantLista($generos){
    $geneross=split("/",$generos);
    $contgenero = count($geneross);
    if(empty($generos)){
      echo "<li>Ninguno</li>";
    }
    $rptcantantesAA = mysql_query("select * from music_cantantes where cantan_activo='1' order by cantan_nombre ASC");
    while($ACantantess = mysql_fetch_array($rptcantantesAA)){
      $a = split("/",$ACantantess['cantan_generos']);
      $b = count($a);
      $val1 = 0;
      if($b>=1){
        for($t=0; $t<$b; $t++){
          for($n=0; $n<$contgenero; $n++){
            if($a[$t]==$geneross[$n]){
              $val1 = 1;
              break;
            }
          }
        }
      }
      if($val1==1){
        echo "<li".Musica::_SelectCantante($ACantantess['cantan_nombre'])."><a href=\"?lagc=com_musica&id=".$ACantantess['cantan_id']."&cantante=".LGlobal::Url_Amigable($ACantantess['cantan_nombre'])."\">".$ACantantess['cantan_nombre']."</a></li>\n";
      }
    }
  }
  private function __RegUltimo($val1){
    $val2 = 0;
    if($val1>$val2){
      $val2 = $val1;
    }
  }
  private function randomColor() {
    $str = '#';
    for($i = 0 ; $i < 6 ; $i++) {
      $randNum = rand(0 , 15);
      switch ($randNum) {
        case 10: $randNum = 'a'; break;
        case 11: $randNum = 'b'; break;
        case 12: $randNum = 'c'; break;
        case 13: $randNum = 'd'; break;
        case 14: $randNum = 'e'; break;
        case 15: $randNum = 'f'; break;
      }
      $str .= $randNum;
    }
    return $str;
  }
  private function _Caleatoria(){
    $rptcanale = mysql_query("select * from music_canciones where song_activo='1' and song_id!='".$_GET['id']."' ORDER BY RAND() limit 1");
    $aleato = mysql_fetch_array($rptcanale);
    return LGlobal::Tipo_URL('com_musica', $aleato['song_id'], $aleato['song_titulo']);
  }
  private function _CSiguiente($val1){
    $rs = mysql_query("SELECT MAX(song_id) AS id FROM music_canciones where song_activo='1'");
    if ($row = mysql_fetch_row($rs)) {
      $ultimo = trim($row[0]);
    }
    $val2=$val1+1;
    $rptcanale = mysql_query("select * from music_canciones where song_activo='1'");
    while($clista = mysql_fetch_array($rptcanale)){
      if($val2==$clista['song_id']){
        return LGlobal::Tipo_URL('com_musica', $clista['song_id'], $clista['song_titulo']);
      }
      else if($val1==$ultimo){
        return LGlobal::Tipo_URL('com_musica', $clista['song_id'], $clista['song_titulo']);
      }
      else{
        return Musica::__CSiguiente($val1);
      }
    }
  }
  private function __CSiguiente($val1){
    $rptcanale = mysql_query("select * from music_canciones where song_id>$val1 and song_activo='1'");
    $clista = mysql_fetch_array($rptcanale);
    return LGlobal::Tipo_URL('com_musica', $clista['song_id'], $clista['song_titulo']);
  }
  private function _CAnterior($val1){
    $rptcanalep = mysql_query("select * from music_canciones where song_activo='1' limit 0,1");
    $primero = mysql_fetch_array($rptcanalep);
    $val2 = $val1-1;
    $rptcanale = mysql_query("select * from music_canciones where song_activo='1' order by song_id DESC");
    while($clista = mysql_fetch_array($rptcanale)){
      if($val2==$clista['song_id']){
        return LGlobal::Tipo_URL('com_musica', $clista['song_id'], $clista['song_titulo']);
      }
      else if($val1==$primero['song_id']){
        return LGlobal::Tipo_URL('com_musica', $clista['song_id'], $clista['song_titulo']);
      }
      else {
        return Musica::__CAnterior($val1);
      }
    }
  }
  private function __CAnterior($val1){
    $rptcanale = mysql_query("select * from music_canciones where song_id<$val1 and song_activo='1'");
    $clista = mysql_fetch_array($rptcanale);
    return LGlobal::Tipo_URL('com_musica', $clista['song_id'], $clista['song_titulo']);
  }
  private function _CancionesDCantante($val1){
    $rptcanartis = mysql_query("select * from music_canciones where song_id_cantante='".$val1."' and song_id!='".$_GET['id']."' and song_activo='1' limit 8");
    while($cantante = mysql_fetch_array($rptcanartis)){
      echo "<li>
        <a href=\"".LGlobal::Tipo_URL('com_musica', $cantante['song_id'], $cantante['song_titulo'])."\">
          <img src=\"http://i.ytimg.com/vi/".$cantante['song_video']."/default.jpg\" width=\"36\" height=\"36\">
          <strong>".$cantante['song_titulo']."</strong>
          <small>Genero: <strong>";
          Musica::__Generos($cantante['song_id_genero'], false);
          echo "</strong> Album: <strong>";
          Musica::__LGMAlbum2($cantante['song_album']);
          echo "</strong> </small>
        </a>
      </li>\n";
    }
  }
}
?>