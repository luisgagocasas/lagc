<div id="sitio-login-admin">
<center>
<h5>Acceso a Administradores</h5>
  <form action="" method="post">
  <input name="url" type="hidden" value="<?=$_SERVER['REQUEST_URI']; ?>" />
    <table width="200" border="0" align="center">
      <tr>
        <td align="right">Usuario:</td>
        <td><input type="text" name="lgusuario" size="27" maxlength="50" style="padding:3px 5px;"></td>
      </tr>
      <tr>
        <td align="right">Contrase&ntilde;a:</td>
        <td><input type="password" name="password" size="27" maxlength="30" style="padding:3px 5px;"></td>
      </tr>
    </table>
    <div align="center">
      <input type="button" value="Entrar" onclick="this.disabled=true; this.value='Conectando...'; this.form.submit()" style="padding:5px 5px;" />
    </div>
  </form>
</center>
</div>