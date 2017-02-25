<?php
$ss=mysql_fetch_array(mysql_query("select count(nisn) as jum from siswa"));
$gg=mysql_fetch_array(mysql_query("select count(id) as juma from guru"));
?>
<div class="row">
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo"$ss[jum]";?>
                                    </h3>
                                    <p>
                                        Barang Masuk
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class=" fa fa-user"></i>
                                </div>
                                <a href="?mod=brg_masuk" class="small-box-footer">
                                    Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                       <?php echo"$gg[juma]";?>
                                    </h3>
                                    <p>
                                        Barang Keluar
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="?mod=brg_keluar" class="small-box-footer">
                                    Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
</div>