<?php
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

	                            break;
                        case "hapus":
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM transaksi2 WHERE id='$_GET[id]'");
  header('location:../index.php?p=olahko');
	                            break;
                        case "update":
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE transaksi2 SET jenis_laundry='$_POST[jenis_laundry]',jenis_pembayaran='$_POST[jenis_pembayaran]',tgl_order='$_POST[tgl_order]',  gps='$_POST[gps]', status='$_POST[status]', username='$_POST[username]' WHERE id='$_POST[id]'");
							 
  header('location:../index.php?p=olahko');  
	}
                    ?>
      
      