<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user-plus'></i> Buat Transaksi</h3> 
</div>  <div class='panel-body'> 
<?php
if(isset($_POST['jenis'])){
$jeniss				= $_POST['jenis'];
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis WHERE jenis = '$jeniss'");
$hasil = mysqli_fetch_array($query);
$harga				= $hasil['harga'];
$berat				= $_POST['berat'];
$konsumen			= $_POST['konsumen'];
$nota				= $_POST['nota'];
if ($berat){
$tarif = $berat*$harga;
}else{
$tarif = $berat*$harga;
}
$tgl_ambil		= $_POST['tgl_ambil'];
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi=date('Y-m-d');



	
	$input = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO transaksi VALUES(NULL, '$jeniss','$tarif', '0', '$tgl_transaksi', '$tgl_ambil', '$berat','$usr','$konsumen', '$nota')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		============================<Br>
		No. Nota : <b>'.$nota.'</b><br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry : <b>'.$jeniss.'</b><br>
		Berat : <b>'.$berat.' Kg</b><br>
		Tarif : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
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
											   </div>
									 <div class="form-group">
                                                <label>Berat (Dalam Kilogram)</label>
                                                <input type="text" class="form-control" name="berat" placeholder="Masukan Berat Pakaian(Pakai Angka)" required>
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
		 