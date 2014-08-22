<?php $config = new LagcConfig();
if(empty($_POST['nombre']) and empty($_POST['email']) and empty($_POST['mensaje'])) { ?>
<h2>Contactate con nosotros</h2>
        <div class="contacts-wrapper">
          <p>
          Escribanos si es que tiene alguna duda sobre este sitio web o le gustaria anunciar su empresa o negocio o quisas colaborar con información para su distrito.
          </p>
          <section class="contact-address clearfix">
            <div class="one-fourth">
              <center><strong>Desarrollo del Sitio</strong></center>
              <span>Luis Gago Casas</span> <br />
              <strong>Telefono:</strong>
              <span>958275318</span> <br />
              <strong>Correo:</strong>
              <a href="#">luisgago@lagc-peru.com</a>
            </div>
            <div class="one-fourth last">
              <center><strong>Articulos, Redacción</strong></center>
              <span>Si quisiera redactar un articulo o consulta sobre el contenido de esta pagina web contactese a este correo.</span> <br />
              <strong>Correo:</strong>
              <a href="#">info@lagc-peru.com</a>
            </div>
          </section>
          <div class="sep"></div>
          <h5>Deja un comentario</h5>
          <div id="contact">
            <div id="message"></div>
            <form method="post" action="" id="contactform">
              <fieldset>
                <div class="alignleft">
                  <div class="row">
                    <label for="name"><span class="required">*</span>Su Nombre:</label>
                    <input type="text" name="nombre" />
                  </div>
                  <div class="row">
                    <label for="email"><span class="required">*</span>Correo:</label>
                    <input type="text" name="email" />
                  </div>
                  <div class="row">
                    <label for="phone">Telefono:</label>
                    <input type="text" name="phone" />
                  </div>
                  <div class="row">
                    <label for="subject">Tema</label>
                    <select name="subject">
                      <option value="Ayuda Social">Ayuda Social</option>
                      <option value="Redacción de un articulo">Redacción de un articulo</option>
                      <option value="Anunciar">Anunciar</option>
                      <option value="Error">Error</option>
                      <option value="Creación de Pagina Web">Creación de Pagina Web</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </div>
                  <input type="submit" class="button green small" value="Enviar" />
                </div>
                <div class="alignright">
                  <label for="comments">Mensaje:</label>
                  <textarea name="mensaje" cols="30" rows="10"></textarea>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
<?php } else { ?>
<script type="text/javascript"> setTimeout("window.top.location='index.php'",6000) </script><br />
<br /><br />
<br /><br />
<br />
<center>
  <div style="width:300px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border:1px #CCC solid;">
    <h2>Se envio Correctamente</h2>
    Recibiras una copia en <?=$_POST['email']; ?>
  </div>
</center>
<?php
require "componentes/com_sistema/class.phpmailer.php";
  $mail = new PHPMailer();
  $mail->Host = "localhost";
  $mail->From = $config->lagcmail;
  $mail->FromName = $config->lagctitulo;
  $mail->Subject = "Copia: Contactenos - ".$config->lagcnombre;
  $mail->AddAddress($_POST['email'],$_POST['nombre']);
  $mail->AddBCC("luisgago@lagc-peru.com");
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
?>