
<?php

$aksi="user/proseskoo.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Olah Konsumen</h3> 
                                    </div>  <div class='panel-body'> 
		 <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
										<th><i class='icon-terminal'></i> No.</th>
                                            <th><i class='icon-terminal'></i> Nama</th>
                                            <th><i class='icon-time'></i> Username</th>
											<th><i class='icon-signal'></i> Alamat</th>
											<th><i class='icon-signal'></i> Telp</th>
											<th><i class='icon-signal'></i> Gender</th>
										<th><i class='icon-chevron-right'></i> Aksi</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM konsumen WHERE level='Konsumen' ORDER BY id");
							while($r=mysqli_fetch_array($tp)){
						    //$hargaa = $r['harga'];
                             echo"<tr>
							        <td>$i</td>
							        <td>$r[nama]</td>
								    <td>$r[username]</td>
                                    <td>$r[alamat]</td>
									<td>$r[telp]</td>
									<td>$r[gender]</td>
                                    <td><a class='btn btn-primary' href='?p=olahkoo&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
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
	$edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM konsumen WHERE id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "<form method='post' action='user/prosesko.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                 <h3 class='panel-title'><i class='fa fa-list'></i> Edit Konsumen</h3> 
                                    </div>  <div class='panel-body'> 
					<input type='hidden' name='id' value='$r[id]'>
					 <div class='control-group'>
					   <div class='form-group'>
                            <label>Nama</label>
                            <div class='span9'><input class='form-control' value='$r[nama]'  type='text' name='nama' /></div>
                        </div>						
					   <div class='form-group'>
                            <label>Username</label>
                            <div class='span9'><input class='form-control' size='16' type='text' value='$r[username]' name='username' disabled/></div>
                        </div>
											   <div class='form-group'>
                            <label>Alamat</label>
                            <div class='span9'><input class='form-control' size='16' type='text' value='$r[alamat]' name='alamat' /></div>
                        </div>
											   <div class='form-group'>
                            <label>Telp</label>
                            <div class='span9'><input class='form-control' size='16' type='text' value='$r[telp]' name='telp' /></div>
                        </div>
											   <div class='form-group'>
                            <label>Gender</label>
                            <div class='span9'>
							<select class='form-control' name='gender'>
							<option value='Laki laki'>Laki laki</option>
							<option value='Perempuan'>Perempuan</option>
							</select></div>
                        </div>
					<Br>

			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=olahko'>Batal</a>
		  </form>
		</div> 
		                  
		                  
                    </div></div>
					
		";
echo "";
break;
			}
?>    
</body>

</html>