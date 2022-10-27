/*
 Navicat Premium Data Transfer

 Source Server         : LocalHost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : hellofood_db

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 28/10/2022 03:01:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_branches
-- ----------------------------
DROP TABLE IF EXISTS `tbl_branches`;
CREATE TABLE `tbl_branches`  (
  `branch_auto_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `company_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`branch_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant branches Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

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
  `company_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company_currency_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_currency_decimal` tinyint(1) NULL DEFAULT NULL,
  `company_currency_symbol` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company_print_template` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`company_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant details Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_config
-- ----------------------------
INSERT INTO `tbl_config` VALUES (1, 'ABC', NULL, 'LKR', 2, 'Rs ', 1);

-- ----------------------------
-- Table structure for tbl_expences
-- ----------------------------
DROP TABLE IF EXISTS `tbl_expences`;
CREATE TABLE `tbl_expences`  (
  `expense_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_date` date NOT NULL,
  `expense_reference` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `expense_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `expense_amount` float NOT NULL,
  `expense_attachment` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `expense_category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `expense_created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_auto_id` int(11) NULL DEFAULT NULL,
  `company_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`expense_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant expences Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_hrm_customers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hrm_customers`;
CREATE TABLE `tbl_hrm_customers`  (
  `customer_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_secondary_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `customer_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_mobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_discount` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 2,
  `company_auto_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant customers Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

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
  `employee_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_login_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employee_login_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employee_login_status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '2:Active | 3:Deactivate',
  `employee_login_attempt` tinyint(1) NOT NULL DEFAULT 0,
  `employee_login_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `group_auto_id` tinyint(2) NULL DEFAULT NULL,
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
  `branch_auto_id` int(11) NULL DEFAULT NULL,
  `company_auto_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_auto_id`) USING BTREE,
  INDEX `group_auto_id`(`group_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant employee Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_hrm_employees
-- ----------------------------
INSERT INTO `tbl_hrm_employees` VALUES (1, 'nuskirauf@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 2, 'Cashier', 'QWE', 'Nuski Mohamed', '0777123456', 'Akuran', 'Kandy', 'asdf', NULL, '1.jpg', 2, 2, 1, 1);
INSERT INTO `tbl_hrm_employees` VALUES (2, 'nazran.info@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 0, NULL, 3, 'Waiter', 'NZA', 'Nazran Mohamed', '0777123123', 'Akurana', 'Kandy', 'zxcv', NULL, '1.jpg', 2, 2, 1, 1);
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
  `supplier_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_company_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `supplier_secondary_code` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_mobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_fax` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `supplier_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `supplier_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 2,
  `company_auto_id` int(11) NOT NULL,
  PRIMARY KEY (`supplier_auto_id`) USING BTREE,
  UNIQUE INDEX `supplier_auto_id`(`supplier_auto_id`) USING BTREE,
  INDEX `supplier_secondary_code`(`supplier_secondary_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant supplier \r\nCreated By : Nuski Mohamed\r\nDiscussed with : \r\nReviewed By : ' ROW_FORMAT = Dynamic;

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
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` tinyint(1) NOT NULL COMMENT '1 : Sales | 2 : Receiving',
  `payment_auto_id` int(11) NULL DEFAULT NULL,
  `payment_method` tinyint(1) NOT NULL COMMENT '1:Cash | 2:Cheque | 3:CreditCard | 4:GiftCard',
  `payment_amount` double(10, 0) NOT NULL,
  `payment_cheque_bank` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_cheque_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_is_party_cheque` tinyint(1) NULL DEFAULT NULL,
  `payment_cheque_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_payments
-- ----------------------------
INSERT INTO `tbl_payments` VALUES (1, 3, NULL, 1, 1100, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_payments` VALUES (2, 1, 2, 1, 500, '', '', NULL, NULL);
INSERT INTO `tbl_payments` VALUES (3, 1, 2, 2, 500, 'Com', '00014', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product_quantities
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_quantities`;
CREATE TABLE `tbl_product_quantities`  (
  `product_auto_id` int(11) NOT NULL,
  `branch_auto_id` int(11) NOT NULL,
  `selling_price` double(10, 0) NULL DEFAULT 0,
  `expiry_date` date NULL DEFAULT NULL,
  `quantity` double(10, 0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`product_auto_id`) USING BTREE,
  INDEX `product_auto_id`(`product_auto_id`) USING BTREE,
  INDEX `branch_auto_id`(`branch_auto_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_products
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE `tbl_products`  (
  `product_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_id` tinyint(1) NULL DEFAULT NULL COMMENT '1:Tracking | 2:None Tracking | 3:Srvice | 4: Combination 5: Raw material',
  `product_code` int(5) NOT NULL,
  `product_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_cost` double NOT NULL DEFAULT 0,
  `product_price` double NOT NULL DEFAULT 0,
  `product_wholesale_price` double NULL DEFAULT 0,
  `product_discount` double(2, 0) NOT NULL DEFAULT 0,
  `product_photo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'default.jpg',
  `product_pin` tinyint(1) NULL DEFAULT 3 COMMENT '2:Pined | 3:UnPined',
  `product_sales_count` int(11) NULL DEFAULT 0,
  `product_supplier_auto_id` int(11) NULL DEFAULT NULL,
  `product_reorder_level` tinyint(4) NULL DEFAULT 0,
  `product_options` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `warranty_period` tinyint(5) NULL DEFAULT 0,
  `fixed_price` tinyint(1) NULL DEFAULT 0,
  `company_auto_id` int(11) NOT NULL,
  `branch_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`product_auto_id`) USING BTREE,
  UNIQUE INDEX `uniq_auto_id`(`product_auto_id`) USING BTREE,
  UNIQUE INDEX `uniq_code`(`product_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant products Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_products
-- ----------------------------
INSERT INTO `tbl_products` VALUES (1, 5, 1, NULL, 'Appetizers', 'Chicken Bite Cutlet', 130, 140, 140, 0, 'default.jpg', 3, 0, 1, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (2, 1, 2, '0011', 'Appetizers', 'Shrimp Bite Cutlet', 180, 180, 180, 0, 'default.jpg', 3, 0, 1, 127, '10', 2, 0, 1, 1, 1);
INSERT INTO `tbl_products` VALUES (3, 1, 3, NULL, 'Appetizers', 'Onion Rings', 120, 120, 120, 0, '3.jpg', 2, 0, 0, 120, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (4, 1, 4, NULL, 'Appetizers', 'Chicken Lettuce Wrap', 195, 195, 195, 0, '4.jpg', 3, 0, 0, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (5, 1, 5, NULL, 'Appetizers', 'Dynamite chicken / Shrimp', 200, 230, 230, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (6, 1, 6, NULL, 'Appetizers', 'Wonton Fries Cheese', 180, 119, 1195, 20, 'default.jpg', 3, 0, 1, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (7, 1, 7, NULL, 'Soup', 'Hot and Sour Soup', 240, 260, 260, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (8, 1, 8, NULL, 'Soup', 'Chicken Noodle Soup', 250, 280, 280, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (9, 1, 9, NULL, 'Soup', 'Egg Drop Soup', 200, 220, 220, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (10, 1, 10, NULL, 'Kids Menu', 'Kids Chicken Nuggets', 80, 100, 100, 0, 'default.jpg', 3, 0, NULL, 100, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (11, 1, 11, NULL, 'Kids Menu', 'Kids Chicken Fried Rice', 120, 150, 150, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (12, 1, 12, NULL, 'Kids Menu', 'Kids Beef Fried Rice', 130, 150, 150, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (13, 1, 13, NULL, 'Kids Menu', 'Kids Vegetable Fried Rice', 130, 150, 150, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (14, 1, 14, NULL, 'Kids Menu', 'Kids Chicken Noodles', 150, 180, 180, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (15, 1, 15, NULL, 'Kids Menu', 'Kids Beef Noodles', 150, 180, 180, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (16, 1, 16, NULL, 'Kids Menu', 'Kids Vegetable Noodles', 150, 280, 280, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (17, 1, 17, NULL, 'Main Entrees Rice', 'Fried Rice Chicken', 280, 300, 300, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (18, 1, 18, NULL, 'Main Entrees Rice', 'Fried Rice Beef', 280, 300, 300, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (19, 1, 19, NULL, 'Main Entrees Rice', 'Fried Rice Egg', 280, 300, 300, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (20, 1, 20, NULL, 'Main Entrees Rice', 'Fried Rice Combo', 280, 300, 300, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (21, 1, 21, NULL, 'Main Entrees Rice', 'Dum Biryani Chicken', 300, 320, 320, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (22, 1, 22, NULL, 'Main Entrees Rice', 'Nasi Goreng Chicken', 280, 300, 300, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (23, 1, 23, NULL, 'Main Entrees Rice', 'Nasi Goreng Egg', 280, 300, 300, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (24, 1, 24, NULL, 'Main Entrees Rice', 'Nasi Goreng Shripm', 280, 300, 300, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (25, 1, 25, NULL, 'Main Entrees Rice', 'Kabsa Rice', 300, 340, 340, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (26, 1, 26, NULL, 'Main Entrees Noodles', 'Singapore Chicken Noodles', 280, 300, 300, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (27, 1, 27, NULL, 'Main Entrees Noodles', 'Buttered shrimp Noodles', 280, 320, 320, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (28, 1, 28, NULL, 'Main Entrees Noodles', 'Mongolian Noodles', 300, 310, 310, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (29, 1, 29, NULL, 'Sandwiches', 'Submarine Full Chicken', 300, 350, 350, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (30, 1, 30, NULL, 'Sandwiches', 'Submarine Full Beef', 300, 350, 350, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (31, 1, 31, NULL, 'Sandwiches', 'Submarine Half Chicken', 200, 210, 210, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (32, 1, 32, NULL, 'Sandwiches', 'Submarine Half Beef', 200, 210, 210, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (33, 1, 33, NULL, 'Sandwiches', 'Big Burger Fried Chicken', 300, 350, 350, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (34, 1, 34, NULL, 'Sandwiches', 'Big Burger Toast Chicken', 300, 350, 350, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (35, 1, 35, NULL, 'Sandwiches', 'Flat bread Cheese', 260, 280, 280, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (36, 1, 36, NULL, 'Sandwiches', 'Falafel Sandwich Aromas', 270, 290, 290, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (37, 1, 37, NULL, 'Main Entrees', 'Egg Curry', 0, 170, 170, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (38, 1, 38, NULL, 'Main Entrees', 'Butter Chicken', 190, 190, 190, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (39, 1, 39, NULL, 'Main Entrees', 'Beef Korma', 230, 230, 230, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (40, 1, 40, NULL, 'Rotti', 'Naan Plain / Butter', 55, 55, 55, 0, 'default.jpg', 3, 0, NULL, 55, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (41, 1, 41, NULL, 'Rotti', 'Yeast Rotti', 50, 50, 50, 0, 'default.jpg', 3, 0, NULL, 50, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (42, 1, 42, NULL, 'Local', 'Kottu Chicken', 220, 220, 220, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (43, 1, 43, NULL, 'Local', 'Kottu Beef', 0, 250, 250, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (44, 1, 44, NULL, 'Local', 'Kottu Combo', 0, 250, 250, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (45, 1, 45, NULL, 'Local', 'Fried Rice Chicken', 0, 280, 280, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (46, 1, 46, NULL, 'Special Sushi', 'Crispy Sushi Roll', 0, 225, 225, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (47, 1, 47, NULL, 'Special Sushi', 'Dynamite Sushi Roll', 0, 225, 225, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (48, 1, 48, NULL, 'Special Drink', 'House Made Ginger Beer', 0, 150, 150, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (49, 1, 49, NULL, 'Special Drink', 'Cucumber Lemonade', 0, 150, 150, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (50, 1, 50, NULL, 'Special Drink', 'Mojito', 0, 150, 150, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (51, 1, 51, NULL, 'Special Drink', 'Lemonade', 0, 150, 150, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (52, 1, 52, NULL, 'Special Drink', 'Shanghai Sunrise', 0, 160, 160, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (53, 1, 53, NULL, 'Special Drink', 'Chocolate Wave', 0, 160, 160, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (54, 1, 54, NULL, 'Drinks', 'Watermelon', 0, 100, 100, 0, 'default.jpg', 3, 0, NULL, 100, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (55, 1, 55, NULL, 'Drinks', 'Orange', 0, 120, 120, 0, 'default.jpg', 2, 0, NULL, 120, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (56, 1, 56, NULL, 'Drinks', 'Nannari', 0, 80, 80, 0, 'default.jpg', 3, 0, NULL, 80, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (57, 1, 57, NULL, 'Smoothies', 'Strawberry Milkshake', 0, 180, 180, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (58, 1, 58, NULL, 'Smoothies', 'Chocolate Milkshake', 0, 180, 180, 0, 'default.jpg', 3, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (59, 1, 59, NULL, 'Smoothies', 'Banana Milkshake', 0, 180, 180, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (60, 1, 60, NULL, 'Smoothies', 'Lassi', 0, 110, 110, 0, 'default.jpg', 2, 0, NULL, 110, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (61, 1, 61, NULL, 'Smoothies', 'Sweet Lassi', 0, 110, 110, 0, 'default.jpg', 2, 0, NULL, 110, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (62, 1, 62, NULL, 'Smoothies', 'Vanilla', 0, 120, 120, 0, 'default.jpg', 2, 0, NULL, 120, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (63, 1, 63, NULL, 'Water', 'Water/Large 1ltr', 0, 50, 50, 0, 'default.jpg', 2, 0, NULL, 50, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (64, 1, 64, NULL, 'Water', 'Water/Small 500ml', 0, 30, 30, 0, 'default.jpg', 2, 0, NULL, 30, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (65, 1, 65, NULL, 'Desert', 'Banana Spring Roll', 0, 160, 160, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (66, 1, 66, NULL, 'Desert', 'Chocolate Buchi', 0, 160, 160, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (67, 1, 67, NULL, 'Desert', 'Ice Cream', 0, 100, 100, 0, 'default.jpg', 3, 0, NULL, 100, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (68, 1, 68, NULL, 'Desert', 'Brownies', 0, 160, 160, 0, 'default.jpg', 2, 0, NULL, 127, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (69, 1, 69, NULL, 'Desert', 'Fruit Salad', 0, 110, 110, 0, 'default.jpg', 3, 0, NULL, 110, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (70, 1, 70, NULL, 'Desert', 'Fruit Saladssss', 0, 110, 100, 0, 'default.jpg', 3, 0, NULL, 10, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (71, 1, 71, NULL, 'Desert', 'Fruit Juice', 0, 110, 100, 0, 'default.jpg', 3, 0, NULL, 10, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (72, 1, 72, NULL, 'Desert', 'Brownies wih ice cream', 0, 200, 180, 0, 'default.jpg', 3, 0, NULL, 10, '10', 2, 0, 0, 1, 1);
INSERT INTO `tbl_products` VALUES (73, 1, 73, NULL, 'Desert', 'ghghg', 0, 520, 600, 0, 'default.jpg', 3, 0, NULL, 10, '10', 2, 0, 0, 1, 1);

-- ----------------------------
-- Table structure for tbl_receiving
-- ----------------------------
DROP TABLE IF EXISTS `tbl_receiving`;
CREATE TABLE `tbl_receiving`  (
  `receiving_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `register_auto_id` int(11) NULL DEFAULT NULL,
  `hold_type` tinyint(1) NOT NULL,
  `hold_auto_id` int(11) NOT NULL,
  `number_of_persons` tinyint(3) NULL DEFAULT 0,
  `receiving_date` date NULL DEFAULT NULL,
  `check_in_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `check_out_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `employee_auto_id` int(5) NOT NULL,
  `employee` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `waiter_auto_id` int(5) NULL DEFAULT NULL,
  `waiter` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_auto_id` int(5) NULL DEFAULT NULL,
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
  `branch_auto_id` int(11) NULL DEFAULT NULL,
  `company_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`receiving_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_registers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_registers`;
CREATE TABLE `tbl_registers`  (
  `register_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `register_date` timestamp(0) NOT NULL DEFAULT current_timestamp(),
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
  `closed_date` timestamp(0) NULL DEFAULT NULL,
  `closed_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opened_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employee_auto_id` int(11) NOT NULL,
  `branch_auto_id` int(11) NOT NULL,
  `company_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`register_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant registers Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

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
  `sales_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `register_auto_id` int(11) NULL DEFAULT NULL,
  `hold_type` tinyint(1) NOT NULL,
  `hold_auto_id` int(11) NOT NULL,
  `number_of_persons` tinyint(3) NULL DEFAULT 0,
  `salse_date` date NULL DEFAULT NULL,
  `check_in_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `check_out_time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `employee_auto_id` int(5) NOT NULL,
  `employee` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `waiter_auto_id` int(5) NULL DEFAULT NULL,
  `waiter` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_auto_id` int(5) NULL DEFAULT NULL,
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
  `branch_auto_id` int(11) NULL DEFAULT NULL,
  `company_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`sales_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_sales
-- ----------------------------
INSERT INTO `tbl_sales` VALUES (1, 1, 2, 1, 0, '2017-11-09', '08:11:05', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);
INSERT INTO `tbl_sales` VALUES (2, 1, 2, 2, 0, '2017-11-09', '08:11:11', '10:11:35', 1, 'Nuski Mohamed', 0, '', 1, 'Nuski', 1025, 0, 0, 0, 1025, 1000, 0, 3, 0, 0, 0, 0, 0, 3, 1, 1);
INSERT INTO `tbl_sales` VALUES (3, 2, 2, 1, 0, '2022-10-27', '02:10:00', NULL, 1, 'Nuski Mohamed', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1);

-- ----------------------------
-- Table structure for tbl_sessions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sessions`;
CREATE TABLE `tbl_sessions`  (
  `id` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant sessions Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_sessions
-- ----------------------------
INSERT INTO `tbl_sessions` VALUES ('evnoj5vkhci3guo750oov4u2ued0s3lp', '::1', 1510246596, '__ci_last_regenerate|i:1510240568;employee_auto_id|s:1:\"1\";employee_name|s:13:\"Nuski Mohamed\";employee_email|s:19:\"nuskirauf@gmail.com\";employee_img_path|s:5:\"1.jpg\";register_auto_id|i:1;branch_auto_id|s:1:\"1\";company_auto_id|s:1:\"1\";is_admin|s:1:\"2\";hold_type|s:1:\"2\";hold_auto_id|i:2;sales_auto_id|i:2;status|i:1;language|N;');

-- ----------------------------
-- Table structure for tbl_tables
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tables`;
CREATE TABLE `tbl_tables`  (
  `table_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `table_status` tinyint(1) NULL DEFAULT 2 COMMENT '2:Yes | 3:No',
  `branch_auto_id` int(11) NULL DEFAULT NULL,
  `company_auto_id` int(11) NOT NULL,
  PRIMARY KEY (`table_auto_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Table Use :To maintain restaurant tables Created By : Nuski MohamedDiscussed with : Reviewed By : ' ROW_FORMAT = Dynamic;

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
  `transaction_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `transaction_type` tinyint(1) NOT NULL COMMENT '1 : Sales , 2 : Receiving',
  `sales_auto_id` int(11) NULL DEFAULT NULL,
  `id` int(11) NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL COMMENT '1:Tracking | 2:None Tracking | 3:Srvice | 4: Combination',
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
  `warranty_period` tinyint(5) NULL DEFAULT 0,
  `hold_type` tinyint(1) NOT NULL,
  `hold_auto_id` int(11) NOT NULL,
  `number_of_persons` tinyint(5) NOT NULL DEFAULT 0,
  `register_auto_id` int(11) NULL DEFAULT NULL,
  `employee_auto_id` int(11) NULL DEFAULT NULL,
  `employee` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `customer_auto_id` int(11) NULL DEFAULT NULL,
  `customer` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `waiter_auto_id` int(11) NULL DEFAULT NULL,
  `waiter` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 3 COMMENT '3=pending 4=sales compleet 5=void 6=return',
  `branch_auto_id` int(11) NOT NULL,
  `company_auto_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_auto_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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

SET FOREIGN_KEY_CHECKS = 1;
