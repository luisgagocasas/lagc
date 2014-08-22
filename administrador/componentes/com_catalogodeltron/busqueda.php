<?php
require "../../configuracion.lagc.php";

$B_BUSCAR= mysql_query ("SELECT * FROM cp_linea where cp_tmarca='".$_POST["idnumero"]."' order by cp_tnombre ASC");
$R_BUSCAR=mysql_fetch_assoc($B_BUSCAR);
$C_BUSCAR=mysql_num_rows($B_BUSCAR);
if($C_BUSCAR){
	do{
		if($_POST["idpobla"]==$R_BUSCAR['cp_tid']){$TRUE=" selected='TRUE'";}else{$TRUE="";}
		echo "<option value='".$R_BUSCAR['cp_tid']."' $TRUE>".htmlentities($R_BUSCAR['cp_tnombre'])."</option>";
		}
		while($R_BUSCAR=mysql_fetch_assoc($B_BUSCAR));
		}else{ echo "<option value=''>".htmlentities("Seleccionar linea")."</option>";}
mysql_close($con);
?>
