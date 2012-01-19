<?php
// integrates the mapping functionality
include("../config.php");
echo "WEB URL IS ".WEB_URL;
?>


<link rel       = "stylesheet" href= <?php echo WEB_URL.'/stylesheets/maps.css' ?> type="text/css">
<div id = "smallmapdiv" class ="map" style="width: auto; height: 250px; background-repat: no-repeat;"></div>

<script src     = "http://www.openlayers.org/api/OpenLayers.js"></script>
<script src = <?php echo WEB_URL.'/js/maps.js' ?>></script>
