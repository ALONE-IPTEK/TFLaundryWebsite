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
        	<input type="text" class="form-control" name="gps" />
    	</div>
		
		<div class="form-group">
        	<label>Status</label>
        	<input type="text" class="form-control" name="status" readonly value="PROSES" />  
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
		
				setInterval(function(){
					console.log( new Date('d'))
					$("#tgl_order").val(new Date().toLocaleString())
				}, 1000);

        </script>