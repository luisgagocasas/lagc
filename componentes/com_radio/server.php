<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
function sendMsg($id, $msg) {
  echo "id: $id" . PHP_EOL;
  echo "data: $msg" . PHP_EOL;
  echo PHP_EOL;
  ob_flush();
  flush();
}
if(isset($_GET['user']) && isset($_GET['msg'])){
	$fp = fopen($_GET['room']."_log.txt", 'a');
  $search  = array('adios', 'waaa', 'humillado', 'soñando', 'no te escucho', 'lo siento', 'hola', 'triste');
  $replace = array('<img src="smilies/kucing_ampun.gif" />', '<img src="smilies/kucing_ampun2.gif" />', '<img src="smilies/kucing_begadang.gif" />', '<img src="smilies/kucing_bobo.gif" />', '<img src="smilies/kucing_bosen.gif" />', '<img src="smilies/kucing_capek.gif" />', '<img src="smilies/kucing_hi.gif" />', '<img src="smilies/kucing_hiks.gif" />');
  $mensajefinal = str_replace($search, $replace, $_GET['msg']);
  fwrite($fp, "<div class='msgln'><a href=\"https://www.facebook.com/".$_GET['username']."\" target=\"_blank\"><img src='https://graph.facebook.com/".$_GET['userimgfb']."/picture' /></a><div class='fechar'>".date("F j, Y, g:i:s a")."</div><b>".strip_tags($_GET['user'])."</b>: <br>".$mensajefinal."<br></div>");
  fclose($fp);
}
if(file_exists($_GET['room']."_log.txt") && filesize($_GET['room']."_log.txt") > 0){
    $handle = fopen($_GET['room']."_log.txt", "r");
    $contents = fread($handle, filesize($_GET['room']."_log.txt"));
    fclose($handle);
//deleting file when it get bigger
	if(filesize($_GET['room']."_log.txt")>10000){
		unlink($_GET['room']."_log.txt");
	}
}
sendMsg(time(),$contents);
?>