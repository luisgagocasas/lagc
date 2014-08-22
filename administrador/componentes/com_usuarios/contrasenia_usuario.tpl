<h3>Cambiar Contrase&ntilde;a para: <?php echo $user['usuario']; ?></h3>
<form name="frmcontrasenia" method="post" action="">
  <input name="id" type="hidden" value="<?php echo $user['id']; ?>">
  <table border="0" cellpadding="5">
    <tr>
      <th align="right">Contrase&ntilde;a:</th>
      <td><input name="passport" type="password" class="inp-form" size="20"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Confirmar Contrase&ntilde;a:</th>
      <td><input name="passport2" type="password" class="inp-form" size="20"></td>
    </tr>
    <tr>
      <th colspan="2" align="center">
      <input type="button" value="Cancelar" onclick="location.href='?lagc=com_usuarios&lista=usuarios'" class="form-cancel">
      <input type="reset" name="Reset" value="Restablecer" class="form-reset">
      <input type="submit" name="guardar" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>