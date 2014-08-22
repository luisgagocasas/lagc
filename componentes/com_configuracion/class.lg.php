<?php
class InstaladorLG{
	function inicio(){
		//reviso si no existe el archivo de configuracion para ejecutar instalador
		if (!file_exists("administrador/configuracion.lagc.php")){ ?>
			<?php
			$titulo = "Bienvenido al Proceso de instalacion de Lagc Perú";
			$menu = "<li><a onClick=\"muestra('oculto'); oculta('oculto2'); oculta('oculto3');\" />Datos del sitio</a></li>\n";
			$menu .= "<li><a onClick=\"muestra('oculto2'); oculta('oculto'); oculta('oculto3');\" />Accesos de conexion</a></li>\n";
			$menu .= "<li><a onClick=\"muestra('oculto3'); oculta('oculto'); oculta('oculto2');\" />Finalizar</a></li>\n";
			include "componentes/com_configuracion/plantilla.tpl";
			 exit();
		}
	}
	function __Formulario() { ?>
		<?php if (empty($_POST['nombresitio']) and empty($_POST['lema']) and empty($_POST['titulositio']) and empty($_POST['correoprincipal']) and empty($_POST['url'])) { ?>
        <form action="" method="post" name="frm-lg-instalacion">
        <div id="oculto">
        <h2>Datos del sitio</h2>
          <table width="600" border="0" align="center">
            <tr>
              <td bgcolor="#CCCCCC">Nombre del Sitio</td>
              <td><input type="text" name="nombresitio" tabindex="1"></td>
              <td bgcolor="#CCCCCC">Lema del Sitio</td>
              <td><input type="text" name="lema" tabindex="5"></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">Titulo del Sitio</td>
              <td><input type="text" name="titulositio" tabindex="2"></td>
              <td bgcolor="#CCCCCC">E-mail del Sitio</td>
              <td><input type="text" name="correoprincipal" tabindex="6"></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">Url del Sitio</td>
              <td><input type="text" name="url" value="http://<?=$_SERVER['HTTP_HOST']; ?>/" tabindex="3"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">Descripción del Sitio</td>
              <td><input type="text" name="descripcion" tabindex="4"></td>
              <td bgcolor="#CCCCCC">Palabras Claves del Sitio</td>
              <td><input type="text" name="palabras" tabindex="7"></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">Plantilla</td>
              <td>
              <select name="plantillasitio">
              <?php
              if($gestor=opendir('plantillas')) {
                  while (($archivo=readdir($gestor))!==false) {
                      if ((!is_file($archivo))and($archivo!='.')and($archivo!='..')) {
                          echo "<option value=\"".$archivo."\">".$archivo."</option>";
                      }
                  }
              closedir($gestor); 
              }
              ?>
              </select>
              </td>
              <td></td>
              <td></td>
            </tr>
          </table>
          </div>
          <div id="oculto2" style="display: none;">
          <h2>Accesos de conexion</h2>
          <table width="600" border="0" align="center">
            <tr>
              <td bgcolor="#CCCCCC">Mysql</td>
              <td><input name="mysql" type="text" value="localhost" tabindex="1"></td>
              <td bgcolor="#CCCCCC">BD</td>
              <td><input name="bd" type="text" tabindex="3"></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">Usuario</td>
              <td><input name="usuario" type="text" tabindex="2"></td>
              <td bgcolor="#CCCCCC">Contrase&ntilde;a</td>
              <td><input name="contrasenia" type="password" tabindex="4"></td>
            </tr>
          </table>
          </div>
          <div id="oculto3" style="display: none;">
          <h2>Finalizando...</h2>
          <center>
          <table width="600" border="0" align="center">
          <tr><td align="center">
          <div class="lg-instalador-nota">*Si los datos de conexion no son correctos no se podra terminar este proceso.</div><br /><br />
          </td></tr>
          </table>
          <input type="submit" value="Finalizar..." />
          </center>
          </div>
        </form>
        <?php
        }
        else {
            // El contenido del archivo
            $archi = "<?php\n";
            $archi .= "//*****************************************************************************************************\n";
            $archi .= "//*               	Este script permanece libre mientras estas lineas permanezcan intactas\n";
            $archi .= "//*****************************************************************************************************\n";
            $archi .= "//Sistema desarrolldo por: Luis Gago - webmaster@portuhermana.com\n";
            $archi .= "//Copyright (C) 2011 Luis Gago Casas\n";
            $archi .= "//-----------------------------------------------------------------------------------------------------\n";
            $archi .= "//Esta total mente prohibido cambiar la informacion del creador.\n";
            $archi .= "//Se permite crear componentes y modulos\n";
            $archi .= "//Cualquier pregunta a luisgago@lagc-peru.com\n";
            $archi .= "class LagcConfig {\n";
            $archi .= "    //Datos del Sitio\n";
            $archi .= "    var \$lagcnombre = '".$_POST['nombresitio']."';\n";
            $archi .= "    var \$lagctitulo = '".$_POST['titulositio']."';\n";
            $archi .= "    var \$lagclema = '".$_POST['lema']."';\n";
            $archi .= "    var \$lagcmail = '".$_POST['correoprincipal']."';\n";
            $archi .= "    var \$lagcversion = 'MS43LjA=';\n";
            $archi .= "    var \$lagcurl = '".$_POST['url']."';\n";
            $archi .= "    //Mysql\n";
            $archi .= "    var \$lagclocal = '".$_POST['mysql']."';\n";
            $archi .= "    var \$lagcbd = '".$_POST['bd']."';\n";
            $archi .= "    var \$lagcuser = '".$_POST['usuario']."';\n";
            $archi .= "    var \$lagcpass = '".$_POST['contrasenia']."';\n";
            $archi .= "    //Sitio\n";
            $archi .= "    var \$lagckeywords = '".$_POST['palabras']."';\n";
            $archi .= "    var \$lagcdescription = '".$_POST['descripcion']."';\n";
            $archi .= "    var \$lagctipourl = '1';\n";
            $archi .= "    var \$lagcactivo = '1';\n";
            $archi .= "    var \$lagcactivmensaje = 'En un momento estaremos activando la pagina web Vuelva en unos momentos.';\n";
            $archi .= "    var \$lagccompopri = '5';\n";
            $archi .= "    //Gestion de Contenidos\n";
            $archi .= "    var \$lagctempladmin = 'lagc-peru';\n";
            $archi .= "    var \$lagctemplsite = '".$_POST['plantillasitio']."';\n";
            $archi .= "}\n";
            $archi .= "    \$config = new LagcConfig();\n";
            $archi .= "    @\$con = mysql_connect(\$config->lagclocal,\$config->lagcuser,\$config->lagcpass);\n";
            $archi .= "    @mysql_select_db(\$config->lagcbd,\$con) or die(\"<center>No hay conexion.</center>\");\n";
            $archi .= "?>";
            
            @$con = mysql_connect($_POST['mysql'],$_POST['usuario'],$_POST['contrasenia']);
            @mysql_select_db($_POST['bd'],$con) or die("<center>No hay conexion.<br><a href=\"\">Vuelve a intentarlo</a></center>");
            // Se abre el archivo (si no existe se crea)
            $archivo = fopen('administrador/configuracion.lagc.php', 'w');
            $error = 0;
            if (!isset($archivo)) {
                $error = 1;
                print "No se ha podido crear/abrir el archivo.<br />";
            }elseif (!fwrite($archivo, $archi)) {
                $error = 1;
                print "No se ha podido escribir en el archivo.<br />";
            }
			echo "<center><iframe src=\"componentes/com_configuracion/bigdump.php?server=".$_POST['mysql']."&name=".$_POST['bd']."&username=".$_POST['usuario']."&password=".$_POST['contrasenia']."\" width=\"600\" marginwidth=\"5\" height=\"280\" marginheight=\"5\" scrolling=\"no\" frameborder=\"0\"></iframe></center>";
            @fclose();
            if ($error == 0) {
				echo "<div>";
				echo "<ul>";
				echo "<li>Para terminar debe Importar el archivo a Mysql o haga clic en el enlace de arriva (<strong>Iniciar la Importación</strong>).</li>";
				echo "<li>En el caso que salga un mensaje de error borre el archivo de configuracion y vuelva a intentarlo.</li>";
				echo "</ul>";
				echo "</div>";
				echo "<center><h3>El archivo de configuracion ''<strong>Se creo correctamente</strong>''.</h3>";
				echo "<a href=\".\"><h4>Listo<br>Ver Pagina Clic Aqui</h4></a>";
				echo "</center>";
            }
        }
	}
}
?>
<?php
if (!isset($_GET['lg'])) { InstaladorLG::inicio(); }
if($_GET['lg']=="p") { InstaladorLG::Parte1(); } ?>