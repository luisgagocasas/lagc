<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=117397565009018";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div style="float:right;">
<form action="/" method="get">
<center>
<div class="radio-frm">
<input name="lagc" type="hidden" value="com_catalogodeltron" />
<input name="id" type="hidden" value="buscar" />
<label><input type="radio" name="tb" value="1" checked="checked" />Codigo</label>
<label><input type="radio" name="tb" value="2" />Mini Codigo</label>
</div>
</center>
<input name="palabra" class="campo-texto">
<input type="submit" value="Buscar" class="btn-buscar">
</form><br />
</div>
<h2><?=$producto['cp_pcodigo']; ?></h2><br /><br />
<table width="900" border="0" class="tabla2">
  <tr>
    <td width="270" colspan="3" align="center" valign="middle"><?=SistemaCatalogo::NombreMarca($producto['cp_pmarca'], "imagen"); ?></td>
    <td align="left" valign="middle">
      <div class="lineaubicacion">
        <a href="<?=LGlobal::Tipo_URL('com_catalogodeltron'); ?>">Inicio</a> > 
        <?=SistemaCatalogo::NombreGrupo($producto['cp_ptipo']); ?> > 
        <?=SistemaCatalogo::NombreMarca($producto['cp_pmarca'], "nombre"); ?> > 
        <?=SistemaCatalogo::NombreLinea($producto['cp_plinea']); ?>
      </div>
    </td>
  </tr>
  <tr>
    <td width="270" colspan="3" align="center" valign="middle"><br /><br />
    <b style="font-size:10px;">CODIGO</b>
    <div class="codigos-productos">
    <b><?=$producto['cp_pcodigo']; ?></b>
    <br /><br />
    mini-c&oacute;digo: <?=$producto['cp_pid']; ?>
    </div>
    </td>
    <td valign="top">
      <?=$producto['cp_pdescripcion']; ?>
      <br /><br />
      <u>Tipo de Producto</u> : <b><?=SistemaCatalogo::tipoproducto($producto['cp_ptipopro']); ?></b><br />
      <u>Tipo Operatividad</u> : <b><?=SistemaCatalogo::tipooperatividad($producto['cp_ptipoope']); ?></b>
    </td>
  </tr>
  <tr>
    <td width="270" height="300" colspan="3" align="center" valign="middle">
    <?php echo SistemaCatalogo::ImgPrincipal($producto['cp_pid']); ?>
    </td>
    <td valign="top"><a name="imagenes"></a>
      <div class="contenido-producto">
        <h3>CARACTERISTICAS :</h3>
        <?=$producto['cp_pcaracteristicas']; ?>
      </div>
    </td>
  </tr>
  <tr>
    <td width="270" colspan="3" align="left" valign="top">
    <span style="font-size:14px; margin:55px 5px;"><strong>Imagenes</strong></span>
    <?=SistemaCatalogo::ImgLista($producto['cp_pid']); ?>
    </td>
    <td>
      <div class="indicaciones-producto">
        <h3>INDICACIONES</h3>
        <ul>
          <li>Las imagenes s&oacute;lo son referenciales.</li>
          <li>Esta informaci&oacute;n se basa no s&oacute;lo en la revisi&oacute;n de nuestro personal t&eacute;cnico sino adem&aacute;s se complementa con toda la informaci&oacute;n disponible publicada por el fabricante, raz&oacute;n por la cual no nos podemos responsabilizar por la exactitud de la misma.</li>
        </ul>
        <h3>COMENTARIO DE <?=strtoupper(LGlobal::Url_Usuario($producto['cp_pusuario'], false, true, "_blank", "../")); ?> (creador de este producto)</h3>
        <?=$producto['cp_pcomentario']; ?>
      </div>
    </td>
  </tr>
  <tr>
    <td width="270" colspan="3" valign="top"><br /><br />
    <span style="font-size:14px; margin:55px 5px;"><strong>Stock en nuestros Almacenes:</strong></span>
    <div class="alamcenes-stock">
    <?=SistemaCatalogo::ShowAlmacenes($producto['cp_plocales']); ?>
    </div>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="270" colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="90" align="center" valign="top"><g:plusone href="<?=$config->lagcurl; ?>" size="tall"></g:plusone></td>
    <td width="90" align="center" valign="top"><div class="espacio1"></div><a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="lagcperu" data-text="<?=$config->lagctitulo; ?>">Tweet</a></td>
    <td width="90" align="center" valign="top"><div class="espacio1"></div><div class="fb-like" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_catalogodeltron', $_GET['id'], $_GET['ver']);?>" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="270" colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="270" colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="270" colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>