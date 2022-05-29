<?php
include "../koneksi.php";
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:../login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
$query = mysqli_query($conn, "SELECT * FROM transaksi2  ORDER BY tgl_order");?>
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
					<th><i class='icon-terminal'></i> Jenis Laundry</th>
					<th><i class='icon-signal'></i> Tanggal Transaksi</th>	

					<th><i class='icon-signal'></i> Kwitansi</th>
                </tr>
            </thead>
    <tbody>
<?php

$i=1;
while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $data['jenis_laundry'];?></td>		 
        <td><?php echo $data['tgl_order'];?></td>
		<td><a href="transaksi2/kwitansi.php?id=<?php echo $data['id'];?>" target="_blank">Lihat Kwitansi</a></td>
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