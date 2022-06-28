<?php
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

	                            break;
                        case "hapus":
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM orderan WHERE id='$_GET[id]'");
  header('location:../index.php?p=dataord');
	                            break;
                        case "update":
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE orderan SET jenis_laundry='$_POST[jenis_laundry]',jenis_pembayaran='$_POST[jenis_pembayaran]',tgl_order='$_POST[tgl_order]', tgl_order2='$_POST[tgl_order2]',gps='$_POST[gps]',status='$_POST[status]' WHERE id='$_POST[id]'");
							 
  header('location:../index.php?p=dataord');  
	}
                    ?>
      