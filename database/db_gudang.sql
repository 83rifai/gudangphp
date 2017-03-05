/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : gudang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2017-03-06 04:20:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for konversi_satuan
-- ----------------------------
DROP TABLE IF EXISTS `konversi_satuan`;
CREATE TABLE `konversi_satuan` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`parent`  int(11) NULL DEFAULT NULL ,
`satuan_terbesar`  int(11) NULL DEFAULT 0 ,
`satuan_terkecil`  int(11) NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT 1 ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of konversi_satuan
-- ----------------------------
BEGIN;
INSERT INTO `konversi_satuan` VALUES ('1', '0', '0', '1', '1'), ('2', '1', '1', '2', '4'), ('3', '2', '2', '3', '500');
COMMIT;

-- ----------------------------
-- Table structure for master_jenis
-- ----------------------------
DROP TABLE IF EXISTS `master_jenis`;
CREATE TABLE `master_jenis` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of master_jenis
-- ----------------------------
BEGIN;
INSERT INTO `master_jenis` VALUES ('1', 'HVS_A4');
COMMIT;

-- ----------------------------
-- Table structure for master_merk
-- ----------------------------
DROP TABLE IF EXISTS `master_merk`;
CREATE TABLE `master_merk` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of master_merk
-- ----------------------------
BEGIN;
INSERT INTO `master_merk` VALUES ('1', 'Sinar Dunia'), ('2', 'Kiky'), ('3', 'Pilot'), ('4', 'Standart');
COMMIT;

-- ----------------------------
-- Table structure for master_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `master_pelanggan`;
CREATE TABLE `master_pelanggan` (
`id`  int(25) NOT NULL ,
`nama`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`alamat`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`no_telp`  int(25) NULL DEFAULT NULL ,
`email`  varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of master_pelanggan
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for master_produk
-- ----------------------------
DROP TABLE IF EXISTS `master_produk`;
CREATE TABLE `master_produk` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`merk_id`  int(11) NULL DEFAULT NULL ,
`satuan_id`  int(11) NULL DEFAULT NULL ,
`warna`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`stock`  int(11) NULL DEFAULT 0 ,
`konversi_satuan_id`  int(11) NULL DEFAULT NULL ,
`jenis_id`  int(11) NULL DEFAULT NULL ,
`kode`  varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of master_produk
-- ----------------------------
BEGIN;
INSERT INTO `master_produk` VALUES ('1', 'SIDU HVS 110gram', null, null, 'Putih', '4', '1', '1', 'S0001');
COMMIT;

-- ----------------------------
-- Table structure for master_satuan
-- ----------------------------
DROP TABLE IF EXISTS `master_satuan`;
CREATE TABLE `master_satuan` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of master_satuan
-- ----------------------------
BEGIN;
INSERT INTO `master_satuan` VALUES ('1', 'DUS'), ('2', 'BOX'), ('3', 'RIM'), ('4', 'LEMBAR'), ('5', 'PIECES');
COMMIT;

-- ----------------------------
-- Table structure for master_suplier
-- ----------------------------
DROP TABLE IF EXISTS `master_suplier`;
CREATE TABLE `master_suplier` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`alamat`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`no_telp`  int(25) NULL DEFAULT NULL ,
`email`  varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of master_suplier
-- ----------------------------
BEGIN;
INSERT INTO `master_suplier` VALUES ('1', 'Supplier', null, null, null);
COMMIT;

-- ----------------------------
-- Table structure for merk
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nm_merk`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of merk
-- ----------------------------
BEGIN;
INSERT INTO `merk` VALUES ('M1', 'Merk 1'), ('N1', 'Natural'), ('P1', 'Pilot');
COMMIT;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
`id`  int(25) NOT NULL ,
`nm_pelanggan`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`almt_pelanggan`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_telp`  int(25) NOT NULL ,
`email`  varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
BEGIN;
INSERT INTO `pelanggan` VALUES ('1', 'PT Axibis', 'Jl. Kanggotan No 2 Jebres Surakarta', '2147483647', 'fatoni.work@gmail.com'), ('2', 'candra', 'cilegon', '123456', 'vgvgvgvgu7'), ('3', 'aaaa', 'aaaaa', '1235', 'asdfg'), ('4', 'asasa', 'asasa', '123456', 'gdgdgd');
COMMIT;

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
`id_satuan`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`st_besar`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`st_sedang`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`st_kecil`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_satuan`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of satuan
-- ----------------------------
BEGIN;
INSERT INTO `satuan` VALUES ('S1.S1.K1', 'S1', 'S1', 'K1'), ('S3.S2.K2', 'S3', 'S2', 'K2'), ('S3.S2.K3', 'S3', 'S2', 'K3');
COMMIT;

-- ----------------------------
-- Table structure for satuan_besar
-- ----------------------------
DROP TABLE IF EXISTS `satuan_besar`;
CREATE TABLE `satuan_besar` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of satuan_besar
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for satuan_kecil
-- ----------------------------
DROP TABLE IF EXISTS `satuan_kecil`;
CREATE TABLE `satuan_kecil` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of satuan_kecil
-- ----------------------------
BEGIN;
INSERT INTO `satuan_kecil` VALUES ('1', 'RIM', '500');
COMMIT;

-- ----------------------------
-- Table structure for satuan_sedang
-- ----------------------------
DROP TABLE IF EXISTS `satuan_sedang`;
CREATE TABLE `satuan_sedang` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of satuan_sedang
-- ----------------------------
BEGIN;
INSERT INTO `satuan_sedang` VALUES ('1', 'DUS', '1');
COMMIT;

-- ----------------------------
-- Table structure for sedang
-- ----------------------------
DROP TABLE IF EXISTS `sedang`;
CREATE TABLE `sedang` (
`id`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(15) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of sedang
-- ----------------------------
BEGIN;
INSERT INTO `sedang` VALUES ('S1', 'Satuan Sedang', '10'), ('S2', 'box', '1');
COMMIT;

-- ----------------------------
-- Table structure for suplier
-- ----------------------------
DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier` (
`id`  int(25) NOT NULL ,
`nm_suplier`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`almt_suplier`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_telp`  int(25) NOT NULL ,
`email`  varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of suplier
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for trans_produk_keluar_detail
-- ----------------------------
DROP TABLE IF EXISTS `trans_produk_keluar_detail`;
CREATE TABLE `trans_produk_keluar_detail` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`trans_produk_keluar_id`  int(11) NULL DEFAULT NULL ,
`master_produk_id`  int(11) NULL DEFAULT NULL ,
`master_satuan_id`  int(11) NULL DEFAULT NULL ,
`konversi_satuan_id`  int(11) NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of trans_produk_keluar_detail
-- ----------------------------
BEGIN;
INSERT INTO `trans_produk_keluar_detail` VALUES ('1', null, null, null, null, null), ('2', null, null, null, null, null), ('3', null, null, null, null, null), ('4', '7', '1', null, null, '2');
COMMIT;

-- ----------------------------
-- Table structure for trans_produk_keluar_header
-- ----------------------------
DROP TABLE IF EXISTS `trans_produk_keluar_header`;
CREATE TABLE `trans_produk_keluar_header` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nomor_transaksi`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`tanggal`  date NULL DEFAULT NULL ,
`master_pelanggan_id`  int(11) NULL DEFAULT NULL ,
`purchase_order`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`delivery_order`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of trans_produk_keluar_header
-- ----------------------------
BEGIN;
INSERT INTO `trans_produk_keluar_header` VALUES ('6', 'BL-05031700', '2017-03-05', '0', null, null), ('7', 'BL-05031700', '2017-03-05', '0', null, null);
COMMIT;

-- ----------------------------
-- Table structure for trans_produk_masuk_detail
-- ----------------------------
DROP TABLE IF EXISTS `trans_produk_masuk_detail`;
CREATE TABLE `trans_produk_masuk_detail` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`master_produk_id`  int(11) NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
`konversi_satuan_id`  int(11) NULL DEFAULT NULL ,
`trans_produk_masuk_header_id`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of trans_produk_masuk_detail
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for trans_produk_masuk_header
-- ----------------------------
DROP TABLE IF EXISTS `trans_produk_masuk_header`;
CREATE TABLE `trans_produk_masuk_header` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`tanggal`  date NULL DEFAULT NULL ,
`nomor_transaksi`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`id_suplier`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of trans_produk_masuk_header
-- ----------------------------
BEGIN;
INSERT INTO `trans_produk_masuk_header` VALUES ('3', '2017-02-28', 'BM-280217001', '1'), ('4', '2017-02-28', 'BM-280217001', '1'), ('5', '2017-02-28', 'BM-280217001', '1'), ('6', '2017-02-28', 'BM-280217001', '1'), ('7', '2017-02-28', 'BM-280217001', '1'), ('8', '2017-03-05', '', '0'), ('9', '2017-03-05', '', '0');
COMMIT;

-- ----------------------------
-- Table structure for trans_produk_retur_detail
-- ----------------------------
DROP TABLE IF EXISTS `trans_produk_retur_detail`;
CREATE TABLE `trans_produk_retur_detail` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`master_produk_id`  int(11) NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
`konversi_satuan_id`  int(11) NULL DEFAULT NULL ,
`trans_produk_retur_header_id`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of trans_produk_retur_detail
-- ----------------------------
BEGIN;
INSERT INTO `trans_produk_retur_detail` VALUES ('1', null, null, null, '13'), ('2', '1', null, null, '14'), ('3', '1', '2', '0', '15'), ('4', '1', '2', '0', '16');
COMMIT;

-- ----------------------------
-- Table structure for trans_produk_retur_header
-- ----------------------------
DROP TABLE IF EXISTS `trans_produk_retur_header`;
CREATE TABLE `trans_produk_retur_header` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`tanggal`  date NULL DEFAULT NULL ,
`nomor_transaksi`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`master_pelanggan_id`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=17

;

-- ----------------------------
-- Records of trans_produk_retur_header
-- ----------------------------
BEGIN;
INSERT INTO `trans_produk_retur_header` VALUES ('10', '2017-03-05', 'BR-05031700', '0'), ('11', '2017-03-05', 'BR-05031700', '0'), ('12', '2017-03-05', 'BR-05031700', '0'), ('13', '2017-03-05', 'BR-05031700', '0'), ('14', '2017-03-05', 'BR-05031700', '0'), ('15', '2017-03-05', 'BR-05031700', '0'), ('16', '2017-03-05', 'BR-05031700', '0');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`id`  int(5) NOT NULL ,
`username`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`password`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`level`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`foto`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', ''), ('3', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'user', '');
COMMIT;

-- ----------------------------
-- View structure for data_produk
-- ----------------------------
DROP VIEW IF EXISTS `data_produk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER  VIEW `data_produk` AS SELECT
	master_produk.id,
	master_produk.nama,
	master_produk.merk_id,
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
-- Function structure for getSatuan
-- ----------------------------
DROP FUNCTION IF EXISTS `getSatuan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getSatuan`(ID int(11)) RETURNS varchar(150) CHARSET latin1
BEGIN
	DECLARE _result VARCHAR(150);

	SELECT master_satuan.nama INTO _result FROM master_satuan WHERE master_satuan.id = ID;

	RETURN IFNULL(_result,0);
END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for konversi_satuan
-- ----------------------------
ALTER TABLE `konversi_satuan` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for master_jenis
-- ----------------------------
ALTER TABLE `master_jenis` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for master_merk
-- ----------------------------
ALTER TABLE `master_merk` AUTO_INCREMENT=5;
DROP TRIGGER IF EXISTS `auto_code`;
DELIMITER ;;
CREATE TRIGGER `auto_code` BEFORE INSERT ON `master_produk` FOR EACH ROW begin

DECLARE _first VARCHAR(20);
DECLARE _second VARCHAR(20);


SET _first = UPPER(SUBSTR(NEW.nama,1,1));

SELECT LPAD(IFNULL(MAX(SUBSTR(kode,2,4))+1,1),4,'0') INTO _second FROM master_produk WHERE SUBSTR(kode,1,1) = _first;

SET NEW.kode = CONCAT(_first,_second);
end
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for master_produk
-- ----------------------------
ALTER TABLE `master_produk` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for master_satuan
-- ----------------------------
ALTER TABLE `master_satuan` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for master_suplier
-- ----------------------------
ALTER TABLE `master_suplier` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for satuan_besar
-- ----------------------------
ALTER TABLE `satuan_besar` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for satuan_kecil
-- ----------------------------
ALTER TABLE `satuan_kecil` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for satuan_sedang
-- ----------------------------
ALTER TABLE `satuan_sedang` AUTO_INCREMENT=2;
DROP TRIGGER IF EXISTS `auto_update_stock_keluar`;
DELIMITER ;;
CREATE TRIGGER `auto_update_stock_keluar` AFTER INSERT ON `trans_produk_keluar_detail` FOR EACH ROW BEGIN

DECLARE OLDstock int(11);
DECLARE sum int(11);

SELECT IFNULL(master_produk.stock,0)  INTO OLDstock FROM master_produk WHERE master_produk.id =NEW.master_produk_id;

SET sum = OLDstock - NEW.jumlah;

UPDATE master_produk SET master_produk.stock = sum where master_produk.id = NEW.master_produk_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for trans_produk_keluar_detail
-- ----------------------------
ALTER TABLE `trans_produk_keluar_detail` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for trans_produk_keluar_header
-- ----------------------------
ALTER TABLE `trans_produk_keluar_header` AUTO_INCREMENT=8;
DROP TRIGGER IF EXISTS `auto_update_stock_masuk`;
DELIMITER ;;
CREATE TRIGGER `auto_update_stock_masuk` AFTER INSERT ON `trans_produk_masuk_detail` FOR EACH ROW BEGIN

DECLARE OLDstock int(11);
DECLARE sum int(11);

SELECT IFNULL(master_produk.stock,0)  INTO OLDstock FROM master_produk WHERE master_produk.id =NEW.master_produk_id;

SET sum = OLDstock + NEW.jumlah;

UPDATE master_produk SET master_produk.stock = sum where master_produk.id = NEW.master_produk_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for trans_produk_masuk_detail
-- ----------------------------
ALTER TABLE `trans_produk_masuk_detail` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for trans_produk_masuk_header
-- ----------------------------
ALTER TABLE `trans_produk_masuk_header` AUTO_INCREMENT=10;
DROP TRIGGER IF EXISTS `auto_update_stock_masuk_copy`;
DELIMITER ;;
CREATE TRIGGER `auto_update_stock_masuk_copy` AFTER INSERT ON `trans_produk_retur_detail` FOR EACH ROW BEGIN

DECLARE OLDstock int(11);
DECLARE sum int(11);

SELECT IFNULL(master_produk.stock,0)  INTO OLDstock FROM master_produk WHERE master_produk.id =NEW.master_produk_id;

SET sum = OLDstock + NEW.jumlah;

UPDATE master_produk SET master_produk.stock = sum where master_produk.id = NEW.master_produk_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for trans_produk_retur_detail
-- ----------------------------
ALTER TABLE `trans_produk_retur_detail` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for trans_produk_retur_header
-- ----------------------------
ALTER TABLE `trans_produk_retur_header` AUTO_INCREMENT=17;
