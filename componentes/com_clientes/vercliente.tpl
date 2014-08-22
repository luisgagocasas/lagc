<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
<!--<script src="componentes/com_clientes/jquery.livetwitter.js" type="text/javascript"></script>-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=117397565009018";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<table width="640" border="0">
  <tr>
    <td colspan="3" align="center" valign="top" style="padding:10px 10px;">
    	<div class="cliente-completo"><?=Clientes::VerFoto($Cliente['cl_imagen'], $Cliente['cl_nombre']); ?></div>
    </td>
    <td width="417" valign="top">
      <u>Empresa Encargada:</u> <strong><?=$Cliente['cl_empresa']; ?></strong>
      <?php if (!empty($Cliente['cl_web'])) { ?><br><u>Sitio Web:</u> <strong><?=Clientes::VerEnlace($Cliente['cl_web']); ?></strong><?php } ?>
      <?php if (!empty($Cliente['cl_descipcion'])) { ?><br><u>Descripción:</u> <?=$Cliente['cl_descipcion']; ?><?php } ?>
    </td>
  </tr>
  <tr>
    <td width="52" align="right" valign="top"><g:plusone href="<?=$config->lagcurl; ?>" size="tall"></g:plusone></td>
    <td width="78" align="center" valign="top"><div class="espacio1"></div><a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="lagcperu" data-text="<?=$config->lagctitulo; ?>">Tweet</a></td>
    <td width="75" align="center" valign="top"><div class="espacio1"></div><div class="fb-like" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_clientes', $_GET['id'], $_GET['ver']);?>" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="4" align="center" valign="top"><br />
    <h4>Mensiones en Twitter sobre "<?=$Cliente['cl_nombre']; ?>"</h4>
  	  <div id="twitterSearch" class="tweets"></div>
  	  <script type="text/javascript">
		// Basic usage
		$('#twitterSearch').liveTwitter('<?=$Cliente['cl_nombre']; ?>', {limit: 10, rate: 5000});
		// Changing the query
		$('#searchLinks a').each(function(){
			var query = $(this).text();
			$(this).click(function(){
				// Update the search
				$('#twitterSearch').liveTwitter(query);
				// Update the header
				$('#searchTerm').text(query);
				return false;
			});
		});

	</script>    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<center><a href="<?=LGlobal::Tipo_URL('com_clientes'); ?>">Ver Todos</a></center>