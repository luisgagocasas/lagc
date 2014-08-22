<?php include "cwhois.php"; ?>
<html>
<head>
<title><?=$_GET['domain']; ?> : Dominios - Lagc-peru.com</title>
</head>
<body>
<p> <a href="javascript:window.close()">Cerrar Ventana</a></p>
<?php
// The following line gets the url variables and is used by the demo.
if (!empty($HTTP_GET_VARS)) while(list($name, $value) = each($HTTP_GET_VARS)) $$name = $value;
$i=cWhois($domain,$domext,$reg);
if ($i==4) {
  print("<font face=\"Arial\">Sorry but you are not allowed access to this script<BR></FONT>");
  exit;
}
if ($i==5) {
  print("<font face=\"Arial\">Could not connect to $DomType whois server<BR></font>");
}
if ($i==2) {
  print("<font face=\"Arial\">Domain extension $DomType not recognised<BR></font>");
}
if ($i==3) {
  print("<font face=\"Arial\">$Domain$DomType is not a valid domain name</font>");
}
if (($i==0) || ($i==1)  || ($i==6)) {
  for($index=0;$index<count($reg);$index++) {
    print("$reg[$index]<BR>");
  }
}
?>
<p> <a href="javascript:window.close()">Cerrar Ventana</a></p>
</body>
</html>