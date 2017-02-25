<?php
include"config/koneksi.php";
$mod=$_GET[mod];
$act=$_GET[act];
if(isset($mod) AND $act=='hapus'){
	mysql_query("Delete from ".$mod." where id='$_GET[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}
elseif($mod=="kategori" AND $act=="insert"){
	$id_kategori      = $_POST[id_kategori];
	$nm_kategori      = $_POST[nm_kategori];
	$aksi     		  = $_POST[aksi];
//	echo"$id_kategori | $nm_kategori | $aksi";
	
	if($aksi <> "editkategori"){
		$insert = mysql_query("insert into kategori(id_kategori,
									  nm_kategori)						
							   VALUES('$id_kategori',
									  '$nm_kategori')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addkategori \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update kategori set nm_kategori      ='$nm_kategori'
												where id_kategori='$id_kategori'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=kategori\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=editkategori&id=$_GET[id]\";
                      </script>";
                }										
    } 
          
         
           
				
}
elseif($mod=="kategori" AND $act=="hapus_kategori"){
	$delete=mysql_query("Delete from kategori where id_kategori='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="barang" AND $act=="insert"){
	$id_jenis      = $_POST[id_jenis];
	$nm_jenis      = $_POST[nm_jenis];
	$id_warna      = $_POST[id_warna];
	$nm_warna      = $_POST[nm_warna];
	$id_merk	   = $_POST[id_merk];
	$nm_merk	   = $_POST[nm_merk];
	$id_satuan	   = $_POST[id_satuan];
	$id			   = $id_jenis.'.'.$id_warna.'.'.$id_merk.'.'.$id_satuan;
	//$id				= $kd_kategori.'.'.$id_barang;
	$id2		   = $_POST[id];
	$aksi     	   = $_POST[aksi];

  // echo $_POST[id_jenis]."<br>";
  // echo $_POST[nm_jenis]."<br>";
  // echo $_POST[id_warna]."<br>";
  // echo $_POST[nm_warna]."<br>";
  // echo $_POST[id_merk]."<br>";
  // echo $_POST[nm_merk]."<br>";
  // echo $_POST[id_satuan]."<br>";
	
	
	echo"insert into barang(id,id_jenis,nm_jenis,id_warna,nm_warna,id_merk,nm_merk,jml_stok)						
							   VALUES('$id','$id_jenis','$nm_jenis','$id_warna','$nm_warna','$id_merk','$nm_merk','0')";
	
	echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	if($aksi <> "editbarang"){
		$insert = mysql_query("insert into barang(id,id_satuan,id_jenis,nm_jenis,id_warna,nm_warna,id_merk,nm_merk,jml_stok)						
							   VALUES('$id','$id_satuan','$id_jenis','$nm_jenis','$id_warna','$nm_warna','$id_merk','$nm_merk','0')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data Sudah Ada..');
                          window.location = \" media.php?mod=$mod&act=addbarang \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update barang set id_jenis  ='$id_jenis',
											   id_satuan ='$id_satuan',	
												nm_jenis ='$nm_jenis',
												id_warna ='$id_warna',
												nm_warna ='$nm_warna',
												id_merk	 ='$id_merk',
												nm_merk	 ='$nm_merk'
												where id ='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=barang\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=editbarang&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="barang" AND $act=="hapus_barang"){
	$delete=mysql_query("Delete from barang where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="satuan" AND $act=="insert"){
	$id2			= $_POST[id];
	$aksi     		= $_POST[aksi];
	$kd_barang      = $_POST[kd_barang];
	$id_satuan    	= $_POST[id_satuan];

	$st_besar       = $_POST[st_besar];
	$st_sedang      = $_POST[st_sedang];
	$st_kecil       = $_POST[st_kecil];
	$id				= $st_besar.'.'.$st_sedang.'.'.$st_kecil;
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	if($aksi <> "editsatuan"){
		$insert = mysql_query("insert into satuan(id_satuan,st_besar,st_sedang,st_kecil)						
							   VALUES('$id','$st_besar','$st_sedang','$st_kecil')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data Sudah Ada tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addsatuan \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update satuan set  st_besar	  ='$st_besar',
												st_sedang	  ='$st_sedang',	
												st_kecil	  ='$st_kecil',	
												id_satuan	  ='$id'
												where id_satuan='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=satuan\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=editsatuan&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="satuan" AND $act=="hapus_satuan"){
	$delete=mysql_query("Delete from satuan where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="pelanggan" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nm_pelanggan   = $_POST[nm_pelanggan];
	$almt_pelanggan = $_POST[almt_pelanggan];
	$no_telp        = $_POST[no_telp];
	$email      	= $_POST[email];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	if($aksi <> "editpelanggan"){
		$insert = mysql_query("insert into pelanggan(id,nm_pelanggan,almt_pelanggan,no_telp,email)						
							   VALUES('$id','$nm_pelanggan','$almt_pelanggan','$no_telp','$email')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addpelanggan \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update pelanggan set nm_pelanggan ='$nm_pelanggan',
												almt_pelanggan ='$almt_pelanggan',
												no_telp	  	   ='$no_telp',	
												email	  	   ='$email'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=pelanggan\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=editpelanggan&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="pelanggan" AND $act=="hapus_pelanggan"){
	$delete=mysql_query("Delete from pelanggan where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="kecil" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nama   		= $_POST[nama];
	$jumlah 		= $_POST[jumlah];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	
	if($aksi <> "editkecil"){
		$insert = mysql_query("insert into kecil(id,nama,jumlah)						
							   VALUES('$id','$nama','$jumlah')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addkecil \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update kecil set nama ='$nama',
												jumlah ='$jumlah'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=kecil\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal terupdate..');
                          window.location = \" media.php?mod=$mod&act=editkecil&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="kecil" AND $act=="hapus_kecil"){
	$delete=mysql_query("Delete from kecil where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="sedang" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nama   		= $_POST[nama];
	$jumlah 		= $_POST[jumlah];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	
	if($aksi <> "editsedang"){
		$insert = mysql_query("insert into sedang(id,nama,jumlah)						
							   VALUES('$id','$nama','$jumlah')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addsedang \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update sedang set nama ='$nama',
												jumlah ='$jumlah'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=sedang\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal terupdate..');
                          window.location = \" media.php?mod=$mod&act=editsedang&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="sedang" AND $act=="hapus_sedang"){
	$delete=mysql_query("Delete from sedang where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="besar" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nama   		= $_POST[nama];
	$jumlah 		= $_POST[jumlah];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	
	if($aksi <> "editbesar"){
		$insert = mysql_query("insert into besar(id,nama,jumlah)						
							   VALUES('$id','$nama','$jumlah')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addbesar \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update besar set nama ='$nama',
												jumlah ='$jumlah'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=besar\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal terupdate..');
                          window.location = \" media.php?mod=$mod&act=editbesar&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="besar" AND $act=="hapus_besar"){
	$delete=mysql_query("Delete from besar where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="jenis" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nama   		= $_POST[nama];
	$kode 			= $_POST[kode];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	
	if($aksi <> "editjenis"){
		$insert = mysql_query("insert into jenis(id,nm_jenis)						
							   VALUES('$id','$nama')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addjenis \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update jenis set nm_jenis ='$nama',
												id ='$id'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=jenis\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal terupdate..');
                          window.location = \" media.php?mod=$mod&act=editjenis&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="jenis" AND $act=="hapus_jenis"){
	$delete=mysql_query("Delete from jenis where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="warna" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nama   		= $_POST[nama];
	$kode 			= $_POST[kode];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	
	if($aksi <> "editwarna"){
		$insert = mysql_query("insert into warna(id,nm_warna)						
							   VALUES('$id','$nama')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addwarna \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update warna set nm_warna ='$nama',
												id ='$id'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=warna\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal terupdate..');
                          window.location = \" media.php?mod=$mod&act=editwarna&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="warna" AND $act=="hapus_warna"){
	$delete=mysql_query("Delete from warna where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="merk" AND $act=="insert"){
	$id				= $_POST[id];
	$id2			= $_POST[id2];
	$aksi     		= $_POST[aksi];
	$nama   		= $_POST[nama];
	$kode 			= $_POST[kode];
	
	
	//echo"$id | $id_barang | $kd_kategori | $nm_barang";
	
	
	if($aksi <> "editmerk"){
		$insert = mysql_query("insert into merk(id,nm_merk)						
							   VALUES('$id','$nama')");
		
		if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addmerk \";
                      </script>";
                }
	}else{
		$update=mysql_query("Update merk set nm_merk ='$nama',
												id ='$id'
												where id='$id2'");
		
		if($update){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=merk\";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal terupdate..');
                          window.location = \" media.php?mod=$mod&act=editmerk&id=$_GET[id]\";
                      </script>";
                }										
    } 
     			
}
elseif($mod=="merk" AND $act=="hapus_merk"){
	$delete=mysql_query("Delete from merk where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="siswa" AND $act=="update"){
	$lokasii=$_FILES['fgambar']['tmp_name'];
	$typee=$_FILES['fgambar']['type'];
	$edit_foto=$_FILES['fgambar']['name'];
	$cb=mysql_fetch_array(mysql_query("select * from siswa where id='$_POST[id]'"))or die("gagal".mysql_error());
	if(!empty($lokasii)){
	move_uploaded_file($lokasii,"foto/$edit_foto");

	mysql_query("Update siswa set nisn='$_POST[nisn]',
								 jurusan='$_POST[koka]',
							     nama='$_POST[nama]',
								 alamat='$_POST[alamat]',
								 tgl_lahir='$_POST[tgl_lahir]',
								 foto='$edit_foto'
								 where id='$_POST[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
	}
	else{
	mysql_query("Update siswa set nisn='$_POST[nisn]',
								 jurusan='$_POST[koka]',
							     nama='$_POST[nama]',
								 alamat='$_POST[alamat]',
								 tgl_lahir='$_POST[tgl_lahir]',
								 foto='$cb[foto]'
								 where id='$_POST[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);	
	}
}
elseif($mod=="siswa" AND $act=="hapus_siswa"){
	$delete=mysql_query("Delete from siswa where nisn='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
elseif($mod=="wali_murid" AND $act=="insert"){
	mysql_query("insert into wali_murid(nisn,
								  nama_ayah,
								  pekerjaan_ayah,
								  nama_ibu,
								  pekerjaan_ibu,
								  alamat_wali,
								  telp_wali)						
						   VALUES('$_POST[nisn]',
						          '$_POST[nama_ayah]',
								  '$_POST[pekerjaan_ayah]',
								  '$_POST[nama_ibu]',
								  '$_POST[pekerjaan_ibu]',
								  '$_POST[alamat_wali]',
								  '$_POST[telp_wali]')") or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}
elseif($mod=="wali_murid" AND $act=="update"){
	mysql_query("Update wali_murid set 
								 nisn='$_POST[nisn]',
							     nama_ayah='$_POST[nama_ayah]',
								 pekerjaan_ayah='$_POST[pekerjaan_ayah]',
								 nama_ibu='$_POST[nama_ibu]',
								 pekerjaan_ibu='$_POST[pekerjaan_ibu]',
								 alamat_wali='$_POST[alamat_wali]',
								 telp_wali='$_POST[telp_wali]'
								 where id='$_POST[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}

elseif($mod=="mata_diklat" AND $act=="insert"){
	mysql_query("insert into mata_diklat(kd_kk,
								  nama_md)						
						   VALUES('$_POST[koka]',
						          '$_POST[nama_md]')") or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}
elseif($mod=="mata_diklat" AND $act=="update"){
	mysql_query("Update mata_diklat set kd_kk='$_POST[koka]',
							     nama_md='$_POST[nama_md]'
								 where id='$_POST[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}

elseif($mod=="kompetensi_keahlian" AND $act=="insert"){
	mysql_query("insert into kompetensi_keahlian(nama_kk)						
						   VALUES('$_POST[nama_kk]')") or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}
elseif($mod=="kompetensi_keahlian" AND $act=="update"){
	mysql_query("Update kompetensi_keahlian set nama_kk='$_POST[nama_kk]'
								 where id='$_POST[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}

elseif($mod=="standar_kompetensi" AND $act=="insert"){
	mysql_query("insert into standar_kompetensi(kd_kk,
												kd_md,
												nama_sk,
												kelas_sk)						
						   				VALUES('$_POST[koka]',
											   '$_POST[mapel]',
											   '$_POST[nama_sk]',
											   '$_POST[kelas_sk]')") or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}

elseif($mod=="standar_kompetensi" AND $act=="update"){
	mysql_query("Update standar_kompetensi set kd_kk='$_POST[koka]',
											   kd_md='$_POST[mapel]',
											   nama_sk='$_POST[nama_sk]',
											   kelas_sk='$_POST[kelas_sk]'
								 where id='$_POST[id]'")or die("gagal".mysql_error());
	header('location:media.php?mod='.$mod);
}
// Insert User //
elseif($mod=="user" AND $act=="insert"){
 //   $nis      = $_POST[nis];
    $nama     = $_POST[nama];
    $level    = $_POST[level];
    $id       = $_POST[id];
    $aksi     = $_POST[aksi];
    $gambar   = $_POST[fgambar2];
    $password = md5($_POST[pass]);
    $lokasi=$_FILES['fgambar1']['tmp_name'];
	$type=$_FILES['fgambar1']['type'];
	$nama_foto=$_FILES['fgambar1']['name'];
	move_uploaded_file($lokasi,"foto/$nama_foto");
   
   if($aksi == "adduser"){
	   
	     /// cek 1 Kelas, 1 Pelajaran di ajarkan oleh 2 Guru atau lebih
            		$sql   = mysql_query("SELECT * FROM user WHERE username='$nama' AND level='$level' ");
                    $sql1  = mysql_num_rows($sql);
					$d	   = mysql_fetch_array($sql);
					$lvl   = $d[level];
                                        
                    if($sql1>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Data Sudah Ada...!!');
                               window.location = \" media.php?mod=$mod&act=adduser \";
                               </script>";
                    }else{
                            $insert=mysql_query("insert into user(
    								  username,
    								  password,
    								  level,
                                      id,
                                      foto)						
    						   VALUES('$nama',
    								  '$password',
    								  '$level',
                                      '$id',
                                      '$nama_foto')");
                    }
                        
         if($insert){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=adduser \";
                      </script>";
                }
                
    }else{
      $lokasii=$_FILES['fgambar1']['tmp_name'];
	  $typee=$_FILES['fgambar1']['type'];
	  $edit_foto=$_FILES['fgambar1']['name'];
        $update = mysql_query("Update user set 
                                         username='$nama',   
        								 password='$password',
                                         level   ='$level',
                                         foto    ='$edit_foto'
                                     where id='$_POST[id2]'");
                if($update){
                        echo "<script type=\"text/javascript\">
        				      alert('Data berhasil tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                         </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
        					  alert('Data gagal tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                          </script>";
                    } 
       /* 
      $lokasii=$_FILES['fgambar1']['tmp_name'];
	  $typee=$_FILES['fgambar1']['type'];
	  $edit_foto=$_FILES['fgambar1']['name'];
      $cb=mysql_fetch_array(mysql_query("select * from user where id='$id'"));
        if(!empty($lokasii)){
        	move_uploaded_file($lokasii,"foto/$edit_foto");
        
            	                     
        	}else{
            	$update =mysql_query("Update Update user set 
                                         nis='$nis',
                                         username='$nama',   
        								 password='$password',
                                         level   ='$level',
                                         foto    ='$edit_foto'
                                     where id='$_POST[id2]'");
            	header('location:media.php?mod='.$mod);	
       	    }
        */
    }            
    
}
elseif($mod=="user" AND $act=="update"){
	$update = mysql_query("Update user set nis='$_POST[nis]',
                                 username='$_POST[nama]',   
								 password='$_POST[password]',
                                 level='$_POST[level]'
                                 where id='$_POST[id]'");
	// header('location:media.php?mod='.$mod);
    if($update){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
}
elseif($mod=="user" AND $act=="hapus1"){
	$delete=mysql_query("Delete from user where id='$_GET[id]'");
//	header('location:media.php?mod='.$mod);
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
// insert Kelas //
elseif($mod=="kelas" AND $act=="insert"){
    $kelas    = $_POST[kelas];
    $jurusan  = $_POST[jurusan];
    $nm_kls   = $_POST[nm_kls];
    $idpk     = $_POST[idpk];
	$id1      = $_POST[kd_kls];
    $id2      = $_POST[id2];
    $aksi     = $_POST[aksi];
	
	$ex 	  = explode(' ',$nm_kls);
	$ex2	  = $ex[2];
	if($ex2 <> $id1){
		$id = $ex2;
	}else{
		$id = $id1;
	}
    
   if($aksi <> "editkelas"){
    	$insert1=mysql_query("insert into kelas(id,kd_kls,kls,jurusan,nm_kls)						
    						   VALUES('$idpk','$id','$kelas','$jurusan','$nm_kls')");
         if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                      </script>";
                }
    }else{
        $update = mysql_query("Update kelas set kls='$kelas',jurusan='$jurusan',nm_kls='$nm_kls',kd_kls='$id' where nm_kls='$_POST[id2]'");
                if($update){
                        echo "<script type=\"text/javascript\">
        				      alert('Data berhasil tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                         </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
        					  alert('Data gagal tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                          </script>";
                    } 
    }
}   
elseif($mod=="kelas" AND $act=="hapus_kelas"){
	$delete=mysql_query("Delete from kelas where nm_kls='$_GET[id]'");
//	header('location:media.php?mod='.$mod);
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
} 
// insert jurusan //
elseif($mod=="jurusan" AND $act=="insert"){
    $jurusan  = $_POST[jurusan];
    $id       = $_POST[id];
    $id2       = $_POST[id2];
    $aksi     = $_POST[aksi];
    
   if($aksi <> "editjurusan"){
    	$insert1=mysql_query("insert into jurusan(id,jrsn)						
    						   VALUES('$id','$jurusan')");
         if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addjurusan \";
                      </script>";
                }
                
    }else{
        $update = mysql_query("Update jurusan set jrsn='$jurusan' where id='$id2'");
                if($update){
                        echo "<script type=\"text/javascript\">
        				      alert('Data berhasil tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                         </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
        					  alert('Data gagal tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                          </script>";
                    } 
    }
}   
elseif($mod=="jurusan" AND $act=="hapus_jurusan"){
	$delete=mysql_query("Delete from jurusan where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
// insert Mata Pelajaran //
elseif($mod=="matpel" AND $act=="insert"){
    $id       = $_POST[id];
    $id2      = $_POST[id2];
    $jurusan  = $_POST[jurusan];
    $mapel    = $_POST[mapel];
    $kd_mapel = $_POST[kd_mapel];
    $kelompok = $_POST[kelompok];
    $kelas    = $_POST[kelas];
    $kkm      = $_POST[kkm];   
    $aksi     = $_POST[aksi];
    
   if($aksi <> "editmatpel"){
    	$insert1=mysql_query("insert into mata_pelajaran(id,km,mapel,kelompok,kelas,jurusan,kkm)						
    						   VALUES('$id','$kd_mapel','$mapel','$kelompok','$kelas','$jurusan','$kkm')");
         if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addjurusan \";
                      </script>";
                }
                
    }else{
        $update = mysql_query("Update mata_pelajaran set 
                                   km      ='$kd_mapel',
                                   mapel   ='$mapel',
                                   kelompok='$kelompok',
                                   kelas   ='$kelas',
                                   jurusan ='$jurusan',
                                   kkm     ='$kkm'
                                where id='$id2'");
                if($update){
                        echo "<script type=\"text/javascript\">
        				      alert('Data berhasil tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                         </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
        					  alert('Data gagal tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                          </script>";
                    } 
    }
}   
elseif($mod=="matpel" AND $act=="hapus_matpel"){
	$delete=mysql_query("Delete from mata_pelajaran where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
// Insert Guru
elseif($mod=="guru" AND $act=="insert"){
    $id       = $_POST[id];
    $id2      = $_POST[id2];
    $kd_km    = $_POST[kd_km];
    $nm_guru  = $_POST[nama_guru];
	$j_kel    = $_POST[j_kel];
    $nip      = $_POST[nip];
    $alamat   = $_POST[alamat];
    $telp_guru= $_POST[telp_guru]; 
	$aksi	  = $_POST[aksi]; 
     
     if($aksi <> "editguru"){
    
       $insert1=mysql_query("insert into guru(id,kd_km,nama_guru,j_kel,nip,alamat,telp_guru)
                                              values('$id','$kd_km','$nm_guru','$j_kel','$nip','$alamat','$telp_guru')");
		if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addguru \";
                      </script>";
                }
				
                
    }else{
        $update = mysql_query("Update guru set 
                                 kd_km='$kd_km',
							     nama_guru='$nm_guru',
								 j_kel='$j_kel',
								 nip='$nip',
								 alamat='$alamat',
								 telp_guru='$telp_guru'
                                where id='$id2'");
                if($update){
                        echo "<script type=\"text/javascript\">
        				      alert('Data berhasil tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                         </script>";
                    }else{
                        echo "<script type=\"text/javascript\">
        					  alert('Data gagal tersimpan..');
                              window.location = \" media.php?mod=$mod \";
                          </script>";
                    } 
    }
	
}
elseif($mod=="guru" AND $act=="hapus_guru"){
	$delete=mysql_query("Delete from guru where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
// Insert Wali Kelas
elseif($mod=="walkel" AND $act=="insert"){
    $id       = $_POST[id];
    $id2      = $_POST[id2];
    $walkel   = $_POST[walkel];
    $kelas    = $_POST[kelas];
//    $jurusan  = $_POST[jurusan];
    $aksi     = $_POST[aksi];
     
       if($aksi <> "editwalkel"){
                    /// cek kelas n jurusan
            		$sql   = mysql_query(" select * from wali_kelas where id_kls='$kelas' ");
                    $sql1  = mysql_num_rows($sql);
                                        
                    if($sql1>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Sudah Ada Wali Kelas...!!');
                               window.location = \" media.php?mod=$mod&act=addwalkel \";
                               </script>";
                    }else{
                             $insert1=mysql_query("insert into wali_kelas(id,nip,id_kls)
                                              values('$id','$walkel','$kelas')");
                    }
                   
                    /// cek Guru
                    /*
                    $sql2   = mysql_query(" select * from wali_kelas where nip='$walkel' ");
                    $sql22  = mysql_num_rows($sql2);
                    
                    /// cek kelas n jurusan
            		$sql   = mysql_query(" select * from wali_kelas where id_kls='$kelas' ");
                    $sql1  = mysql_num_rows($sql);
                                        
                    if($sql1>0 || $sql22>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Kelas / Nama Guru Sudah Ada...!!');
                               window.location = \" media.php?mod=$mod&act=addwalkel \";
                               </script>";
                    }else{
                            $insert1=mysql_query("insert into wali_kelas(id,nip,id_kls,id_jur)
                                              values('$id','$walkel','$kelas','$jurusan')");
                    }
                    */      
			   
          }	else{
				    $sql   = mysql_query(" select * from wali_kelas where id_kls='$kelas' ");
                    $sql1  = mysql_num_rows($sql);
                                        
                    if($sql1>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Sudah Ada Wali Kelas...!!');
                               window.location = \" media.php?mod=$mod&act=editwalkel&id=$id2 \";
                               </script>";
                    }else{
                             $insert1 = mysql_query("Update wali_kelas set 
                                                   nip='$walkel',
                    							   id_kls='$kelas'
                                                  where nip='$id2'");
                    }
                           
          } 
          
          
           if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addwalkel \";
                      </script>";
                }
     
	
}
elseif($mod=="walkel" AND $act=="hapus_walkel"){
	$delete=mysql_query("Delete from wali_kelas where nip='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
// Insert Deskripsi Sikap
elseif($mod=="deskap" AND $act=="insert"){
    $kd_deskap   = $_POST[kd_deskap];
    $kd_kategori = $_POST[kd_kategori];
    $ket  	  	 = $_POST[keterangan];
	$id			 = $kd_deskap.$kd_kategori;
    $aksi     	 = $_POST[aksi];
     
       if($aksi <> "editdeskap"){
                 
                    $insert1=mysql_query("insert into deskap(id,kd_deskripsi,kd_kategori,deskripsi)
                                              values('$id','$kd_deskap','$kd_kategori','$ket')");
                    	   
          }	else{
                   $insert1 = mysql_query("Update deskap set 
                                                   kd_deskripsi='$kd_deskap',
                    							   kd_kategori='$kd_kategori',
												   deskripsi='$ket'
                                                  where id='$id'");
          } 
          
          
           if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=adddeskap \";
                      </script>";
                }
     
	
}
elseif($mod=="deskap" AND $act=="hapus_deskap"){
	$delete=mysql_query("Delete from deskap where id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
} 
// insert jadwal //
elseif($mod=="jadwal" AND $act=="insert"){
    $id       = $_POST[id];
    $id2      = $_POST[id2];
    $nip  	  = $_POST[nip];
    $id_mapel = $_POST[id_mapel];
    $id_kelas = $_POST[id_kelas];   
    $aksi     = $_POST[aksi];
    
	
	 if($aksi <> "editjadwal"){
                    /// cek 1 Kelas, 1 Pelajaran di ajarkan oleh 2 Guru atau lebih
            		$sql   = mysql_query("SELECT * FROM jadwal WHERE id_mapel='$id_mapel' AND id_kelas='$id_kelas' ");
                    $sql1  = mysql_num_rows($sql);
					
					$sql2   = mysql_query("SELECT * FROM jadwal WHERE nip='$nip' AND id_kelas='$id_kelas' ");
                    $sql3  = mysql_num_rows($sql2);
                                        
                    if($sql1>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Sudah ada Guru yang mengajar...!!');
                               window.location = \" media.php?mod=$mod&act=addjadwal \";
                               </script>";
                    }else if($sql3>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Data Gagal Tersimpan...!!');
                               window.location = \" media.php?mod=$mod&act=addjadwal \";
                               </script>";
                    } else{
                             $insert1=mysql_query("insert into jadwal(id_jadwal,nip,id_mapel,id_kelas)						
												  VALUES('$id','$nip','$id_mapel','$id_kelas')");
                    }
                        
			   
          }	else{
                           $insert1 =  mysql_query("Update jadwal set 
												   nip      ='$nip',
												   id_mapel ='$id_mapel',
												   id_kelas ='$id_kelas'
												where id_jadwal='$id2'");
          } 
          
          
           if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addjadwal \";
                      </script>";
                }
}   
elseif($mod=="jadwal" AND $act=="hapus_jadwal"){
	$delete=mysql_query("Delete from jadwal where id_jadwal='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
// parameter Cetak
elseif($mod=="lp_siswa" AND $act=="cetak_siswa"){
	$thn	= $_POST[thn_ajaran];
	$smt	= $_POST[semester];
	$jrs	= $_POST[jurusan];
	$kls	= $_POST[kelas];
	$nip	= $_POST[nip];
     echo "<script type=\"text/javascript\">
			 window.location = \" laporan/lp_siswa.php?thn=$thn&smt=$smt&jrs=$jrs&kls=$kls&nip=$nip \";
			</script>";
    
}
// insert ketidakhadiran //
elseif($mod=="ketidakhadiran" AND $act=="insert"){
//    $id        = $_POST[id];
    $nisn  	   = $_POST[nisn];
    $nip  	   = $_POST[nip];
    $izin 	   = $_POST[izin];
    $sakit 	   = $_POST[sakit];   
    $absen     = $_POST[absen];
	$mapel     = $_POST[mapel];
    $thn       = $_POST[thn];
    $semester  = $_POST[semester];
	$nm_kelas  = $_POST[kls];
	$aksi  	   = $_POST[aksi];


    
	
	 if($aksi <> "editketidakhadiran"){
                    /// cek 1 Kelas, 1 Pelajaran di ajarkan oleh 2 Guru atau lebih
            		$sql   = mysql_query(" SELECT * FROM ketidakhadiran WHERE nisn='$nisn' AND nip='$nip' and kelas='$nm_kelas' ");
                    $sql1  = mysql_num_rows($sql);
                                        
                    if($sql1>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Data Sudah ada...!!');
                               window.location = \" media.php?mod=$mod&act=addketidakhadiran \";
                               </script>";
                    }else{
						
                             $insert1=mysql_query("insert into ketidakhadiran(nisn,nip,izin,sakit,t_keterangan,a_mapel,thn_ajaran,semester,kelas)						
												  VALUES('$nisn','$nip','$izin','$sakit','$absen','$mapel','$thn','$semester','$nm_kelas')");
                    }
                        
			   
          }	else{
                           $insert1 =  mysql_query("Update ketidakhadiran set 
												   nisn	    ='$nisn',
												   nip      ='$nip',
												   izin 	='$izin',
												   sakit 	='$sakit',
												   t_keterangan ='$absen',
												   a_mapel 	='$mapel',
												   thn_ajaran	='$thn',
												   semester		='$semester'
												where nisn='$nisn' AND nip='$nip' and kelas='$nm_kelas'");
          } 
          
          
           if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addketidakhadiran \";
                      </script>";
                }
}   
elseif($mod=="ketidakhadiran" AND $act=="hapus_ketidakhadiran"){
	$delete=mysql_query("Delete from ketidakhadiran where  nisn='$_GET[id]' AND nip='$_GET[id3]' and kelas='$_GET[id2]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    

}
// insert ketidakhadiran //
elseif($mod=="ekskul" AND $act=="insert"){
    $id        = $_POST[id];
    $id2       = $_POST[id2];
    $nisn  	   = $_POST[nisn];
    $nip  	   = $_POST[nip];
    $thn       = $_POST[thn];
    $semester  = $_POST[semester];
	$nilai     = $_POST[nilai];
	$keterangan= $_POST[keterangan];
	$kegiatan  = $_POST[kegiatan];
	$aksi  	   = $_POST[aksi];


    
	
	 if($aksi <> "edit2ekskul"){
                    /* cek 1 Kelas, 1 Pelajaran di ajarkan oleh 2 Guru atau lebih
            		$sql   = mysql_query(" SELECT * FROM ketidakhadiran WHERE nisn='$nisn' AND nip='$nip' and kelas='$nm_kelas' ");
                    $sql1  = mysql_num_rows($sql);
                                        
                    if($sql1>0 ){
                         echo "<script type=\"text/javascript\">
        				       alert('Data Sudah ada...!!');
                               window.location = \" media.php?mod=$mod&act=addketidakhadiran \";
                               </script>";
                    }else{
						*/
						 $insert1=mysql_query("insert into ekstrakulikuler(id,nisn,nip,thn_ajaran,semester,nm_kegiatan,nilai,keterangan)						
											  VALUES('$id','$nisn','$nip','$thn','$semester','$kegiatan','$nilai','$keterangan')");
                   // }
                        
			   
          }	else{
                           $insert1=mysql_query("Update ekstrakulikuler set
												   nisn	    ='$nisn',
												   nip      ='$nip',
												   thn_ajaran	='$thn',
												   semester		='$semester',
												   nm_kegiatan	='$kegiatan',
												   nilai		='$nilai',
												   keterangan	='$keterangan'
												where id='$id2'");
          } 
          
          
           if($insert1){
                    echo "<script type=\"text/javascript\">
    				      alert('Data berhasil tersimpan..');
                          window.location = \" media.php?mod=$mod&act=editekskul&id=$nisn \";
                     </script>";
                }else{
                    echo "<script type=\"text/javascript\">
    					  alert('Data gagal tersimpan..');
                          window.location = \" media.php?mod=$mod&act=addekskul \";
                      </script>";
                }
}   
elseif($mod=="ekskul" AND $act=="hapus_ekskul"){
	$delete=mysql_query("Delete from ekstrakulikuler where  id='$_GET[id]'");
     if($delete){
                echo "<script type=\"text/javascript\">
				      alert('Data berhasil tersimpan..');
                      window.location = \" media.php?mod=$mod&act=editekskul&id=$_GET[id2] \";
                 </script>";
            }else{
                echo "<script type=\"text/javascript\">
					  alert('Data gagal tersimpan..');
                      window.location = \" media.php?mod=$mod \";
                  </script>";
            }
    
}
?>