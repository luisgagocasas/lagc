<h2>Agregar a un Amig@</h2>
<form name="comentariolagc" action="?lagc=com_usuarios&id=<?=$_GET['id']; ?>&ver=<?=$_GET['ver']; ?>&addamg=1" method="post" onSubmit="return revisar()">
  <table width="300" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top"><p style="text-align:justify;">
          <?=LGlobal::Url_Usuario($_COOKIE["user_lagc"], true, false, "", ""); ?>
          estas por intentar enviarle un invitacion a
          <?=LGlobal::Url_Usuario($_GET['id'], true, false, "", ""); ?>
          para que desde el momento que acepte sea tu amig@ y compartas informacion.</p>
        <br>
        <table width="370" align="center" border="0">
          <tr>
            <td align="left"><?=LGlobal::Url_Usuario($_GET['id'], true, false, "", ""); ?>
              <br>
              <img src="<?=LGlobal::IMG_Usuario($_GET['id'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" border="0" /></td>
            <td align="center" valign="middle"><img src="componentes/com_usuarios/flechas.png" border="0" /></td>
            <td align="right"><?=LGlobal::Url_Usuario($_COOKIE["user_lagc"], true, false, "", ""); ?>
              <br>
              <img src="<?=LGlobal::IMG_Usuario($_COOKIE["user_lagc"], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" border="0" /></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td align="center" valign="middle"><img src="administrador/utilidades/exampleView.php" width="65" height="25" style="margin:5px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" />
        <input name="tmptxt" tabindex="1" title="Copiar codigo aqui" type="text" size="1" class="blog-frm-code" autocomplete="off" maxlength="5" />
        <input type="submit" tabindex="2" value="Agregar" class="blog-frm-boton" /></td>
    </tr>
  </table>
</form>