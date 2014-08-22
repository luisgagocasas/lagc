<?php $respmposi = mysql_query("select * from m_posicion where m_pactivo='1' ORDER BY m_pid ASC"); ?>
<h3>Escoja un menu para mostrar.</h3>
<table>
<tr>
<th valign="top">
* Menus
</th>
<td>
<select name="posicion" style="width:200px;" size="10">
<?php while($mposiciones=mysql_fetch_assoc($respmposi)){
	if ($cont[mod_tipvalor1]==$mposiciones['m_pid']) {
		echo "<option value=\"".$mposiciones['m_pid']."\" selected>".$mposiciones['m_pnombre']."</option>"; }
	else { echo "<option value=\"".$mposiciones['m_pid']."\">".$mposiciones['m_pnombre']."</option>"; }
} ?>
</select>
</td>
</tr>
<th valign="top"><br>
* Css
</th>
<td><br>
<input name="css" class="inp-form1" value="<?=$cont[mod_tipvalor2]; ?>" type="text" />
</td>
</tr>
</table>