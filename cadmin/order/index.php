<?php

include "../koneksi.php";
$usr2   =   ['nama'];
$aksi="order/proses.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-clock-o'></i> Pesanan Masuk</h3> 
                                    </div>  <div class='panel-body'> 
		 <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
										<th><i class='icon-terminal'></i> No.</th>
									<th><i class='icon-terminal'></i> Nama</th>
                                            <th colspan='2'><i class='icon-terminal'></i> Jenis Laundry</th>
                                            <th><i class='icon-time'></i> Jenis Pembayaran</th>
											<th><i class='icon-signal'></i> Tanggal Order</th>
											<th><i class='icon-signal'></i> GPS</th>
											<th><i class='icon-signal'></i> Alamat</th>

											<th><i class='icon-signal'></i> Status</th>
                                            

											<th><i class='icon-signal'></i> Tanggal Ambil/Proses </th>
											<th><i class='icon-signal'></i> ID</th>
                        

										<th><i class='icon-chevron-right'></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysqli_query($conn, "SELECT * FROM orderan ORDER BY id");
							while($r=mysqli_fetch_array($tp)){
						    //$hargaa = $r['harga'];
                             echo"<tr>
							  <td>$i</td>
							   <td>$r[nama]</td>
							    <td>$r[jenis_laundry]</td>
							    <td>$r[jenis_laundry2]</td>

								 <td>$r[jenis_pembayaran]</td>
                                    <td>$r[tgl_order]</td>
									<td>$r[gps]</td>
									<td>$r[alamat]</td>

									<td>$r[status]</td>
									<td>$r[tgl_order2]</td>
									<td>$r[nota]</td>


                                    <td><a class='btn btn-primary' href='?p=dataord&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
									 <a class='btn btn-danger' href='$aksi?act=hapus&id=$r[id]'><i class='icon-trash'></i>Hapus</td>
                                    
                                </tr>";
								$i=$i+1;
							}
                               
                                        
                        echo"</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   ";    

break;
case "edit":
	$edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM orderan WHERE id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "<form method='post' action='order/proses.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                 <h3 class='panel-title'><i class='fa fa-list'></i> Edit Karyawan</h3> 
                                    </div>  <div class='panel-body'> 
					<input type='hidden' name='id' value='$r[id]'>
					 <div class='control-group'>
					   <div class='form-group'>
                            <label>Nama</label>
                            <div class='span9'><input class='form-control' value='$r[nama]'  type='text' name='username' disabled/></div>
                        </div>
					   <div class='form-group'>
                            <label>Jenis Laundry</label>
                            <div class='span9'><input class='form-control' value='$r[jenis_laundry]'  type='text' name='jenis_laundry' /></div>
                        </div>						
                        <div class='form-group'>
                            <label>Jenis Pembayaran</label>
                            <div class='span9'>
                            <select class='form-control' name='jenis_pembayaran'>
                            <option >$r[jenis_pembayaran]</option>
                            <option>QRIS</option>
                            <option>CASH</option>  
                        </select></div></div>
											   <div class='form-group'>
                            <label>Tanggal Order</label>
                            <div class='span9'><input class='form-control' size='16' type='year' value='$r[tgl_order]' name='tgl_order' /></div>
                        </div>
                                              
											   <div class='form-group'>
                            <label>GPS</label>
                            <div class='span9'><input class='form-control' size='16' type='text' value='$r[gps]' name='gps' disabled readonly /></div>
                        </div>
											   <div class='form-group'>
                            <label>Status</label>
                            <div class='span9'>
							<select class='form-control' name='status'>
                            <option >$r[status]</option>
							<option value='AMBIL/PROSES'>AMBIL/PROSES</option>
							<option value='KIRIM'>KIRIM</option>
                            
							</select></div>
                        </div>

                        <div class='form-group'>
                        <label>Tanggal Ambil/Proses</label>
                        <div class='span9'><input class='form-control' size='16' type='year' id='tgl_order2' name='tgl_order2' /></div>
                    </div>
					<Br>

			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=dataord'>Batal</a>
		  </form>
		</div> 
		                  
		                  
                    </div></div>
					
		";
echo "";
break;
			}
?>    

<script>
		
				setInterval(function(){
					console.log( new Date('d'))
					$("#tgl_order2").val(new Date().toLocaleString())
				}, 1000);

        </script>
      
</body>

</html>