<script>
function revisar() {
	if(frmusuario.email.value.length < 4) { alert('Ingrese el E-mail. Minimo 4 caracteres') ; return false ; }
}
</script>
<h2>Recuperar Contrase&ntilde;a</h2><br />

<form name="frmusuario" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th align="right">Mi E-mail: *</th>
      <td colspan="2"><input name="lgemail" type="text" class="inputfrm" size="40"> <input type="submit" value="Enviar Confirmaci&oacute;n" class="inputfrm"></td>
    </tr>
  </table>
</form>
<br />
<br />

* Para recuperar la contrase&ntilde;a solo ingrese en el campo su email y le llegara a su correo la confirmaci&oacute;n para recuperar su contrase&ntilde;a. y siga los pasos que le indicaran.