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

function input($data) {
	$data = trim($data);    
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//Cek apakah ada kiriman form dari method post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$jl		=input($_POST["jenis_laundry"]);
	$jl_p	=input($_POST["jenis_pembayaran"]);
	$tgl_order =date('Y-m-d H:i:s');
	$gps	=input($_POST["gps"]);
	$status	=input($_POST["status"]);
	$username	=input($_POST["username"]);



	//Query input menginput data kedalam tabel test
	$sql="INSERT INTO transaksi2 VALUES('','$jl','$jl_p','$tgl_order','$gps','$status', '$username')";

	//Mengeksekusi/menjalankan query diatas
	$hasil=mysqli_query($conn,$sql);

	//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
	if ($hasil) {
		header("Location:index.php");
	}
	else {
		echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

	}

}
?>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" action="data.php">
	<div class="form-group">
            <input style="cursor: no-drop;"type="text" class="form-control" name="username" value="<?php echo $hasil7['nama'] ?>" placeholder="Nomor Nota" readonly>
	</div>
		<div class="form-group">
            <label>Jenis Laundry</label>
            <select required  class="form-control" name="jenis_laundry">
			<option></option>
            <option>Kiloan</option>
            <option>Satuan</option>
			</select>
        </div>
		
		
		<div class="form-group">
        	<label>Jenis Pembayaran</label>
            	<select required  class="form-control" name="jenis_pembayaran">
				<option ></option>
					<option>QRIS</option>
					<option>CASH</option>
				</select>
		</div>


		<div class="form-group">
    		<label>Tanggal Order</label>
			<input style="cursor: no-drop;" type="text" class="form-control" value="<?php echo date('d-m-Y H:i:s') ?>" name="tgl_order" readonly>
		</div>

		<div class="form-group">
    		<label>GPS</label>
			<input style="cursor: no-drop;" type="text" class="form-control" name="gps" >
		</div>

		<div class="form-group">
    		<label>Status</label>
			<input style="cursor: no-drop;" type="text" class="form-control" name="status" >
		</div>
	
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>

