// shows map with a marker at the specified location
function projectMap(lat, lon){
	map = new OpenLayers.Map("smallmapdiv");
	map.addLayer(new OpenLayers.Layer.OSM());

	var lonLat  = new OpenLayers.LonLat(lon, lat)
	.transform(
		new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
		map.getProjectionObject() // to Spherical Mercator Projection
	);

	var zoom    = 15;

	var markers = new OpenLayers.Layer.Markers( "Markers" );
	map.addLayer(markers);

	markers.addMarker(new OpenLayers.Marker(lonLat));

	map.setCenter (lonLat, zoom);
}