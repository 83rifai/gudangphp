/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : gudang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2017-03-06 09:11:30
*/

SET FOREIGN_KEY_CHECKS=0;

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
