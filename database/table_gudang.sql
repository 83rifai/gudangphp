/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : gudang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2017-03-06 09:11:06
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
INSERT INTO `master_produk` VALUES ('1', 'SIDU HVS 110gram', null, 'Putih', '4', '1', '1', 'S0001');
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
-- Auto increment value for konversi_satuan
-- ----------------------------
ALTER TABLE `konversi_satuan` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for master_jenis
-- ----------------------------
ALTER TABLE `master_jenis` AUTO_INCREMENT=2;
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
