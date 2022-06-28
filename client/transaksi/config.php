<?php
class Track {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  public $pdo = null;
  public $stmt = null;
  public $error = "";
  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B) DESTRUCTOR - CLOSE CONNECTION
  function __destruct () {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  // (C) HELPER FUNCTION - EXECUTE SQL QUERY
  function query ($sql, $data=null) {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      return true;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

  // (D) UPDATE RIDER COORDINATES
  function update ($id, $lng, $lat) {
    return $this->query(
      "REPLACE INTO `gps_track` (`rider_id`, `track_time`, `track_lng`, `track_lat`) VALUES (?, ?, ?, ?)",
      [$id, date("Y-m-d H:i:s"), $lng, $lat]
    );
  }

  // (E) GET RIDER COORDINATES
  function get ($id) {
    $this->query("SELECT * FROM `gps_track` WHERE `rider_id`=?", [$id]);
    return $this->stmt->fetch();
  }

  // (F) GET ALL THE RIDER LOCATIONS
  function getAll () {
    $this->query("SELECT * FROM `gps_track`");
    return $this->stmt->fetchAll();
  }
}

// (G) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN
define("DB_HOST", "localhost");
define("DB_NAME", "db_laundry");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (H) START!
$_TRACK = new Track();



// <!-- <script>
// var track = {
//   // (B) PROPERTIES
//   map : null, // HTML map
//   delay : 5000, // Delay between location refresh

//   // (C) INIT
//   init : () => {
//     track.map = document.getElementById("map");
//     track.show();
//     setInterval(track.show, track.delay);
//     if (navigator.geolocation) {
//       track.update();
//       track.timer = setInterval(track.update, track.delay);
//     } else { track.map.innerHTML = "Geolocation not supported!"; }
//   },

//   // (D) GET DATA FROM SERVER AND UPDATE MAP
//   show : () => {
//     // (D1) DATA
//     var data = new FormData();
//     data.append("req", "getAll");

//     // (D2) AJAX FETCH
//     fetch("transaksi/adminpanel.php", { method:"POST", body:data })
//     .then(res => res.json()).then((res) => {
//       if (res.status==1) { for (let rider of res.message) {
//         var row = document.createElement("div");
//         row.innerHTML = "Rider ID " + rider.rider_id +
//                         " | Lng " + rider.track_lng +
//                         " | Lat " + rider.track_lat +
//                         " | Time " + rider.track_time;

                        
//       $('#frame-map').attr('src',`https://maps.google.com/maps?q=${rider.track_lat},${rider.track_lng}&t=&z=16&ie=UTF8&iwloc=&output=embed`);
//         track.map.appendChild(row);
//       }} else { track.map.innerHTML = res.message; }




//     }).catch((err) => { console.error(err); });
//   }
// };
// window.addEventListener("DOMContentLoaded", track.init);
// </script> -->
// <!-- <script>
// var track = {

//   // (B) PROPERTIES & SETTINGS
//   rider : 999, // Rider ID - Fixed to 999 for this demo.
//   delay : 1000, // Delay between GPS update, in milliseconds.
//   timer : null, // Interval timer.
//   map : null, // HTML <div> element.

//   // (C) INIT
//   init : () => {
//     // (C1) GET HTML map
//     track.map = document.getElementById("map");

//     // (C2) CHECK GPS SUPPORT + START TRACKING
//     if (navigator.geolocation) {
//       track.update();
//       track.timer = setInterval(track.update, track.delay);
//     } else { track.map.innerHTML = "Geolocation not supported!"; }
//   },

//   // (D) UPDATE CURRENT LOCATION TO SERVER
//   update : () => {
//     navigator.geolocation.getCurrentPosition(
//       // (D1) OK - SEND GPS COORDS TO SERVER
//       (pos) => {
//         // LOCATION DATA
//         var data = new FormData();
//         data.append("req", "update");
//         data.append("rider_id", track.rider);
//         data.append("lat", pos.coords.latitude);
//         data.append("lng", pos.coords.longitude);

//         // AJAX FETCH
//         fetch("transaksi/adminpanel.php", { method:"POST", body:data })
//         .then(res => res.json()).then((res) => {
//           if (res.status==1) {
//             track.map.innerHTML = Date.now() +
//                                       " | Lat: " + pos.coords.latitude +
//                                       " | Lng: " + pos.coords.longitude;
//         $('#frame-map').attr('src',`https://maps.google.com/maps?q=${rider.track_lat},${rider.track_lng}&t=&z=16&ie=UTF8&iwloc=&output=embed`);
//         track.map.appendChild(row);
//        } else { track.map.innerHTML = res.message; }
//         }).catch((err) => { console.error(err); });
//       },

//       // (D2) ERROR
//       (err) => {
//         console.error(err);
//         track.map.innerHTML = err.message;
//         clearInterval(track.timer);
//       }
//     );
//   }
// };

// window.addEventListener("DOMContentLoaded", track.init);
// </script>
