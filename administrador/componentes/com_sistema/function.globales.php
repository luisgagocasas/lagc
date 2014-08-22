<?php //clase blobal para todo el cms
class LGlobal {
	function Url_Amigable($cadena) {
	   // Sepadador de palabras que queremos utilizar
	   $separador = "-";
	   // Eliminamos el separador si ya existe en la cadan actual
	   $cadena = str_replace($separador, "",$cadena);
	   // Convertimos la cadena a minusculas
	   $cadena = strtolower($cadena);
	   // Remplazo tildes y eñes
	   $cadena = strtr($cadena, "áéíóúÁñÑ", "aeiouAnN");
	   // Remplazo cuarquier caracter que no este entre A-Za-z0-9 por un espacio vacio
	   $cadena = trim(ereg_replace("[^ A-Za-z0-9]", "", $cadena));
	   // Inserto el separador antes definido
	   $cadena = ereg_replace("[ \t\n\r]+", $separador, $cadena);
	   return $cadena;
	}
	function Url_AmigableUser($cadena) {
	   // Sepadador de palabras que queremos utilizar
	   $separador = "";
	   // Eliminamos el separador si ya existe en la cadan actual
	   $cadena = str_replace($separador, "",$cadena);
	   // Convertimos la cadena a minusculas
	   $cadena = strtolower($cadena);
	   // Remplazo tildes y eñes
	   $cadena = strtr($cadena, "áéíóúÁñÑ", "aeiouAnN");
	   // Remplazo cuarquier caracter que no este entre A-Za-z0-9 por un espacio vacio
	   $cadena = trim(ereg_replace("[^ A-Za-z0-9]", "", $cadena));
	   // Inserto el separador antes definido
	   $cadena = ereg_replace("[ \t\n\r]+", $separador, $cadena);
	   return $cadena;
	}
	function tiempohace($valor){
	// FORMATOS:
	// segundos    desde 1970 (función time())        hace_tiempo('12313214');
	// defecto (variable $formato_defecto)        hace_tiempo('12:01:02 04-12-1999');
	// tu propio formato                        hace_tiempo('04-12-1999 12:01:02 [n.j.Y H:i:s]');
	$formato_defecto="H:i:s j-n-Y";
	// j,d = día
	// n,m = mes
	// Y = año
	// G,H = hora
	// i = minutos
	// s = segundos
		if(stristr($valor,'-') || stristr($valor,':') || stristr($valor,'.') || stristr($valor,',')){
			if(stristr($valor,'[')){
				$explotar_valor=explode('[',$valor);
				$valor=trim($explotar_valor[0]);
				$formato=str_replace(']','',$explotar_valor[1]);
			}else{
				$formato=$formato_defecto;
			}
			$valor = str_replace("-"," ",$valor);
			$valor = str_replace(":"," ",$valor);
			$valor = str_replace("."," ",$valor);
			$valor = str_replace(","," ",$valor);
			$numero = explode(" ",$valor);
			$formato = str_replace("-"," ",$formato);
			$formato = str_replace(":"," ",$formato);
			$formato = str_replace("."," ",$formato);
			$formato = str_replace(","," ",$formato);
			$formato = str_replace("d","j",$formato);
			$formato = str_replace("m","n",$formato);
			$formato = str_replace("G","H",$formato);
			$letra = explode(" ",$formato);
			$relacion[$letra[0]]=$numero[0];
			$relacion[$letra[1]]=$numero[1];
			$relacion[$letra[2]]=$numero[2];
			$relacion[$letra[3]]=$numero[3];
			$relacion[$letra[4]]=$numero[4];
			$relacion[$letra[5]]=$numero[5];
			$valor = mktime($relacion['H'],$relacion['i'],$relacion['s'],$relacion['n'],$relacion['j'],$relacion['Y']);
		}
		$ht = time()-$valor;
		if($ht>=2116800){
		$dia = date('d',$valor);
		$mes = date('n',$valor);
		$año = date('Y',$valor);
		$hora = date('H',$valor);
		$minuto = date('i',$valor);
		$mesarray = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		$fecha = "el $dia de $mesarray[$mes] del $año";
		}
		if($ht<30242054.045){$hc=round($ht/2629743.83);if($hc>1){$s="es";}$fecha="hace $hc mes".$s;}
		if($ht<2116800){$hc=round($ht/604800);if($hc>1){$s="s";}$fecha="hace $hc semana".$s;}
		if($ht<561600){$hc=round($ht/86400);if($hc==1){$fecha="ayer";}if($hc==2){$fecha="antes de ayer";}if($hc>2)$fecha="hace $hc d&iacute;as";}
		if($ht<84600){$hc=round($ht/3600);if($hc>1){$s="s";}$fecha="hace $hc hora".$s;if($ht>4200 && $ht<5400){$fecha="hace m&aacute;s de una hora";}}
		if($ht<3570){$hc=round($ht/60);if($hc>1){$s="s";}$fecha="hace $hc minuto".$s;}
		if($ht<60){$fecha="hace $ht segundos";}
		if($ht<=3){$fecha="ahora";}
	return $fecha;
	}
	function Editor($ruta) { ?>
<script type="text/javascript" src="<?=$ruta;?>utilidades/tiny_mce/tiny_mce_gzip.js"></script>
<script type="text/javascript">
	// This is where the compressor will load all components, include all components used on the page here
	tinyMCE_GZ.init({
		plugins : 'spellchecker,pagebreak,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
		themes : 'advanced',
		languages : 'en',
		disk_cache : true,
		debug : false
	});
</script>
<script type="text/javascript">
    tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
			editor_deselector : "mceNoEditor", //para que el textarea no tenga editor
            plugins : "spellchecker,pagebreak,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,formatselect,fontselect,fontsizeselect,insertdate,inserttime",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,cleanup,|,image,forecolor,|,removeformat,visualaid,|,code,preview,fullscreen",
            theme_advanced_buttons3 : "tablecontrols,|,charmap,iespell,media,advhr,|,sub,sup",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            // Skin options
            skin : "o2k7",
            skin_variant : "silver",
            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js",
            // Replace values for the template plugin
            template_replace_values : {
                    username : "Some User",
                    staffid : "991234"
            }
    });
    </script>
	<?php
	}
	function MiniEditor($ruta) { ?>
<script type="text/javascript" src="<?=$ruta;?>utilidades/tiny_mce/tiny_mce_gzip.js"></script>
<script type="text/javascript">
	// This is where the compressor will load all components, include all components used on the page here
	tinyMCE_GZ.init({
		plugins : 'spellchecker,pagebreak,layer,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
		themes : 'advanced',
		languages : 'en',
		disk_cache : true,
		debug : false
	});
</script>
<script type="text/javascript">
    tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
			editor_deselector : "mceNoEditor", //para que el textarea no tenga editor
            plugins : "spellchecker,pagebreak,layer,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,|,sub,sup",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,|,bullist,numlist,|,outdent,indent,blockquote,removeformat,visualaid,|,preview,fullscreen",
            theme_advanced_buttons3 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            // Skin options
            skin : "o2k7",
            skin_variant : "silver",
            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js",
            // Replace values for the template plugin
            template_replace_values : {
                    username : "Some User",
                    staffid : "991234"
            }
    });
    </script>
	<?php
	}
	function EditorCodigo($id, $tipo, $ruta) { ?>
    <script language="Javascript" type="text/javascript" src="<?=$ruta; ?>utilidades/edit_area/edit_area_full.js"></script>
	<script language="Javascript" type="text/javascript">
		// initialisation
		editAreaLoader.init({
			id: "<?=$id; ?>"	// id of the textarea to transform
			,start_highlight: true	// if start with highlight
			,allow_resize: "no"
			,allow_toggle: true
			,word_wrap: true
			,language: "es"
			,syntax: "<?=$tipo; ?>"
		});
	</script>
    <?php
	}
	function Url_Usuario($id, $enlace, $nombres, $target, $raiz) {
		if (!empty($id)) {
			$respuser = mysql_query("select * from usuarios where id='".$id."'"); $user = mysql_fetch_array($respuser);
			if (!empty($user['id'])) {
				if ($enlace==true) { /*caso 1*/
					$final = "<a href=\"".$raiz."".LGlobal::Tipo_URL('com_usuarios', $user['id'], $user['usuario'])."\" target=\"".$target."\">".$user['nombres'].", ".$user['apellidos']."</a>";
				}
				else if ($enlace==false) {
					if ($nombres==true) {
						$final = $user['nombres'].", ".$user['apellidos'];
					}
					else {
						$final = LGlobal::Tipo_URL('com_usuarios', $user['id'], $user['usuario'])."\">".$user['nombres'].", ".$user['apellidos'];
					}
				}
			}
			else { $final = "<em>No existe el Usuario</em>"; }
		}
		else {
			$final = "<em>No Introdujo el id del usuario</em>";
		}
		return $final;
	}
	function IMG_Usuario($id, $raiz) {
		if (!empty($id)) {
			$respuser = mysql_query("select * from usuarios where id='".$id."'"); $user = mysql_fetch_array($respuser);
			if (!empty($user['id'])) {
				if ($user['tipo']==3) {
					$final = $user['imagen'];
				}
				else if ($user['tipo']!=3 and !empty($user['imagen'])) {
					$final = "componentes/com_usuarios/imagenes/".$user['imagen'];
				}
				else { $final = $raiz."/no_disponible.jpg"; }
			}
			else { $final = $raiz."/no_disponible.jpg"; }
		}
		else {
			$final = $raiz."/no_disponible.jpg";
		}
		return $final;
	}
	function Tipo_URL($componente, $id, $titulo){
		$endurlcompo = substr($componente, 4);
		$config = new LagcConfig();
		if(!empty($titulo) and !empty($id)){
			if ($_GET['ver']==$titulo){	$finart="&id=".$id."&ver=".$titulo; } else { $finart="&id=".$id."&ver=".LGlobal::Url_Amigable($titulo); }
		}
		if(!empty($titulo) and !empty($id)){
			if ($_GET['ver']==$titulo){ $finart1="/".$id."-".$titulo."/"; } else { $finart1="/".$id."-".LGlobal::Url_Amigable($titulo)."/"; }
		}
		if ($config->lagctipourl==1) {
			$final = "?lagc=".$componente.$finart;
		}
		else if($config->lagctipourl==2){
			$final = $endurlcompo.$finart1;
		}
		return $final;
	}
	function Tipo_URL_CATEG($componente, $id, $titulo){
		$endurlcompo = substr($componente, 4);
		$config = new LagcConfig();
		if(!empty($titulo) and !empty($id)){
			if ($_GET['ver']==$titulo){	$finart="&id=".$id."&categoria=".$titulo; } else { $finart="&id=".$id."&categoria=".LGlobal::Url_Amigable($titulo); }
		}
		if(!empty($titulo) and !empty($id)){
			if ($_GET['ver']==$titulo){ $finart1="/categoria:".$id."-".$titulo."/"; } else { $finart1="/categoria:".$id."-".LGlobal::Url_Amigable($titulo)."/"; }
		}
		if ($config->lagctipourl==1) {
			$final = "?lagc=".$componente.$finart;
		}
		else if($config->lagctipourl==2){
			$final = $endurlcompo.$finart1;
		}
		return $final;
	}
	function getBrowser(){
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $ub = '';
        if(preg_match('/MSIE/i',$u_agent)){
            $ub = "Internet Explorer";
        }
        elseif(preg_match('/Firefox/i',$u_agent)){
            $ub = "Mozilla Firefox";
        }
        elseif(preg_match('/Safari/i',$u_agent)){
            $ub = "Apple Safari";
        }
        elseif(preg_match('/Chrome/i',$u_agent)){
            $ub = "Google Chrome";
        }
        elseif(preg_match('/Flock/i',$u_agent)){
            $ub = "Flock";
        }
        elseif(preg_match('/Opera/i',$u_agent)){
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent)){
            $ub = "Netscape";
        }
        return $ub;
    }
}
class thumb {
	var $image;
	var $type;
	var $width;
	var $height;
	//---Método de leer la imagen
	function loadImage($name) {
	//---Tomar las dimensiones de la imagen
	$info = getimagesize($name);
	$this->width = $info[0];
	$this->height = $info[1];
	$this->type = $info[2];
	//---Dependiendo del tipo de imagen crear una nueva imagen
	switch($this->type){
		case IMAGETYPE_JPEG:
			$this->image = imagecreatefromjpeg($name);
		break;
		case IMAGETYPE_GIF:
			$this->image = imagecreatefromgif($name);
		break;
		case IMAGETYPE_PNG:
			$this->image = imagecreatefrompng($name);
		break;
		}
	}
	//---Método de guardar la imagen
	function save($name, $quality = 100) {
	//---Guardar la imagen en el tipo de archivo correcto
	switch($this->type){
	case IMAGETYPE_JPEG:
	imagejpeg($this->image, $name, $quality);
	break;
	case IMAGETYPE_GIF:
	imagegif($this->image, $name);
	break;
	case IMAGETYPE_PNG:
	$pngquality = floor(($quality - 10) / 10);
	imagepng($this->image, $name, $pngquality);
	break;
	}
	}
	//---Método de mostrar la imagen sin salvarla
	function show() {
	//---Mostrar la imagen dependiendo del tipo de archivo
	switch($this->type){
		case IMAGETYPE_JPEG:
			imagejpeg($this->image);
		break;
		case IMAGETYPE_GIF:
			imagegif($this->image);
		break;
		case IMAGETYPE_PNG:
			imagepng($this->image);
		break;
	}
	}
	//---Método de redimensionar la imagen sin deformarla
	function resize($value, $prop){
	//---Determinar la propiedad a redimensionar y la propiedad opuesta
	$prop_value = ($prop == 'width') ? $this->width : $this->height;
	$prop_versus = ($prop == 'width') ? $this->height : $this->width;
	//---Determinar el valor opuesto a la propiedad a redimensionar
	$pcent = $value / $prop_value;
	$value_versus = $prop_versus * $pcent;
	//---Crear la imagen dependiendo de la propiedad a variar
	$image = ($prop == 'width') ? imagecreatetruecolor($value, $value_versus) : imagecreatetruecolor($value_versus, $value);
	//---Hacer una copia de la imagen dependiendo de la propiedad a variar
	switch($prop){
	case 'width':
	imagecopyresampled($image, $this->image, 0, 0, 0, 0, $value, $value_versus, $this->width, $this->height);
	break;
	case 'height':
	imagecopyresampled($image, $this->image, 0, 0, 0, 0, $value_versus, $value, $this->width, $this->height);
	break;
	}
	//---Actualizar la imagen y sus dimensiones
	$info = getimagesize($name);
	$this->width = imagesx($image);
	$this->height = imagesy($image);
	$this->image = $image;
	}

	//---Método de extraer una sección de la imagen sin deformarla
	function crop($cwidth, $cheight, $pos = 'center') {

	//---Dependiendo del tamaño deseado redimensionar primero la imagen a uno de los valores
	if(abs($this->width - $cwidth) < abs($this->height - $cheight)){
	   $this->resize($cwidth, 'width');
	}else{
	   $this->resize($cheight, 'height');
	}
	//---Crear la imagen tomando la porción del centro de la imagen redimensionada con las dimensiones deseadas
	$image = imagecreatetruecolor($cwidth, $cheight);
	switch($pos){
	case 'center':
	imagecopyresampled($image, $this->image, 0, 0, abs(($this->width - $cwidth) / 2), abs(($this->height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);
	break;
	case 'left':
	imagecopyresampled($image, $this->image, 0, 0, 0, abs(($this->height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);
	break;
	case 'right':
	imagecopyresampled($image, $this->image, 0, 0, $this->width - $cwidth, abs(($this->height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);
	break;
	case 'top':
	imagecopyresampled($image, $this->image, 0, 0, abs(($this->width - $cwidth) / 2), 0, $cwidth, $cheight, $cwidth, $cheight);
	break;
	case 'bottom':
	imagecopyresampled($image, $this->image, 0, 0, abs(($this->width - $cwidth) / 2), $this->height - $cheight, $cwidth, $cheight, $cwidth, $cheight);
	break;
	}
	$this->image = $image;
	}
}
class ModifiedImage{
	  private $_image;
	  private $_imageType;
	  private $_transparent;
	  private $_validExtensions = array(
		  IMAGETYPE_JPEG => 'image/jpeg',
		  IMAGETYPE_GIF => 'image/gif',
		  IMAGETYPE_PNG => 'image/png',
	  );

	  /**
	   * Original link: http://www.php.net/manual/es/function.imagecopymerge.php#92787
	   * PNG ALPHA CHANNEL SUPPORT for imagecopymerge();
	   * by Sina Salek
	   *
	   * Bugfix by Ralph Voigt (bug which causes it
	   * to work only for $src_x = $src_y = 0.
	   * Also, inverting opacity is not necessary.)
	   * 08-JAN-2011
	   **/
	  private function _imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
		  $cut = imagecreatetruecolor($src_w, $src_h);
		  imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
		  imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
		  imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
	  }

	  private function _setPositionWatermark($width, $height, $position = 'bottom right', $paddingH = 10, $paddingV = 10) {
		  switch(strtolower($position)){
			  case 'top left':
				  $h = $paddingH;
				  $v = $paddingV;
				  break;
			  case 'top center':
				  $h = ($this->getWidth() / 2) - ($width / 2) - $paddingH;
				  $v = $paddingV;
				  break;
			  case 'top right':
				  $h = $this->getWidth() - $width - $paddingH;
				  $v = $paddingV;
				  break;
			  case 'middle left':
				  $h = $paddingH;
				  $v = ($this->getHeight() / 2) - ($height / 2) - $paddingV;
				  break;
			  case 'middle center':
				  $h = ($this->getWidth() / 2) - ($width / 2) - $paddingH;
				  $v = ($this->getHeight() / 2) - ($height / 2) - $paddingV;
				  break;
			  case 'middle right':
				  $h = $this->getWidth() - $width - $paddingH;
				  $v = ($this->getHeight() / 2) - ($height / 2) - $paddingV;
				  break;
			  case 'bottom left':
				  $h = $paddingH;
				  $v = $this->getHeight() - $height - $paddingV;
				  break;
			  case 'bottom center':
				  $h = ($this->getWidth() / 2) - ($width / 2) - $paddingH;
				  $v = $this->getHeight() - $height - $paddingV;
				  break;
			  default:
				  $h = $this->getWidth() - $width - $paddingH;
				  $v = $this->getHeight() - $height - $paddingV;
		  }
		  return array('horizontal'=>$h, 'vertical'=>$v);
	  }

	  public function __construct($fileName=null, $transparent=false) {
		  $this->setTransparent($transparent);
		  if(!is_null($fileName)){
			  $this->load($fileName);
		  }
	  }
	  public function setTransparent($bool){
		  $this->_transparent = (boolean)$bool;
	  }
	  public function getImageType(){
		  return array_key_exists($this->_imageType, $this->_validExtensions)
			  ? $this->_validExtensions[$this->_imageType]
			  : null;
	  }
	  public function isValidExtension() {
		  return array_key_exists($this->_imageType, $this->_validExtensions)
			  ? true
			  : 'Invalid extension, you can upload only ' . implode(', ', $this->_validExtensions);
	  }
	  public function load($fileName){
		  $imageInfo = getimagesize($fileName);
		  $this->_imageType = $imageInfo[2];
		  if($this->_imageType == IMAGETYPE_JPEG){
			  $this->_image = imagecreatefromjpeg($fileName);
		  }
		  elseif($this->_imageType == IMAGETYPE_GIF){
			  $this->_image = imagecreatefromgif($fileName);
		  }
		  elseif($this->_imageType == IMAGETYPE_PNG){
			  $this->_image = imagecreatefrompng($fileName);
		  }
	  }
	  public function save($fileName, $compression = 75, $permissions = null){
		  if($this->_imageType == IMAGETYPE_JPEG){
			  imagejpeg($this->_image, $fileName, $compression);
		  }
		  elseif($this->_imageType == IMAGETYPE_GIF){
			  imagegif($this->_image, $fileName);
		  }
		  elseif($this->_imageType == IMAGETYPE_PNG){
			  imagepng($this->_image, $fileName);
		  }
		  if(!is_null($permissions)) {
			  chmod($fileName, $permissions);
		  }
	  }
	  public function output(){
		  if($this->_imageType == IMAGETYPE_JPEG){
			  imagejpeg($this->_image);
		  }
		  elseif($this->_imageType == IMAGETYPE_GIF){
			  imagegif($this->_image);
		  }
		  elseif($this->_imageType == IMAGETYPE_PNG){
			  imagepng($this->_image);
		  }
	  }

	  public function getWidth(){
		  return imagesx($this->_image);
	  }

	  public function getHeight(){
		  return imagesy($this->_image);
	  }

	  public function resizeToHeight($height){
		  $ratio = $height / $this->getHeight();
		  $width = $this->getWidth() * $ratio;
		  $this->resize($width,$height);
	  }

	  public function resizeToWidth($width){
		  $ratio = $width / $this->getWidth();
		  $height = $this->getHeight() * $ratio;
		  $this->resize($width, $height);
	  }

	  public function scale($scale){
		  $width = $this->getWidth() * $scale / 100;
		  $height = $this->getHeight() * $scale / 100;
		  $this->resize($width, $height);
	  }

	  public function resize($width, $height){
		  $newImage = imagecreatetruecolor($width, $height);
		  if($this->_imageType == IMAGETYPE_PNG && $this->_transparent === true){
			  imagealphablending($newImage, false);
			  imagesavealpha($newImage, true);
			  imagefilledrectangle($newImage, 0, 0, $width, $height, imagecolorallocatealpha($newImage, 255, 255, 255, 127));
		  }
		  elseif($this->_imageType == IMAGETYPE_GIF && $this->_transparent === true){
			  $index = imagecolortransparent($this->_image);
			  if($index != -1 && $index != 255){
				  $colors = imagecolorsforindex($this->_image, $index);
				  $transparent = imagecolorallocatealpha($newImage, $colors['red'], $colors['green'], $colors['blue'], $colors['alpha']);
				  imagefill($newImage, 0, 0, $transparent);
				  imagecolortransparent($newImage, $transparent);
			  }
		  }
		  imagecopyresampled($newImage, $this->_image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		  $this->_image = $newImage;
	  }

	  public function resizeToFit($width, $height, $margins = false, $hexBckColor = '000000') {
		  $ratioW = $width / $this->getWidth();
		  $ratioH = $height / $this->getHeight();
		  $ratio = ($margins === false) ? max($ratioW, $ratioH) : min($ratioW, $ratioH);
		  $newW = floor($this->getWidth() * $ratio);
		  $newH = floor($this->getHeight() * $ratio);

		  $this->resize($newW, $newH);

		  if($newW != $width || $newH != $height) {
			  $newImage = imagecreatetruecolor($width, $height);
			  imagefill($newImage, 0, 0, "0x$hexBckColor");

			  $ox = ($newW > $width) ? floor(($newW - $width) / 2) : 0;
			  $oy = ($newH > $height) ? floor(($newH - $width) / 2) : 0;
			  $dx = ($newW < $width) ? floor(($width - $newW) / 2) : 0;
			  $dy = ($newH < $height) ? floor(($height - $newH) / 2) : 0;

			  imagecopy($newImage, $this->_image, $dx, $dy, $ox, $oy, $newW, $newH);
			  $this->_image = $newImage;
		  }
	  }
	  public function imgWatermark($img, $opacity = 100, $position = 'bottom right', $paddingH = 10, $paddingV = 10){
		  $iw = getimagesize($img);
		  $width = $iw[0];
		  $height = $iw[1];

		  $p = $this->_setPositionWatermark($width, $height, $position, $paddingH, $paddingV);

		  imagealphablending($this->_image, true);
		  $watermark = imagecreatefrompng($img);
		  $this->_imagecopymerge_alpha($this->_image, $watermark, $p['horizontal'], $p['vertical'], 0, 0, $width, $height, $opacity);
		  imagedestroy($watermark);
		  return $this->_image;
	  }

	  public function stringWatermark($string, $opacity = 100, $color = '000000', $position = 'bottom right', $paddingH = 10, $paddingV = 10){
		  $width = imagefontwidth(5) * strlen($string);
		  $height = imagefontwidth(5) + 10;
		  $p = $this->_setPositionWatermark($width, $height, $position, $paddingH, $paddingV);
		  $watermark = imagecreatetruecolor($width, $height);
		  imagealphablending($watermark, false);
		  imagesavealpha($watermark, true);
		  imagefilledrectangle($watermark, 0, 0, $width, $height, imagecolorallocatealpha($watermark, 255, 255, 255, 127));
		  imagestring($watermark, 5, 0, 0, $string, "0x$color");
		  $this->_imagecopymerge_alpha($this->_image, $watermark, $p['horizontal'], $p['vertical'], 0, 0, $width, $height, $opacity);
		  return $this->_image;
	  }
}
?>