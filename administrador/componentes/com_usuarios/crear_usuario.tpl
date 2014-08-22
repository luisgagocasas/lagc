<script>
function revisar() {
	if(frmusuario.usuario.value.length < 4) { alert('Ingrese el Usuario. Minimo 4 caracteres') ; return false ; }
	if(frmusuario.email.value.length < 4) { alert('Ingrese el Correo. Minimo 4 caracteres') ; return false ; }
	if(frmusuario.contra1.value.length < 4) { alert('Ingrese la contraseña. Minimo 6 caracteres') ; return false ; }
	if(frmusuario.nombre.value.length < 4) { alert('Ingrese su Nombre. Minimo 4 caracteres') ; return false ; }
	if(frmusuario.apellidos.value.length < 4) { alert('Ingrese sus Apellidos. Minimo 4 caracteres') ; return false ; }
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_usuarios">&laquo; Atras</a> | Crear nuevo usuario</h3></div>
<form name="frmusuario" method="post" action="" onSubmit="return revisar()" id="mainform">
  <table border="0" cellpadding="5">
    <tr>
      <th align="right">Usuario: *</th>
      <th colspan="2" align="left"><input name="usuario" type="text" size="50" class="inp-form-error"><br /><br /></th>
    </tr>
    <tr>
      <th align="right">E-mail: *</th>
      <td colspan="2"><input name="email" type="text" size="50" class="inp-form-error"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Tipo:</th>
      <td align="center"><input type="radio" name="tipo" checked="checked" value="2">Usuario<br /><br /></td>
      <td align="center"><input name="tipo" type="radio" value="1">Admin<br /><br /></td>
    </tr>
    <tr>
      <th align="right">Sexo:</th>
      <td align="center"><input name="sexo" type="radio" value="1" checked="checked" />Hombre</td>
      <td align="center"><input name="sexo" type="radio" value="2" />Mujer<br /><br /></td>
    </tr>
    <tr>
      <th align="right">Nombre: *</th>
      <td colspan="2"><input name="nombre" type="text" size="50" class="inp-form-error"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Apellidos: *</th>
      <td colspan="2"><input name="apellidos" type="text" size="50" class="inp-form-error"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Contrase&ntilde;a: *</th>
      <td colspan="2"><input name="contra1" type="password" title="Excribe la Contrase&ntilde;a" class="inp-form-error" size="20"> | <input name="contra2" title="Vuelve a escribir la Contrase&ntilde;a" type="password" size="20"class="inp-form-error"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Documento: </th>
      <td align="center"><select name="documentotipo">
          <?php
	$tipdoc = array("1"=>"DNI", "2"=>"CE", "3"=>"LM", "4"=>"PAS");
	ksort($tipdoc);
	foreach ($tipdoc as $key => $val) {
        	echo "<option value=\"".$key ."\">".$val."</option>\n";
	}
	?>
        </select></td>
      <td align="center"><input name="documentonum" type="text" size="18" class="inp-form"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Fecha de Nacimiento:</th>
      <td colspan="2">
<select name="cump_dia" autocomplete="off">
<option value="-1">D&iacute;a:</option>
<option value="1">1</option> 
<option value="2">2</option> 
<option value="3">3</option> 
<option value="4">4</option> 
<option value="5">5</option> 
<option value="6">6</option> 
<option value="7">7</option> 
<option value="8">8</option> 
<option value="9">9</option> 
<option value="10">10</option> 
<option value="11">11</option> 
<option value="12">12</option> 
<option value="13">13</option> 
<option value="14">14</option> 
<option value="15">15</option> 
<option value="16">16</option> 
<option value="17">17</option> 
<option value="18">18</option> 
<option value="19">19</option> 
<option value="20">20</option> 
<option value="21">21</option> 
<option value="22">22</option> 
<option value="23">23</option> 
<option value="24">24</option> 
<option value="25">25</option> 
<option value="26">26</option> 
<option value="27">27</option> 
<option value="28">28</option> 
<option value="29">29</option> 
<option value="30">30</option> 
<option value="31">31</option> 
</select>
<select name="cump_mes" autocomplete="off">
<option value="-1">Mes:</option>
<option value="1">Enero</option> 
<option value="2">Febrero</option> 
<option value="3">Marzo</option> 
<option value="4">Abril</option> 
<option value="5">Mayo</option> 
<option value="6">Junio</option> 
<option value="7">Julio</option> 
<option value="8">Agosto</option> 
<option value="9">Septiembre</option> 
<option value="10">Octubre</option> 
<option value="11">Noviembre</option> 
<option value="12">Diciembre</option> 
</select>
<select name="cump_anio" autocomplete="off">
<option value="-1">A&ntilde;o:</option>
<?php
for ($i = 1970; $i <= 2011; $i++) {
    echo "<option value=\"".$i."\">".$i."</option>\n";
}
?> 
</select><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Activar:</th>
      <td align="center"><label><input name="activar" type="radio" checked="checked" value="1">Si</label><br /><br /></td>
      <td align="center"><label><input type="radio" name="activar" value="2">No</label><br /><br /></td>
    </tr>
    <tr>
      <th colspan="4" align="center">
      <input type="button" value="Cancelar" onclick="location.href='?lagc=com_usuarios&lista=usuarios'" class="form-cancel">
      <input type="reset" name="Reset" value="Restablecer" class="form-reset">
      <input type="submit" name="button2" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>