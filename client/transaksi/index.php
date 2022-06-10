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

$query7 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM konsumen WHERE username = '$usr'");
$hasil7 = mysqli_fetch_array($query7);
if (empty($hasil7['username'])) {
    header('Location: ../login.php');
}


if($_SERVER["REQUEST_METHOD"] == "POST"){	

$jl		= $_POST['jenis_laundry'];
$jl_p	= $_POST['jenis_pembayaran'];
$tgl_order	= $_POST['tgl_order'];
$gps	=$_POST['gps'];
$status	=$_POST['status'];
$tgl_order2	= $_POST['tgl_order2'];
$usr	= $hasil7['nama'];

	


	
	$input = mysqli_query($conn, "INSERT INTO transaksi2 VALUES(NULL, '$jl', '$jl_p', '$tgl_order','$tgl_order2', '$gps', '$status','$usr')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="open" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		==============================<Br>
		Nama : <b>'.$usr.'</b><br>
		Jenis Laundry : <b>'.$jl.'</b><br>
		Jenis Pembayaran : <b>'.$jl_p.'</b><br>
		Tanggal Order : <b>'.$tgl_order.'</b><br>
		GPS : <b>'.$gps.'</b><br>
		Status : <b>'.$status.'</b><br>
		Status : <b>'.$tgl_order2.'</b><br>

		==============================<br>
		<a href="index.php?p=riwayatt"><h4><button type="button">Riwayat</button><b></a>
		</div>';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="index.php">Kembali</a>';	
		
	}
	
  }
 
?>
	<form  method="post" >
		
		<div class="form-group">
            <label>Jenis Laundry</label>
            <select type="text" class="form-control" name="jenis_laundry" required>
				<option></option>
				<option>Satuan</option>
				<option>Kiloan</option>
			</select>
        </div>
		
		<div hidden class="form-group">
            <label>Jenis Pembayaran</label>
			<select type="text" class="form-control" name="jenis_pembayaran">
				<option></option>
				<option>QRIS</option>
				<option>CASH</option>
			</select>
		</div>
		<div class="form-group">
    		<label>Tanggal Order</label>
			<input style="cursor: no-drop;" type="text" class="form-control" name="tgl_order" id="tgl_order" readonly />
		</div>
		<div class="form-group">
        	<label>GPS</label>
        	<br>
			<iframe name="gps" id="frame-map" src="https://maps.google.com/maps?q=Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed" width="25%"
                height="250" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
			
    	</div>
		
		<div class="form-group">
        	<label>Status</label>
        	<input type="text" class="form-control" name="status" readonly value="ORDER" />  
			
    	</div>

		<div hidden class="form-group">
        	<label>Tanggal Ambil/Proses</label>
        	<input type="text" class="form-control" name="tgl_order2" />
    	</div>

		


			<pre>*Cek Data Dengan Teliti</pre>
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>


            

            <script>
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
    </script>
<script>
		
				setInterval(function(){
					console.log( new Date('d'))
					$("#tgl_order").val(new Date().toLocaleString())
				}, 1000);

        </script>