<!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>

    <!-- bootstrap cdn  -->
       
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
<div class='panel panel-border panel-primary'>
    <div class='panel-heading'> 
       	<h3 class='panel-title'><i class='fa fa-user-plus'></i> Buat Transaksi</h3> 
</div>  
<div class='panel-body'> 


<?php
include "../koneksi.php";
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username'];
}
$query5 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT max(nota) as nota FROM orderan");
$data = mysqli_fetch_array($query5);

$kodeBarang = $data['nota'];
$urutan = (int) substr($kodeBarang, 2, 2);
$urutan++;

$angka = "0";
$kodeBarang = $angka . sprintf("%02s", $urutan);

if($_SERVER["REQUEST_METHOD"] == "POST"){	

$jl		      = $_POST['jenis_laundry'];
$jl2		    = $_POST['jenis_laundry2'];
$jl_p	      = $_POST['jenis_pembayaran'];
$tgl_order	= $_POST['tgl_order'];
$tgl_order2	= $_POST['tgl_order2'];

$gps	      = $_POST['gps'];
$alamat	     = $_POST['alamat'];
$status	    = $_POST['status'];
$nota       = $_POST['nota'];

$usr2	      = $hasil['nama'];

	


	
	$input = mysqli_query($conn, "INSERT INTO orderan VALUES(NULL, '$jl', '$jl2', '$jl_p', '$tgl_order','$tgl_order2', '$gps', '$alamat', '$status','$nota', '$usr2')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="open" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		==============================<Br>
    Nota : <b>'.$nota.'</b><br>
		Nama : <b>'.$usr2.'</b><br>
		Jenis Laundry : <b>'.$jl.'</b><br>
		Jenis Laundry : <b>'.$jl2.'</b><br>
		Jenis Pembayaran : <b>'.$jl_p.'</b><br>
		Tanggal Order : <b> '.$tgl_order.'</b><br>
		GPS : <b>'.$gps.'</b><br>
    Catatan : <b>'.$alamat.'</b><br>
		Status : <b>'.$status.'</b><br>
		<b hidden>Tanggal Ambil/Proses :</b> <b hidden>Tunggu Update'.$tgl_order2.'</b><br>

		==============================<br>
		<a href="index.php?p=riwayatt"><h4><button type="button">Riwayat</button><b></a>
		</div>';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="index.php">Kembali</a>';	
		
	}
	
  }
  
 
?>
	<form method="post" enctype='multipart/form-data'>

    <div class="form-group">
      <label hidden for="exampleFormControlInput1">Nota</label>
      <input style="cursor: no-drop;"type="number" class="form-control" name="nota" value="<?php echo $kodeBarang ?>" placeholder="Nomor Nota" readonly>
        
    </div>
    
    <div class="form-group">
      <label>Nama</label>
        <input style="cursor: no-drop;" class="form-control" name="nama" value="<?php echo $hasil['nama'] ?>" >
    </div>
    
    <div class="form-group">
        <label>Jenis Laundry</label><br>
          <label>Kiloan</label>
            <select type="text" class="form-control" name="jenis_laundry" required>
                <option>Kiloan</option>
                  <br><br>
            </select>
              <label>Satuan</label>
                <select type="text" class="form-control" name="jenis_laundry2">
                  <option></option>
                  <option>Satuan</option>
                </select>
      </div>
      
      <div hidden class="form-group">
        <label>Jenis Pembayaran</label>
          <select type="text" class="form-control" name="jenis_pembayaran" value="Setelah Pengambilan">
            <option value="Setelah Pengambilan"></option>
            <option>QRIS</option>
            <option>CASH</option>
			    </select>
		  </div>
      
      <div class="form-group">
        <label>Tanggal Order</label>
          <input style="cursor: no-drop;" type="text" class="form-control" name="tgl_order" id="tgl_order" readonly />
      </div>
      
      <div class="form-group"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <label>Alamat</label>                  
         <!-- peta akan ditampilkan dengan id = mapid -->
        <div id="mapid">
        </div>
        <label>Latitude, Longitude</label>
        <input style="cursor: no-drop;" type="text" class="form-control" id="gps" name="gps" readonly>
        <label>Catatan</label>
        <input class="form-control" name="alamat" value="<?php echo $hasil['alamat'] ?>" />

      </div>

      <div class="form-group">
        <label>Status</label>
          <input type="text" class="form-control" name="status" readonly value="ORDER" />  
      </div>
              
      <div hidden class="form-group">
        <label>Tanggal Ambil/Proses</label>
          <input type="text" class="form-control" name="tgl_order2" value="Tunggu Info Update" />
      </div>
      
			<pre>*Cek Data Dengan Teliti</pre>
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>


    <!-- leaflet js  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    
    <script>
    // set lokasi latitude dan longitude, lokasinya kota palembang 
    var mymap = L.map('mapid').setView([-6.139979     , 106.725183], 14);   
    //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2l0eW95IiwiYSI6ImNsNG0zYnBrZjB0anczaWx4MTVxZXdlbGwifQ.UYIs5SUzTh5hrbJzLamKsQ', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 25,
            
            id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);
        
        // buat variabel berisi fugnsi L.popup 
    var popup = L.popup();

// buat fungsi popup saat map diklik
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Titik Koordinat Kamu " + e.latlng
            .toString()
            ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            
        .openOn(mymap);


    document.getElementById('gps').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
    
}
mymap.on('click', onMapClick); //jalankan fungsi

    let lng;
    let lat;
    const marker = new mapboxgl.Marker({
    'color': '#314ccd'
    });
    
    mymap.on('click', (event) => {
    // Use the returned LngLat object to set the marker location
    // https://docs.mapbox.com/mapbox-gl-js/api/#lnglat
    marker.setLngLat(event.latlng).addTo(mymap);
    
    lng = event.lngLat.lng;
    lat = event.lngLat.lat;
    
    getElevation();
    }); 

      mymap.addControl(
      new mapboxgl.GeolocateControl({
      positionOptions: {
      enableHighAccuracy: true
      },
      // When active the map will receive updates to the device's location as it changes.
      trackUserLocation: true,
      // Draw an arrow next to the location dot to indicate which direction the device is heading.
      showUserHeading: true
      })
    );
    </script>
          

<script>
		
				setInterval(function(){
					console.log( new Date('d'))
					$("#tgl_order").val(new Date().toLocaleString())
				}, 1000);

        </script>
  </body>
</html>
