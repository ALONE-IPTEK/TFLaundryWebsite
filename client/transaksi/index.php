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

$query7 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengguna WHERE username = '$usr'");
$hasil7 = mysqli_fetch_array($query7);
if (empty($hasil7['username'])) {
    header('Location: ../login.php');
}


$query5 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT max(nota) as nota FROM transaksi");
$data = mysqli_fetch_array($query5);

$kodeBarang = $data['nota'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;

$angka = "000";
$kodeBarang = $angka . sprintf("%03s", $urutan);


if(isset($_POST['jenis'])){	
$jeniss				= $_POST['jenis'];
$jeniss2			= $_POST['jenis2'];
$query				= mysqli_query($conn, "SELECT * FROM jenis WHERE jenis = '$jeniss'");
$query2 			= mysqli_query($conn, "SELECT * FROM jenis2 WHERE jenis2 = '$jeniss2'");

$hasil 				= mysqli_fetch_array($query);

$hasil2 			= mysqli_fetch_array($query2);

$harga				= $hasil['harga'];
$harga2				= $hasil2['harga2'];

$usr				= $hasil7['nama'];
$berat				= $_POST['berat'];
$berat2				= $_POST['berat2'];
$konsumen			= $_POST['konsumen'];
$nota				= $_POST['nota'];

//  $tarif = $berat*$harga;
//  $tarif2 = $berat2*$harga2;

//  $tarif3 = $tarif+$tarif2;
  if ($berat){
  	$tarif = $berat*$harga;
  	{
  	$tarif = $berat*$harga;
  	}
	  if($berat2){
		$tarif2 = $berat2*$harga2;
		{
		$tarif2 = $berat2*$harga2;
		}
	  }
	  if($berat){
		  $tarif3 = $tarif+$tarif2;
		  {
			$tarif3 = $tarif+$tarif2;
		  }
	  }
 }

// $tgl_ambil = strtotime($_POST['tgl_ambil']);
// if ($tgl_ambil) {
//   $new_date = date('Y-m-d', $tgl_ambil);
//   echo $new_date;
// } else {
//    echo 'Invalid Date: ' . $_POST['tgl_ambil'];
//   // fix it.
// }
 $tgl_ambil = $_POST['tgl_ambil'];

$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi=date('Y-m-d');

	
	$input = mysqli_query($conn, "INSERT INTO transaksi VALUES(NULL, '$jeniss', '$jeniss2', '$tarif', '$tarif2', $tarif3, '0', '$tgl_transaksi', '$tgl_ambil', '$berat', '$berat2' ,'$usr','$konsumen', '$nota')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		==============================<Br>
		Admin : <b>'.$usr.'</b><br>

		No. Nota : <b>'.$nota.'</b><br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry Kiloan :<li> <b>'.$jeniss.' - '.$berat.'</b></li>
		Jenis Laundry Satuan :<li> <b>'.$jeniss2.' - '.$berat2. '</b></li>
		Tarif Kiloan : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
		Tarif Satuan : <b>Rp. ' . number_format( $tarif2, 0 , '' , '.' ) . ',-</b><br>
		Jumlah : <b>Rp. ' . number_format( $tarif3, 0 , '' , '.' ) . ',-</b><br>
		Tanggal Transaksi : <b>'.TanggalIndo($tgl_transaksi).'</b><br>
		Tanggal Ambil : <b>'.TanggalIndo($tgl_ambil).'</b><br>
		==============================
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
	
  }
 
?>
	<form method="post" >
		<!-- <div class="form-group">
            <label>Admin</label>
            <input style="cursor: no-drop;"type="number" class="form-control" name="nota" value="<?php echo $hasil['nama'] ?>" placeholder="Nomor Nota" readonly>
        </div> -->
		<div class="form-group">
            <label>Jenis Laundry</label>
            <select required  class="form-control" name="jenis">
			<option></option>
            <option>Kiloan</option>
            <option>Satuan</option>
			</select>
        </div>
		
		
		<div class="form-group">
        	<label>Jenis Pembayaran</label>
            	<select required  class="form-control" name="jenis">
				<option ></option>
					<option>QRIS</option>
					<option>CASH</option>
				</select>
		</div>


		<div class="form-group">
    		<label>Tanggal Order</label>
			<input style="cursor: no-drop;" type="text" class="form-control" value="<?php echo date('d-m-Y') ?>" name="tgl_ambil" readonly>
		</div>
	
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>

