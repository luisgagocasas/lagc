<?php
require ("../../administrador/configuracion.lagc.php");
require "../../administrador/componentes/com_sistema/function.globales.php";
$config = new LagcConfig();
// Conexion a la base de datos
$conexion = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
mysql_select_db($config->lagcbd, $conexion);
if(!empty($_GET['categoria'])){
	$filtrar = "and b_categoria='".$_GET['categoria']."'";
}
$resp_noticias = mysql_query("select * from blog_articulos where b_activo='1' ".$filtrar." order by b_id DESC");
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="iso-8859-1"?>';
echo "\n";
echo '<rss version="2.0">
<channel>
	<title>'.$config->lagcnombre.': '.$config->lagctitulo.'</title>
	<link>'.$config->lagcurl.'</link>
	<description>'.$config->lagcdescription.'</description>
	<language>es</language>
	<docs>'.$config->lagcurl.'componentes/com_blog/rss.php</docs>
	<generator>Lagc Peru</generator>
	<author>
		<name>Luis Gago Casas</name>
		<url>http://lagc-peru.com/</url>
		<email>luisgago@lagc-peru.com</email>
	</author>
	<managingEditor>'.$config->lagcmail.'</managingEditor>
	<webMaster>'.$config->lagcmail.'</webMaster>';
	echo "\n";
// creamos documento si existen tutoriales nuevos
while ($noticias = mysql_fetch_array($resp_noticias)) {
$resp_noticias_categoria = mysql_query("select * from blog_categorias where cat_activado='1' and cat_id='".$noticias['b_categoria']."'");
	$noticias_categoria = mysql_fetch_array($resp_noticias_categoria);
		echo '<item>
			<title>['.$noticias_categoria['cat_nombre'].'] - '.$noticias['b_titulo'].'</title>
			<description>' . $noticias['b_resumen'] . ' [...]</description>
			<comments>'.$config->lagcurl.LGlobal::Tipo_URL('com_blog', $noticias["b_id"], $noticias["b_titulo"]).'#lagc</comments>
			<creator>Lagc Peru</creator>
			<pubDate>'.date("D, j M Y G:i:s T", $noticias['b_fecha']).'</pubDate> 
			<category>'.$noticias_categoria['cat_nombre'].'</category>
			<author><![CDATA[';
			echo LGlobal::Url_Usuario($noticias['b_autor'], false, true, "", "");
			echo ']]></author>
			<link>'.$config->lagcurl.LGlobal::Tipo_URL('com_blog', $noticias["b_id"], $noticias["b_titulo"]).'</link>
		</item>';
		echo "\n";
}
echo '</channel>';
echo "\n";
echo '</rss>';
?>