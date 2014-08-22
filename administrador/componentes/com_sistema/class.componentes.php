<?php //clases para los componentes
class Componente {
	function existe($componente) {
		if (!empty($componente)) {
			$respcompo = mysql_query("select * from componentes where url='".$componente."'");
			$compo = mysql_fetch_array($respcompo);
			if ($compo['url']!=$_GET['lagc']) { echo "El Componente no existe"; }
		}
	}
	function primercompo($id) {
		$respcompo = mysql_query("select * from componentes where id_com='".$id."'");
		$compo = mysql_fetch_array($respcompo);
		include "componentes/".$compo['url']."/".$compo['archivo'].".php";
	}
	function componentes() {
		$respcompo = mysql_query("select * from componentes where visible='1'");
		while($compo = mysql_fetch_array($respcompo)) {
			if (!empty($compo['archivo']) and !empty($compo['url'])) { //verifico si variables tienen contenido
				if ($_GET['lagc']==$compo['url']) {
					if ($compo['id_com']!=1) { //pregunto si es igual a id = 1 q es el configuracion
						if(!empty($compo['descripcion'])){
						echo "<div id=\"page-heading\"><h1>Componente: ".$compo['nombre']."</h1></div>
						<div id=\"message-blue\">
						<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tr>
						<td class=\"blue-left\"><u>Descripci&oacute;n:</u><br>".$compo['descripcion']."</td>
						<td class=\"blue-right\"><a class=\"close-blue\"><img src=\"plantillas/lagc-peru/imagenes/table/icon_close_blue.gif\" /></a></td>
						</tr>
						</table>
						</div>";
						}
						include "componentes/".$compo['url']."/".$compo['archivo'].".php";
						echo "<br><br>";
					}
					else { include "componentes/".$compo['url']."/".$compo['archivo'].".php"; }
				}
			}
			else { echo "<div id=\"alerta_comp\">error en un componente</div>"; }
		}
	}
	function Mostrar() { //mostrar componentes y alertas de errores
		if (empty($_COOKIE["username"])) {
			if ($config->lagcactivo==2) { echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='index.php'\",0) </script>"; exit; }
			//si esta logeado puede acceder aqui
		}
		if (!empty($alerta)) { echo "<div id=\"alerta_comp\">".$alerta."</div>"; } //alerta
		if (!isset($_GET['lagc'])){ Componente::InicioAdmin(); } //muestra primer componente Componente::primercompo(5);
		Componente::existe($_GET['lagc']); //si un componente no existe
		Componente::componentes(); //muestra todos los componentes
	}
	function CompoTitulo($compo) {
		if (!empty($_GET['lagc'])) {
			$respcomp = mysql_query("select * from componentes where url='".$compo."'");
			$comp = mysql_fetch_array($respcomp);
				if ($comp['url']==$compo) { echo ucwords($comp['nombre'])." - CMS Lagc Perú"; }
				else { echo "Error. noce encontro el Componente. - CMS Lagc Perú"; }
		}
		else { echo "Bienvenid@, a Lagc Perú"; }
	}
	function CompoMenu() {
		include "../plantillas/lagc-peru/funciones.lagc-peru.php"; // solo funciona con el uso de la plantilla /lagc-peru/
		$respcompo = mysql_query("select * from componentes where visible='1' order by nombre ASC");
		while($compo = mysql_fetch_array($respcompo)) { //escogo cuales se mostraran tipo componente
			if ($compo['id_com']!=1 and $compo['id_com']!=2 and $compo['id_com']!=3  and $compo['id_com']!=4 and $compo['id_com']!=6 and $compo['id_com']!=7 and $compo['id_com']!=8 and $compo['id_com']!=9 and $compo['id_com']!=10) { echo "<li".Menus::Enlaces($compo['url'], $_GET['lagc'])."><a href=\"?lagc=".$compo['url']."\">".$compo['nombre']."</a></li>"; }
		}
	}
	function InicioAdmin() { ?>
    <?php $respconte = mysql_query("select * from componentes where id_com!=1 and id_com!=2 and id_com!=3 and id_com!=4 and id_com!=6 and id_com!=7 and id_com!=8 and id_com!=9 and id_com!=10 order by nombre ASC"); ?>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['imagepiechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Hours per Day'); <?php $num_rows = mysql_num_rows($respconte); echo "\n"; ?>
        data.addRows(<?=$num_rows; ?>);
		<?php $cmp = 0;
		$obj = new DiskUsage;
		while($comp = mysql_fetch_array($respconte)) {
			  $path = Componente::__rutainterna()."componentes/".$comp['url']."/";
			  $size = $obj->_directorySize($path);
			  echo "data.setValue(".$cmp.", 0, '".$comp['nombre']."');\n";
			  echo "data.setValue(".$cmp.", 1, ".$obj->_sizeFormat($size['size']).");\n";  $cmp=$cmp+1;
		}
		?>
        var chart = new google.visualization.ImagePieChart(document.getElementById('valores_div'));
        chart.draw(data, {width: 360, height: 250});
      }
    </script>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><h5>Espacio que ocupa cada componente "administrador"</h5><div id="valores_div"></div>
        <?php
		$path = Componente::__rutainterna()."componentes/";
		$size = $obj->__directorySize($path);
		echo "Tama&ntilde;o total : ".$obj->__sizeFormat($size['size'])."<br>";
		echo "N&deg;. de archivos : ".$size['count']."<br>";
		echo "N&deg;. de carpetas : ".$size['dircount']."<br>";
		?>
        </td>
        <td align="center" valign="top"><h5>Ultimos Usuarios</h5>
        <table width="300" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat"><a href="">Usuario</a></th>
        <th class="table-header-repeat"><a href="">Activo</a></th>
        <th class="table-header-repeat"><a href="">Fecha</a></th>
        <th class="table-header-options"><a href="">E-mail</a></th>
      </tr>
    <?php $respuser = mysql_query("select * from usuarios where id!=1 order by id DESC limit 5"); while($usuarios = mysql_fetch_array($respuser)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td align="center"><strong><?=$usuarios['usuario']; ?></strong></td>
        <td align="center"><?=Componente::activou($usuarios['activo']); ?></td>
        <td align="center"><?=date("Y/m/d", $usuarios['fecha']); ?></td>
        <td align="center"><?=$usuarios['email']; ?></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td align="center"><strong><?=$usuarios['usuario']; ?></strong></td>
        <td align="center"><?=Componente::activou($usuarios['activo']); ?></td>
        <td align="center"><?=date("Y/m/d", $usuarios['fecha']); ?></td>
        <td align="center"><?=$usuarios['email']; ?></td></tr>
    <?php } ?>
    <?php } ?>
    </table>
        </td>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
    </table>
        <?php
	}
	function activou($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function __rutainterna() {
		$rutafin = $_ENV["SCRIPT_FILENAME"];
		$rutafin = substr($rutafin, 0, -9);
		return $rutafin;
	}
}
class Login {
    public function Logon($user,$password,$id=false) {
        $user = strtolower(trim($user));
        if (!ereg("^[a-z]+$",$user)) {
            return false;
        }
        if ($id===false) {
            $password = md5($password);
            $sql = mysql_query("SELECT usuario,password,id FROM usuarios
            WHERE usuario = '$user' AND password = '$password' AND tipo='1'");
        }
		else { 
            if (!ereg("^[0-9]+$",$id)) {
                $id = 0;
            }
            $password = mysql_real_escape_string($password);
            $sql = mysql_query("SELECT usuario,password,id FROM usuarios
            WHERE usuario = '$user' AND password = '$password' AND id = '$id' AND tipo='1'");
        }
		if (mysql_num_rows($sql)>=1) {
            $row=mysql_fetch_assoc($sql);
            mysql_free_result($sql);
            $this->SetSession($row);
            return true;
        }
        $this->LogOut();
        return false;
    }
    private function SetSession($array) {
		setcookie("username", $array["usuario"], time() + 3600, "/");
		setcookie("hash", $array["password"], time() + 3600, "/");
		setcookie("user", $array["id"], time() + 3600, "/");
        return true;
    }
    public function LogOut() {
		setcookie("username", $array["usuario"], time() - 3600, "/");
		setcookie("hash", $array["password"], time() - 3600, "/");
		setcookie("user", $array["id"], time() - 3600, "/");
        return true;
    }
    public function Check() {
		if ($this->Logon($_COOKIE["username"],$_COOKIE["hash"],$_COOKIE["user"])) {
            return true;
        }
        return false;
    }
}
final class DiskUsage {
	var $_totalSize = 0;
	var $_totalCount = 0;
	var $_directoryCount = 0;
	var $_handleDir;
	var $_filePath;
	var $_nextPath;
	var $_resultValue;
	var $_totalValue = array();
	
	public function _directorySize($_path)
	{
		if($_handleDir = opendir($_path))
		{
			while(FALSE !== ($_filePath = readdir($_handleDir)))
			{
				$_nextPath = $_path . "/" . $_filePath;
				if($_filePath != '.' && $_filePath != '..' && !is_link($_nextPath))
				{
					if(is_dir($_nextPath))
					{
						$_directoryCount++;
						$_resultValue = self::_directorySize($_nextPath);
						$_totalSize += $_resultValue['size'];
						$_totalCount += $_resultValue['count'];
						$_directoryCount += $_resultValue['dircount'];
					}
					elseif(is_file($_nextPath))
					{
						$_totalSize += filesize($_nextPath);
						$_totalCount++;
					}
				}
			}
		}
		closedir($_handleDir);
		$_totalValue['size'] = $_totalSize;
		$_totalValue['count'] = $_totalCount;
		$_totalValue['dircount'] = $_directoryCount;
		
		return $_totalValue;
	}
	
	public function _sizeFormat($_dirSize)
	{
		if($_dirSize < 1024)
		{
			return $_dirSize;
		}
		else if($_dirSize < (1024*1024))
    		{
        		$_dirSize = round($_dirSize/1024,1);
        		return $_dirSize;
    		}
    		else if($_dirSize < (1024*1024*1024))
    		{
        		$_dirSize = round($_dirSize/(1024*1024),1);
        		return $_dirSize + 0.1;
    		}
    		else
    		{
        		$_dirSize = round($_dirSize/(1024*1024*1024),1);
        		return $_dirSize;
    		}
	}
	
	
	
	
	
		public function __directorySize($_path)
	{
		if($_handleDir = opendir($_path))
		{
			while(FALSE !== ($_filePath = readdir($_handleDir)))
			{
				$_nextPath = $_path . "/" . $_filePath;
				if($_filePath != '.' && $_filePath != '..' && !is_link($_nextPath))
				{
					if(is_dir($_nextPath))
					{
						$_directoryCount++;
						$_resultValue = self::_directorySize($_nextPath);
						$_totalSize += $_resultValue['size'];
						$_totalCount += $_resultValue['count'];
						$_directoryCount += $_resultValue['dircount'];
					}
					elseif(is_file($_nextPath))
					{
						$_totalSize += filesize($_nextPath);
						$_totalCount++;
					}
				}
			}
		}
		closedir($_handleDir);
		$_totalValue['size'] = $_totalSize;
		$_totalValue['count'] = $_totalCount;
		$_totalValue['dircount'] = $_directoryCount;
		
		return $_totalValue;
	}
	
	public function __sizeFormat($_dirSize)
	{
		if($_dirSize < 1024)
		{
			return $_dirSize." Bytes.";
		}
		else if($_dirSize < (1024*1024))
    		{
        		$_dirSize = round($_dirSize/1024,1);
        		return $_dirSize." KB.";
    		}
    		else if($_dirSize < (1024*1024*1024))
    		{
        		$_dirSize = round($_dirSize/(1024*1024),1);
        		return $_dirSize + 0.1." MB.";
    		}
    		else
    		{
        		$_dirSize = round($_dirSize/(1024*1024*1024),1);
        		return $_dirSize." GB.";
    		}
	}
}
?>