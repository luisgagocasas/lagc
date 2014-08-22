<h2>Lugares Turisticos de Socabaya</h2>
<style type="text/css">
#map {
	width: 650px;
	height: 560px;
	float: left;
}
#map-side-bar {
	float: left;
	padding: 7px 20px;
}
</style>
<script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false" type="text/javascript"></script>
<script src="componentes/com_programacion/markermanager.js" type="text/javascript"></script>
<script src="componentes/com_programacion/StyledMarker.js" type="text/javascript"></script>
<script src="componentes/com_programacion/jquery.metadata.js" type="text/javascript"></script>
<script src="componentes/com_programacion/jquery.jmapping.js" type="text/javascript"></script>
<div id="map"></div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#map').jMapping({
      category_icon_options: {
        'cat1': {color: '#876235'},
        'cat2': {color: '#455664'},
		'cat3': {color: '#673634'},
		'cat4': {color: '#000'},
		'cat4': {color: '#E8413A'},
        'default': {color: '#7CDF65'}
      },
      map_config: {
        navigationControlOptions: {
          style: google.maps.NavigationControlStyle.DROPDOWN_MENU
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: 16
      }
    });
  });
</script>
<h3>Listado de Lugares</h3>
<div id="map-side-bar">
	<div class="map-location" data-jmapping="{id: 1, point: {lng: -71.54132455587387, lat: -16.46506981669368}, category: 'cat1'}">
		<a href="#" class="map-link">&raquo; Albergue de los perros abandonados</a>
		<div class="info-box">
			<p><b>Albergue de los perros abandonados</b><br>"AYUDANOS A AYUDAR"<br>Asociacion protectora de animales sin fines de lucro.<br><a href="http://www.youtube.com/watch?v=pSBu5nTzeLM" target="_blank">Ver Recorrido desde Youtube</a></p>
		</div>
	</div>
	<div class="map-location" data-jmapping="{id: 2, point: {lng: -71.52751922607422, lat: -16.486316465896724}, category: 'cat2'}">
		<a href="#" class="map-link">&raquo; Las Pi&ntilde;uelas</a>
		<div class="info-box">
			<p><b>Las Pi&ntilde;uelas</b><br>Cataratas de agua</p>
		</div>
	</div>
	<div class="map-location" data-jmapping="{id: 3, point: {lng: -71.54659509658813, lat: -16.471900223582143}, category: 'cat3'}">
		<a href="#" class="map-link">&raquo; Las Pe&ntilde;as</a>
		<div class="info-box">
			<p><b>Las Pe&ntilde;as</b><br />Cabernas donde se dice que existen sirenas.</p>
		</div>
	</div>
    <div class="map-location" data-jmapping="{id: 4, point: {lng: -71.52881741523743, lat: -16.46738608595729}, category: 'cat4'}">
		<a href="#" class="map-link">&raquo; Plaza Principal de Socabaya</a>
		<div class="info-box">
			<p><b>Plaza Principal de Socabaya</b><br />Al costado de la plaza esta la Municipalidad Distrital de Socabaya.</p>
		</div>
	</div>
    <div class="map-location" data-jmapping="{id: 5, point: {lng: -71.52434885501862, lat: -16.471473249824914}, category: 'cat5'}">
		<a href="#" class="map-link">&raquo; Mirador de Ampliacion de Socabaya</a>
		<div class="info-box">
			<p><b>Mirador de Ampliacion de Socabaya</b><br />Una espectacular vista de todo socabaya y su campi&ntilde;a</p>
		</div>
	</div>
</div>