<?php
include"../../../config/koneksi.php";
$kd_tr			=$_GET['id'];
echo" <script type=\"text/javascript\">
			window.open('ctk_srt_keluar.php?kd_tr=$kd_tr' ,'_blank');
		</script>";

echo"<script type=\"text/javascript\">
			window.location=\"../../../media.php?mod=brg_keluar\";
		</script>
		";

?>