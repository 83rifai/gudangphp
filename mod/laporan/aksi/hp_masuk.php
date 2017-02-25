<?php
include"../../../config/koneksi.php";

$delete=mysql_query("Delete from tr_brg_masuk where id='$_GET[id]'");

$delete1=mysql_query("Delete from td_brg_masuk where id='$_GET[id]'");

     if($delete && $delete1){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil terhapus..');
                      window.location = \"http://localhost/gudang/media.php?mod=brg_masuk\";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal terhapus..');
                      window.location = \"http://localhost/gudang/media.php?mod=brg_masuk\";
                  </script>";
            }
?>