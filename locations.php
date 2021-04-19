<!DOCTYPE html>
<html>
  <head>
    <title>Marker Labels</title>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->
    <style type="text/css">
      #map {
        height: 620px;
        width: 720px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

  
      html,
      body {
        background-color: red;
        margin: 0;
      }
    </style>
  </head>
  <body>
<script type="text/javascript" src="scripts/map.js"></script>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>