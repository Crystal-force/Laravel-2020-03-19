/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100315
 Source Host           : localhost:3306
 Source Schema         : adsdatabase

 Target Server Type    : MySQL
 Target Server Version : 100315
 File Encoding         : 65001

 Date: 31/07/2019 21:36:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts`  (
  `account_id` int(10) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) NOT NULL COMMENT 'set campaign id',
  `user_id` int(11) NOT NULL COMMENT 'set user id',
  `metro_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MAIN_TABLE_VIEW *Required select values from {locations} DB	--- *only show selection according to $campaigns.metro_name selected --- if $campaigns.metro_name = GLOBAL show all {locations} from DB',
  `active` int(11) NOT NULL COMMENT 'MAIN_TABLE_VIEW checkbox',
  `total_ads_used` int(5) NOT NULL COMMENT 'MAIN_TABLE_VIEW total ads used with account from \"ads\" DB',
  `pid_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `renew_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `active_ads_cl` int(10) NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `removed_ads_cl` int(10) NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `notes` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `email_id` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MAIN_TABLE_VIEW Required text field (80 characters MAX)	',
  `email_password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Required text field (80 characters MAX)	',
  `craigslist_pay` tinyint(1) NOT NULL COMMENT 'checkbox',
  `offerup_pay` tinyint(1) NOT NULL COMMENT 'checkbox',
  `letgo_pay` tinyint(1) NOT NULL COMMENT 'checkbox',
  `fbmarket_pay` tinyint(1) NOT NULL COMMENT 'checkbox',
  `craigslist` tinyint(1) NOT NULL COMMENT 'checkbox',
  `offerup` tinyint(1) NOT NULL COMMENT 'checkbox',
  `letgo` tinyint(1) NOT NULL COMMENT 'checkbox',
  `fbmarket` tinyint(1) NOT NULL COMMENT 'checkbox',
  `phone_number` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'text field (12 characters MAX - regex \\d{3}-\\d{3}-\\d{4} -- )',
  `emulator_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `profile_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `geo_latitude` int(30) NOT NULL COMMENT '[AUTOMATION DATA]',
  `geo_longitude` int(30) NOT NULL COMMENT '[AUTOMATION DATA]',
  `fist_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_city` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_state` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_zipcode` int(5) NOT NULL,
  `profile_imgs` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_id` int(10) NOT NULL COMMENT 'Select values from {cards} DB',
  `used` int(11) NOT NULL COMMENT '[AUTOMATION DATA]',
  `post_trigger` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'MAIN_TABLE_VIEW Click button that changes the value to 1',
  `post_loop` int(5) NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA] select a number between 1-10	',
  `schedule` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'MAIN_TABLE_VIEW set a time of the day',
  `auto_post` tinyint(1) NOT NULL COMMENT 'MAIN_TABLE_VIEW checkbox',
  `last_post_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `ad_on_top` tinyint(1) NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `last_category_posted` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `b_day` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`account_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES (1, 3, 1, 'newyork', 1, 0, '2019-07-23 03:49:44', '2019-07-23 03:49:44', 0, 0, '0', 'test44@test.com', 'test', 1, 0, 1, 0, 0, 1, 0, 1, '444-444-4444', '0', '0', 0, 0, 'ada', 'afda', 'test', 'teset', 'tests', 123, '', 'female', 79, 0, 0, 10, '02:00', 0, '0', 0, '0', '2019-07-31');
INSERT INTO `accounts` VALUES (54, 1, 1, 'phoenix', 1, 0, '2019-07-23 11:58:42', '2019-07-23 11:58:42', 0, 0, '0', 'test@test.com', 'test', 0, 0, 0, 0, 0, 0, 0, 0, '111-111-1111', '0', '0', 0, 0, 'aa', 'bb', 'ada', 'ada', 'dd', 111, '/img/users/images (9).jpg', 'female', 1, 0, 1, 5, '19:00', 1, '0', 0, '0', '2019-07-01');
INSERT INTO `accounts` VALUES (55, 58, 1, 'newyork', 1, 0, '2019-07-23 11:58:46', '2019-07-23 11:58:46', 0, 0, '0', 'xuebao@xb.com', 'xuebao', 1, 0, 1, 0, 0, 1, 0, 1, '142-234-3434', '0', '0', 0, 0, 'xueb', 'bao', 'xuebatest', 'test', 'stes', 1111, '', 'male', 1, 0, 0, 3, '03:00', 0, '0', 0, '0', '2019-07-09');
INSERT INTO `accounts` VALUES (49, 2, 1, 'phoenix', 1, 0, '2019-07-22 04:08:15', '2019-07-22 04:08:15', 0, 0, '0', 'miaot@test.com', 'test', 1, 0, 1, 1, 1, 1, 0, 0, '111-222-3232', '0', '0', 0, 0, 'aaxx', 'aaxx', 'aa', 'aa', 'aaa', 111, '/img/users/42.jpg', 'male', 1, 0, 1, 4, '12:00', 1, '0', 0, '0', '2019-07-08');
INSERT INTO `accounts` VALUES (50, 2, 1, 'newyork', 1, 0, '2019-07-22 04:10:02', '2019-07-22 04:10:02', 0, 0, '0', 'w2323@test.com', 'test', 1, 1, 0, 0, 0, 0, 0, 0, '111-222-3343', '0', '0', 0, 0, 'adaf', 'adfa', 'adfa', 'adfa', 'adaffd', 1111, '', 'male', 1, 0, 1, 4, '14:00', 1, '0', 0, '0', '2019-08-01');
INSERT INTO `accounts` VALUES (37, 1, 1, 'phoenix', 1, 0, '2019-07-18 23:10:08', '2019-07-18 23:10:08', 0, 0, '0', 'yes@gmail.com', 'password1', 0, 0, 0, 1, 1, 1, 1, 0, '214-814-7577', '0', '0', 0, 0, 'cassandra', 'kuhn', '2172 westheimer rd', 'hayward', 'michigan', 27040, '/img/users/41.jpg', 'female', 1, 0, 1, 3, '20:00', 1, '0', 0, '0', '0');
INSERT INTO `accounts` VALUES (52, 1, 1, 'phoenix', 1, 0, '2019-07-22 04:16:50', '2019-07-22 04:16:50', 0, 0, '0', 'miaot@test.com', 'woaini,', 1, 0, 1, 0, 0, 1, 1, 1, '112-121-1212', '0', '0', 0, 0, 'dafd', 'adfad', 'adfa', 'adfa', 'adfaf', 1111, '', 'male', 1, 0, 1, 4, '18:00', 1, '0', 0, '0', '2019-07-22');

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads`  (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'set user id',
  `campaign_id` int(11) NOT NULL COMMENT '*Required select/set campaign id  --- *select=if user adds AD from the main ADs page or from the Accounts page, --- *set= if user adds AD from inside campaign',
  `account_id` int(11) NOT NULL COMMENT '*Required select/set values from {accounts} DB--- *select=if user adds AD from the main ADs page or from inside campaign, --- *set= if user adds AD from the Accounts page',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'MAIN_TABLE_VIEW checkbox',
  `shuffle_zip_code` tinyint(1) NOT NULL COMMENT 'MAIN_TABLE_VIEW checkbox',
  `shuffle_sub_category` tinyint(1) NOT NULL COMMENT 'MAIN_TABLE_VIEW checkbox',
  `pid_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `renew_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'MAIN_TABLE_VIEW [AUTOMATION DATA]',
  `craigslist_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `offerup_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `letgo_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `fbmarket_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `craigslist` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `offerup` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `letgo` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `fbmarket` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'checkbox',
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {categories} DB ----- display fields VISIBILITY by this selection',
  `sub_category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {categories} DB',
  `keyword` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'text field (80 characters MAX)',
  `metro_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {locations} DB	 --- *only show selection according to $Accounts.metro_name selected  --- if $Accounts.metro_name = GLOBAL show all {locations} from DB',
  `spec_location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {locations} DB',
  `spec_location_child` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {locations} DB',
  `city_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {locations} DB',
  `state` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {locations} DB',
  `zip_code` int(5) NOT NULL COMMENT '*Required select values from {locations} DB',
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required text field (80 characters MAX)',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required text field (3000 characters MAX)',
  `spec_city_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required text field (80 characters MAX)',
  `price` int(10) NOT NULL COMMENT 'numbers field (10 characters MAX)	',
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'text field ( 100 characters MAX)	',
  `cross_street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'text field ( 100 characters MAX)	',
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'text field (12 characters MAX - regex \\d{3}-\\d{3}-\\d{4} -- )	',
  `housing_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select HOUSING *Required select values from {housing_types} DB',
  `laundry_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select HOUSING *Required select values from {laundry_types} DB',
  `parking_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select HOUSING *Required select values from {parking_types} DB',
  `bathrooms_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select HOUSING *Required select values from {bathrooms_types} DB',
  `bedrooms_type` int(5) NOT NULL COMMENT 'visible only if select HOUSING *Required select values from {bedrooms_types} DB',
  `squareft` int(10) NOT NULL COMMENT 'visible only if select HOUSING numbers field (10 characters MAX)',
  `cats` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'visible only if select HOUSING checkbox',
  `dogs` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'visible only if select HOUSING checkbox',
  `furnished` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'visible only if select HOUSING checkbox',
  `no_smoking` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'visible only if select HOUSING checkbox',
  `wheelchair` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'visible only if select HOUSING checkbox',
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select HOUSING text field ( 100 characters MAX)',
  `fee_disclosure` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select HOUSING text field ( 100 characters MAX)',
  `make` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select FOR SELL text field ( 100 characters MAX)',
  `model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select FOR SELL text field ( 100 characters MAX)',
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select FOR SELL text field ( 100 characters MAX)',
  `sell_condition` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select FOR SELL select values from {conditions_types} DB',
  `license` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'visible only if select SERVICES text field ( 80 characters MAX)',
  `cl_load_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '--Set custom url--  \"https://{$locations.metro_name}.craigslist.org/{$locations.city_code}\" --- use this part in the url \"/{$locations.city_code}\" only if locations.city_code is not empty ---',
  `cl_check_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '--Set custom url-- \"https://{$locations.metro_name}.craigslist.org/search/{$locations.city_code}/{$categories.category_code}?query={$keyword}\" --- use this part in the url \"/{$locations.city_code}\" only if locations.city_code is not empty --- --- use this part in the url \"?query={$keyword}\" only if keyword is set ---',
  PRIMARY KEY (`ad_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES (1, 1, 3, 0, 0, 1, 0, '2019-07-01 14:39:41', '2019-07-01 14:39:41', 1, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', '0', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', 'laundry in bldg', 'off-street parking', '0', 2, 0, 1, 0, 0, 1, 1, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (2, 1, 3, 49, 1, 1, 0, '2019-07-02 14:39:41', '2019-07-02 14:39:41', 0, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'brooklyn', '0', 'Brooklyn', 'NY', 11237, 'MASSIVE 3BR 2BT IN PRIME BUSHWICK!! NO FEE !!!', 'LARGE AND  sunny 3 bedroomS 2 BATHROOMS available now in Bushwick\r\n-Large bedrooms CAN FIT QUEENS SIZE BEDS AND MORE \r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area \r\n(facing front of building )\r\nhigh ceilings \r\n-No fee!\r\n-Call or text  to see today', '0', 1250, 'HART STREET', 'BUSHWICK AVENUE', '347-123-7076', 'apartment', 'w/d in unit', '0', 'shared', 1, 550, 1, 1, 1, 1, 1, 'BUSHWICK FINEST RENTALS', 'NO FEE!!!!!!!!!!!!', 'dd', 'dd', 'dd', 'new', 'dd', '0', '0');
INSERT INTO `ads` VALUES (3, 1, 1, 50, 0, 0, 1, '2019-07-03 14:39:41', '2019-07-03 14:39:41', 0, 1, 0, 0, 0, 1, 0, 0, 'services', 'skilled trade services', '0', 'phoenix', 'Central/South Phoenix', '0', 'Phoenix', 'AZ', 85043, 'PHOENIX BROKEN SPRING OPENER GARAGE DOOR REPAIR! Call for estimate!', 'GARAGE DOOR REPAIR Are you looking for a garage door repair service in {city}? Or maybe you are in need of an emergency door off track service? ( ) GARAGE DOOR OPENERS Are you experiencing problems when you try to open or close your garage? (--) GARAGE DOOR REPAIR Did you find yourself unable to move your garage door, all of a sudden? ~~~+~~ Our Services :~~~~)) //-// Residential Garage Doors //-// Traditional - Raised & Recessed //-// Carriage House //-// Wood Garage Doors //-// Steel Garage Doors //-// Garage Door Repair //-// Glass Garage Doors //-// Commercial //-// Garage Doors //-// Rolling/Roll Up Doors //-// Loading Docks //-// Service Door //-//Commercial Openers //-// Residential Openers  ????? Why us ????? [1] Carefully selected, professional and licensed staff members [2] Highest quality assortment of parts brands [3] Same day service [4] Lowest rates in {city}! [5] 96% Customer Approval Rating [6] Over 11 Years Experience [7] 24/7 Emergency Service [8] 100% Satisfaction Guarantee ????? OPEN 24-7 ALL DAY AND NIGHT ?????\r\nREPAIR', '0', 25, '1st st', '1st ave', '602-555-2222', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0, 'BUSWHICK FINEST RENTALS', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (57, 1, 1, 37, 0, 0, 1, '2019-07-22 23:18:45', '2019-07-22 23:18:45', 1, 1, 0, 0, 0, 1, 0, 0, 'housing', 'business', '0', 'phoenix', 'East Valley', '0', 'Phoenix', 'AZ', 85254, 'test', 'test', '0', 5, '0', '0', '111-111-1111', 'apartment', 'laundry in bldg', 'street parking', '5.5', 0, 555, 0, 0, 1, 1, 1, 'test', 'test', 'asd', 'asd', '333', 'new', '0', '0', '0');
INSERT INTO `ads` VALUES (44, 1, 3, 2, 1, 0, 0, '2019-07-04 23:22:03', '2019-07-04 23:22:03', 0, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', 'Chelsea Downtown', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', '0', 'off-street parking', '0', 2, 0, 1, 1, 0, 0, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (45, 18, 1, 1, 1, 0, 1, '2019-07-05 23:22:59', '2019-07-05 23:22:59', 0, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', 'Chelsea Downtown', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', '0', 'off-street parking', '0', 2, 0, 1, 1, 0, 0, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (46, 18, 1, 1, 1, 0, 0, '2019-07-06 23:24:25', '2019-07-06 23:24:25', 1, 1, 1, 1, 1, 1, 1, 1, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', 'Chelsea Downtown', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', '0', 'off-street parking', '0', 2, 0, 0, 1, 0, 1, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (50, 1, 1, 1, 1, 0, 0, '2019-07-20 19:42:48', '2019-07-20 19:42:48', 0, 0, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', 'Chelsea Downtown', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', 'laundry in bldg', 'off-street parking', '0', 2, 0, 1, 1, 0, 0, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (51, 1, 1, 1, 1, 0, 0, '2019-07-20 19:43:04', '2019-07-20 19:43:04', 0, 1, 0, 0, 0, 0, 0, 0, 'services', 'skilled trade services', 'garage door', 'phoenix', 'Central/South Phoenix', '0', 'Phoenix', 'AZ', 85043, 'PHOENIX BROKEN SPRING OPENER GARAGE DOOR REPAIR! Call for estimate!', 'GARAGE DOOR REPAIR Are you looking for a garage door repair service in {city}? Or maybe you are in need of an emergency door off track service? ( ) GARAGE DOOR OPENERS Are you experiencing problems when you try to open or close your garage? (--) GARAGE DOOR REPAIR Did you find yourself unable to move your garage door, all of a sudden? ~~~+~~ Our Services :~~~~)) //-// Residential Garage Doors //-// Traditional - Raised & Recessed //-// Carriage House //-// Wood Garage Doors //-// Steel Garage Doors //-// Garage Door Repair //-// Glass Garage Doors //-// Commercial //-// Garage Doors //-// Rolling/Roll Up Doors //-// Loading Docks //-// Service Door //-//Commercial Openers //-// Residential Openers  ????? Why us ????? [1] Carefully selected, professional and licensed staff members [2] Highest quality assortment of parts brands [3] Same day service [4] Lowest rates in {city}! [5] 96% Customer Approval Rating [6] Over 11 Years Experience [7] 24/7 Emergency Service [8] 100% Satisfaction Guarantee ????? OPEN 24-7 ALL DAY AND NIGHT ?????\r\nREPAIR', 'Phoenix Valley Wide Service', 25, '1st st', '1st ave', '602-555-2222', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 'BUSWHICK FINEST RENTALS', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (52, 1, 3, 1, 1, 0, 0, '2019-07-20 19:43:25', '2019-07-20 19:43:25', 0, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', 'Chelsea Downtown', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', 'laundry in bldg', 'off-street parking', '0', 2, 0, 1, 1, 0, 0, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (53, 1, 3, 49, 0, 0, 0, '2019-07-20 20:35:34', '2019-07-20 20:35:34', 0, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', '0', 'Chelsea', 'NY', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', '0', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', 'laundry in bldg', 'off-street parking', '0', 2, 0, 1, 0, 1, 1, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (54, 1, 3, 49, 0, 0, 0, '2019-07-20 22:35:07', '2019-07-20 22:35:07', 1, 1, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', '0', 'newyork', 'manhattan', 'ererere', 'Chelsea', '0', 10011, 'LARGE 2BR ELEVATOR LAUNDRY BUILDING, NO FEE!!🌞', 'Very spacious sunny 2 bedroom available in Bushwick\r\n-Large bedrooms with closets\r\n-New kitchen with stainless steel appliances\r\n-Washer/dryer \r\n-Amazing location - 5 min walk away to JMZ express, for a quick and easy commute to the Manhatten or Williamsburg area\r\n-Super cool high ceilings with chandelier\r\n-No fee!\r\n\r\nCALL TODAY', '0', 2500, 'HART STREET', 'Chelsea AVE', '347-123-7076', 'apartment', 'laundry in bldg', 'off-street parking', '9+', 5, 0, 1, 1, 1, 1, 0, 'Chelsea FINEST RENTALS', 'NO FEEE!!!!!!!!!!', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (58, 20, 1, 1, 0, 0, 0, '2019-07-31 00:49:42', '2019-07-31 00:49:42', 0, 0, 0, 0, 0, 0, 0, 0, 'for sell', 'auto parts', '0', 'phoenix', 'Central/South Phoenix', '5', 'Phoenix', 'AZ', 85042, 'ada', 'adad', '0', 11, 'aa', 'aa', '111-111-1111', 'apartment', 'w/d in unit', '0', '0', 0, 0, 0, 0, 1, 0, 0, 'ada', 'ad', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (59, 20, 1, 1, 0, 0, 0, '2019-07-31 00:54:18', '2019-07-31 00:54:18', 0, 0, 0, 0, 0, 0, 0, 0, 'for sell', 'auto parts', '0', 'phoenix', 'Phoenix North', '0', 'Phoenix', 'AZ', 85295, 'ddd', 'dd', '0', 11, '11', '111', '111-111-1111', 'house', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 'daf', 'aad', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (60, 20, 1, 1, 0, 0, 0, '2019-07-31 00:56:16', '2019-07-31 00:56:16', 0, 0, 0, 0, 0, 0, 0, 0, 'for sell', 'auto parts', '0', 'phoenix', 'Central/South Phoenix', '0', 'Mesa', 'IN', 46324, 'dadfa', 'dafadfd', '0', 0, 'afa', 'ada', '111-111-1111', '0', '0', '0', '0', 0, 0, 1, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (61, 20, 1, 1, 0, 0, 0, '2019-07-31 01:54:43', '2019-07-31 01:54:43', 0, 0, 0, 0, 0, 0, 0, 0, 'for sell', 'auto parts', '0', 'phoenix', 'Central/South Phoenix', '5', 'Phoenix', 'AZ', 85042, 'testesedsdfadf', 'teadf', '0', 12, 'aa', 'aa', '111-111-1111', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `ads` VALUES (62, 20, 1, 1, 0, 0, 0, '2019-07-31 01:57:37', '2019-07-31 01:57:37', 1, 0, 0, 0, 1, 0, 0, 0, 'for sell', '0', '0', 'phoenix', 'Central/South Phoenix', '5', 'Phoenix', 'AZ', 85042, 'a12121212121212', 'adfadfa123123123', '0', 11, 'aa', 'aa', '111-111-1111', '0', '0', '0', '0', 0, 0, 1, 0, 1, 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for bathrooms_types
-- ----------------------------
DROP TABLE IF EXISTS `bathrooms_types`;
CREATE TABLE `bathrooms_types`  (
  `bathroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `bathroom_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`bathroom_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bathrooms_types
-- ----------------------------
INSERT INTO `bathrooms_types` VALUES (1, '-');
INSERT INTO `bathrooms_types` VALUES (2, 'shared');
INSERT INTO `bathrooms_types` VALUES (3, 'split');
INSERT INTO `bathrooms_types` VALUES (4, '1');
INSERT INTO `bathrooms_types` VALUES (5, '1.5');
INSERT INTO `bathrooms_types` VALUES (6, '2');
INSERT INTO `bathrooms_types` VALUES (7, '2.5');
INSERT INTO `bathrooms_types` VALUES (8, '3');
INSERT INTO `bathrooms_types` VALUES (9, '3.5');
INSERT INTO `bathrooms_types` VALUES (10, '4');
INSERT INTO `bathrooms_types` VALUES (11, '4.5');
INSERT INTO `bathrooms_types` VALUES (12, '5');
INSERT INTO `bathrooms_types` VALUES (13, '5.5');
INSERT INTO `bathrooms_types` VALUES (14, '6');
INSERT INTO `bathrooms_types` VALUES (15, '6.5');
INSERT INTO `bathrooms_types` VALUES (16, '7');
INSERT INTO `bathrooms_types` VALUES (17, '7.5');
INSERT INTO `bathrooms_types` VALUES (18, '8');
INSERT INTO `bathrooms_types` VALUES (19, '8.5');
INSERT INTO `bathrooms_types` VALUES (20, '9+');

-- ----------------------------
-- Table structure for bedrooms_types
-- ----------------------------
DROP TABLE IF EXISTS `bedrooms_types`;
CREATE TABLE `bedrooms_types`  (
  `bedroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `bedroom_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`bedroom_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bedrooms_types
-- ----------------------------
INSERT INTO `bedrooms_types` VALUES (1, '0');
INSERT INTO `bedrooms_types` VALUES (2, '1');
INSERT INTO `bedrooms_types` VALUES (3, '2');
INSERT INTO `bedrooms_types` VALUES (4, '3');
INSERT INTO `bedrooms_types` VALUES (5, '4');
INSERT INTO `bedrooms_types` VALUES (6, '5');
INSERT INTO `bedrooms_types` VALUES (7, '6');
INSERT INTO `bedrooms_types` VALUES (8, '7');
INSERT INTO `bedrooms_types` VALUES (9, '8');

-- ----------------------------
-- Table structure for calls_log
-- ----------------------------
DROP TABLE IF EXISTS `calls_log`;
CREATE TABLE `calls_log`  (
  `call_id` int(11) NOT NULL AUTO_INCREMENT,
  `caller_id` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `called_to` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recored_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_tag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `answered_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `call_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT '[AUTOMATION DATA]',
  PRIMARY KEY (`call_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calls_log
-- ----------------------------
INSERT INTO `calls_log` VALUES (1, '602-555-1111', '602-555-2222', 'https://media.plivo.com/v1/Account/cdscvszdvsdbvsb/Recording/bsfbfd-234r.mp3', 'garage door repair in Phoenix AZ', 'Alina', '00.00.03', '2019-07-09 16:19:42');
INSERT INTO `calls_log` VALUES (2, '480-312-3321', '602-555-2222', 'https://media.plivo.com/v1/Account/cdscvszdvsdbvsb/Recording/sdascc-234r.mp3', 'Garage door Service AD', 'Alina', '00.01.11', '2019-07-08 11:12:11');

-- ----------------------------
-- Table structure for campaigns
-- ----------------------------
DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE `campaigns`  (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `campaign_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metro_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '*Required select values from {locations} DB',
  PRIMARY KEY (`campaign_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 74 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of campaigns
-- ----------------------------
INSERT INTO `campaigns` VALUES (1, 1, 'garage door ads', 'phoenix');
INSERT INTO `campaigns` VALUES (2, 1, 'locksmith ads', 'phoenix');
INSERT INTO `campaigns` VALUES (3, 1, 'ny housing ads', 'newyork');
INSERT INTO `campaigns` VALUES (58, 1, 'aaa444', 'newyork');
INSERT INTO `campaigns` VALUES (59, 1, 'dxx44', 'chicago');
INSERT INTO `campaigns` VALUES (60, 1, 'ddd', 'chicago');
INSERT INTO `campaigns` VALUES (61, 1, '3434', 'chicago');
INSERT INTO `campaigns` VALUES (73, 1, 'new campaign', 'GLOBAL');

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards`  (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_sec` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_month` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_year` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_state` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_zip` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `daily_limit` int(5) NOT NULL,
  PRIMARY KEY (`card_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cards
-- ----------------------------
INSERT INTO `cards` VALUES (1, 'xuebao', 'last343', '222', '123', '03', '2024', '1234 E legacy BLVD A2001', 'Scottsdale', 'Arizona', '85257', 1, 250, 100);
INSERT INTO `cards` VALUES (79, 'name343', 'last343', '222', '123', '03', '2024', '1234 E legacy BLVD A2001', 'Scottsdale', 'Arizona', '85255', 0, 250, 100);
INSERT INTO `cards` VALUES (77, 'name', 'last', '4441', '123', '03', '2024', '1234 E legacy BLVD A2001', 'Scottsdale', 'Arizona', '85255', 0, 250, 100);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'housing', 'apts by owner', 'hhh33', 'abo33');
INSERT INTO `categories` VALUES (2, 'housing', 'office & commercial', 'hhh', 'off');
INSERT INTO `categories` VALUES (3, 'housing', 'parking & storage', 'hhh', 'prk');
INSERT INTO `categories` VALUES (4, 'housing', 'real estate - by owner', 'hhh', 'reo');
INSERT INTO `categories` VALUES (5, 'housing', 'rooms & shares', 'hhh', 'roo');
INSERT INTO `categories` VALUES (6, 'for sell', 'auto parts', 'sss', 'pta');
INSERT INTO `categories` VALUES (7, 'for sell', 'boats', 'sss', 'boo');
INSERT INTO `categories` VALUES (8, 'for sell', 'business', 'sss', 'bfa');
INSERT INTO `categories` VALUES (9, 'for sell', 'general', 'sss', 'foa');
INSERT INTO `categories` VALUES (10, 'for sell', 'household', 'sss', 'hsa');
INSERT INTO `categories` VALUES (11, 'for sell', 'materials', 'sss', 'maa');
INSERT INTO `categories` VALUES (12, 'for sell', 'tools', 'sss', 'tla');
INSERT INTO `categories` VALUES (13, 'for sell', 'wanted', 'sss', 'waa');
INSERT INTO `categories` VALUES (14, 'services', 'automotive services', 'bbb', 'aos');
INSERT INTO `categories` VALUES (15, 'services', 'household services', 'bbb', 'hss55');
INSERT INTO `categories` VALUES (22, 'xcxv', 'xcvqqqq', '11', '11');

-- ----------------------------
-- Table structure for housing_types
-- ----------------------------
DROP TABLE IF EXISTS `housing_types`;
CREATE TABLE `housing_types`  (
  `housing_id` int(11) NOT NULL AUTO_INCREMENT,
  `housing_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`housing_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of housing_types
-- ----------------------------
INSERT INTO `housing_types` VALUES (1, 'apartment');
INSERT INTO `housing_types` VALUES (2, 'condo');
INSERT INTO `housing_types` VALUES (3, 'cottage/cabin');
INSERT INTO `housing_types` VALUES (4, 'duplex');
INSERT INTO `housing_types` VALUES (5, 'flat');
INSERT INTO `housing_types` VALUES (6, 'house');
INSERT INTO `housing_types` VALUES (7, 'in-law');
INSERT INTO `housing_types` VALUES (8, 'loft');
INSERT INTO `housing_types` VALUES (9, 'townhouse');
INSERT INTO `housing_types` VALUES (10, 'manufactured');
INSERT INTO `housing_types` VALUES (11, 'assisted living');
INSERT INTO `housing_types` VALUES (12, 'land');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'set user id',
  `ad_id` int(11) NOT NULL,
  `image_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'GLOBAL Path: /uploads/{User_id}/{ad_id}/random_filename.jpg',
  PRIMARY KEY (`image_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 161 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES (160, 20, 62, '/uploads/20/62/image20190801035101_2.jpg');
INSERT INTO `images` VALUES (159, 20, 62, '/uploads/20/62/image20190801035101_1.jpg');
INSERT INTO `images` VALUES (157, 20, 61, '/uploads/20/61/image20190731075406_3.jpg');
INSERT INTO `images` VALUES (154, 20, 61, '/uploads/20/61/image20190731075406_0.jpg');
INSERT INTO `images` VALUES (158, 20, 62, '/uploads/20/62/image20190801035101_0.jpg');

-- ----------------------------
-- Table structure for laundry_types
-- ----------------------------
DROP TABLE IF EXISTS `laundry_types`;
CREATE TABLE `laundry_types`  (
  `laundry_id` int(11) NOT NULL AUTO_INCREMENT,
  `laundry_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`laundry_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laundry_types
-- ----------------------------
INSERT INTO `laundry_types` VALUES (1, '-');
INSERT INTO `laundry_types` VALUES (2, 'w/d in unit');
INSERT INTO `laundry_types` VALUES (3, 'w/d hookups');
INSERT INTO `laundry_types` VALUES (4, 'laundry in bldg');
INSERT INTO `laundry_types` VALUES (5, 'laundry on site');
INSERT INTO `laundry_types` VALUES (6, 'no laundry on site');

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `metro_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_location_child` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(6) NOT NULL,
  `city_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  PRIMARY KEY (`location_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 79 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (2, 'phoenix', 'Central/South Phoenix', '5', 'Phoenix', 'AZ', 85042, 'cph', '1');
INSERT INTO `locations` VALUES (3, 'phoenix', 'Central/South Phoenix', '', 'Phoenix', 'AZ', 85043, 'cph', '1');
INSERT INTO `locations` VALUES (4, 'phoenix', 'East Valley', '0', 'Scottsdale', 'AZ', 85254, 'evl', '0');
INSERT INTO `locations` VALUES (5, 'phoenix', 'East Valley', '', 'Mesa', 'AZ', 85203, 'evl', '1');
INSERT INTO `locations` VALUES (6, 'phoenix', 'East Valley', '', 'Gilbert', 'AZ', 85234, 'evl', '1');
INSERT INTO `locations` VALUES (7, 'phoenix', 'East Valley', '', 'Chandler', 'AZ', 85225, 'evl', '1');
INSERT INTO `locations` VALUES (8, 'phoenix', 'East Valley', '', 'Chandler', 'AZ', 85286, 'evl', '1');
INSERT INTO `locations` VALUES (9, 'phoenix', 'East Valley', '', 'Mesa', 'AZ', 85210, 'evl', '1');
INSERT INTO `locations` VALUES (10, 'phoenix', 'East Valley', '', 'Gilbert', 'AZ', 85295, 'evl', '1');
INSERT INTO `locations` VALUES (11, 'phoenix', 'East Valley', 'eeee55', '0', 'AZ444', 85284, 'evl', '0');
INSERT INTO `locations` VALUES (12, 'phoenix', 'East Valley', '', 'Mesa', 'AZ', 85205, 'evl', '1');
INSERT INTO `locations` VALUES (13, 'phoenix', 'East Valley', '', 'Tempe', 'AZ', 85281, 'evl', '1');
INSERT INTO `locations` VALUES (14, 'phoenix', 'East Valley', '', 'Scottsdale', 'AZ', 85251, 'evl', '1');
INSERT INTO `locations` VALUES (15, 'phoenix', 'East Valley', '', 'Scottsdale', 'AZ', 85258, 'evl', '1');
INSERT INTO `locations` VALUES (16, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85054, 'nph', '1');
INSERT INTO `locations` VALUES (17, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85016, 'nph', '1');
INSERT INTO `locations` VALUES (18, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85003, 'nph', '1');
INSERT INTO `locations` VALUES (19, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85020, 'nph', '1');
INSERT INTO `locations` VALUES (20, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85015, 'nph', '1');
INSERT INTO `locations` VALUES (21, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85029, 'nph', '1');
INSERT INTO `locations` VALUES (22, 'phoenix', 'Phoenix North', '', 'Phoenix', 'AZ', 85024, 'nph', '1');
INSERT INTO `locations` VALUES (23, 'phoenix', 'West Valley', '', 'Sun City', 'AZ', 85351, 'wvl', '0');
INSERT INTO `locations` VALUES (24, 'phoenix', 'West Valley', '', 'Glendale', 'AZ', 85303, 'wvl', '0');
INSERT INTO `locations` VALUES (25, 'phoenix', 'West Valley', '', 'Tolleson', 'AZ', 85353, 'wvl', '0');
INSERT INTO `locations` VALUES (26, 'phoenix', 'West Valley', '', 'Goodyear', 'AZ', 85395, 'wvl', '0');
INSERT INTO `locations` VALUES (27, 'phoenix', 'West Valley', '', 'Surprise', 'AZ', 85379, 'wvl', '0');
INSERT INTO `locations` VALUES (28, 'phoenix', 'West Valley', '', 'Glendale', 'AZ', 85308, 'wvl', '0');
INSERT INTO `locations` VALUES (29, 'chicago', 'West Chicagoland', '', 'Elgin', 'IL', 60120, 'wcl', '1');
INSERT INTO `locations` VALUES (30, 'chicago', 'West Chicagoland', '', 'Glendale Heights', 'IL', 60139, 'wcl', '1');
INSERT INTO `locations` VALUES (31, 'chicago', 'West Chicagoland', '', 'Broadview', 'IL', 60155, 'wcl', '1');
INSERT INTO `locations` VALUES (32, 'chicago', 'West Chicagoland', '', 'River Grove', 'IL', 60171, 'wcl', '1');
INSERT INTO `locations` VALUES (33, 'chicago', 'West Chicagoland', '', 'West Chicago', 'IL', 60185, 'wcl', '1');
INSERT INTO `locations` VALUES (34, 'chicago', 'West Chicagoland', '', 'Hoffman Estates', 'IL', 60192, 'wcl', '1');
INSERT INTO `locations` VALUES (35, 'chicago', 'West Chicagoland', '', 'Elmwood Park', 'IL', 60305, 'wcl', '1');
INSERT INTO `locations` VALUES (36, 'chicago', 'West Chicagoland', '', 'Aurora', 'IL', 60506, 'wcl', '1');
INSERT INTO `locations` VALUES (37, 'chicago', 'West Chicagoland', '', 'Hinsdale', 'IL', 60521, 'wcl', '1');
INSERT INTO `locations` VALUES (38, 'chicago', 'West Chicagoland', '', 'North Aurora', 'IL', 60542, 'wcl', '1');
INSERT INTO `locations` VALUES (39, 'chicago', 'West Chicagoland', '', 'Naperville', 'IL', 60563, 'wcl', '1');
INSERT INTO `locations` VALUES (40, 'chicago', 'North Chicagoland', '', 'Glenview', 'IL', 60026, 'nch', '1');
INSERT INTO `locations` VALUES (41, 'chicago', 'North Chicagoland', '', 'Morton Grove', 'IL', 60053, 'nch', '1');
INSERT INTO `locations` VALUES (42, 'chicago', 'North Chicagoland', '', 'Waukegan', 'IL', 60087, 'nch', '1');
INSERT INTO `locations` VALUES (43, 'chicago', 'North Chicagoland', '', 'Evanston', 'IL', 60203, 'nch', '1');
INSERT INTO `locations` VALUES (44, 'chicago', 'Northwest Suburbs', '', 'Deer Park', 'IL', 60010, 'nwc', '1');
INSERT INTO `locations` VALUES (45, 'chicago', 'Northwest Suburbs', '', 'Prospect Heights', 'IL', 60070, 'nwc', '1');
INSERT INTO `locations` VALUES (46, 'chicago', 'Northwest Suburbs', '', 'Schaumburg', 'IL', 60196, 'nwc', '1');
INSERT INTO `locations` VALUES (47, 'chicago', 'Northwest Indiana', '', 'Hammond', 'IN', 46324, 'nwi', '1');
INSERT INTO `locations` VALUES (48, 'chicago', 'Northwest Indiana', '', 'Gary', 'IN', 46406, 'nwi', '1');
INSERT INTO `locations` VALUES (49, 'chicago', 'South Chicagoland', '', 'Chicago Ridge', 'IL', 60415, 'sox', '1');
INSERT INTO `locations` VALUES (50, 'chicago', 'South Chicagoland', '', 'Homewood', 'IL', 60430, 'sox', '1');
INSERT INTO `locations` VALUES (51, 'chicago', 'South Chicagoland', '45454', 'ggg', 'IL', 60441, 'sox', '1');
INSERT INTO `locations` VALUES (52, 'chicago', 'South Chicagoland', '0', '0', 'IL', 60453, 'sox', '1');
INSERT INTO `locations` VALUES (53, 'chicago', 'South Chicagoland', '0', '0', 'IL', 60462, 'sox', '1');
INSERT INTO `locations` VALUES (54, 'chicago', 'South Chicagoland', '0', 'dd', 'IL', 60473, 'sox', '1');
INSERT INTO `locations` VALUES (55, 'chicago', 'South Chicagoland', '', 'Alsip', 'IL', 60803, 'sox', '1');
INSERT INTO `locations` VALUES (56, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60605, 'chc', '1');
INSERT INTO `locations` VALUES (57, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60612, 'chc', '1');
INSERT INTO `locations` VALUES (58, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60616, 'chc', '1');
INSERT INTO `locations` VALUES (59, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60620, 'chc', '1');
INSERT INTO `locations` VALUES (60, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60629, 'chc', '1');
INSERT INTO `locations` VALUES (61, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60633, 'chc', '1');
INSERT INTO `locations` VALUES (62, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60638, 'chc', '1');
INSERT INTO `locations` VALUES (63, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60643, 'chc', '1');
INSERT INTO `locations` VALUES (64, 'chicago', 'City of Chicago', '0', 'Chicago', 'IL', 60651, 'chc', '1');
INSERT INTO `locations` VALUES (65, 'chicago', 'City of Chicago', '', 'Chicago', 'IL', 60659, 'chc', '0');
INSERT INTO `locations` VALUES (66, 'chicago', 'City of Chicago', '0', 'Lincolnwood', 'IL', 60712, 'chc', '1');
INSERT INTO `locations` VALUES (67, 'newyork', 'manhattan', 'Chelsea', 'Chelsea', 'NY', 10011, 'mnh', '0');
INSERT INTO `locations` VALUES (68, 'newyork', 'brooklyn', '', 'Brooklyn', 'NY', 11237, 'brk', '0');
INSERT INTO `locations` VALUES (69, 'newyork', 'brooklyn', '11', 'Brooklyn', 'NY', 11233, 'brk', '0');

-- ----------------------------
-- Table structure for parking_types
-- ----------------------------
DROP TABLE IF EXISTS `parking_types`;
CREATE TABLE `parking_types`  (
  `parking_id` int(11) NOT NULL AUTO_INCREMENT,
  `parking_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`parking_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parking_types
-- ----------------------------
INSERT INTO `parking_types` VALUES (1, '-');
INSERT INTO `parking_types` VALUES (2, 'carport');
INSERT INTO `parking_types` VALUES (3, 'attached garage');
INSERT INTO `parking_types` VALUES (4, 'detached garage');
INSERT INTO `parking_types` VALUES (5, 'off-street parking');
INSERT INTO `parking_types` VALUES (6, 'street parking');
INSERT INTO `parking_types` VALUES (7, 'valet parking');
INSERT INTO `parking_types` VALUES (8, 'no parking');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `post_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '[AUTOMATION DATA]',
  `user_id` int(11) NOT NULL COMMENT '[AUTOMATION DATA]',
  `campaign_id` int(11) NOT NULL COMMENT '[AUTOMATION DATA]',
  `account_id` int(5) NOT NULL COMMENT '[AUTOMATION DATA]',
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `manage_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `cl_load_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `cl_check_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `pid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `pid_date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `craigslist_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `offerup_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `letgo_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `fbmarket_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `craigslist` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `offerup` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `letgo` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `fbmarket` tinyint(1) NOT NULL DEFAULT 0 COMMENT '[AUTOMATION DATA]',
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `sub_category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `spec_location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `ad_id` int(11) NOT NULL,
  `spec_location_child` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  `city_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[AUTOMATION DATA]',
  PRIMARY KEY (`post_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 1, 1, 1, 'https://newyork.craigslist.org/brk/abo/d/brooklyn-large-beautiful-two-spacious/6907007194.html', '0', '', '0', 'PRIME WILLIAM NO FEE JUST HIT THE MARKET, ALL NEW !!', '523523551235', '2019-07-02  05:05:34', 0, 0, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', 'manhattan', 1, 'Chelsea', 'Chelsea');
INSERT INTO `posts` VALUES (2, 1, 2, 49, 'https://newyork.craigslist.org/brk/abo/d/brooklyn-large-beautiful-two-spacious/6907007194.html', '0', '', '0', 'Best Luxury in Bushwick! No Fee! REAL 3BR 2BT', '235325235233', '2019-07-03  05:05:34', 0, 0, 0, 0, 1, 0, 0, 0, 'housing', 'apts by owner', 'brooklyn', 2, '', 'Brooklyn');
INSERT INTO `posts` VALUES (3, 1, 1, 1, 'https://newyork.craigslist.org/brk/abo/d/brooklyn-large-beautiful-two-spacious/6907007194.html', '0', '', '0', 'dsds', '523532523523', '2019-07-04  05:05:34', 1, 1, 0, 0, 1, 0, 0, 0, 'services', 'skilled trade services', 'Central/South Phoenix', 2, '', 'Phoenix');

-- ----------------------------
-- Table structure for sell_conditions_types
-- ----------------------------
DROP TABLE IF EXISTS `sell_conditions_types`;
CREATE TABLE `sell_conditions_types`  (
  `sell_condition_id` int(11) NOT NULL AUTO_INCREMENT,
  `sell_condition_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sell_condition_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sell_conditions_types
-- ----------------------------
INSERT INTO `sell_conditions_types` VALUES (1, '-');
INSERT INTO `sell_conditions_types` VALUES (2, 'new');
INSERT INTO `sell_conditions_types` VALUES (3, 'like new');
INSERT INTO `sell_conditions_types` VALUES (4, 'excellent');
INSERT INTO `sell_conditions_types` VALUES (5, 'good');
INSERT INTO `sell_conditions_types` VALUES (6, 'fair');
INSERT INTO `sell_conditions_types` VALUES (7, 'salvage');

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NULL DEFAULT NULL,
  `session` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES (92, 20, 'RZ5i5Bqpb8gkzwhrlHaVJYzuXK1aHT1wLh2VLuRm');
INSERT INTO `session` VALUES (93, 20, '6n3GLr9QjT6l6Er1USgH16eCs77wskYU6Ia6u401');
INSERT INTO `session` VALUES (94, 20, 'gK9zWBNRUvWvfywVlcMDlu0SPT0m3KDPLT26wWMg');
INSERT INTO `session` VALUES (95, 20, 'FeusnK8rSfh1DnEio039hlLODNYM80a9ITDQ9wS3');
INSERT INTO `session` VALUES (96, 20, 'hhOLmocWNUNSIlgE9knXHcFQsmW8hg66BBbxKBET');
INSERT INTO `session` VALUES (97, 20, 'NdM9NFYSlRl3EIoLY8cMgXu786kKw0mN4ACjRvrf');
INSERT INTO `session` VALUES (98, 20, 'ZomMFBaZGYYsqdf2ygm2xx4DyIZFKOvI908gKFmj');
INSERT INTO `session` VALUES (99, 20, 'Emmljvff2QEtAT9SBrv8NBfc7dgSzRe93LONBeYc');
INSERT INTO `session` VALUES (100, 20, 'HwtgboJEgTC0yudSn6OE4dOZ0AeB8VLpYsov9r57');
INSERT INTO `session` VALUES (101, 20, 'JqEn2M0U0R8Of0nOfwzuAYKus2WqT51SOBUo6FAl');
INSERT INTO `session` VALUES (102, 20, 'Gbnun2U2KE77mA0MopuDImyAJjWGrEqy3VHy098f');
INSERT INTO `session` VALUES (104, 20, 'qqFzKhq37pTy3BGgN7psrbGo6NtTUYFId8DT6BRD');
INSERT INTO `session` VALUES (105, 20, 'Q1ULQjVaV8ZeG9H8D2x3cDb8O5VSiwbpesyslDlG');
INSERT INTO `session` VALUES (106, 20, 'EYOklZ4hEFpyRWM2MMGq984zfFoaYz6dnMvCLCV0');
INSERT INTO `session` VALUES (107, 20, 'USqFdUkzdzndKku1R90HVUl9dFzxmiPAThGJm4dd');
INSERT INTO `session` VALUES (108, 20, 'NCMV0oEQZyyQAgsvYFvG0DtIOCskkHQ1DNucmD72');
INSERT INTO `session` VALUES (109, 20, 'foK7gzzeGu5BBVlZgl7qLToak6i2WfSKCkGv7sMR');
INSERT INTO `session` VALUES (110, 20, 'jlwdxydGNMMgfufjMjO5llQ4nSQXoXBrUbzD4pbz');
INSERT INTO `session` VALUES (111, 20, '3b7Bov7qbodPBUMrqzE1OZBExXNnPU3ceQOhOheA');

-- ----------------------------
-- Table structure for tokens
-- ----------------------------
DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens`  (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `token_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_value` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`token_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tokens
-- ----------------------------
INSERT INTO `tokens` VALUES (1, 'title_garage', 'Opener Spring Re333mote 24 yr garage door repair!');
INSERT INTO `tokens` VALUES (2, 'title_garage', '✨ Garage Door Repair / Install / Opener 🔨 Get Quote!');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_registered` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  `display_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_allow` int(5) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `user_login_key`(`user_login`) USING BTREE,
  INDEX `user_nicename`(`user_name`) USING BTREE,
  INDEX `user_email`(`user_email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (22, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'use', 'user@use.com', '2019-07-30 13:12:13', 'user', 4, 1);
INSERT INTO `users` VALUES (23, 'ada', '47bce5c74f589f4867dbd57e9ca9f808', 'ada', 'ada', 'ada@aa.com', '2019-07-30 13:12:31', 'ada', 1, 0);
INSERT INTO `users` VALUES (21, 'miao', '1058a42a81e5252c76cb308bcd6a0214', 'miao', 'miao', 'miao@miao.com', '2019-07-30 13:05:05', 'miao', 10, 1);
INSERT INTO `users` VALUES (20, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'fff', 'test@test.com', '2019-07-22 22:14:17', 'test', 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
