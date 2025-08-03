/*
 Navicat Premium Data Transfer

 Source Server         : Local-Server
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : hellofood_db

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 04/08/2025 04:21:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_branches
-- ----------------------------
DROP TABLE IF EXISTS `tbl_branches`;
CREATE TABLE `tbl_branches`  (
  `branch_auto_id` int NOT NULL AUTO_INCREMENT,
  `branch_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_postal_code` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_country` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_mobile` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_receipt_header` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_receipt_footer` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_return_policy` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_bill_prefix` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_bill_date` date NULL DEFAULT NULL,
  `branch_facebook` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_google_plus` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_instagram` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_twitter` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `branch_timezone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_language` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_status` tinyint(1) NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `company_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`branch_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant branches Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_branches
-- ----------------------------
INSERT INTO `tbl_branches` VALUES (1, '170/5 Kudugala road Akurana', '2085', 'Kurunagale', 'Sri lanka', '07773988383', '', 'Receipt header', 'Receipt footer', 'Return policy', 'AKU', '0000-00-00', '', '', '', '', 'Asia/Colombo', 'english', 2, 1);
INSERT INTO `tbl_branches` VALUES (2, 'Main Steet', '2000', 'Akurana', 'Sri Lanka', '0777', 'abc@gmail.com', 'Header', 'Thank you for your business', 'Thank you for your business', 'BLA', '2017-10-27', 'facebook', 'google', 'insta', 'twit', 'Asia/Colombo', 'english', 2, 1);

-- ----------------------------
-- Table structure for tbl_config
-- ----------------------------
DROP TABLE IF EXISTS `tbl_config`;
CREATE TABLE `tbl_config`  (
  `company_auto_id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company_currency_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_currency_decimal` tinyint(1) NULL DEFAULT NULL,
  `company_currency_symbol` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company_print_template` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`company_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant details Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_config
-- ----------------------------
INSERT INTO `tbl_config` VALUES (1, 'ABC', NULL, 'LKR', 2, 'Rs ', 1);

-- ----------------------------
-- Table structure for tbl_expences
-- ----------------------------
DROP TABLE IF EXISTS `tbl_expences`;
CREATE TABLE `tbl_expences`  (
  `expense_auto_id` int NOT NULL AUTO_INCREMENT,
  `expense_date` date NOT NULL,
  `expense_reference` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `expense_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `expense_amount` float NOT NULL,
  `expense_attachment` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `expense_category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `expense_created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_auto_id` int NULL DEFAULT NULL,
  `company_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`expense_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant expences Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_expences
-- ----------------------------
INSERT INTO `tbl_expences` VALUES (1, '2025-07-13', '1', '', 1500, NULL, 'Salary', '', 1, 1);

-- ----------------------------
-- Table structure for tbl_hrm_customers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hrm_customers`;
CREATE TABLE `tbl_hrm_customers`  (
  `customer_auto_id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_secondary_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `customer_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_mobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_discount` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 2,
  `company_auto_id` int NOT NULL,
  PRIMARY KEY (`customer_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant customers Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_hrm_customers
-- ----------------------------
INSERT INTO `tbl_hrm_customers` VALUES (1, 'Nuski', 'ZAR', 'Akurana', 'Kandy', 'zarsa@gmail.com', '0777123', '20', 'Hellooooo', 2, 1);
INSERT INTO `tbl_hrm_customers` VALUES (2, 'Nazran', 'NAZ', 'Akurana', 'Kandy', 'nazi@gmail.com', '07771234560', '50', 'Hello', 2, 1);
INSERT INTO `tbl_hrm_customers` VALUES (3, 'Johnys', 'JGHF', 'First Streets', 'Kandys', 'johnys@gmail.com', '07771231230', '20', 'Hello hei hellloooo', 2, 1);

-- ----------------------------
-- Table structure for tbl_hrm_employees
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hrm_employees`;
CREATE TABLE `tbl_hrm_employees`  (
  `employee_auto_id` int NOT NULL AUTO_INCREMENT,
  `employee_login_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employee_login_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employee_login_status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '2:Active | 3:Deactivate',
  `employee_login_attempt` tinyint(1) NOT NULL DEFAULT 0,
  `employee_login_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `group_auto_id` tinyint NULL DEFAULT NULL,
  `group_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_secondary_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_mobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `employee_city` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `employee_rights` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `employee_img_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `is_admin` tinyint(1) NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `branch_auto_id` int NULL DEFAULT NULL,
  `company_auto_id` int NOT NULL,
  PRIMARY KEY (`employee_auto_id`) USING BTREE,
  INDEX `group_auto_id`(`group_auto_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant employee Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_hrm_employees
-- ----------------------------
INSERT INTO `tbl_hrm_employees` VALUES (1, 'nuskirauf@gmail.com', '5583413443164b56500def9a533c7c70', 2, 0, NULL, 2, 'Owner', 'QWE', 'Nuski Mohamed', '0777123456', 'Akuran', 'Kandy', 'asdf', NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (2, 'nazran.info@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 3, 'Owner', 'NZA', 'Nazran Mohamed', '0777123123', 'Akurana', 'Kandy', 'zxcv', NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (3, 'haniefnagoya@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 5, 'Delivery', 'Aziez', 'Hanief Aziez', '0777123123', 'Akurana', 'Kandy', NULL, NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (4, 'nazran.info@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 4, 'Kitchen', 'NZA', 'Azam Mohamed', '0777123123', 'Akurana', 'Kandy', NULL, NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (5, 'john@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 2, 'Cashier', 'JHN', 'John Macs', '0777123123', 'Akurana', 'Kandy', NULL, NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (6, 'nuskirauf@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 2, 'Cashier', 'QWE', 'Nuski Mohamed', '0777123456', 'Akuran', 'Kandy', 'asdf', NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (7, 'nazran.info@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 3, 'Waiter', 'NZA', 'Nazran Mohamed', '0777123123', 'Akurana', 'Kandy', 'zxcv', NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (8, 'haniefnagoya@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 5, 'Delivery', 'Aziez', 'Hanief Aziez', '0777123123', 'Akurana', 'Kandy', NULL, NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (9, 'nazran.info@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 4, 'Kitchen', 'NZA', 'Azam Mohamed', '0777123123', 'Akurana', 'Kandy', NULL, NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (10, 'john@gmail.com', '25f9e794323b453885f5181f1b624d0b', 3, 0, NULL, 1, 'Owner', 'JHNS', 'John Mac', '07771231230', 'Akuranas', 'Kandys', NULL, NULL, '1.jpg', 3, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (11, 'jonathons@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 0, NULL, 1, 'Owner', 'QWER', 'Jonathons', '07771231230', 'Akuranas', 'Kandys', NULL, NULL, '1.jpg', 2, 2, 1, 1);

-- ----------------------------
-- Table structure for tbl_hrm_suppliers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hrm_suppliers`;
CREATE TABLE `tbl_hrm_suppliers`  (
  `supplier_auto_id` int NOT NULL AUTO_INCREMENT,
  `supplier_company_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `supplier_secondary_code` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_mobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_fax` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `supplier_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 2,
  `company_auto_id` int NOT NULL,
  PRIMARY KEY (`supplier_auto_id`) USING BTREE,
  UNIQUE INDEX `supplier_auto_id`(`supplier_auto_id` ASC) USING BTREE,
  INDEX `supplier_secondary_code`(`supplier_secondary_code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant supplier \r\nCreated By : Nuski Mohamed\r\nDiscussed with : \r\nReviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_hrm_suppliers
-- ----------------------------
INSERT INTO `tbl_hrm_suppliers` VALUES (1, 'New Company', 'MRE', 'qwer@gmail.com', '0777', '08123', 'Akurana', 'Kandy', 'Note', 2, 1);
INSERT INTO `tbl_hrm_suppliers` VALUES (2, 'John Keelss', 'JHNS', 'keels@gmail.com', '07771231230', '08123453450', 'Main Cross Street', 'Colombos', 'hi hello', 2, 1);

-- ----------------------------
-- Table structure for tbl_payments
-- ----------------------------
DROP TABLE IF EXISTS `tbl_payments`;
CREATE TABLE `tbl_payments`  (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `payment_type` tinyint(1) NOT NULL COMMENT '1 : Sales | 2 : Receiving',
  `payment_auto_id` int NULL DEFAULT NULL,
  `payment_method` tinyint(1) NOT NULL COMMENT '1:Cash | 2:Cheque | 3:CreditCard | 4:GiftCard',
  `payment_amount` double(10, 0) NOT NULL,
  `payment_cheque_bank` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_cheque_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_is_party_cheque` tinyint(1) NULL DEFAULT NULL,
  `payment_cheque_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_payments
-- ----------------------------
INSERT INTO `tbl_payments` VALUES (1, 3, NULL, 1, 1100, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_payments` VALUES (2, 1, 2, 1, 500, '', '', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (3, 1, 2, 2, 500, 'Com', '00014', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (4, 1, 6, 1, 350, '', '', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (5, 1, 10, 1, 1050, '', '', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (6, 1, 13, 1, 350, '', '', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (7, 1, 14, 1, 700, '', '', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (8, 1, 15, 1, 700, '', '', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product_quantities
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_quantities`;
CREATE TABLE `tbl_product_quantities`  (
  `product_auto_id` int NOT NULL,
  `branch_auto_id` int NOT NULL,
  `selling_price` double(10, 0) NULL DEFAULT 0,
  `expiry_date` date NULL DEFAULT NULL,
  `quantity` double(10, 0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`product_auto_id`) USING BTREE,
  INDEX `product_auto_id`(`product_auto_id` ASC) USING BTREE,
  INDEX `branch_auto_id`(`branch_auto_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product_quantities
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_products
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE `tbl_products`  (
  `product_auto_id` int NOT NULL AUTO_INCREMENT,
  `product_type_id` tinyint(1) NULL DEFAULT NULL COMMENT '1:Tracking | 2:None Tracking | 3:Srvice | 4: Combination 5: Raw material',
  `product_code` int NOT NULL,
  `product_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_cost` double NOT NULL DEFAULT 0,
  `product_price` double NOT NULL DEFAULT 0,
  `product_wholesale_price` double NULL DEFAULT 0,
  `product_discount` double(2, 0) NOT NULL DEFAULT 0,
  `product_photo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'default.jpg',
  `product_pin` tinyint(1) NULL DEFAULT 3 COMMENT '2:Pined | 3:UnPined',
  `product_sales_count` int NULL DEFAULT 0,
  `product_supplier_auto_id` int NULL DEFAULT NULL,
  `product_reorder_level` tinyint NULL DEFAULT 0,
  `product_options` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `warranty_period` tinyint NULL DEFAULT 0,
  `fixed_price` tinyint(1) NULL DEFAULT 0,
  `company_auto_id` int NOT NULL,
  `branch_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`product_auto_id`) USING BTREE,
  UNIQUE INDEX `uniq_auto_id`(`product_auto_id` ASC) USING BTREE,
  UNIQUE INDEX `uniq_code`(`product_code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant products Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_products
-- ----------------------------
INSERT INTO `tbl_products` VALUES (1, 1, 15, '', 'Rice & Curry', 'Chicken rice', 350, 450, 425, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (2, 1, 11, '', 'Rice & Curry', 'Fish rice', 250, 300, 255, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (3, 1, 12, '', 'Rice & Curry', 'Egg rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (4, 1, 13, '', 'Rice & Curry', 'Vegetable rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (5, 1, 14, '', 'Rice & Curry', 'Beef rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (6, 1, 21, '', 'Fried Rice', 'Fish fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (7, 1, 22, '', 'Fried Rice', 'Egg fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (8, 1, 23, '', 'Fried Rice', 'Vegetable fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (9, 1, 24, '', 'Fried Rice', 'Chicken fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (10, 1, 25, '', 'Fried Rice', 'Beef fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (11, 1, 26, '', 'Fried Rice', 'Sausage fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (12, 1, 27, '', 'Fried Rice', 'Mix fried rice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (13, 1, 31, '', 'Kottu', 'Chicken Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (14, 1, 32, '', 'Kottu', 'Fish Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (15, 1, 33, '', 'Kottu', 'Egg Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (16, 1, 34, '', 'Kottu', 'Vegetable Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (17, 1, 35, '', 'Kottu', 'Beef Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (18, 1, 36, '', 'Kottu', 'Sausage Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (19, 1, 37, '', 'Kottu', 'Dolphin Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (20, 1, 38, '', 'Kottu', 'Chicken  & Cheese Kottu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (21, 1, 41, '', 'Noodls', 'Chicken Noodls', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (22, 1, 42, '', 'Noodls', 'Fish Noodls', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (23, 1, 43, '', 'Noodls', 'Sausage Noodls', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (24, 1, 44, '', 'Noodls', 'Egg Noodls', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (25, 1, 45, '', 'Noodls', 'Vegetable Noodls', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (26, 1, 51, '', 'Biryani', 'Chicken Biryani', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (27, 1, 52, '', 'Biryani', 'Fish Biryani', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (28, 1, 53, '', 'Biryani', 'Beef Biryani', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (29, 1, 54, '', 'Biryani', 'Egg Biryani', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (30, 1, 61, '', 'Hoppers', 'Plain Hoppers', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (31, 1, 62, '', 'Hoppers', 'Egg Hoppers', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (32, 1, 63, '', 'Hoppers', 'Milk Hoppers', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (33, 1, 64, '', 'Hoppers', 'String Hoppers', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (34, 1, 65, '', 'Hoppers', 'Pittu', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (35, 1, 70, '', 'Bun', 'Egg Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (36, 1, 71, '', 'Bun', 'Omelette Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (37, 1, 72, '', 'Bun', 'Fish Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (38, 1, 73, '', 'Bun', 'Seeni Sumble Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (39, 1, 74, '', 'Bun', 'Keels Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (40, 1, 75, '', 'Bun', 'Jam Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (41, 1, 76, '', 'Bun', 'Kimbula Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (42, 1, 77, '', 'Bun', 'Tea Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (43, 1, 78, '', 'Bun', 'Creem Bun', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (44, 1, 81, '', 'Short Eats', 'Egg roll', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (45, 1, 82, '', 'Short Eats', 'Vegetable Roll', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (46, 1, 83, '', 'Short Eats', 'Egg pattice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (47, 1, 84, '', 'Short Eats', 'Vegetable Patties', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (48, 1, 85, '', 'Short Eats', 'Beef pattice', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (49, 1, 1, '', 'Tea', 'Plain Tea', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (50, 1, 2, '', 'Tea', 'Milk Tea', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (51, 1, 3, '', 'Tea', 'Nestomalt', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (52, 1, 4, '', 'Tea', 'Coffee', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (53, 1, 79, '', 'Bun', 'Ada', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);
INSERT INTO `tbl_products` VALUES (54, 1, 86, '', 'Short Eats', 'Samosa', 350, 350, 350, 0, 'default.jpg', 2, 0, 0, 10, '', 2, 0, 1, 1, NULL);

-- ----------------------------
-- Table structure for tbl_receiving
-- ----------------------------
DROP TABLE IF EXISTS `tbl_receiving`;
CREATE TABLE `tbl_receiving`  (
  `receiving_auto_id` int NOT NULL AUTO_INCREMENT,
  `register_auto_id` int NULL DEFAULT NULL,
  `hold_type` tinyint(1) NOT NULL,
  `hold_auto_id` int NOT NULL,
  `number_of_persons` tinyint NULL DEFAULT 0,
  `receiving_date` date NULL DEFAULT NULL,
  `check_in_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `check_out_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `employee_auto_id` int NOT NULL,
  `employee` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `waiter_auto_id` int NULL DEFAULT NULL,
  `waiter` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_auto_id` int NULL DEFAULT NULL,
  `customer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `receiving_sub_total` double(10, 0) NOT NULL DEFAULT 0,
  `receiving_item_discount` double(10, 0) NULL DEFAULT 0,
  `receiving_discount` double(10, 0) NOT NULL DEFAULT 0,
  `receiving_tax` double(10, 0) NOT NULL DEFAULT 0,
  `receiving_total` double(10, 0) NOT NULL DEFAULT 0,
  `receiving_tender` double(10, 0) NOT NULL DEFAULT 0,
  `receiving_change` double(10, 0) NULL DEFAULT 0,
  `pay_type` tinyint(1) NULL DEFAULT 0 COMMENT 'pay = 3 , quick pay = 2 ',
  `payment_by_cash` double(10, 0) NULL DEFAULT 0,
  `payment_by_cheque` double(10, 0) NULL DEFAULT 0,
  `payment_by_card` double(10, 0) NULL DEFAULT 0,
  `payment_by_gift_card` double(10, 0) NULL DEFAULT 0,
  `receiving_balance` double(10, 0) NOT NULL DEFAULT 0,
  `receiving_status` tinyint(1) NULL DEFAULT 2 COMMENT '2 panding ',
  `branch_auto_id` int NULL DEFAULT NULL,
  `company_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`receiving_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_receiving
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_registers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_registers`;
CREATE TABLE `tbl_registers`  (
  `register_auto_id` int NOT NULL AUTO_INCREMENT,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp,
  `register_status` tinyint(1) NOT NULL DEFAULT 2,
  `opening_blance` double NULL DEFAULT 0,
  `cash_total` double NULL DEFAULT 0,
  `counted_cash` double NULL DEFAULT 0,
  `credit_card_total` double NULL DEFAULT 0,
  `counted_credit_card` double NULL DEFAULT 0,
  `cheque_total` double NULL DEFAULT 0,
  `counted_cheque` double NULL DEFAULT 0,
  `gift_card_total` double NULL DEFAULT 0,
  `counted_gift_card` double NULL DEFAULT 0,
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `closed_date` timestamp NULL DEFAULT NULL,
  `closed_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opened_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_auto_id` int NOT NULL,
  `branch_auto_id` int NOT NULL,
  `company_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`register_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant registers Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_registers
-- ----------------------------
INSERT INTO `tbl_registers` VALUES (1, '2017-11-09 08:11:47', 3, 5000, 0, 5000, 0, 0, 0, 0, 0, 0, '', '2022-10-28 02:10:50', 'Nuski Mohamed', 'Nuski Mohamed', 1, 1, 1);
INSERT INTO `tbl_registers` VALUES (2, '2022-10-28 02:10:57', 2, 1200, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'Nuski Mohamed', 1, 1, 1);

-- ----------------------------
-- Table structure for tbl_sales
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sales`;
CREATE TABLE `tbl_sales`  (
  `sales_auto_id` int NOT NULL AUTO_INCREMENT,
  `sales_id` int NULL DEFAULT NULL,
  `register_auto_id` int NULL DEFAULT NULL,
  `hold_type` tinyint(1) NOT NULL,
  `hold_auto_id` int NOT NULL,
  `number_of_persons` tinyint NULL DEFAULT 0,
  `salse_date` date NULL DEFAULT NULL,
  `check_in_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `check_out_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `employee_auto_id` int NOT NULL,
  `employee` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `waiter_auto_id` int NULL DEFAULT NULL,
  `waiter` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_auto_id` int NULL DEFAULT NULL,
  `customer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sales_sub_total` double(10, 0) NOT NULL DEFAULT 0,
  `sales_item_discount` double(10, 0) NULL DEFAULT 0,
  `sales_discount` double(10, 0) NOT NULL DEFAULT 0,
  `sales_tax` double(10, 0) NOT NULL DEFAULT 0,
  `sales_total` double(10, 0) NOT NULL DEFAULT 0,
  `sales_tender` double(10, 0) NOT NULL DEFAULT 0,
  `sales_change` double(10, 0) NULL DEFAULT 0,
  `pay_type` tinyint(1) NULL DEFAULT 0 COMMENT 'pay = 3 , quick pay = 2 ',
  `payment_by_cash` double(10, 0) NULL DEFAULT 0,
  `payment_by_cheque` double(10, 0) NULL DEFAULT 0,
  `payment_by_card` double(10, 0) NULL DEFAULT 0,
  `payment_by_gift_card` double(10, 0) NULL DEFAULT 0,
  `sales_balance` double(10, 0) NOT NULL DEFAULT 0,
  `sales_status` tinyint(1) NULL DEFAULT 2 COMMENT '2 panding ',
  `branch_auto_id` int NULL DEFAULT NULL,
  `company_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`sales_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_sales
-- ----------------------------
INSERT INTO `tbl_sales` VALUES (19, NULL, 0, 2, 1, 0, '2025-08-03', '12:07:48', '10:08:18', 1, 'Nuski Mohamed', 0, '', 0, '', 1400, 0, 0, 0, 1400, 0, 0, 3, 0, 0, 0, 0, 1400, 3, 1, 1);
INSERT INTO `tbl_sales` VALUES (27, NULL, 0, 2, 1, 0, '2025-08-03', '10:08:24', '10:08:32', 1, 'Nuski Mohamed', 0, '', 0, '', 350, 0, 0, 0, 350, 0, 0, 3, 0, 0, 0, 0, 350, 3, 1, 1);
INSERT INTO `tbl_sales` VALUES (28, NULL, 0, 2, 1, 0, '2025-08-03', '04:08:46', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (29, NULL, 0, 2, 2, 0, '2025-08-03', '04:08:03', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (30, 1, 0, 2, 3, 0, '2025-08-02', '04:08:49', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (31, 2, 0, 2, 4, 0, '2025-08-02', '04:08:54', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (32, 1, 0, 2, 5, 0, '2025-08-03', '04:08:31', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (33, 2, 0, 2, 6, 0, '2025-08-03', '04:08:46', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (34, 3, 0, 2, 7, 0, '2025-08-03', '04:08:47', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (35, 4, 0, 2, 8, 0, '2025-08-03', '04:08:48', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (36, 1, 0, 3, 1, 0, '2025-08-03', '04:08:58', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (37, 1, 0, 4, 1, 0, '2025-08-03', '04:08:00', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);

-- ----------------------------
-- Table structure for tbl_sessions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sessions`;
CREATE TABLE `tbl_sessions`  (
  `id` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT 0,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant sessions Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_sessions
-- ----------------------------
INSERT INTO `tbl_sessions` VALUES ('v7umhgbrsqmd3pkho774b5rnj4q5tk3h', '127.0.0.1', 1752393621, '__ci_last_regenerate|i:1752386983;employee_auto_id|s:1:\"1\";employee_name|s:13:\"Nuski Mohamed\";employee_email|s:19:\"nuskirauf@gmail.com\";employee_img_path|s:5:\"1.jpg\";register_auto_id|s:1:\"2\";branch_auto_id|s:1:\"1\";company_auto_id|s:1:\"1\";is_admin|s:1:\"2\";hold_type|s:1:\"2\";hold_auto_id|i:7;sales_auto_id|i:10;status|i:1;language|N;');
INSERT INTO `tbl_sessions` VALUES ('karbmi482np3me1rloptfkkrjlbqbesl', '127.0.0.1', 1752392974, '__ci_last_regenerate|i:1752392974;');
INSERT INTO `tbl_sessions` VALUES ('u07flj6rctou5fs3eafe3aj7s8q9g0em', '127.0.0.1', 1752392974, '__ci_last_regenerate|i:1752392974;');
INSERT INTO `tbl_sessions` VALUES ('v1gau5vai2sh2ra2sqjp2t0aq003t34s', '127.0.0.1', 1752413367, '__ci_last_regenerate|i:1752413282;employee_auto_id|s:1:\"1\";employee_name|s:13:\"Nuski Mohamed\";employee_email|s:19:\"nuskirauf@gmail.com\";employee_img_path|s:5:\"1.jpg\";register_auto_id|i:0;branch_auto_id|s:1:\"1\";company_auto_id|s:1:\"1\";is_admin|s:1:\"2\";hold_type|s:1:\"2\";hold_auto_id|i:1;sales_auto_id|i:11;status|i:1;language|N;');
INSERT INTO `tbl_sessions` VALUES ('98i5h0v3fp8ge5pi77toqefpeennrhu0', '127.0.0.1', 1752930284, '__ci_last_regenerate|i:1752929543;employee_auto_id|s:1:\"1\";employee_name|s:13:\"Nuski Mohamed\";employee_email|s:19:\"nuskirauf@gmail.com\";employee_img_path|s:5:\"1.jpg\";register_auto_id|i:0;branch_auto_id|s:1:\"1\";group_name|s:5:\"Owner\";company_auto_id|s:1:\"1\";is_admin|s:1:\"2\";hold_type|s:1:\"2\";hold_auto_id|i:1;sales_auto_id|i:19;status|i:1;language|N;');
INSERT INTO `tbl_sessions` VALUES ('b5ld9o85lqqockjkabktraod1r5ood5c', '127.0.0.1', 1752951907, '__ci_last_regenerate|i:1752951775;employee_auto_id|s:1:\"1\";employee_name|s:13:\"Nuski Mohamed\";employee_email|s:19:\"nuskirauf@gmail.com\";employee_img_path|s:5:\"1.jpg\";register_auto_id|i:0;branch_auto_id|s:1:\"1\";group_name|s:5:\"Owner\";company_auto_id|s:1:\"1\";is_admin|s:1:\"2\";hold_type|s:1:\"2\";hold_auto_id|i:2;sales_auto_id|i:20;status|i:1;language|N;');
INSERT INTO `tbl_sessions` VALUES ('7gosuop2h2qpq5lkmm65v21oibna50pg', '127.0.0.1', 1754258540, '__ci_last_regenerate|i:1754258540;');
INSERT INTO `tbl_sessions` VALUES ('uhtaq4nb9nh9n5q173bada5jjqcrgpqf', '127.0.0.1', 1754258540, '__ci_last_regenerate|i:1754258540;');
INSERT INTO `tbl_sessions` VALUES ('7v19p7iqmhg72vre83ds6glfvgq6ggcu', '127.0.0.1', 1754261394, '__ci_last_regenerate|i:1754260168;employee_auto_id|s:1:\"1\";employee_name|s:13:\"Nuski Mohamed\";employee_email|s:19:\"nuskirauf@gmail.com\";employee_img_path|s:5:\"1.jpg\";register_auto_id|i:0;branch_auto_id|s:1:\"1\";group_name|s:5:\"Owner\";company_auto_id|s:1:\"1\";is_admin|s:1:\"2\";hold_type|s:1:\"4\";hold_auto_id|i:1;sales_auto_id|i:37;status|i:1;language|N;');

-- ----------------------------
-- Table structure for tbl_tables
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tables`;
CREATE TABLE `tbl_tables`  (
  `table_auto_id` int NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `table_status` tinyint(1) NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `branch_auto_id` int NULL DEFAULT NULL,
  `company_auto_id` int NOT NULL,
  PRIMARY KEY (`table_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant tables Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tables
-- ----------------------------
INSERT INTO `tbl_tables` VALUES (1, 'Table 1', 2, 1, 1);
INSERT INTO `tbl_tables` VALUES (2, 'Table 1', 2, 2, 1);
INSERT INTO `tbl_tables` VALUES (3, 'Table 2', 2, 2, 1);
INSERT INTO `tbl_tables` VALUES (4, 'Table 2', 2, 1, 1);
INSERT INTO `tbl_tables` VALUES (5, 'Table 3', 2, 1, 1);

-- ----------------------------
-- Table structure for tbl_transactions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transactions`;
CREATE TABLE `tbl_transactions`  (
  `transaction_auto_id` int NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `transaction_type` tinyint(1) NOT NULL COMMENT '1 : Sales , 2 : Receiving',
  `sales_auto_id` int NULL DEFAULT NULL,
  `id` int NOT NULL,
  `type_id` int NULL DEFAULT NULL COMMENT '1:Tracking | 2:None Tracking | 3:Srvice | 4: Combination',
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qty` double NOT NULL DEFAULT 0,
  `cost` double NULL DEFAULT 0,
  `amount` double NOT NULL DEFAULT 0,
  `sub_amount` double NULL DEFAULT 0,
  `discount_percentage` double NULL DEFAULT 0,
  `discount` double NULL DEFAULT 0,
  `total_discount` double NULL DEFAULT 0,
  `total_tax` double NULL DEFAULT 0,
  `net_amount` double NULL DEFAULT 0,
  `selling_price` double NULL DEFAULT 0,
  `expiry_date` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `warranty_period` tinyint NULL DEFAULT 0,
  `hold_type` tinyint(1) NOT NULL,
  `hold_auto_id` int NOT NULL,
  `number_of_persons` tinyint NOT NULL DEFAULT 0,
  `register_auto_id` int NULL DEFAULT NULL,
  `employee_auto_id` int NULL DEFAULT NULL,
  `employee` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_auto_id` int NULL DEFAULT NULL,
  `customer` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `waiter_auto_id` int NULL DEFAULT NULL,
  `waiter` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 3 COMMENT '3=pending 4=sales compleet 5=void 6=return',
  `branch_auto_id` int NOT NULL,
  `company_auto_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_auto_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_transactions
-- ----------------------------
INSERT INTO `tbl_transactions` VALUES (1, '2017-11-09', 1, 2, 3, 1, 'Appetizers', 'Onion Rings', 1, 120, 120, 120, 0, 0, 0, 0, 120, 0, '', 0, 2, 2, 0, 1, 1, 'Nuski Mohamed', 1, 'Nuski', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (2, '2017-11-09', 1, 2, 4, 1, 'Appetizers', 'Chicken Lettuce Wrap', 1, 195, 195, 195, 0, 0, 0, 0, 195, 0, '', 0, 2, 2, 0, 1, 1, 'Nuski Mohamed', 1, 'Nuski', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (3, '2017-11-09', 1, 2, 5, 1, 'Appetizers', 'Dynamite chicken / Shrimp', 1, 200, 230, 230, 0, 0, 0, 0, 230, 0, '', 0, 2, 2, 0, 1, 1, 'Nuski Mohamed', 1, 'Nuski', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (4, '2017-11-09', 1, 2, 2, 1, 'Appetizers', 'Shrimp Bite Cutlet', 1, 180, 180, 180, 0, 0, 0, 0, 180, 0, '', 0, 2, 2, 0, 1, 1, 'Nuski Mohamed', 1, 'Nuski', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (5, '2017-11-09', 1, 2, 19, 1, 'Main Entrees Rice', 'Fried Rice Egg', 1, 280, 300, 300, 0, 0, 0, 0, 300, 0, '', 0, 2, 2, 0, 1, 1, 'Nuski Mohamed', 1, 'Nuski', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (6, '2022-10-28', 1, 3, 2, 1, 'Appetizers', 'Shrimp Bite Cutlet', 1, 180, 180, 180, 0, 0, 0, 0, 180, 0, '', 0, 2, 1, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (7, '2022-10-28', 1, 3, 3, 1, 'Appetizers', 'Onion Rings', 1, 120, 120, 120, 0, 0, 0, 0, 120, 0, '', 0, 2, 1, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (8, '2022-10-28', 1, 3, 15, 1, 'Kids Menu', 'Kids Beef Noodles', 1, 150, 180, 180, 0, 0, 0, 0, 180, 0, '', 0, 2, 1, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (9, '2025-07-13', 1, 4, 1, 1, 'Tea', 'Plain Tea', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 2, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (10, '2025-07-13', 1, 4, 2, 1, 'Tea', 'Milk Tea', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 2, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (11, '2025-07-13', 1, 6, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 4, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (12, '2025-07-13', 1, 10, 23, 1, 'Fried Rice', 'Vegetable fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 7, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (13, '2025-07-13', 1, 10, 24, 1, 'Fried Rice', 'Chicken fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 7, 0, 2, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (14, '2025-07-13', 1, 10, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 7, 0, 2, 1, 'Nuski Mohamed', 0, '0', 0, '0', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (25, '2025-07-15', 1, 15, 12, 1, 'Rice & Curry', 'Egg rice', 2, 350, 350, 700, 0, 0, 0, 0, 700, 0, '', 0, 4, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (24, '2025-07-15', 1, 14, 13, 1, 'Rice & Curry', 'Vegetable rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '0', 0, '0', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (26, '2025-07-15', 1, 15, 13, 1, 'Rice & Curry', 'Vegetable rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 4, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (22, '2025-07-15', 1, 13, 23, 1, 'Fried Rice', 'Vegetable fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (23, '2025-07-15', 1, 14, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '0', 0, '0', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (30, '2025-07-19', 1, 18, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (29, '2025-07-19', 1, 17, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (31, '2025-07-19', 1, 19, 12, 1, 'Rice & Curry', 'Egg rice', 2, 350, 350, 700, 0, 0, 0, 0, 700, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (32, '2025-07-19', 1, 19, 13, 1, 'Rice & Curry', 'Vegetable rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (33, '2025-07-19', 1, 19, 14, 1, 'Rice & Curry', 'Beef rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (42, '2025-08-03', 1, 27, 23, 1, 'Fried Rice', 'Vegetable fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 4, 1, 1);
INSERT INTO `tbl_transactions` VALUES (43, '2025-08-04', 1, 28, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (44, '2025-08-04', 1, 28, 13, 1, 'Rice & Curry', 'Vegetable rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (45, '2025-08-04', 1, 29, 23, 1, 'Fried Rice', 'Vegetable fried rice', 2, 350, 350, 700, 0, 0, 0, 0, 700, 0, '', 0, 2, 2, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (46, '2025-08-04', 1, 30, 23, 1, 'Fried Rice', 'Vegetable fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 3, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (47, '2025-08-04', 1, 30, 24, 1, 'Fried Rice', 'Chicken fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 3, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (48, '2025-08-04', 1, 31, 33, 1, 'Kottu', 'Egg Kottu', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 4, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (49, '2025-08-04', 1, 32, 32, 1, 'Kottu', 'Fish Kottu', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 2, 5, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (50, '2025-08-04', 1, 37, 12, 1, 'Rice & Curry', 'Egg rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 4, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);
INSERT INTO `tbl_transactions` VALUES (51, '2025-08-04', 1, 37, 23, 1, 'Fried Rice', 'Vegetable fried rice', 1, 350, 350, 350, 0, 0, 0, 0, 350, 0, '', 0, 4, 1, 0, 0, 1, 'Nuski Mohamed', 0, '', 0, '', 3, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
