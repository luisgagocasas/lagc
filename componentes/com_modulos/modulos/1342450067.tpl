<div class="title-caption">
<h3>Mapa de Socabaya</h3>
</div>
<div id="map-canvas"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>
<script type="text/javascript">
      function initialize() {
        var latlng = new google.maps.LatLng(-16.471213,-71.525824);
        var myOptions = {
          zoom: 14,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            myOptions);
      } initialize()
</script>