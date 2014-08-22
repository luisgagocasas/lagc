<?php
class Posicion {
	function Inicio() { ?>
		<div class="botonesdemando"><a href="?lagc=com_menu&menus=<?php echo time(); ?>&crear=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0"> Nuevo Menu</a></div><br>
    <table align="left" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Enlaces</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Des.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respmenus = mysql_query("select * from m_posicion order by m_pnombre ASC"); while($menus = mysql_fetch_array($respmenus)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr>
        <td align="left"><?php echo $c; ?></td>
        <td><a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&editar=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>"><?php echo $menus['m_pnombre']; ?></a></td>
        <td><a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&enlaces=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>"><img src="plantillas/lagc-peru/imagenes/mainmenu.gif" border="0"></a></td>
        <td><?php echo Posicion::Activoe($menus['m_pactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&editar=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&borrar=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td align="left"><?php echo $c; ?></td>
        <td><a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&editar=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>"><?php echo $menus['m_pnombre']; ?></a></td>
        <td><a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&enlaces=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>"><img src="plantillas/lagc-peru/imagenes/mainmenu.gif" border="0"></a></td>
        <td><?php echo Posicion::Activoe($menus['m_pactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&editar=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_menu&menus=<?php echo $menus['m_pid']; ?>&borrar=<?php echo LGlobal::Url_Amigable($menus['m_pnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Activoe($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function Crear_M() {
		if (empty($_POST['titulo'])) {
			@include "componentes/com_menu/crear_posicion.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO m_posicion (m_pnombre, m_pactivo) VALUES ('".$_POST['titulo']."', '".$_POST['activado']."')";
			mysql_query($sql,$con);
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu'\", 1000) </script>
			<center>Se creo el menu: <b>".$_POST['titulo']."</b>.</center>";
		}
	}
	function Editar_M($id, $titulo){
		if (empty($_POST['titulo'])) {
			$respmposi = mysql_query("select * from m_posicion where m_pid='".$id."'"); $mposicion = mysql_fetch_array($respmposi);
			if (!empty($mposicion['m_pid']) and $titulo==LGlobal::Url_Amigable($mposicion['m_pnombre'])) { @include "componentes/com_menu/editar_posicion.tpl"; }
			else { echo "<em>No existe el menu</em>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE m_posicion SET m_pnombre='".$_POST['titulo']."', m_pactivo='".$_POST['activado']."' WHERE m_pid='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu'\", 1000) </script>Se Guardo Correctamente: <b><em>".$_POST['titulo']."</em>.</b>";
			mysql_close($con);
		}
	}
	function Borrar_M($id, $titulo) {
		$respmposi = mysql_query("select * from m_posicion where m_pid='".$id."'"); $mposicion = mysql_fetch_array($respmposi);
		if (!empty($mposicion['m_pid']) and $titulo==LGlobal::Url_Amigable($mposicion['m_pnombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $mposicion['m_pid']; ?>">
            <h3>Esta seguro que desea borrar: <strong><?php echo $mposicion['m_pnombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_menu'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM m_posicion WHERE m_pid='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE m_posicion AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu'\", 1000) </script><center>Borrado Correctamente: <b> <em>".$mposicion['m_pnombre']."</em></b>.</center>";
			}
		} else { echo "<em>No existe el menu</em>"; }
	}
}
?>