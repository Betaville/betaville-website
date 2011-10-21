<?php
// contains mapping utilities

// <link rel       = "stylesheet" href="stylesheets/maps.css" type="text/css">
// <div id         = "smallmapdiv" style="smallmap"></div>

// <div id         = "smallmapdiv" style="width: 75%; height: 250px; background-repat: no-repeat;"></div>
?>


<div id         = "smallmapdiv" style="width: 75%; height: 250px; background-repat: no-repeat;"></div>

<script src     = "http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
map            = new OpenLayers.Map("smallmapdiv");
map.addLayer(new OpenLayers.Layer.OSM());

var lonLat  = new OpenLayers.LonLat( -0.1279688 ,51.5077286 )
.transform(
	new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
	map.getProjectionObject() // to Spherical Mercator Projection
);

var zoom    = 16;

var markers = new OpenLayers.Layer.Markers( "Markers" );
map.addLayer(markers);

markers.addMarker(new OpenLayers.Marker(lonLat));

map.setCenter (lonLat, zoom);
</script>
