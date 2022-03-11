<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}

?>

<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
        	<h3 class='panel-title'><i class='fa fa-user-plus'></i> Buat Transaksi</h3> 
</div>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js"></script>

<div class='panel-body'> 

<?php
include "../koneksi.php";
$query5 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT max(nota) as nota FROM transaksi");
$data = mysqli_fetch_array($query5);
$kodeBarang = $data['nota'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$angka = "000";
$kodeBarang = $angka . sprintf("%03s", $urutan);
 
if(isset($_POST['jenis'])){	
$jeniss				= $_POST['jenis'];
$jeniss2			= $_POST['jenis2'];
$query				= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis WHERE jenis = '$jeniss'");
$query2 			= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis2 WHERE jenis2 = '$jeniss2'");

$hasil 				= mysqli_fetch_array($query);

$hasil2 			= mysqli_fetch_array($query2);

$harga				= $hasil['harga'];
$harga2				= $hasil2['harga'];

$berat				= $_POST['berat'];
$berat2				= $_POST['berat2'];
$konsumen			= $_POST['konsumen'];
$nota				= $_POST['nota'];

$tarif = $berat*$harga;
$tarif2 = $berat2*$harga2;

$tarif3 = $tarif+$tarif2;

$pecah = explode("/", $tgl_ambil = $_POST['tgl_ambil']);
if (checkdate($pecah[1], $pecah[0], $pecah[2])) echo "Tanggal Valid";
else {
	echo "Tanggal Tidak";
}
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi=date('Y-m-d');



	
	$input = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO transaksi VALUES(NULL, '$jeniss', '$jeniss2', '$tarif', '$tarif2', $tarif3, '0', '$tgl_transaksi', '$tgl_ambil', '$berat', '$berat2' ,'$usr','$konsumen', '$nota')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		======================================================================<Br>
		No. Nota : <b>'.$nota.'</b><br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry Kiloan :<li> <b>'.$jeniss.' - '.$berat.'</b></li>
		Jenis Laundry Satuan :<li> <b>'.$jeniss2.' - '.$berat2. '</b></li>
		Tarif Kiloan : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
		Tarif Satuan : <b>Rp. ' . number_format( $tarif2, 0 , '' , '.' ) . ',-</b><br>
		Jumlah : <b>Rp. ' . number_format( $tarif3, 0 , '' , '.' ) . ',-</b><br>
		Tanggal Transaksi : <b>'.TanggalIndo($tgl_transaksi).'</b><br>
		Tanggal Ambil : <b>'.TanggalIndo($tgl_ambil).'</b><br>
		======================================================================
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
  }

  header("location:transaksi/index.php")
 
?>
	<form method="post" action="transaksi/index.php">
		<div class="form-group">
            <label>No. Nota</label>
            <input style="cursor: no-drop;"type="number" class="form-control" name="nota" value="<?php echo $kodeBarang ?>" placeholder="Nomor Nota" readonly>
        </div>
		
		<div class="form-group">
            <label>Konsumen</label>
			<input type="text" class="form-control" name="konsumen" placeholder="Masukkan Nama">
		</div>
		<div class="form-group">
        	<label>Jenis</label>
            	<select  class="form-control" name="jenis">
					<?php
						$tp2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis ORDER BY id");
						while($r2=mysqli_fetch_array($tp2)){
					?>
				<option value="<?php echo $r2['jenis'];?>"><?php echo $r2['jenis'];?></option>
			<?php } ?>
				</select>
			
			<select  class="form-control" name="jenis2">
				<?php
					$tp3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis2 ORDER BY id");
					while($r3=mysqli_fetch_array($tp3)){
				?>
			<option value="<?php echo $r3['jenis2'];?>"><?php echo $r3['jenis2'];?></option>
			<?php } ?>
			</select>
		</div>

		<div class="form-group">
        	<label>Berat (Dalam <i style="color: blue;">Kilogram</i>)</label>
        	<input type="number" class="form-control" name="berat" placeholder="Masukan Berat Pakaian(Pakai Angka)" required>
    	</div>

		<div class="form-group">
        	<label>Berat (Dalam <i style="color: red;">Satuan</i>)</label>
        	<input type="number" class="form-control" name="berat2" placeholder="Masukan Berat Pakaian(Pakai Angka)" id="txt2" onkeyup="sum();">
    	</div>

		<div class="form-group">
        	<label><i style="color: purple;">Jumlah</i></label>
        	<input style="cursor: no-drop;" type="number" id="txt3" onkeyup="sum();" readonly>
    	</div>
		<script>
			// Row Inserting event
		function Row_Inserting($rsold, $rsnew) {
			// Enter your code here
			// To cancel, set return value to FALSE
			if (strtotime($rsnew["Tanggal_Awal"]) > strtotime($rsnew["Tanggal_Akhir"])) {
				$this=setFailureMessage("Tanggal Awal harus lebih kecil atau sama dengan Tanggal Akhir.");    
				return FALSE;
			}
			return TRUE;
		}
		</script>
		<div class="form-group">
    		<label>Tanggal Ambil</label>
    		<!-- <input type="date" class="form-control" id="start" name="trip-start"
			value="2022-03-11"
			min="2022-03-11" max="2030-12-31"> -->
			<input type="date" class="form-control" id="<?php echo $rsnew ?>" name="tgl_ambil">
		</div>

			<pre>*Cek Data Dengan Teliti</pre>
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>

<script>
function sum() {
    //   var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = /* parseInt(txtFirstNumberValue) - */ parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}

		// function hanyaAngka(evt) {
		//   var charCode = (evt.which) ? evt.which : event.keyCode
		//    if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		//     return false;
		//   return true;
		// }

</script>
<script>
	$(function() {
  			$("#datepicker").datepicker({
			dateFormat: 'dd-mm-yy',
			minDate: "today",
			maxDate: "+30d",
			});
		$("#datepicker").datepicker("setDate", "1");
		});
</script>
