<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
        	<h3 class='panel-title'><i class='fa fa-user-plus'></i> Buat Transaksi</h3> 
</div>  

<div class='panel-body'> 

<?php
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
//   if ($berat){
//   	$tarif = $berat*$harga;
//  		}else{
//   			$tarif = $berat*$harga;
 		
//  if ($berat2) {
//  	$tarif2 = $berat2*$harga2 ;
//  		} else {
//  		$tarif2 = $berat2*$harga2 ;
//  		}
// 	}
// if ($berat && $berat2) {
//     $tarif = $berat*$harga;
// }
// else {
// 	$tarif = $berat*$harga ;
//     if ($berat) {
//         $tarif = $berat*$harga;
//     }
//     elseif ($berat) {
//         $tarif = $berat*$harga;
//     }
//     elseif ($berat2) {
//         $tarif2 = $berat2*$harga2;
//     }
//     else {
// 		$tarif2 = $berat*$harga;
//     }
// }


$tgl_ambil		= $_POST['tgl_ambil'];
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
		============================<Br>
		No. Nota : <b>'.$nota.'</b><br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry Kiloan :<li> <b>'.$jeniss.'</b></li>
		Jenis Laundry Satuan :<li> <b>'.$jeniss2.'</b></li>
		Berat Kiloan : <b>'.$berat.' Kg</b><br>
		Berat Satuan : <b>'.$berat2.' Kg</b><br>
		Tarif Kiloan : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
		Tarif Satuan : <b>Rp. ' . number_format( $tarif2, 0 , '' , '.' ) . ',-</b><br>
		Jumlah : <b>Rp. ' . number_format( $tarif3, 0 , '' , '.' ) . ',-</b><br>
		Tanggal Transaksi : <b>'.TanggalIndo($tgl_transaksi).'</b><br>
		Tanggal Ambil : <b>'.TanggalIndo($tgl_ambil).'</b><br>
		============================
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
  }
 
?>
	<form method="post">
		<div class="form-group">
            <label>No. Nota</label>
            <input type="number" class="form-control" name="nota" placeholder="Nomor Nota" required>
        </div>
		
		<div class="form-group">
            <label>Konsumen</label>
            <select  class="form-control" name="konsumen">
				<?php
					$tp=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM konsumen ORDER BY id");
					while($r=mysqli_fetch_array($tp)){
				?>
				<option value="<?php echo $r['nama'];?>"><?php echo $r['nama'];?></option>
					<?php } ?>
			</select>
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
        	<input type="text" class="form-control" name="berat" placeholder="Masukan Berat Pakaian(Pakai Angka)" required>
    	</div>

		<div class="form-group">
        	<label>Berat (Dalam <i style="color: red;">Satuan</i>)</label>
        	<input type="text" class="form-control" name="berat2" placeholder="Masukan Berat Pakaian(Pakai Angka)" required>
    	</div>

		<div class="form-group">
        	<label><i style="color: purple;">Jumlah</i></label>
        	<input> <?php $tarif+$tarif2; ?>
    	</div>
		
		<div class="form-group">
    		<label>Tanggal Ambil</label>
    		<input type="date" class="form-control" name="tgl_ambil" required>
		</div>
		
			<pre>*Cek Data Dengan Teliti</pre>
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>
		 
