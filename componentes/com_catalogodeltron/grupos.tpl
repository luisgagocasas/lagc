<div class="lineaubicacion"> <a href="<?=LGlobal::Tipo_URL('com_catalogodeltron'); ?>">Inicio</a> > <a href="?lagc=com_catalogodeltron&id=grupos">[Grupos]</a></div><br><br>
<center>
<table width="770" border="0" class="vistax">
<tr>
    <td class="titulosx" width="127"><h2>Marcas</h2></td>
    <td class="titulosx" width="171"><h2>Lineas</h2></td>
    <td class="titulosx" width="111"><h2>Item</h2></td>
    <td class="titulosx" width="224"><h2>Descripci&oacute;n</h2></td>
    <td class="titulosx" width="104"><h2>Fecha</h2></td>
</tr>
<tr>
<td class="vista2" valign="middle" colspan="5">
<?=SistemaCatalogo::__Marcas($grupo['cp_gid']); ?>
</td>
</tr>
</table>
</center>