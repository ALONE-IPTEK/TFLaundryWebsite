
<?php

$aksi="order/proses.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Data Order</h3> 
                                    </div>  <div class='panel-body'> 
                                   <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th><i class='icon-time'></i> Nama</th>
                                            <th><i class='icon-time'></i> Jenis Laundry</th>
                                            <th><i class='icon-signal'></i> Jenis Pembayaran/Kg</th>
                                            <th><i class='icon-signal'></i> Tanggal Order/Kg</th>
                                            <th><i class='icon-signal'></i> GPS</th>
                                            <th><i class='icon-signal'></i> Status</th>
										<th><i class='icon-chevron-right'></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM transaksi2 ORDER BY id");
							while($r=mysqli_fetch_array($tp)){
						    //$hargaa = $r['harga'];
                             echo"<tr>
									<td>$r[username]</td>

                                    <td>$r[jenis_laundry]</td>
									<td>$r[jenis_pembayaran]</td>
									<td>$r[tgl_order]</td>
									<td>$r[gps]</td>
									<td>$r[status]</td>


                                    <td><a class='btn btn-primary' href='?p=transaksi2&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
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
	$edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM transaksi2 WHERE id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "<form method='post' action='transaksi2/proses.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Edit Jenis Laundry</h3> 
                                    </div>  <div class='panel-body'> 
					<input type='hidden' name='id' value='$r[id]'>
					 <div class='control-group'>
					   <div class='form-group'>
                            <label>Jenis</label>
                            <div class='span9'><input class='form-control' value='$r[jenis2]'  type='text' name='jenis2' /></div>
                        </div>						
					   <div class='form-group'>
                            <label>Harga/Kg</label>
                            <div class='span9'><input class='form-control' size='16' type='number' value='$r[harga]' name='harga' /></div>
                        </div>
					<Br>

			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=harga'>Batal</a>
		  </form>
		</div> 
		                  
		                  
                    </div></div>
					
		";
echo "";
break;

			}//penutup switch
?>    
</body>

</html>