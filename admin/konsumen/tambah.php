
<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user-plus'></i> Tambah Konsumen</h3> 
                                    </div>  <div class='panel-body'> <?php
if(isset($_POST['username'])){
$passasli=$_POST['password'];
$password=md5($passasli);
$username	= $_POST['username'];
$nama		= $_POST['nama'];
$telp		= $_POST['telp'];
$gender		= $_POST['gender'];
$alamat		= $_POST['alamat'];
$cekuser = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM konsumen WHERE username = '$username'");  
  if(mysqli_num_rows($cekuser) <> 0) {
 echo "ERROR : Username sudah terdaftar";
  }else{
	
	$input = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO konsumen VALUES(NULL, '$nama','$username', '$password', 'Konsumen', '$nik', '$alamat', '$telp', '$gender')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Tambah Konsumen Berhasil!</b></h4>';		//Pesan jika proses tambah sukses
		echo '
		============================<Br>
		<b>Info Konsumen</b><br>
		Nama : <b>'.$nama.'</b><br>
		Alamat : <b>'.$alamat.'</b><br>
		Telp : <b>'.$telp.'</b><br>
		Gender : <b>'.$gender.'</b><br>
		============================<Br>
		<b>Info Akun </b><br>
		Username : <b>'.$username.'</b><br>
		Password : <b>'.$passasli.'</b><br>
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
  }
}
?>
<form method="post">
    <!-- <div class="form-group">
        <label>NIK</label>
        <input type="text" class="form-control" name="nik" placeholder="Masukan Nomor Induk Konsumen" required>
    </div> -->
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Konsumen" required>
    </div>
	<div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="Alamat Konsumen" required>
    </div>
	<div class="form-group">
        <label>Telp</label>
        <input type="text" class="form-control" name="telp" placeholder="Masukan No. Telepon Konsumen" required>
    </div>
	<div class="form-group">
        <label>Gender</label>
            <select class="form-control" name="gender">
				<option value="Laki laki">Laki laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
    </div>
    <div class="form-group">
        <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
    </div>
    <div class="form-group">
        <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
</form>
                                     </div>
									 
          </div>
		 