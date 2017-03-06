/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : gudang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2017-03-06 09:51:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- View structure for data_produk
-- ----------------------------
DROP VIEW IF EXISTS `data_produk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER  VIEW `data_produk` AS SELECT
	master_produk.id,
	master_produk.nama,
	master_produk.satuan_id,
	master_produk.warna,
	master_produk.stock,
	master_produk.konversi_satuan_id,
	master_produk.jenis_id,
	master_produk.kode,
	getSatuan(konversi_satuan.satuan_terkecil) as satuan_terkecil,
	getSatuan(konversi_satuan.satuan_terbesar) as satuan_terbesar,
	master_jenis.nama AS jenis
FROM
	master_produk
JOIN konversi_satuan ON konversi_satuan.id = master_produk.konversi_satuan_id
JOIN master_jenis ON master_produk.jenis_id = master_jenis.id ;

-- ----------------------------
-- View structure for data_produk_keluar
-- ----------------------------
DROP VIEW IF EXISTS `data_produk_keluar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER  VIEW `data_produk_keluar` AS SELECT
master_produk.nama,
getSatuan(konversi_satuan.satuan_terbesar) AS satuan_terbesar,
getSatuan(konversi_satuan.satuan_terkecil) AS satuan_terkecil,
trans_produk_keluar_detail.id,
trans_produk_keluar_detail.trans_produk_keluar_id,
trans_produk_keluar_detail.master_produk_id,
trans_produk_keluar_detail.master_satuan_id,
trans_produk_keluar_detail.konversi_satuan_id,
trans_produk_keluar_detail.jumlah
FROM
trans_produk_keluar_detail
JOIN master_produk ON master_produk.id = trans_produk_keluar_detail.master_produk_id
LEFT JOIN konversi_satuan ON konversi_satuan.id = trans_produk_keluar_detail.konversi_satuan_id ;

-- ----------------------------
-- View structure for data_produk_masuk
-- ----------------------------
DROP VIEW IF EXISTS `data_produk_masuk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER  VIEW `data_produk_masuk` AS SELECT
	trans_produk_masuk_detail.id,
	trans_produk_masuk_detail.master_produk_id,
	trans_produk_masuk_detail.jumlah,
	trans_produk_masuk_detail.konversi_satuan_id,
	trans_produk_masuk_detail.trans_produk_masuk_header_id,
	master_produk.nama,
	getSatuan (
		konversi_satuan.satuan_terbesar
	) satuan_terbesar,
	getSatuan (
		konversi_satuan.satuan_terkecil
	) satuan_terkecil
FROM
	trans_produk_masuk_detail
JOIN master_produk ON master_produk.id = trans_produk_masuk_detail.master_produk_id
LEFT JOIN konversi_satuan ON konversi_satuan.id = trans_produk_masuk_detail.konversi_satuan_id ;

-- ----------------------------
-- View structure for data_produk_retur
-- ----------------------------
DROP VIEW IF EXISTS `data_produk_retur`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER  VIEW `data_produk_retur` AS SELECT
master_produk.nama,
getSatuan(konversi_satuan.satuan_terbesar) AS satuan_terbesar,
getSatuan(konversi_satuan.satuan_terkecil) AS satuan_terkecil,
trans_produk_retur_detail.id,
trans_produk_retur_detail.master_produk_id,
trans_produk_retur_detail.jumlah,
trans_produk_retur_detail.trans_produk_retur_header_id,
trans_produk_retur_detail.konversi_satuan_id
FROM
trans_produk_retur_detail
JOIN master_produk ON master_produk.id = trans_produk_retur_detail.master_produk_id
LEFT JOIN konversi_satuan ON konversi_satuan.id = trans_produk_retur_detail.konversi_satuan_id ;

-- ----------------------------
-- View structure for data_satuan_konversi
-- ----------------------------
DROP VIEW IF EXISTS `data_satuan_konversi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER  VIEW `data_satuan_konversi` AS SELECT
	konversi_satuan.id,
	getSatuan(konversi_satuan.satuan_terbesar) as satuan_terbesar,
	getSatuan(konversi_satuan.satuan_terkecil) as satuan_terkecil,
	konversi_satuan.jumlah
FROM
	konversi_satuan ;
