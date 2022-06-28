<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>

<style>
            /* ukuran peta */
            #mapid {
                height: 500px;
                width: 500px;
            }
            @media only screen and (max-width: 600px) {
              .jumbotron{
                height: 100;
                border-radius: 0;  
              }
              #mapid {
                height: 320px;
                width: 220px;
              }
            }
            .jumbotron{
                height: 100%;
                border-radius: 0;
            }
            #map {  height: 320px;
                width: 220px; }
            
        </style>
<div class='panel panel-border panel-primary' role="navigation">
    <div class='panel-heading'>
    <h3 class='panel-title'><i class='fa fa-map-marker'></i> Google Maps</h3> 
</div> 
<!-- <div class="text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126936.97153029419!2d106.68721864745973!3d-6.160164032609576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7c9d110d719%3A0x300c5e82dd4b8a0!2sJakarta%20Barat%2C%20Kec.%20Kb.%20Jeruk%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1609517567549!5m2!1sid!2sid" width="250" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<br/>
              <a href="https://maps.google.com" >  Ke Maps Browser
            </div> -->

<div id="mapid"></div>
           
            
<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    
    <script>
    // set lokasi latitude dan longitude, lokasinya kota palembang 
    var mymap = L.map('mapid').setView([-6.139979     , 106.725183],15);   
    var marker = L.marker([51.5, -0.09]).addTo(mymap);
    //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2l0eW95IiwiYSI6ImNsNG0zYnBrZjB0anczaWx4MTVxZXdlbGwifQ.UYIs5SUzTh5hrbJzLamKsQ', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            
            id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);
        
        // buat variabel berisi fugnsi L.popup 
    var popup = L.popup();

// buat fungsi popup saat map diklik
// function onMapClick(e) {
//     popup
//         .setLatLng(e.latlng)
//         .setContent("Titik Koordinat Kamu " + e.latlng
//             .toString()
//             ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            
//         .openOn(mymap);


//     document.getElementById('gps').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
    
// }
// mymap.on('click', onMapClick); //jalankan fungsi
<?php
        
    include "../koneksi.php";   //koneksi ke database
    $tampil = mysqli_query($conn, "select * from orderan"); //ambil data dari tabel lokasi
    while($hasil = mysqli_fetch_array($tampil)){ ?> //melooping data menggunakan while

    //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
    //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
    L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['gps']); ?>]).addTo(mymap)

            // //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
            .bindPopup(`<?php echo 'Alamat:'.$hasil['alamat'].' |  Nama:'.$hasil['nama'].' | ID: '.$hasil['nota']; ?>`)

<?php } ?>

    </script>
          
           

            <!-- <script>
    var track = {
      // (B) PROPERTIES
      map : null, // HTML map
      delay : 10000, // Delay between location refresh

      // (C) INIT
      init : () => {
        track.map = document.getElementById("map");
        track.show();
        setInterval(track.show, track.delay);
      },

      // (D) GET DATA FROM SERVER AND UPDATE MAP
      show : () => {
        // (D1) DATA
        var data = new FormData();
        data.append("req", "getAll");

        // (D2) AJAX FETCH
        fetch("maps/adminpanel.php", { method:"POST", body:data })
        .then(res => res.json()).then((res) => {
          if (res.status==1) { for (let rider of res.message) {
            var row = document.createElement("div");
            row.innerHTML = "Rider ID " + rider.rider_id +
                            " | Lng " + rider.track_lng +
                            " | Lat " + rider.track_lat +
                            " | Time " + rider.track_time;

                            
          $('#frame-map').attr('src',`https://maps.google.com/maps?q=${rider.track_lat},${rider.track_lng}&t=&z=16&ie=UTF8&iwloc=&output=embed`);
            track.map.appendChild(row);
          }} else { track.map.innerHTML = res.message; }




        }).catch((err) => { console.error(err); });
      }
    };
    window.addEventListener("DOMContentLoaded", track.init);
    </script> -->