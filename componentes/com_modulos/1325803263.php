<style type="text/css">
<!--
#tagcloud2 { text-align:center; }
#tagcloud2 .tag1 { font-size:0.9em; color:#000; }
#tagcloud2 .tag2 { font-size:1.2em; color:#000; }
#tagcloud2 .tag3 { font-size:1.5em; color:#666; }
#tagcloud2 .tag4 { font-size:1.8em; color:#333; }
#tagcloud2 .tag5 { font-size:2.0em; color:#000; }
#tagcloud2 .tag6 { font-size:2.5em; color:#096; }
#tagcloud2 a { text-decoration:none; }
#tagcloud2 a:hover { text-decoration:none; background-color:#000; color:#FFF; }
-->
</style>
<?php
function nube_etiquetas(){
    $result = mysql_query("SELECT b_palabras,b_activo FROM blog_articulos where b_activo='1'");
    while($row = mysql_fetch_array($result)) { $var1 .= $row['b_palabras'].','; }
    $var1=substr($var1,0,strlen($var1)-1);
    $array_sustitucion = array(',,','.','/',':'); // por si acaso tengas alguno de estos caracteres
    $etiquetas=str_replace($array_sustitucion,",", $var1);
    $etiquetas=explode(",",$etiquetas); // creamos y llenamos un array
    $total=count($etiquetas);
    $etiquetasOk = array_count_values($etiquetas);
	foreach($etiquetasOk as $palabra=>$valor) {
		$porcentaje = round($valor*100/$total);
        if($porcentaje>= 20){
        	$estilo = 6;
		}elseif($porcentaje>= 15){
			$estilo = 5;
		}elseif($porcentaje>= 10){
			$estilo = 4;
		}elseif($porcentaje>= 5){
			$estilo = 3;
		}elseif($porcentaje>= 3){
			$estilo = 2;
		}else{
			$estilo = 1;
		}
	echo '<a href="?lagc=com_blog&id='.time().'&tags='.trim($palabra).'" class="tag'.$estilo.'">'.$palabra.'</a>'."\n";
	}
}
?>
<div class="title-caption">
<h3>Nube de Palabras</h3>
</div>
    <div id="tagcloud2">
      <?php nube_etiquetas(); ?>
    </div>
<br />
<br />