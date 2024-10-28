<?php
session_start();
include('../php/config.php');
if (empty($_SESSION['user']) || empty($_GET["id"]))
    header("location: connexion.php");
$id = $_GET["id"];
$query = mysqli_query($conn, "SELECT * from house WHERE id= $id");
$resultats = mysqli_fetch_assoc($query);


// Conversion des résultats en format JSON et envoi de la réponse
// header('Content-Type: application/json');
// echo json_encode($resultats);

function getColorIcon($etat)
{
    if ($etat == "configure")
        return 1;
    return 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../doc/leaflet/leaflet.css" />
    <title>Document</title>
    <style>
        #map {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="../js/jquery.js"></script>
    <script src="../doc/leaflet/leaflet.js"></script>
    <!-- <script src="../js/function.js"></script> -->
    <script>
        function verifiedColor(params) {
            if (params == "configure")
                return 1;
            return 0;
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180);
        }

        function calculateDistance(pos1, pos2) {
            const R = 6371; // Rayon de la Terre en kilomètres
            const dLat = deg2rad(pos2[1] - pos1[1]);
            const dLon = deg2rad(pos2[0] - pos1[0]);
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(pos1[1])) * Math.cos(deg2rad(pos2[1])) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c; // Distance en kilomètres
        }
    </script>
    <script>
        var map = L.map('map').setView([4.05, 9.7], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var position;
        var info;

        
        var marker = L.marker([<?php echo $resultats['logitude']; ?>, <?php $resultats['latitude'] ?>], {
            icon: L.icon({
            iconUrl: '../assets/position/location-blue.svg',
            // shadowUrl: 'leaf-shadow.png',

            iconSize: [30, 90], // size of the icon
            // shadowSize: [50, 64], // size of the shadow
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
            // shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor: [-6.5, -76] // point from which the popup should open relative to the iconAnchor
        })
        }).addTo(map);

        info = "<h3>" + <?php $resultats['title'] ?> + "</h3><h4>" + calculateDistance([4.042869, 9.688094], [<?php echo $resultats['logitude']; ?>, <?php $resultats['latitude'] ?>]) + " Km</h4>";
        //-----------
        marker.on("click", function() {
            var pos = map.latLngToLayerPoint(marker.getLatLng());
            pos.y -= 25;
            var fx = new L.PosAnimation();

            fx.once('end', function() {
                pos.y += 25;
                fx.run(marker._icon, pos, 0.8);
            });

            fx.run(position._icon, pos, 0.3);
        });
        marker.on('click', () => {
            marker.bindPopup(info).openPopup();
        });


        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script>
</body>

</html>