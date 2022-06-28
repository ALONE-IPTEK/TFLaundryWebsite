<?php
include '../koneksi.php';
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:../login.php'); 
}
else { 
    $usr = $_SESSION['username'];
}
$usr2	      = $hasil['nama'];

?>
<style>
	th{
		border-style: solid; 
		border-width: thin;
		text-align: center;
	}
	td{
		border-style: solid; 
		border-width: thin;
	}
	
</style>
<div class='panel panel-border panel-primary' role="navigation">
    <div class='panel-heading'>
    <h3 class='panel-title'><i class='fa fa-clock-o'></i> Riwayat Order	</h3> 
</div>  

<div class='panel-body'> 
	<div class="row">
        <table style="border-style: solid; border-width: thin;" id='datatable' class='table table-hover'>
            <thead>
                <tr>
					<th><i class='icon-terminal'></i> No</th>
					<th><i class='icon-terminal'></i> Nama</th>

					<th colspan="2"><i class='icon-terminal'></i> Jenis Laundry</th>
					
					<th><i class='icon-signal'></i> Jenis Pembayaran</th>
					<th><i class='icon-signal'></i> Tanggal Order</th>
					<th><i class='icon-signal'></i> GPS</th>
					<th><i class='icon-signal'></i> Catatan</th>


					<th><i class='icon-signal'></i> Status</th>
					<th><i class='icon-signal'></i> Tanggal Ambil/Proses</th>

					<th><i class='icon-signal'></i> Cetak</th>
                </tr>
            </thead>
    <tbody>
<?php	

	$query = mysqli_query($conn, "SELECT * FROM orderan WHERE nama='$usr2'");
	$i=1;
	while($data = mysqli_fetch_array ($query)){
?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $data['nama'];?></td>		 

		<td><?php echo $data['jenis_laundry'];?></td>
		<td><?php echo $data['jenis_laundry2'];?></td>		 

		<td><?php echo $data['jenis_pembayaran'];?></td>
		<td><?php echo $data['tgl_order'];?></td>
		
		<td><?php echo $data['gps'];?></td>	
		<td><?php echo $data['tgl_order2'];?></td>


		<td><?php echo $data['alamat'];?></td>		 


		<td><?php echo $data['status'];?></td>

		<td><a href="orderan/kwitansi.php?id=<?php echo $data['username'];?>" target="_blank">Cetak </a></td>
    </tr>
	
	<?php $i=$i+1; ?>
<?php } ?>
	</tbody>
	
<script>
    $(document).ready(function() {
	   $('#table').DataTable();
	} );
</script>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->   