<?php
require ("../../administrador/configuracion.lagc.php"); $config = new LagcConfig();
include "cwhois.php";
// $allowed should be a list of authorised callers seperated by commas, If you don't care leave it blank
// Be careful if you call this in a new browser window as the referer may be blank.
$allowed="";
?>
<?php
// As we only want to support some domains we will clear the full array supported by cWhois
// and define the ones we want below. See cwhois.php for full list
foreach($dtd as $val)
    unset($dtd);
$dtd[]=".com,whois.crsnic.net,no match";
$dtd[]=".net,whois.crsnic.net,no match";
$dtd[]=".org,whois.publicinterestregistry.net,not found";
$dtd[]=".info,whois.afilias.net,not found";
$dtd[]=".us,whois.nic.us,not found";
$dtd[]=".es,*eswhois,encontrado";
$dtd[]=".tv,*tvwhois,is available";
$dtd[]=".biz,whois.neulevel.biz,not found";
$dtd[]=".cc,whois.nic.cc,no match";
$dtd[]=".fm,*fmwhois,no match";
// The following line gets the url variables and is used by the demo.
if (!empty($HTTP_GET_VARS)) while(list($name, $value) = each($HTTP_GET_VARS)) $$name = $value;
?>
<html>
<head>
<title></title>
</head>
<body>
<link href="estilos.css" rel="stylesheet" type="text/css">
<script>
function nueva_ventana(url, ancho, alto, barra) {
   izquierda = (screen.width) ? (screen.width-ancho)/2 : 100
   arriba = (screen.height) ? (screen.height-alto)/2 : 100
   opciones = 'toolbar=0, location=0, directories=0, status=0, menubar=0, resizable=0, scrollbars=' + barra + ', width=' + ancho + ', height=' + alto + ', left=' + izquierda + ',  top=' + arriba;
   window.open('whois.php?domain='+url, 'Cliente', opciones)
}
</script>
<h2>Estado de un Dominio</h2>
<?php
  // Create table with one checkbox per domain extension
  $columns=5;
  echo "<div class=\"form-dominios\">\n";
  print("<form name=\"form1\"  method=\"get\" action=\"\">\n");
  print("<font face=\"Arial\">");
  print("<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"424\">\n");
  print("<tr>\n");
  print("<td width=\"424\" colspan=\"$columns\">\n");
  print("<p><input type=\"text\" name=\"domain\" value=\"$domain\" class=\"form-imput\" size=\"30\">&nbsp;&nbsp;<input type=\"submit\" name=\"Check\" class=\"btn-buscar\" value=\"comprobar\"></p>\n");
  print("<p><input type=\"hidden\" name=\"action\" value=\"check\"></p>\n");
  print("</td>\n");
  print("</tr>\n");
  print("<tr>\n");
  for ($c=1;$c<=$columns;$c++) {
    print("<td>\n");
    print("&nbsp;\n");
    print("</td>\n");
  }
  print("</tr>\n");
  $nde=count($dtd);
  $de=1;
  while($de<=$nde) {
    print("<tr>\n");
    for ($c=1;$c<=$columns;$c++) {
      print("<td>\n");
      if ($de<=$nde) {
        $dt=strtok($dtd[$de-1],",");
        print("<p><input type=\"checkbox\" id=\"".$de."_field\" name=\"cb$de\"");
	if ($action=="check"){
          $var="cb".$de;
          if (strcasecmp($$var,"on")==0)
	  print(" checked ");
	}
	print("><label for=\"".$de."_field\">$dt</label></p>\n");
        $de++;
      }
      print("</td>\n");
    }
    print("<tr>\n");
    for ($c=1;$c<=$columns;$c++) {
      print("<td>\n");
      print("&nbsp;\n");
      print("</td>\n");
    }
    print("</tr>\n");
    print("</tr>\n");
  }
  print("</table>");
  print("</form>\n");
  // If check clicked then create table of results
  if ($action=="check") {
    print("<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" width=\"100%\">\n");
    for ($k=1;$k<=$nde;$k++) {
      $var="cb".$k;
      if (strcasecmp($$var,"on")==0) {
        print("<tr class=\"dominio-opcion\" onMouseover=this.className=\"dominioopcion\" onMouseout=this.className=\"dominio-opcion\">\n");
        $dt=strtok($dtd[$k-1],",");
				$Reg="*"; // Putting a * in $Reg flags to cWhois not too bother getting full whois data just availablity.
    	  					// With some registry databases this can speed up the request. (optional)
        $i=cWhois($domain,$dt,$Reg);
        print("<td align=\"center\" valign=\"middle\">\n");
        print("$domain$dt");
	print("</td>\n");
        print("<td align=\"center\" valign=\"middle\">\n");
	if ($i==0)
	  print("<a href=\"".$config->lagcurl."?lagc=com_whois&id=compar_dominio&dominio=$domain$dt\" target=\"_top\">Disponible</a>");
	if ($i==6)
	  print("Available Premium");
	if ($i==1)
	  print("Ya está registrado");
	if ($i==2)
	  print("El tipo de dominio no es compatible");
	if ($i==3)
	  print("Nombre de dominio no válido");
	if ($i==5)
	  print("no puede contactar con el servidor whois");
	print("</td>\n");
	if ($i==1) {
		print("<td align=\"center\" valign=\"middle\">\n");
		print("<a href=\"javascript:nueva_ventana('$domain$dt', 500, 300, 0);\">Ver Detalles</a>");
		print("</td>\n");
	}
        print("</tr>\n");
      }
    }
    print("</table>");
    print("</font>");
	echo "</div>";
  }
?>
<br><br>
</body>
</html>