<script type="application/x-javascript">
function Campo($texto){  }
function abrirservidor(){
  window.open("componentes/com_musica/include_servidor.php?lgserver=<?=$cont['song_id_servidor']; ?>","server","width=450,height=550,menubar=no");
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_musica">&laquo; Atras</a> | Editando: <?=$cont['song_titulo']; ?></h3></div>
<form name="frmcont" method="post" action="">
<input type="hidden" name="servidor" value="<?=$cont['song_id_servidor']; ?>">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right">Servidor: *</th>
            <td> <?=Musica::VerServidor($cont['song_id_servidor']); ?><br /><br /></td>
            <td rowspan="5" align="center" valign="bottom">
            <center>
            <object width="333" height="189" style="height: 189px; width: 333px">
            <param name="movie" value="https://www.youtube.com/v/<?=$cont['song_video']; ?>?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0">
            <param name="allowFullScreen" value="true">
            <param name="allowScriptAccess" value="always">
            <embed src="https://www.youtube.com/v/<?=$cont['song_video']; ?>?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="333" height="189">
            </object></center>
            </td>
          </tr>
          <tr>
            <th align="right">Titulo: *</th>
            <td><input name="titulo" type="text" value="<?=$cont['song_titulo']; ?>" class="inp-form" size="36"><br /><br /></td>
            </tr>
          <tr>
            <th align="right">Cantante: *</th>
            <td>
              <select name="cantante" size="5" style="width:200px;">
                <?php
                $respcat = mysql_query("select * from music_cantantes where cantan_activo='1'");
                while($cat = mysql_fetch_array($respcat)) {
                    if($cont['song_id_cantante']==$cat['cantan_id']) {
                        echo "<option value=\"".$cat['cantan_id']."\" selected=\"selected\">".$cat['cantan_nombre']."</option>";
                    }
                    else {
                        echo "<option value=\"".$cat['cantan_id']."\">".$cat['cantan_nombre']."</option>";
                    }
                }
                ?>
                </select>
              <br /><br /></td>
            </tr>
          <tr>
            <th align="right">Genero: *</th>
            <td>
              <select name="genero" size="5" style="width:200px;">
                <?php
                $respgene = mysql_query("select * from music_genero where genero_activo='1'");
                while($genero = mysql_fetch_array($respgene)) {
                    if($cont['song_id_genero']==$genero['genero_id']) {
                        echo "<option value=\"".$genero['genero_id']."\" selected=\"selected\">".$genero['genero_nombre']."</option>";
                    }
                    else {
                        echo "<option value=\"".$genero['genero_id']."\">".$genero['genero_nombre']."</option>";
                    }
                }
                ?>
                </select>
              <br /><br /></td>
            </tr>
          <tr>
            <th align="right">Url Video: </th>
            <td><input name="url" type="text" value="<?=$cont['song_video']; ?>" class="inp-form" size="36"><br />
              <span style="font-size:10px; color:#ccc;">http://www.youtube.com/watch?v=UiRI-rlHxHE</span><br /><br /></td>
            </tr>
            <?php
            if($cont['song_id_servidor']!=1){ ?>
          <tr>
            <th align="right">Url Cancion: *</th>
            <td colspan="2"><input name="urlcancion" type="text" value="<?=$cont['song_url']; ?>" id="rutacancion" class="inp-form" size="36">
              <a href="#" onclick="abrirservidor(); return false;">[ Abrir Servidor ]</a>
              <br /><br /></td>
          </tr>
          <?php } ?>
          <tr>
            <th align="right">Letra: *</th>
            <td colspan="2"><textarea name="letra" cols="50" rows="40"><?=$cont['song_letra']; ?></textarea><br /><br /></td>
          </tr>
        </table></td>
      <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
                <?php
                $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\"> Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\"> Desactivado</label>");
                ksort($acti);
                foreach ($acti as $key => $val) {
                    if ($cont['song_activo']==$key) {
                        echo $val;
                    }
                } ?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
</center>
</form>