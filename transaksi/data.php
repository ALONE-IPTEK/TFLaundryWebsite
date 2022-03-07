<div class='panel panel-border panel-primary' role="navigation">
    <div class='panel-heading'>
    <h3 class='panel-title'><i class='fa fa-clock-o'></i> Riwayat Transaksi</h3> 
</div>  

<div class='panel-body'> 
	<div class="row">
        <table id='datatable' class='table table-hover'>
            <thead>
                <tr>
					<th><i class='icon-terminal'></i> No</th>
					<th><i class='icon-signal'></i> Konsumen</th>
					<th><i class='icon-terminal'></i> Jenis Kiloan</th>
					<th><i class='icon-terminal'></i> Jenis Satuan</th>
					<th><i class='icon-signal'></i> Tarif Kiloan</th>
					<th><i class='icon-signal'></i> Tarif Satuan</th>
					<th><i class='icon-signal'></i> Total Satuan dan Kiloan</th>
					<th><i class='icon-signal'></i> Berat Kiloan</th>
					<th><i class='icon-signal'></i> Berat Satuan</th>
					<th><i class='icon-signal'></i> Tanggal Transaksi</th>
					<th><i class='icon-signal'></i> Tanggal Ambil</th>

					<th><i class='icon-signal'></i> Kwitansi</th>
                </tr>
            </thead>
    <tbody>
<?php
$i=1;
$tp=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM transaksi WHERE pengguna='$usr' ORDER BY tgl_transaksi");
while($r=mysqli_fetch_array($tp)){
?>
	<tr>
		<td><?php echo $i;?></td>
							 
            <td><?php echo $r['konsumen'];?></td>
            <td><?php echo $r['jenis'];?></td>
            <td><?php echo $r['jenis2'];?></td>
			<td><?php echo'Rp.' . number_format( $r['tarif'], 0 , '' , '.' ) . ',-'?></td>
			<td><?php echo'Rp.' . number_format( $r['tarif2'], 0 , '' , '.' ) . ',-'?></td>
			<td><?php echo'Rp.' . number_format( $r['jumlah'], 0 , '' , '.' ) . ',-'?></td>
			<td><?php echo $r['berat']?> Kg</td>
			<td><?php echo $r['berat2']?> Kg</td>
			<td><?php echo TanggalIndo($r['tgl_transaksi']);?></td>
			<td><?php echo TanggalIndo($r['tgl_ambil']);?></td>
			<td><a href="transaksi/kwitansi.php?id=<?php echo $r['id'];?>" target="_blank">Lihat Kwitansi</a></td>
    </tr>
	
	<?php $i=$i+1;?>
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