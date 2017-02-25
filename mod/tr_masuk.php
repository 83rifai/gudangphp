<?php
include"../../config/koneksi.php";

$tgl			=$_POST['tgl'];
$kd_tr_masuk	=$_POST['kd_tr_masuk'];
$nm_barang		=$_POST['nm_barang']['nama'];
$kd_barang		=$_POST['kd_barang'];
$kd_satuan		=$_POST['kd_satuan'];
$satuan			=$_POST['satuan']['satuan'];
$jumlah			=$_POST['jumlah']['jumlah'];

echo"($tgl | $kd_tr_masuk | $nm_barang |$satuan |$jumlah) <br>"


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

			
			 if($insert1){
						echo "<script type=\"text/javascript\">
							  alert('Data berhasil tersimpan..');
						 </script>";
						
						echo "<script type=\"text/javascript\">
							 var answer = confirm('Lanjut Input Nilai?')
							  if (answer){
									   window.location = \" media.php?mod=nilai_d&id=$nisn&id2=$id_mapel\";	
								}
								else{
										window.location = \" media.php?mod=nilai \";
								}
							   </script>	
								";
					}else{
						echo "<script type=\"text/javascript\">
							  alert('Data gagal tersimpan..');
							  window.location = \" media.php?mod=nilai&act=addnilai \";
						  </script>";
					}


 
	/*echo" insert into nilai(id,nisn,kd_guru,km,semester,thn_ajaran,kelas)
			values('$id','$nisn','$kd_guru','$id_mapel','$semester','$thn_ajaran','$kelas')";
	*/
	
?>