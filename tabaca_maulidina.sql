/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : localhost:3306
 Source Schema         : tabaca_maulidina

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 10/08/2022 11:06:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agency
-- ----------------------------
DROP TABLE IF EXISTS `agency`;
CREATE TABLE `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of agency
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of areas
-- ----------------------------
BEGIN;
INSERT INTO `areas` VALUES (8, 'Loby', '2021-04-25 13:47:27', '2021-04-25 13:47:27', NULL);
INSERT INTO `areas` VALUES (9, 'Gudang', '2021-04-25 13:47:35', '2021-04-25 13:47:35', NULL);
INSERT INTO `areas` VALUES (10, 'Office', '2021-04-25 13:47:41', '2021-04-25 13:47:41', NULL);
INSERT INTO `areas` VALUES (11, 'Gudang Induk', '2021-04-25 15:30:00', '2021-04-25 15:30:00', NULL);
INSERT INTO `areas` VALUES (12, 'Gerbang depan', '2021-04-25 15:30:10', '2021-04-25 15:30:10', NULL);
INSERT INTO `areas` VALUES (13, 'Resepsionis', '2021-04-25 15:30:22', '2021-04-25 15:30:22', NULL);
COMMIT;

-- ----------------------------
-- Table structure for badges
-- ----------------------------
DROP TABLE IF EXISTS `badges`;
CREATE TABLE `badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `badge_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `badge_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of badges
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES (18, 'Manager', '2021-04-25 13:48:03', '2021-04-25 13:48:03', NULL, 'General Manager', 10);
INSERT INTO `roles` VALUES (19, 'General Manager', '2021-04-25 15:30:53', '2021-04-25 15:30:53', NULL, 'Mencakup sema area', 13);
COMMIT;

-- ----------------------------
-- Table structure for tamu
-- ----------------------------
DROP TABLE IF EXISTS `tamu`;
CREATE TABLE `tamu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tamu` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kehadiran` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tamu
-- ----------------------------
BEGIN;
INSERT INTO `tamu` VALUES (1, 'Kardun', 'Sukabumiu', NULL, NULL, '2022-08-10 04:00:07', '2022-08-10 04:00:07');
COMMIT;

-- ----------------------------
-- Table structure for template_undangan
-- ----------------------------
DROP TABLE IF EXISTS `template_undangan`;
CREATE TABLE `template_undangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frame` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template_undangan
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Fauzi', 'fauzy.agustian@gmail.com', '085210093953', 'fauzi', '$2y$10$G1sn3BJisq6YoSjik/UcGuXbICpuPIk2XEo35QeQF7sDw5G3b1fNa', '2021-04-19 07:25:20', '2021-04-19 07:25:20', NULL);
INSERT INTO `users` VALUES (2, 'Admin', 'admin@mail.com', '081111', 'admin', '$2y$10$Ph7UnRYD0VM.gGzLrTT5Wu7t6uCin8lR2LprMPMnfcAXoVHEL3hG.', '2021-04-19 13:09:08', '2021-04-19 13:09:08', NULL);
INSERT INTO `users` VALUES (3, 'Arka', 'arka@mail.com', '088373838', 'arka', '$2y$10$8SVdi./3HmSDsP00g8EfFucq81nMriTmHx9KgJyp/uUYfCkpUjVI.', '2021-05-03 11:41:40', '2021-05-03 11:41:40', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
