<?php
include"config/koneksi.php";

$tgl			=$_POST['tgl'];
$kd_tr_masuk	=$_POST['kd_tr_masuk'];
$nm_barang		=$_POST['nm_barang'];
$kd_barang		=$_POST['kd_barang'];
$kd_satuan		=$_POST['kd_satuan'];
$satuan			=$_POST['satuan'];
$jumlah			=$_POST['jumlah'];

$no_max=mysql_query("SELECT ifnull(max(no),0)+1 AS reg  FROM tr_brg_masuk");
$n=mysql_fetch_array($no_max);   

$no = $n[reg];
//insert tr_brg_masuk

$insert1=mysql_query("insert into tr_brg_masuk(id,tgl_masuk,no)
					  values('$kd_tr_masuk','$tgl','$no')");
/*
echo"insert into tr_brg_masuk(id,date_format(tgl_masuk , 'd-m-Y'),no)
					  values('$kd_tr_masuk','$tgl','$no')";
*/
for($i=1;$i<count($nm_barang);$i++){
	$insert1=mysql_query("insert into td_brg_masuk(id,kd_barang,satuan,jumlah)
					  values('$kd_tr_masuk','$kd_barang[$i]','$satuan[$i]','$jumlah[$i]')");
//echo"(tanggal : $tgl| nama: $nm_barang[$i]|  kode : $kd_barang[$i]|  kd_satuan : $kd_satuan[$i]|  satuan : $satuan[$i] | jumlah : $jumlah[$i] | $kd_tr_masuk) <br>";	
}

if($insert1){
		echo "<script type=\"text/javascript\">
			  alert('Data berhasil tersimpan..');
		 </script>";
		
		echo "<script type=\"text/javascript\">
					   window.location = \" media.php?mod=brg_masuk\";	
			   </script>	
				";
	}else{
		echo "<script type=\"text/javascript\">
			  alert('Data gagal tersimpan..');
			  window.location = \" media.php?mod=brg_masuk\ \";
		  </script>";
	}



/*
$sql   = mysql_query(" select * from nilai where nisn='$nisn' and kelas='$kelas' and semester='$semester' and  thn_ajaran='$thn_ajaran' and nip='$kd_guru'");
$sql1  = mysql_num_rows($sql);
                                        
			if($sql1>0 ){
					echo "<script type=\"text/javascript\">
        				       alert('Data Sudah Ada Silahkan Lihat Di Grid Tabel...!!');
                               window.location = \" media.php?mod=nilai&act=addnilai \";
                               </script>";
							
			}else{
					$insert1=mysql_query("insert into nilai(id,nisn,kd_guru,km,semester,thn_ajaran,kelas)
											values('$id','$nisn','$kd_guru','$id_mapel','$semester','$thn_ajaran','$kelas')");
								
			}
			//									   window.location = \" media.php?mod=nilai_d mod/nilai_detail.php \";

			
			 


 
	/*echo" insert into nilai(id,nisn,kd_guru,km,semester,thn_ajaran,kelas)
			values('$id','$nisn','$kd_guru','$id_mapel','$semester','$thn_ajaran','$kelas')";
	*/
	
?>