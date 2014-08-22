<?php
require "../../administrador/configuracion.lagc.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.contenidos.php"; $config = new LagcConfig(); //Conexion
$rptMusica = mysql_query("select * from music_canciones where song_id='".$_GET['cantanteid']."'");
$Musica = mysql_fetch_array($rptMusica);
if (!empty($Musica['song_id']) and $_GET['cantantetitle']==LGlobal::Url_Amigable($Musica['song_titulo'])) {
	$rptUsuarios = mysql_query("select * from usuarios where id!=1 and id!=2 and id!='".$_COOKIE['user_lagc']."' and activo='1'  order by nombres ASC");
?>
<html>
<head>
	<title>Dedicar: <?=$Musica['song_titulo']; ?></title>
  <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
  <link href="estilos.css" rel="stylesheet" type="text/css" />
  <link href="estilos_flotante.css" rel="stylesheet" type="text/css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script type="text/javascript">
  function limita(elEvento, maximoCaracteres, nombre) {
    var elemento = document.getElementById(nombre);
    // Obtener la tecla pulsada
    var evento = elEvento || window.event;
    var codigoCaracter = evento.charCode || evento.keyCode;
    // Permitir utilizar las teclas con flecha horizontal
    if(codigoCaracter == 37 || codigoCaracter == 39) {
      return true;
    }
    // Permitir borrar con la tecla Backspace y con la tecla Supr.
    if(codigoCaracter == 8 || codigoCaracter == 46) {
      return true;
    }
    else if(elemento.value.length >= maximoCaracteres ) {
      return false;
    }
    else {
      return true;
    }
  }
  function actualizaInfo(maximoCaracteres, nombre, notificar) {
    var elemento = document.getElementById(nombre);
    var info = document.getElementById(notificar);
    if(elemento.value.length >= maximoCaracteres ) {
      info.innerHTML = "M&aacute;ximo "+maximoCaracteres+" caracteres";
    }
    else {
      info.innerHTML = "Te quedan "+(maximoCaracteres-elemento.value.length)+" caracteres";
    }
  }
  function revisar() {
    if(dedicatoria.para.value == "") {
      alert('Seleccione el usuario a quien le enviara la dedicatoria.');
      document.getElementById("para").selectedIndex = 0;
      dedicatoria.para.focus();
      return false;
    }
    if(dedicatoria.mensaje.value.length < 1) {
      alert('Escribe un mensaje...');
      dedicatoria.mensaje.focus();
      return false;
    }
    else {
      dedicatoria.submit();
    }
  }
  </script>
</head>
<body>
<?php if(!empty($_COOKIE["user_lagc"])) {
  if(empty($_POST['para']) and empty($_POST['mensaje'])){ ?>
    <form action="" name="dedicatoria" method="post">
    <div class="dedi_titulo">
    	Dedicar Cancion <b> <?=$Musica['song_titulo']; ?></b> de <?=Musica::_LGMCantante($Musica['song_id_cantante'], "cantan_nombre"); ?>.
    </div>
    <table class="dedi_tabletipou">
    	<tr>
    		<td>
    <table>
    	<tr>
    		<td align="center">De:<div class="cont_divisor"></div></td>
    		<td align="left"><?=LGlobal::Url_Usuario($_COOKIE["user_lagc"], false, true, "_blank", ""); ?><div class="cont_divisor"></div></td>
    	</tr>
    	<tr>
    		<td align="center" valign="middle"><br><br><br>Para:<br><br><br><br><br><div class="cont_divisor"></div></td>
    		<td>
    		<select name="para" id="para" size="7" class="dedi_select">
    			<?php
    			while($Usuario = mysql_fetch_array($rptUsuarios)){
    				echo "<option value=\"".$Usuario['id']."\">".$Usuario['nombres'].", ".$Usuario['apellidos']." (".$Usuario['usuario'].")</option>\n";
    			}
    			?>
    		</select>
        <div class="cont_divisor"></div>
    		</td>
    	</tr>
    	<tr>
    		<td><br><br>Mensaje:<br><br><br><div class="cont_divisor"></td>
    		<td><textarea name="mensaje" class="dedi_mensaje" placeholder="Escribe un mensaje..." id="form-textarea" name="resumen" onkeypress="return limita(event, 255, 'form-textarea');" onkeyup="actualizaInfo(255, 'form-textarea', 'info')"></textarea>
    			<div class="cont_divisor"></div>
    			<div id="info">M&aacute;ximo 255 caracteres</div>
    			</td>
    	</tr>
    </table>
    		</td>
    		<td>Dise&#241;o del Regalo<br>
          <table>
            <tr>
              <td align="center" style="padding:2px 5px;"><img src="imagenes/bg_regalo04.jpg"><br><input type="radio" name="bg1" checked value="1"></td>
              <td align="center" style="padding:2px 5px;"><img src="imagenes/bg_regalo01.jpg"><br><input type="radio" name="bg1" value="2"></td>
            </tr>
            <tr>
              <td align="center" style="padding:2px 5px;"><img src="imagenes/bg_regalo02.jpg"><br><input type="radio" name="bg1" value="3"></td>
              <td align="center" style="padding:2px 5px;"><img src="imagenes/bg_regalo03.jpg"><br><input type="radio" name="bg1" value="4"></td>
            </tr>
          </table><br>
          <div class="cont_divisor"></div>
          <input type="checkbox" name="sonido" value="1">Activar Sonido
          <div class="cont_divisor"></div>
          <br><b> *NOTA:</b> Se enviara una url unica con la cual podra acceder a la dedicatoria.
          <br><br>
          <table class="dedi_tabletipou">
          <tr>
            <td><a href="javascript:document.dedicatoria.reset();" class="dedi_pest dedi_desact">Restablecer</a></td>
            <td><a href="javascript:revisar();" class="dedi_pest dedi_activ">Enviar</a></td>
          </tr>
          </table>
        </td>
    	</tr>
    </table>
    </form>
    <?php
      }
      else {
        $respu1 = mysql_query("select * from usuarios where id='".$_COOKIE["user_lagc"]."'"); $user1 = mysql_fetch_array($respu1);
        $respu2 = mysql_query("select * from usuarios where id='".$_POST['para']."'"); $user2 = mysql_fetch_array($respu2);
        ?>
        <script type="text/javascript">
        $(document).ready(function(){
          $("#textovisible").delay(1000).hide("explode", { pieces: 100 }, 500, function(){
            $("#textovisible").empty();
          });
          $("#textovisible").delay(0).show("explode", { pieces: 50 }, 500, function(){
            argumentos = "<div id=\"textovisible2\">Aqui sus datos de envio...</div>";
            $(argumentos).appendTo("#textovisible");
            return false;
          });
        });
        </script>
        <center>
          <div id="textovisible">
            <h2>Se esta enviando ....</h2>
            <img src="imagenes/loading.gif" alt="Cargando ...">
          </div>
        </center>
        <?php
        require "../../componentes/com_sistema/class.phpmailer.php";
        $mail = new PHPMailer();
        $mail->Host = "localhost";
        $mail->From = $config->lagcmail;
        $mail->FromName = $user1['nombres'].", ".$user1['apellidos'];
        $mail->Subject = $user1['nombres'].", ".$user1['apellidos'].", Te envio una dedicatoria desde ".$config->lagcnombre;
        $mail->AddAddress($user2['email'],$user2['nombres'].", ".$user2['apellidos']);
        $mail->ClearAddresses();
        $mail->AddAddress($user1['email'],$user1['nombres'].", ".$user1['apellidos']);
        $mail->AddBCC("info@lagc-peru.com");
        $body  = "
        <style>
        .contenidomensaje{
          border:1px #FFF;
          width:450px;
          padding:5px 5px 5px 5px;
          color:#000;
          -border-radius: 4px 4px 4px 4px;
          moz-border-radius: 4px 4px 4px 4px;
          -webkit-border-radius: 4px 4px 4px 4px;
          -moz-box-shadow:00px 0px 10px -1px #000000;
          -webkit-box-shadow:0px 0px 10px -1px #000000;
          box-shadow:0px 0px 10px -1px #000000;
          margin:0px auto;
        }
        .logom{
          -border-radius: 4px 4px 0px 0px;
          moz-border-radius: 4px 4px 0px 0px;
          -webkit-border-radius: 4px 4px 0px 0px;
          background:#000;
          width:450px;
          height:80px;
          margin:0px auto;
        }
        .piep{
          -border-radius: 0px 0px 4px 4px;
          moz-border-radius: 0px 0px 4px 4px;
          -webkit-border-radius: 0px 0px 4px 4px;
          background:#000;
          width:450px;
          height:40px;
          margin:0px auto;
          font-size:10px;
          color:#FFF;
          letter-spacing:2px;
        }
        .piep a,a:hover{
          color:#C36;
        }
        .texto2{
          color:#000;
          font-size:12px;
          font-family:Arial, Helvetica, sans-serif;
          letter-spacing:1px;
          text-align:left;
        }
        </style><center>
        <table border=\"0\">
          <tr>
            <td width=\"100\"></td>
            <td>
        <div class=\"contenidomensaje\">
        <div class=\"logom\"><center><img src=\"".$config->lagcurl."plantillas/portuhermana/images/logo-xth.png\"></center></div>
        <table border=\"0\" class=\"texto2\">
        <tr>
        <td>Nombre:</td><td>".$_POST['nombre']."</td>
        </tr>
        <tr>
        <td bgcolor=\"#CCCCCC\">Edad:</td><td bgcolor=\"#CCCCCC\">".$_POST['email']."</td>
        </tr>
        <tr>
        <td>Celular:</td><td>".$_POST['phone']."</td>
        </tr>
        <tr>
        <td bgcolor=\"#CCCCCC\">Correo:</td><td bgcolor=\"#CCCCCC\">".$_POST['subject']."</td>
        </tr>
        <tr>
        <td>Facebook:</td><td>".$_POST['mensaje']."</td>
        </tr>
        </table>
        <div class=\"piep\"><br />
        <center>Este mensaje es una copia de sus datos.<br />
        <a href=\"".$config->lagcurl."\" target=\"_blank\">".$config->lagcurl."</a></center>
        </div>
        </div><br />
        <div class=\"texto2\" style=\"font-size:9px; text-align:center;\">
        El mensaje fue generado desde ".$config->lagcurl." - Con el Gestor <a href=\"http://www.lagc-peru.com/\" target=\"_blank\">Lagc Per&uacute</a><br>Desarrollado por: Luis Gago Casas<br>
        Creación de Paginas web - http://www.lagc-peru.com/ - Arequipa Per&uacute
        </div></center></td>
          </tr>
        </table>";
        $mail->MsgHTML($body);
        $mail->Send();
      }
    } else { ?><br><br><br><br><br><br><br>
    <center>
    <div class="dedi_titulo" style="width:300px; height:50px;"><br>
      Primero tienes que identificarte. <a href="/?lagc=com_usuarios&id=entrar" target="_top">Clic Aqui</a>.
    </div>
  </center><br><br>
    &raquo; <a href="?lagc=com_usuarios&id=registro">Registrate</a><br />
    &raquo; <a href="?lagc=com_usuarios&id=perdiocontra">&#191;Olvido su Contrase&#241;a?</a>
    <?php } ?>
</body>
</html>
<?php } else { echo "No existe esta cancion"; } ?>