<div class="botonesdemando"><h3><a href="?lagc=com_usuarios">&laquo; Atras</a> | Editando <u><?php echo $user['usuario']; ?></u></h3></div>
<form name="frmcncontac" method="post" action="">
<input name="id" type="hidden" value="<?php echo $user['id']; ?>">
  <table border="0" cellpadding="5">
    <tr>
      <th align="right">E-mail: *</th>
      <td colspan="2"><input name="email" type="text" value="<?php echo $user['email']; ?>" class="inp-form" size="50"><br /><br /></td>
      <th rowspan="6" align="center" style="padding:0px 30px;">
      <?php if ($user['tipo']==1) { ?>
        <h3>Componentes</h3>
        <select name="componentes[]" size="17" style="width:140px;" multiple="multiple">
          <?php
    $resppc = mysql_query("select * from componentes where visible='1'");
	while($datapc = mysql_fetch_array($resppc)) {
		$aSubcads=split("[|.-]",$user['componentes']);//sacar las |
		$var1 = 0;
		for($k=0;$k<count($aSubcads);$k++)//separar una a una
			if ($aSubcads[$k] == $datapc['id_com']) {
				$var1 = 1;
				break;
			}
		if ($var1 == 1)
			echo "<option value=\"".$datapc['id_com']."\" selected=\"selected\">".$datapc['nombre']."</option>\n";
		else {
			echo "<option value=\"".$datapc['id_com']."\">".$datapc['nombre']."</option>\n";
		}
	}
    ?>
        </select>
        <?php } ?>
      </th>
    </tr>
    <tr>
      <th align="right">Tipo:</th>
    <?php
    $tipuser = array("1"=>"
    <td align=\"center\"><input type=\"radio\" name=\"tipo\" value=\"2\">Usuario</td>
    <td align=\"center\"><input name=\"tipo\" type=\"radio\" checked=\"checked\" value=\"1\">Admin<br /><br /></td>
    ", "2"=>"
    <td align=\"center\"><input type=\"radio\" name=\"tipo\" checked=\"checked\" value=\"2\">Usuario</td>
    <td align=\"center\"><input name=\"tipo\" type=\"radio\" value=\"1\">Admin<br /><br /></td>");
    ksort($tipuser);
    foreach ($tipuser as $key => $val) {
        if ($user['tipo']==$key) {
        	echo $val;
        }
    } ?>
    </tr>
    <tr>
      <th align="right">Sexo:</th>
    <?php
    $tipsexo = array("1"=>"
    <td align=\"center\"><input type=\"radio\" name=\"sexo\" checked=\"checked\" value=\"1\">Hombre</td>
    <td align=\"center\"><input name=\"sexo\" type=\"radio\" value=\"2\">Mujer<br /><br /></td>
    ", "2"=>"
    <td align=\"center\"><input type=\"radio\" name=\"sexo\" value=\"1\">Hombre</td>
    <td align=\"center\"><input name=\"sexo\" type=\"radio\" checked=\"checked\" value=\"2\">Mujer<br /><br /></td>");
    ksort($tipsexo);
    foreach ($tipsexo as $key => $val) {
        if ($user['sexo']==$key) {
        	echo $val;
        }
    } ?>
    </tr>
    <tr>
      <th align="right">Nombre:</th>
      <td colspan="2"><input name="nombre" type="text" size="50" value="<?php echo $user['nombres']; ?>" class="inp-form"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Apellidos:</th>
      <td colspan="2"><input name="apellidos" type="text" size="50" value="<?php echo $user['apellidos']; ?>" class="inp-form"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Documento:</th>
      <td align="center">
    <select name="documentotipo">
    <?php
	$tipdoc = array("1"=>"DNI", "2"=>"CE", "3"=>"LM", "4"=>"PAS");
	ksort($tipdoc);
	foreach ($tipdoc as $key => $val) {
    	if ($user['doc_tipo']==$key) {
			echo "<option value=\"".$key ."\" selected=\"selected\">".$val."</option>\n";
        }
        else {
        	echo "<option value=\"".$key ."\">".$val."</option>\n";
        }
	}
	?>
    </select></td>
      <td align="center"><input name="documentonum" type="text" size="18" value="<?php echo $user['doc_num']; ?>" class="inp-form"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Fecha de Nacimiento:</th>
      <td colspan="2">
<select name="cump_dia" autocomplete="off">
<?php
$tipdia = array("-1"=>"D&iacute;a:", "1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20", "21"=>"21", "22"=>"22", "23"=>"23", "24"=>"24", "25"=>"25", "26"=>"26", "27"=>"27", "28"=>"28", "29"=>"29", "30"=>"30", "31"=>"31");
ksort($tipdia);
foreach ($tipdia as $key => $val) {
    if ($user['cump_dia']==$key) {
    	echo "<option value=\"".$key ."\" selected=\"selected\">".$val."</option>\n";
    }
    else {
    	echo "<option value=\"".$key ."\">".$val."</option>\n";
    }
}
?>
</select>
<select name="cump_mes" autocomplete="off">
<?php
$tipmes = array("-1"=>"Mes:", "1"=>"Enero", "2"=>"Febrero", "3"=>"Marzo", "4"=>"Abril", "5"=>"Mayo", "6"=>"Junio", "7"=>"Julio", "8"=>"Agosto", "9"=>"Septiembre", "10"=>"Octubre", "11"=>"Noviembre", "12"=>"Diciembre");
ksort($tipmes);
foreach ($tipmes as $key => $val) {
    if ($user['cump_mes']==$key) {
    	echo "<option value=\"".$key ."\" selected=\"selected\">".$val."</option>\n";
    }
    else {
    	echo "<option value=\"".$key ."\">".$val."</option>\n";
    }
}
?>
</select>
<select name="cump_anio" autocomplete="off">
<option value="-1">A&ntilde;o:</option>
<?php
for ($i = 1970; $i <= 2011; $i++) {
    if ($i==$user['cump_anio']) {
        echo "<option value=\"".$i."\" selected=\"selected\">".$i."</option>\n";
    }
    else {
        echo "<option value=\"".$i."\">".$i."</option>\n";
    }
}
?> 
</select><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Activar:</th>
      <?php
    $tipacti = array("1"=>"<td align=\"center\"><label><input name=\"activar\" type=\"radio\" checked=\"checked\" value=\"1\">Si</label><br /><br /></td><td align=\"center\"><label><input type=\"radio\" name=\"activar\" value=\"2\">No</label><br /><br /></td>", "2"=>"<td align=\"center\"><label><input name=\"activar\" type=\"radio\" value=\"1\">Si</label><br /><br /></td><td align=\"center\"><label><input type=\"radio\" name=\"activar\" checked=\"checked\" value=\"2\">No</label><br /><br /></td>");
    ksort($tipacti);
    foreach ($tipacti as $key => $val) {
        if ($user['activo']==$key) {
        	echo $val;
        }
    } ?>
      <th align="right">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" align="center"><input type="button" value="Cancelar" onclick="location.href='?lagc=com_usuarios&lista=usuarios'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset">
        <input type="submit" name="button2" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>