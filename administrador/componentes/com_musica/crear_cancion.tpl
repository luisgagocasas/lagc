<script type="application/x-javascript">
function Campo($texto){  }
function abrirservidor(){
  window.open("componentes/com_musica/include_servidor.php?lgserver=<?=$_POST['servidor']; ?>","server","width=450,height=550,menubar=no");
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_musica&musica=<?=time(); ?>&selec_serv_musica=<?=time(); ?>">&laquo; Atras</a> | Agregando nueva cancion</h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right">Servidor: *</th>
            <td><?=Musica::VerServidor($_POST['servidor']); ?><br /><br />
              <input name="server" type="hidden" value="<?=$_POST['servidor']; ?>"></td>
          </tr>
          <tr>
            <th align="right">Titulo: *</th>
            <td><input name="titulo" type="text" value="" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Cantante: *</th>
            <td>
              <select name="cantante" size="5" style="width:200px;">
                <?php
                $respcat = mysql_query("select * from music_cantantes where cantan_activo='1'");
                while($cat = mysql_fetch_array($respcat)) {
                    if("1"==$cat['cantan_id']) {
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
                    if("1"==$genero['genero_id']) {
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
            <td><input name="url" type="text" value="http://" class="inp-form" size="36"><br />
              <span style="font-size:10px; color:#ccc;">http://www.youtube.com/watch?v=UiRI-rlHxHE</span><br /><br /></td>
          </tr>
          <?php
          if($_POST['servidor']!=1){ ?>
          <tr>
            <th align="right">Url Cancion: *</th>
            <td><input name="urlcancion" type="text" id="rutacancion" class="inp-form" size="36">
              <a href="#" onclick="abrirservidor(); return false;">[ Abrir Servidor ]</a>
              <br /><br /></td>
          </tr>
          <?php } ?>
          <tr>
            <th align="right">Letra: *</th>
            <td><textarea name="letra" cols="50" rows="40"></textarea><br /><br /></td>
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
                <label><input name="activado" type="radio" checked="checked" value="1"> Activado</label>
                <label><input name="activado" type="radio" value="2"> Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica&musica=<?=time(); ?>&selec_serv_musica=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
</center>
</form>