<?php $config = new LagcConfig(); ?>
<script>
function revisar() {
	if(frmusuario.usuarioxth.value.length < 4) { alert('Ingrese el Usuario. Minimo 4 caracteres'); frmusuario.usuarioxth.focus(); return false; }
	if(frmusuario.correoxth.value.length < 4) { alert('Ingrese el Correo. Minimo 4 caracteres'); frmusuario.correoxth.focus(); return false; }
	if(frmusuario.contra1.value.length < 4) { alert('Ingrese la contrasenia. Minimo 6 caracteres'); frmusuario.contra1.focus(); return false; }
	if(frmusuario.nombre.value.length < 4) { alert('Ingrese su Nombre. Minimo 4 caracteres'); frmusuario.nombre.focus(); return false; }
	if(frmusuario.apellidos.value.length < 4) { alert('Ingrese sus Apellidos. Minimo 4 caracteres'); frmusuario.apellidos.focus(); return false; }
	if(frmusuario.tmptxt.value.length < 4) { alert('Ingrese los caracteres de confirmacion'); frmusuario.tmptxt.focus(); return false; }
}
function oculta(id){
	var elDiv = document.getElementById(id);
	elDiv.style.display='none';
}
function muestra(id){
	var elDiv = document.getElementById(id);
	elDiv.style.display='block';
}
window.onload = function(){
oculta('mostrar1'); 
oculta('mostrar2');
oculta('mostrar3');
oculta('mostrar4');
oculta('mostrar5');
oculta('mostrar7');
}
</script>

<style type="text/css">
input{
	margin:5px 10px;
}
</style>
<h2>Nuevo Usuario</h2><br />
Los Campos Marcados con <strong>*</strong> son Importantes<br /><br />
<form name="frmusuario" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
  	<tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">Usuario: *</th>
      <td colspan="2"><input name="usuarioxth" class="inputfrm" onKeypress="if (event.keyCode < 97 || event.keyCode > 122) event.returnValue = false;" type="text" size="50"><br /><span style="font-size:10px; color:#666; margin:-5px 15px; position:absolute;"><strong>Ejemplo:</strong><?=$config->lagcurl; ?>usuarios/<span style="color:#F00">luisgago</span></span><br /></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">E-mail: *</th>
      <td colspan="2"><input name="correoxth" class="inputfrm" type="text" size="50"><br /><span style="font-size:10px; color:#666; margin:-5px 15px; position:absolute;"><strong>Ejemplo:</strong>luisgago@lagc-peru.com</span><br /></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">Contrase&ntilde;a: *</th>
      <td colspan="2"><input name="contra1" class="inputfrm" type="password" title="Excribe la Contrase&ntilde;a"  size="19">|<input name="contra2" class="inputfrm" title="Vuelve a escribir la Contrase&ntilde;a" type="password" size="19"><br /><span style="font-size:10px; color:#666; margin:-5px 15px; position:absolute;"><strong>Ejemplo:</strong>542.sdg.45</span><br /></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">Nombre: *</th>
      <td colspan="2"><input name="nombre" class="inputfrm" type="text" size="50"><br /><span style="font-size:10px; color:#666; margin:-5px 15px; position:absolute;"><strong>Ejemplo:</strong>Luis</span><br /></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">Apellidos: *</th>
      <td colspan="2"><input name="apellidos" class="inputfrm" type="text" size="50"><br /><span style="font-size:10px; color:#666; margin:-5px 15px; position:absolute;"><strong>Ejemplo:</strong>Gago</span><br /></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">Sexo:</th>
      <td align="center"><label><input name="sexo" type="radio" value="1" checked="checked" />Hombre</label></td>
      <td align="center"><label><input name="sexo" type="radio" value="2" />Mujer</label></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th colspan="4" align="center">
      <div class="showhidden">
        <div id="mostrar6"><a onClick="muestra('mostrar1'); muestra('mostrar2'); muestra('mostrar3'); muestra('mostrar4'); muestra('mostrar5'); muestra('mostrar7'); oculta('mostrar6');" style="cursor:pointer; text-decoration:none;">+ Mostrar mas Opciones</a></div>
        <div id="mostrar7"><a onClick="oculta('mostrar1'); oculta('mostrar2'); oculta('mostrar3'); oculta('mostrar4'); oculta('mostrar5'); muestra('mostrar6'); oculta('mostrar7');" style="cursor:pointer; text-decoration:none;">- Ocultar mas Opciones</a></div>
        </div>
      </th>
    </tr>
    <tr>
      <th align="right"><div id="mostrar1">Documento:</div></th>
      <td align="center"><div id="mostrar2"><select name="documentotipo">
      <?php
      $tipdoc = array("1"=>"DNI", "2"=>"CE", "3"=>"LM", "4"=>"PAS");
      ksort($tipdoc);
      foreach ($tipdoc as $key => $val) {
      		echo "<option value=\"".$key ."\">".$val."</option>\n";
      }
      ?>
        </select></div></td>
      <td align="center"><div id="mostrar3"><input name="documentonum" class="inputfrm" type="text" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" size="18"></div></td>
    </tr>
    <tr>
      <th align="right"><div id="mostrar4">Fecha de Nacimiento:</div></th>
      <td colspan="2"><div id="mostrar5">
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
</select></div></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th align="right">Codigo de confirmación:</th>
      <td colspan="2">
      <center>
      <img src="administrador/utilidades/exampleView.php" width="68" height="25" style="margin:4px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" /><input name="tmptxt" class="inputfrm" title="Copiar codigo aqui" type="text" size="5" autocomplete="off" maxlength="5" /><br /><span style="font-size:10px; color:#666; margin:-5px 0px; position:absolute;"><strong>Ejemplo:</strong>23yg</span><br /></center></td>
    </tr>
    <tr onMouseover=this.bgColor="#09C" onMouseout=this.bgColor="">
      <th colspan="4" align="center">
        <input type="reset" value="Restablecer" class="inputfrm">
        <input type="submit" value="Crear" class="inputfrm">
      </th>
    </tr>
  </table>
</form>