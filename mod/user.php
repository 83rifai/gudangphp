<link href="./css/media.css" rel="stylesheet" type="text/css">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">


<script type="text/javascript">	

$(function(){
    $("#user").submit(function(){
		
		var nama     = $.trim($('#nama').val());
		var password = $.trim($('#pass').val());
		var level    = $.trim($('#level').val());
		
		
    if(nama == ''){
			alert("Nama Pengguna Tidak Boleh Kosong");
			return false;
		}else if(password == ''){
			alert("Password Tidak Boleh Kosong");
			return false;
		}else if(level == ''){
			alert("Level Tidak Boleh Kosong");
			return false;
		}
    });
});


$(document).ready(function(){
		
		$("#fgambar1").change(function(){
	   	   document.getElementById("fgambar2").value = this.value;
		});
		
	});
    
</script>
    
<?php

	function doBrowse(){
	$query=mysql_query("select * from user")or die("gagal".mysql_error());
	
	?>
    <div class="tabelku">
    <div class="content-header">
    <a href="?mod=user&act=adduser" class="blue_solid">tambah user</a></div>
    <br>
        <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                       <th>No</th>
                       <th>Nama</th>
                       <th>Level</th>
					   <th>Foto</th>
                       <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
               
               <?php
			   $no=0;
			   while($r=mysql_fetch_array($query)){
				   $ft = $r[foto];
				   $no++;
			   ?>
                    <tr>
                       <td><?php echo"$no";?></td>
                       <td><?php echo"$r[username]";?></td>
                       <td><?php echo"$r[level]";?></td>
					   <td>
					   <?php if($ft <> ''){ ?>
						<img src="foto/<?php echo"$r[foto]";?>" width="50" height="50" style="border-radius:100%">
					   <?php }else{?>
					    <img src="foto/kosong.png" width="50" height="50" style="border-radius:100%">
					   <?php }?>
					   </td>
                       <td><a href="?mod=user&act=edituser&id=<?php echo"$r[id]";?>" class="btn btn-info"><i class="fa fa-edit"></i></a> | 
                       <a href="aksi.php?mod=user&act=hapus1&id=<?php echo"$r[id]";?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin, ingin menghapus data ini?')" ><i class="fa fa-trash-o"></i></a></td>
                    </tr>
               <?php
			   }
			   ?>
             </tbody>
        </table>
    </div>
    
<?php
    }
    /////// function tambah ////////
    function doAdd(){
    $aksi = $_GET[act];  
?>
<div class="tabelku col-md-11">
		<form action="aksi.php?mod=user&act=insert" method="post" id="user" enctype="multipart/form-data">
            <?php
            	//no max untuk id
                $id=mysql_query("select  ifnull(max(id),0)+1 AS id from user ")or die("gagal".mysql_error());
            	$f=mysql_fetch_array($id);
           	    
                if($aksi == "edituser"){
           	        $edit=mysql_query("select * from user where id='$_GET[id]'");
	                $d=mysql_fetch_array($edit); 
                    $pass = md5($d[password]);   
           	       }
            ?>       
        <input type="hidden" name="id" id="id" value="<?php echo"$f[id]";?>" />
        <input type="hidden" name="aksi" id="aksi" value="<?php echo"$aksi";?>" />
        <input type="hidden" name="id2" id="id2" value="<?php echo"$_GET[id]";?>" />   
        
            <div class="form-group">
               <label>Nama</label>
               <input class="form-control1" placeholder="Nama user" id="nama" name="nama" type="text" value="<?php echo"$d[username]"?>"/>
            </div>
            <div class="form-group">
               <label>Password</label>
			   <input type="text" class="form-control1" placeholder="Password" name="pass" id="pass" value=""/>
            </div>
            <div class="form-group">
               <label>Level</label><br>
              <?php if($aksi == "edituser"){ ?>
                   <select class='form-control1' name="level" id="level">
                        <option value="<?php echo"$d[level]" ?>"><?php echo"$d[level]" ?></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                   </select> 
               <?php }else{ ?>
                   <select class='form-control1' name="level" id="level">
                        <option value="">-- Pilih Level User --</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                   </select>
               <?php } ?>
            </div>
            
            <div class="form-group">
               <label>Foto User</label>
                <?php if($aksi == "edituser"){ ?>
                    <input type="file" name="fgambar1" id="fgambar1" size="40" value="">
                    <input type="hidden" name="fgambar2" id="fgambar2" size="40" value="<?php echo"$d[foto]";?>">
                <?php }else{ ?>
                    <input type="file" name="fgambar1" id="fgambar1" size="40">
                    <input type="hidden" name="fgambar2" id="fgambar2" size="40" value="">
                <?php } ?>
            </div>
            <br><br>
			<div class="form-group" >
               <input type="submit" class="btn btn-info" value="simpan">
               <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="batal">
			</div>                               
		</form>

</div>
<?php
}
/////// akhir function tambah ////////
?>

<?php
/////// akhir function edit //////// 
switch($_GET['act']){
    default:
        doBrowse();
     break;
	case "adduser":
        doAdd();
     break;
	case "edituser":
        doAdd();
     break;

break;
}
?>

