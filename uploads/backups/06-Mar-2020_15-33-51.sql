-- --------------------------------------------------------------------------------
-- 
-- @version: mmp5.sql Mar 6, 2020 15:33 gewa
-- @package 1.00 v.4.50
-- @author wojoscripts.com.
-- @copyright 2020
-- 
-- --------------------------------------------------------------------------------
-- Host: localhost
-- Database: mmp5
-- Time: Mar 6, 2020-15:33
-- MySQL version: 5.7.23
-- PHP version: 5.6.38
-- --------------------------------------------------------------------------------

#
# Database: `mmp5`
#


-- --------------------------------------------------
# -- Table structure for table `banlist`
-- --------------------------------------------------
DROP TABLE IF EXISTS `banlist`;
CREATE TABLE `banlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('IP','Email') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IP',
  `comment` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ban_ip` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------
# Dumping data for table `banlist`
-- --------------------------------------------------

INSERT INTO `banlist` (`id`, `item`, `type`, `comment`) VALUES ('1', 'me@mail.com', 'Email', 'Constant spam from this email address');
INSERT INTO `banlist` (`id`, `item`, `type`, `comment`) VALUES ('2', '192.168.222.1', 'IP', 'Constant spam from this IP address');


-- --------------------------------------------------
# -- Table structure for table `cart`
-- --------------------------------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `mid` int(11) unsigned NOT NULL DEFAULT '0',
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `tax` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `totaltax` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `coupon` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `total` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `originalprice` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `totalprice` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `cart_id` varchar(100) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  KEY `idx_user` (`uid`),
  KEY `idx_membership` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `cart`
-- --------------------------------------------------



-- --------------------------------------------------
# -- Table structure for table `countries`
-- --------------------------------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `abbr` varchar(2) NOT NULL,
  `name` varchar(70) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `home` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vat` decimal(13,2) unsigned NOT NULL DEFAULT '0.00',
  `sorting` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `abbrv` (`abbr`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `countries`
-- --------------------------------------------------

INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('1', 'AF', 'Afghanistan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('2', 'AL', 'Albania', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('3', 'DZ', 'Algeria', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('4', 'AS', 'American Samoa', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('5', 'AD', 'Andorra', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('6', 'AO', 'Angola', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('7', 'AI', 'Anguilla', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('8', 'AQ', 'Antarctica', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('9', 'AG', 'Antigua and Barbuda', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('10', 'AR', 'Argentina', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('11', 'AM', 'Armenia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('12', 'AW', 'Aruba', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('13', 'AU', 'Australia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('14', 'AT', 'Austria', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('15', 'AZ', 'Azerbaijan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('16', 'BS', 'Bahamas', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('17', 'BH', 'Bahrain', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('18', 'BD', 'Bangladesh', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('19', 'BB', 'Barbados', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('20', 'BY', 'Belarus', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('21', 'BE', 'Belgium', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('22', 'BZ', 'Belize', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('23', 'BJ', 'Benin', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('24', 'BM', 'Bermuda', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('25', 'BT', 'Bhutan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('26', 'BO', 'Bolivia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('27', 'BA', 'Bosnia and Herzegowina', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('28', 'BW', 'Botswana', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('29', 'BV', 'Bouvet Island', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('30', 'BR', 'Brazil', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('31', 'IO', 'British Indian Ocean Territory', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('32', 'VG', 'British Virgin Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('33', 'BN', 'Brunei Darussalam', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('34', 'BG', 'Bulgaria', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('35', 'BF', 'Burkina Faso', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('36', 'BI', 'Burundi', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('37', 'KH', 'Cambodia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('38', 'CM', 'Cameroon', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('39', 'CA', 'Canada', '1', '1', '13.00', '1000');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('40', 'CV', 'Cape Verde', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('41', 'KY', 'Cayman Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('42', 'CF', 'Central African Republic', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('43', 'TD', 'Chad', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('44', 'CL', 'Chile', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('45', 'CN', 'China', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('46', 'CX', 'Christmas Island', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('47', 'CC', 'Cocos (Keeling) Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('48', 'CO', 'Colombia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('49', 'KM', 'Comoros', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('50', 'CG', 'Congo', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('51', 'CK', 'Cook Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('52', 'CR', 'Costa Rica', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('53', 'CI', 'Cote D\'ivoire', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('54', 'HR', 'Croatia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('55', 'CU', 'Cuba', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('56', 'CY', 'Cyprus', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('57', 'CZ', 'Czech Republic', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('58', 'DK', 'Denmark', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('59', 'DJ', 'Djibouti', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('60', 'DM', 'Dominica', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('61', 'DO', 'Dominican Republic', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('62', 'TP', 'East Timor', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('63', 'EC', 'Ecuador', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('64', 'EG', 'Egypt', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('65', 'SV', 'El Salvador', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('66', 'GQ', 'Equatorial Guinea', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('67', 'ER', 'Eritrea', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('68', 'EE', 'Estonia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('69', 'ET', 'Ethiopia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('70', 'FK', 'Falkland Islands (Malvinas)', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('71', 'FO', 'Faroe Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('72', 'FJ', 'Fiji', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('73', 'FI', 'Finland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('74', 'FR', 'France', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('75', 'GF', 'French Guiana', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('76', 'PF', 'French Polynesia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('77', 'TF', 'French Southern Territories', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('78', 'GA', 'Gabon', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('79', 'GM', 'Gambia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('80', 'GE', 'Georgia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('81', 'DE', 'Germany', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('82', 'GH', 'Ghana', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('83', 'GI', 'Gibraltar', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('84', 'GR', 'Greece', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('85', 'GL', 'Greenland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('86', 'GD', 'Grenada', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('87', 'GP', 'Guadeloupe', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('88', 'GU', 'Guam', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('89', 'GT', 'Guatemala', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('90', 'GN', 'Guinea', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('91', 'GW', 'Guinea-Bissau', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('92', 'GY', 'Guyana', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('93', 'HT', 'Haiti', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('94', 'HM', 'Heard and McDonald Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('95', 'HN', 'Honduras', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('96', 'HK', 'Hong Kong', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('97', 'HU', 'Hungary', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('98', 'IS', 'Iceland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('99', 'IN', 'India', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('100', 'ID', 'Indonesia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('101', 'IQ', 'Iraq', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('102', 'IE', 'Ireland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('103', 'IR', 'Islamic Republic of Iran', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('104', 'IL', 'Israel', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('105', 'IT', 'Italy', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('106', 'JM', 'Jamaica', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('107', 'JP', 'Japan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('108', 'JO', 'Jordan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('109', 'KZ', 'Kazakhstan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('110', 'KE', 'Kenya', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('111', 'KI', 'Kiribati', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('112', 'KP', 'Korea, Dem. Peoples Rep of', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('113', 'KR', 'Korea, Republic of', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('114', 'KW', 'Kuwait', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('115', 'KG', 'Kyrgyzstan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('116', 'LA', 'Laos', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('117', 'LV', 'Latvia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('118', 'LB', 'Lebanon', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('119', 'LS', 'Lesotho', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('120', 'LR', 'Liberia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('121', 'LY', 'Libyan Arab Jamahiriya', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('122', 'LI', 'Liechtenstein', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('123', 'LT', 'Lithuania', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('124', 'LU', 'Luxembourg', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('125', 'MO', 'Macau', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('126', 'MK', 'Macedonia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('127', 'MG', 'Madagascar', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('128', 'MW', 'Malawi', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('129', 'MY', 'Malaysia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('130', 'MV', 'Maldives', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('131', 'ML', 'Mali', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('132', 'MT', 'Malta', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('133', 'MH', 'Marshall Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('134', 'MQ', 'Martinique', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('135', 'MR', 'Mauritania', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('136', 'MU', 'Mauritius', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('137', 'YT', 'Mayotte', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('138', 'MX', 'Mexico', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('139', 'FM', 'Micronesia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('140', 'MD', 'Moldova, Republic of', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('141', 'MC', 'Monaco', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('142', 'MN', 'Mongolia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('143', 'MS', 'Montserrat', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('144', 'MA', 'Morocco', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('145', 'MZ', 'Mozambique', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('146', 'MM', 'Myanmar', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('147', 'NA', 'Namibia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('148', 'NR', 'Nauru', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('149', 'NP', 'Nepal', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('150', 'NL', 'Netherlands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('151', 'AN', 'Netherlands Antilles', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('152', 'NC', 'New Caledonia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('153', 'NZ', 'New Zealand', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('154', 'NI', 'Nicaragua', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('155', 'NE', 'Niger', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('156', 'NG', 'Nigeria', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('157', 'NU', 'Niue', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('158', 'NF', 'Norfolk Island', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('159', 'MP', 'Northern Mariana Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('160', 'NO', 'Norway', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('161', 'OM', 'Oman', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('162', 'PK', 'Pakistan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('163', 'PW', 'Palau', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('164', 'PA', 'Panama', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('165', 'PG', 'Papua New Guinea', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('166', 'PY', 'Paraguay', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('167', 'PE', 'Peru', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('168', 'PH', 'Philippines', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('169', 'PN', 'Pitcairn', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('170', 'PL', 'Poland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('171', 'PT', 'Portugal', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('172', 'PR', 'Puerto Rico', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('173', 'QA', 'Qatar', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('174', 'RE', 'Reunion', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('175', 'RO', 'Romania', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('176', 'RU', 'Russian Federation', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('177', 'RW', 'Rwanda', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('178', 'LC', 'Saint Lucia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('179', 'WS', 'Samoa', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('180', 'SM', 'San Marino', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('181', 'ST', 'Sao Tome and Principe', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('182', 'SA', 'Saudi Arabia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('183', 'SN', 'Senegal', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('184', 'RS', 'Serbia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('185', 'SC', 'Seychelles', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('186', 'SL', 'Sierra Leone', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('187', 'SG', 'Singapore', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('188', 'SK', 'Slovakia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('189', 'SI', 'Slovenia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('190', 'SB', 'Solomon Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('191', 'SO', 'Somalia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('192', 'ZA', 'South Africa', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('193', 'ES', 'Spain', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('194', 'LK', 'Sri Lanka', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('195', 'SH', 'St. Helena', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('196', 'KN', 'St. Kitts and Nevis', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('197', 'PM', 'St. Pierre and Miquelon', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('198', 'VC', 'St. Vincent and the Grenadines', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('199', 'SD', 'Sudan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('200', 'SR', 'Suriname', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('201', 'SJ', 'Svalbard and Jan Mayen Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('202', 'SZ', 'Swaziland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('203', 'SE', 'Sweden', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('204', 'CH', 'Switzerland', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('205', 'SY', 'Syrian Arab Republic', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('206', 'TW', 'Taiwan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('207', 'TJ', 'Tajikistan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('208', 'TZ', 'Tanzania, United Republic of', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('209', 'TH', 'Thailand', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('210', 'TG', 'Togo', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('211', 'TK', 'Tokelau', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('212', 'TO', 'Tonga', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('213', 'TT', 'Trinidad and Tobago', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('214', 'TN', 'Tunisia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('215', 'TR', 'Turkey', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('216', 'TM', 'Turkmenistan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('217', 'TC', 'Turks and Caicos Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('218', 'TV', 'Tuvalu', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('219', 'UG', 'Uganda', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('220', 'UA', 'Ukraine', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('221', 'AE', 'United Arab Emirates', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('222', 'GB', 'United Kingdom (GB)', '1', '0', '23.00', '999');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('224', 'US', 'United States', '1', '0', '7.50', '998');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('225', 'VI', 'United States Virgin Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('226', 'UY', 'Uruguay', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('227', 'UZ', 'Uzbekistan', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('228', 'VU', 'Vanuatu', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('229', 'VA', 'Vatican City State', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('230', 'VE', 'Venezuela', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('231', 'VN', 'Vietnam', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('232', 'WF', 'Wallis And Futuna Islands', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('233', 'EH', 'Western Sahara', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('234', 'YE', 'Yemen', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('235', 'ZR', 'Zaire', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('236', 'ZM', 'Zambia', '1', '0', '0.00', '0');
INSERT INTO `countries` (`id`, `abbr`, `name`, `active`, `home`, `vat`, `sorting`) VALUES ('237', 'ZW', 'Zimbabwe', '1', '0', '0.00', '0');


-- --------------------------------------------------
# -- Table structure for table `coupons`
-- --------------------------------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `code` varchar(30) NOT NULL,
  `discount` smallint(2) unsigned NOT NULL DEFAULT '0',
  `type` enum('p','a') NOT NULL DEFAULT 'p',
  `membership_id` varchar(50) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `coupons`
-- --------------------------------------------------

INSERT INTO `coupons` (`id`, `title`, `code`, `discount`, `type`, `membership_id`, `created`, `active`) VALUES ('1', '10% off', '12345', '10', 'p', '5,3', '2016-05-12 19:21:27', '1');
INSERT INTO `coupons` (`id`, `title`, `code`, `discount`, `type`, `membership_id`, `created`, `active`) VALUES ('2', '10 off', '45678', '10', 'a', '2,1', '2016-08-19 14:38:04', '1');


-- --------------------------------------------------
# -- Table structure for table `cronjobs`
-- --------------------------------------------------
DROP TABLE IF EXISTS `cronjobs`;
CREATE TABLE `cronjobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `membership_id` int(11) unsigned NOT NULL DEFAULT '0',
  `stripe_customer` varchar(60) NOT NULL,
  `stripe_pm` varchar(80) NOT NULL,
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `renewal` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_membership_id` (`membership_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `cronjobs`
-- --------------------------------------------------

INSERT INTO `cronjobs` (`id`, `user_id`, `membership_id`, `stripe_customer`, `stripe_pm`, `amount`, `created`, `renewal`) VALUES ('1', '21', '2', 'cus_GZ4dIIEgG0Esk9', 'pm_0G1wUSN6BdWyOz5lTfedjMmV', '2.99', '2020-01-17 15:12:11', '2020-02-17 10:15:56');


-- --------------------------------------------------
# -- Table structure for table `custom_fields`
-- --------------------------------------------------
DROP TABLE IF EXISTS `custom_fields`;
CREATE TABLE `custom_fields` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `tooltip` varchar(100) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `section` varchar(30) DEFAULT NULL,
  `sorting` int(4) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `custom_fields`
-- --------------------------------------------------

INSERT INTO `custom_fields` (`id`, `title`, `tooltip`, `name`, `required`, `section`, `sorting`, `active`) VALUES ('1', 'Company', 'Company Name', '001', '1', 'profile', '1', '1');
INSERT INTO `custom_fields` (`id`, `title`, `tooltip`, `name`, `required`, `section`, `sorting`, `active`) VALUES ('2', 'Phone Number', '', '002', '0', 'profile', '2', '1');


-- --------------------------------------------------
# -- Table structure for table `downloads`
-- --------------------------------------------------
DROP TABLE IF EXISTS `downloads`;
CREATE TABLE `downloads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(60) NOT NULL,
  `name` varchar(80) NOT NULL,
  `filesize` int(11) unsigned NOT NULL,
  `extension` varchar(4) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `token` varchar(32) NOT NULL,
  `fileaccess` varchar(24) NOT NULL DEFAULT '0' COMMENT '0 = all',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `downloads`
-- --------------------------------------------------

INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('1', 'Demo File 1', 'testfile1.zip', '19456', 'zip', 'archive', 'PRwX8uzBUIQwXA4K', '1,4', '2011-07-21 23:42:11');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('2', 'Demo File 2', 'testfile2.zip', '23552', 'zip', 'archive', 'riqpVkIrtNUcDzoU', '2,1', '2011-07-21 23:42:21');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('3', 'Demo File 3', 'testfile3.zip', '11264', 'zip', 'archive', 'VKJAZIYjimxEtEko', '3,2,1', '2011-07-21 23:42:29');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('4', 'Demo File 4', 'testfile4.zip', '7168', 'zip', 'archive', 'TUaWFooswrj4CSGK', '3,1,4', '2011-07-21 23:42:37');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('5', 'Demo File 5', 'testfile5.zip', '9216', 'zip', 'archive', 'akDlZIYjimxEtEko', '2,1', '2011-07-21 23:42:49');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('6', 'Demo File 6', 'testpdf1.pdf', '19456', 'pdf', 'document', 'ObedbXz6aHyBYGD', '1,4', '2011-07-21 23:47:18');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('7', 'Demo File 7', 'testpdf2.pdf', '23552', 'pdf', 'document', 'PRwX8uzBUIQwXt7Y', '3,2,1', '2011-07-21 23:47:29');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('8', 'Demo File 8', 'testpdf3.pdf', '11264', 'pdf', 'document', 'LjotObKJznhtu6nS', '3,1,4', '2011-07-21 23:47:44');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('9', 'Demo File 9', 'testfilems1.doc', '19456', 'doc', 'document', 'tOoqqugchhg5412w', '2,1', '2011-07-21 23:51:16');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('10', 'Demo File 10', 'testfilems2.docx', '23552', 'docx', 'document', 'e0dTFL8yBZThcFDf', '1,4', '2011-07-21 23:51:24');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('11', 'Demo File 11', 'testfilems4.xls', '7168', 'xls', 'document', 'g7UAZIYjimxEtEko', '3,2,1', '2011-07-21 23:51:32');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('12', 'Demo File 12', 'testfilems5.xlsx', '9216', 'xlsx', 'document', 'e0dGFL8yBZThcFDf', '4,1', '2011-07-21 23:51:43');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('14', 'Demo Audio', 'demoAudio.mp3', '132113', 'mp3', 'audio', 'ObedbXz6aHyAFGIj', '3,1,4', '2017-08-17 06:27:30');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('15', 'Demo Video', 'demoVideo.mp4', '250231', 'mp4', 'video', '2UHu5fRUE78xvnvb', '3,1', '2017-08-17 06:29:14');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('16', 'Demo Image and more text', 'banner1.jpg', '46208', 'jpg', 'image', '2xC9nrlaRyV2C3hx', '1,2,4', '2017-08-17 06:33:01');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('17', 'accounting.png', 'SOURCE_9weyDYsJtUuqX2of1Pq9Tytr.png', '142905', 'png', 'image', 'gfokCyCqTNYbVOyM', '0', '2017-10-02 02:05:16');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('18', 'Darko Lazic - Cemu ovo sve.mp3', 'SOURCE_wooc8rbiiv7jzFpMPR6Btoe9.mp3', '5847498', 'mp3', 'audio', 'F1laFofqtkieT5js', '0', '2017-10-02 02:13:23');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('19', 'dribbble_preview_real_pixels.jpg', 'SOURCE_D64B5VZ7s9VMykeq4joYQNDz.jpg', '645419', 'jpg', 'image', 'uQjfKhwrPLP9uoXL', '0', '2017-10-02 02:13:23');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('20', 'Darko Lazic - Cemu ovo sve.mp3', 'SOURCE_qkayK0MIxYh10vOz66MGD4CT.mp3', '5847498', 'mp3', 'audio', 'SoB0b6nx7sRjnGsA', '0', '2017-10-02 02:16:38');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('21', '10480727.jpg', 'SOURCE_Lf519bcsEIEhgQ1KCmHdiupN.jpg', '212283', 'jpg', 'image', 'z4jfvimE0R4HmOkh', '0', '2017-10-19 18:01:24');
INSERT INTO `downloads` (`id`, `alias`, `name`, `filesize`, `extension`, `type`, `token`, `fileaccess`, `created`) VALUES ('22', 'accounting.png', 'SOURCE_UyhxFZFJVrYHOJWKgqFm2AND.png', '142905', 'png', 'image', '3GiaTbKJIPONkRBi', '0', '2017-10-19 18:03:56');


-- --------------------------------------------------
# -- Table structure for table `email_templates`
-- --------------------------------------------------
DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `help` tinytext,
  `body` text NOT NULL,
  `type` enum('news','mailer') DEFAULT 'mailer',
  `typeid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `email_templates`
-- --------------------------------------------------

INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('1', 'Registration Email', 'Please verify your email', 'This template is used to send Registration Verification Email, when Configuration->Registration Verification is set to YES', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="hm8vuoq48all"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Welcome to [COMPANY]</h1>\r\n      <h4 style="font-weight:600;margin-bottom:16px">Congratulations</h4>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> You are now registered member.</p>\r\n      <p style="padding:30px 0px 0px 0px;color:#7B7B7B"> The administrator of this site has requested all new accounts to be activated by the users who created them thus your account is currently inactive. To activate your account, please visit the link below. </p>\r\n      <p style="margin:0;padding:5px;color:#7B7B7B"> Here are your login details. Please keep them in a safe place: </p>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Username:</strong> [USERNAME] <br>\r\n        <strong>Password:</strong> [PASSWORD]</p>\r\n      <div style="padding:30px 0px 0px 0px">\r\n        <a target="_blank" href="[LINK]" style="text-decoration: none;border-radius: 6px 6px 6px 6px;display:inline-block;background-color:#4CAF50;padding:14px 30px 14px 30px;color:#ffffff;font-weight:500;font-size:18px">Activate your account</a>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="b3eketvdotgh"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="ulmqiev3o5ib"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="kwcqxxkfuooj"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'regMail');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('2', 'Welcome Mail From Admin', 'You have been registered', 'This template is used to send welcome email, when user is added by administrator', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="pvy0mjj5q3qg"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Welcome to [COMPANY]</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> Hey [NAME], You\'re now a member of [COMPANY].</p>\r\n      <p style="margin:0;padding:5px;color:#7B7B7B"> Here are your login details. Please keep them in a safe place: </p>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Username:</strong> [USERNAME] <br><strong>Password:</strong> [PASSWORD]</p>\r\n      <div style="padding:30px 0px 0px 0px">\r\n        <a target="_blank" href="[LINK]" style="text-decoration: none;border-radius: 6px 6px 6px 6px;display:inline-block;background-color:#4CAF50;padding:14px 30px 14px 30px;color:#ffffff;font-weight:500;font-size:18px">Go to login </a>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="83l2r3utfiat"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="52x4to0expai"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="ctjwcqya9l2p"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'regMailAdmin');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('3', 'Default Newsletter', 'Newsletter', 'This is a default newsletter template', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040">\r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="uoukilsfg9jh"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">[COMPANY] Newsletter</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> Hey, [NAME]</p>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">[ATTACHMENT]</p>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left">\r\n        Newsletter content goes here...\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="w2d4x45j0qnr"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="ruwn6ee1shdz"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="67xboisypgzu"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n    [LOGO]\r\n  </div>\r\n</div>', 'mailer', 'newsletter');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('4', 'Single Email', 'Single User Email', 'This template is used to email single user', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040">\r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="hz4ctjs0mmds"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Hello [NAME]</h1>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left">Your message goes here...  </div>\r\n      <div>[ATTACHMENT]</div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="ril1x3212p6t"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="5bjwhftg5jti"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="50q0bw0v1enu"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'singleMail');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('5', 'Forgot Password Admin', 'Password Reset', 'This template is used for retrieving lost admin password', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 16px 24px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">New Password Request!</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> Hey [NAME], it seems that you or someone requested a new password for you.</p>\r\n      <p style="margin:0;padding:5px;color:#7B7B7B"> We have generated a new password, as requested.</p>\r\n      <div style="padding:30px 0px 0px 0px">\r\n        <a target="_blank" href="[LINK]" style="text-decoration: none;border-radius: 6px 6px 6px 6px;display:inline-block;background-color:#4CAF50;padding:14px 30px 14px 30px;color:#ffffff;font-weight:500;font-size:18px">Go to password reset page </a>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" alt=""></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" alt=""></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" alt=""></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n      [LOGO]\r\n  </div>\r\n</div>', 'mailer', 'adminPassReset');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('6', 'Forgot Password User', 'Password Reset', 'This template is used for retrieving lost user password', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 16px 24px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">New Password Request!</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> Hey [NAME], it seems that you or someone requested a new password for you.</p>\r\n      <p style="margin:0;padding:5px;color:#7B7B7B"> We have generated a new password, as requested.</p>\r\n      <div style="padding:30px 0px 0px 0px">\r\n        <a target="_blank" href="[LINK]" style="text-decoration: none;border-radius: 6px 6px 6px 6px;display:inline-block;background-color:#4CAF50;padding:14px 30px 14px 30px;color:#ffffff;font-weight:500;font-size:18px">Go to password reset page </a>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" alt=""></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" alt=""></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" alt=""></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n      [LOGO]\r\n  </div>\r\n</div>', 'mailer', 'userPassReset');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('7', 'Welcome Email', 'Welcome', 'This template is used to welcome newly registered user when Configuration->Registration Verification and Configuration->Auto Registration are both set to YES', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040">\r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="8g2slgta1xzb"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Welcome to [COMPANY]</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> Hey [NAME], You\'re now a member of [<span style="font-weight:100;margin-bottom:32px">COMPANY</span>].</p>\r\n      <p style="margin:0;padding:5px;color:#7B7B7B"> Here are your login details. Please keep them in a safe place: </p>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Username:</strong> [USERNAME] <br><strong>Password:</strong> [PASSWORD]</p>\r\n      <div style="padding:30px 0px 0px 0px">\r\n        <a target="_blank" href="[LINK]" style="text-decoration: none;border-radius: 6px 6px 6px 6px;display:inline-block;background-color:#4CAF50;padding:14px 30px 14px 30px;color:#ffffff;font-weight:500;font-size:18px">Go to login </a>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="r0yblmme42zg"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="tn9s6hq58f4f"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="h3ex4vqvab1t"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n    [LOGO]\r\n  </div>\r\n</div>', 'mailer', 'welcomeEmail');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('8', 'Registration Pending', 'Registration Verification Pending', 'This template is used to send Registration Verification Email, when Configuration->Auto Registration is set to NO', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040">\r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="2p5ic83y4coa"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Welcome to [COMPANY]</h1>\r\n      <h4 style="font-weight:600;margin-bottom:16px">Congratulations</h4>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"> You are now registered member.</p>\r\n      <p style="padding:30px 0px 0px 0px;color:#7B7B7B"> The administrator of this site has requested all new accounts to be activated by the users who created them thus your account is currently pending verification process. </p>\r\n      <p style="margin:0;padding:5px;color:#7B7B7B"> Here are your login details. Please keep them in a safe place: </p>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Username:</strong> [USERNAME] <br>\r\n        <strong>Password:</strong> [PASSWORD]</p>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="g9fptvy2dtb0"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="0bp3i3xz2dm5"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="xmvo59dxefhl"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'regMailPending');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('9', 'Notify Admin', 'New User Registration', 'This template is used to notify admin of new registration when Configuration->Registration Notification is set to YES', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="2judyt8cntp9"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Hello Admin</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">You have a new user registration. You can login into your admin panel to view details: </p>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left">\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Email:</strong> [EMAIL]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Name:</strong> [NAME]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>IP:</strong> [IP]</p>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="s16ix3ep7j9f"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="xlq46jqj64cd"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="has11vr33zeu"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'notifyAdmin');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('10', 'Contact Request', 'Contact Inquiry', 'This template is used to send default Contact Request Form', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040">\r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="clonre5doxz8"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Hello Admin</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">You have a new contact request: </p>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left">\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>From:</strong> [NAME]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Email:</strong> [EMAIL]        </p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Subject:</strong> [MAILSUBJECT]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>IP:</strong> [IP]</p>\r\n      </div>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left"> [MESSAGE] </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="76i4mgb45gq2"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="vyhiiwi1bd2z"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="lwgrzfye6a62"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n    [LOGO]\r\n  </div>\r\n</div>', 'mailer', 'contact');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('11', 'Transaction Completed Admin', 'Payment Completed', 'This template is used to notify administrator on successful payment transaction', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="e37mbrhjaz9r"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Hello Admin</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">You have received new payment following: </p>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left">\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Username:</strong> [NAME]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Membership:</strong> [ITEMNAME]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Price:</strong> [PRICE]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Status:</strong> [STATUS]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Processor:</strong> [PP]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>IP:</strong> [IP]</p>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="83mtrh4b0z6n"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="82m4rh7zv60v"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="q6zxk5aqu8s4"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'payComplete');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('12', 'Transaction Completed User', 'Payment Completed', 'This template is used to notify user on successful payment transaction', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040"> \r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="ia5gncxfmg52"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Hello [NAME]</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">Your payment has been completed successfuly: </p>\r\n      <div style="padding:30px 0px 0px 0px;text-align:left">\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Membership:</strong> [ITEMNAME]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Discount:</strong> [COUPON]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Vat/Tax:</strong> [TAX]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Price:</strong> [PRICE]</p>\r\n        <p style="margin:0;padding:3px;color:#7B7B7B"><strong>Processor:</strong> [PP]      </p>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="cvgfb12543en"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="8zuz79p181ae"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="7gs8o8r7rf8s"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'payCompleteUser');
INSERT INTO `email_templates` (`id`, `name`, `subject`, `help`, `body`, `type`, `typeid`) VALUES ('13', 'Membership Expired', 'Membership Has Expired', 'This template is used to notify user when membership is about to expire a day before. ', '<div style="background-color:#F2F2F2;margin:0 auto;padding:60px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #404040">\r\n  <div style="border-radius: 6px 6px 6px 6px;box-shadow: 0 1px 2px 0 #DFDFDF;">\r\n    <div style="background-color:#35B8E8;text-align:center;margin-top:32px;border-radius: 6px 6px 0 0;"><img src="[SITEURL]/assets/images/header.png" alt="header" data-image="hde46xqhibuh"></div>\r\n    <div style="background-color:#ffffff;padding:48px;text-align:center;border-radius: 0 0 6px 6px;">\r\n      <h1 style="font-weight:100;margin-bottom:32px">Membership Notification From [COMPANY]</h1>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">Hey, [NAME]</p>\r\n      <p style="margin:0;padding:3px;color:#7B7B7B">Your current membership will soon expire.</p>\r\n      <p style="margin:0;padding:10px;color:#7B7B7B"><strong>Membership:</strong> [ITEMNAME]</p>\r\n      <p style="margin:0;padding:10px;color:#7B7B7B"><strong>Expire:</strong> [EXPIRE]</p>\r\n    </div>\r\n  </div>\r\n  <div style="padding:48px;text-align:center">\r\n    <p style="margin-bottom:32px;font-size:20px;color:##272822"><em>Stay in touch</em></p>\r\n    <a target="_blank" href="http://facebook.com/[FB]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/twitter.png" data-image="cp2e8x17x5bx"></a>\r\n    <a target="_blank" href="http://facebook.com/[TW]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/facebook.png" data-image="en8aio5q0y8k"></a>\r\n    <a href="mailto:[CEMAIL]" style="display:inline-block;margin: 0px 5px 0px 5px;"><img src="[SITEURL]/assets/images/email.png" data-image="6abt616ig6g6"></a>\r\n    <div style="font-size:12px;color:#6E6E6E;margin-top:24px">\r\n      <p style="margin:0;padding:4px"> This email is sent to you directly from [COMPANY]</p>\r\n      <p style="margin:0"> The information above is gathered from the user input. ©[DATE] <a href="[SITEURL]">[COMPANY]</a>\r\n        . All rights reserved.</p>\r\n    </div>\r\n[LOGO]\r\n  </div>\r\n</div>', 'mailer', 'memExpired');


-- --------------------------------------------------
# -- Table structure for table `gateways`
-- --------------------------------------------------
DROP TABLE IF EXISTS `gateways`;
CREATE TABLE `gateways` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `displayname` varchar(50) NOT NULL,
  `dir` varchar(30) NOT NULL,
  `live` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `extra_txt` varchar(120) DEFAULT NULL,
  `extra_txt2` varchar(120) DEFAULT NULL,
  `extra_txt3` varchar(120) DEFAULT NULL,
  `extra` varchar(120) NOT NULL,
  `extra2` varchar(120) DEFAULT NULL,
  `extra3` varchar(120) DEFAULT NULL,
  `is_recurring` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `gateways`
-- --------------------------------------------------

INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('1', 'paypal', 'PayPal', 'paypal', '1', 'Paypal Email Address', 'Currency Code', 'Not in Use', 'webmaster@wojoscripts.com', 'CAD', '', '1', '1');
INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('2', 'skrill', 'Skrill', 'skrill', '1', 'Skrill Email Address', 'Currency Code', 'Secret Passphrase', 'demoqco@sun-fish.com', 'EUR', 'skrill', '1', '1');
INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('3', 'stripe', 'Stripe', 'stripe', '1', 'Stripe Secret Key', 'Currency Code', '', 'sk_test_6sDE6weBXgEuHbrjZKyG5MlQ', 'CAD', 'pk_test_vRosykAcmL59P2r7H9hziwrg', '1', '1');
INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('4', 'payfast', 'PayFast', 'payfast', '1', 'Merchant ID', 'Merchant Key', 'PassPhrase', '10014282', 'amuzbjdw155ol', 'Alex0208alex', '1', '1');
INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('6', 'ideal', 'iDeal', 'ideal', '1', 'API Key', 'Currency Code', 'Not in Use', 'test_uFQUaDAjAygbhcpMN95DJdsVkDDKrJ', 'EUR', '', '0', '1');
INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('7', 'anet', 'Authorize.net', 'anet', '1', 'API Login Id', 'MD5 Hash Key', 'Transaction Key', '9KDgMm2mw46V', 'Simon', '5wek3X3DX5e39YAQ', '0', '1');
INSERT INTO `gateways` (`id`, `name`, `displayname`, `dir`, `live`, `extra_txt`, `extra_txt2`, `extra_txt3`, `extra`, `extra2`, `extra3`, `is_recurring`, `active`) VALUES ('9', 'offline', 'Offline', 'offline', '1', 'Currency Code', 'Not in Use', 'Not in Use', 'CAD', '', '', '0', '1');


-- --------------------------------------------------
# -- Table structure for table `memberships`
-- --------------------------------------------------
DROP TABLE IF EXISTS `memberships`;
CREATE TABLE `memberships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text,
  `price` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  `days` smallint(2) unsigned NOT NULL DEFAULT '0',
  `period` varchar(1) NOT NULL DEFAULT 'D',
  `recurring` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(40) DEFAULT NULL,
  `private` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `memberships`
-- --------------------------------------------------

INSERT INTO `memberships` (`id`, `title`, `description`, `price`, `days`, `period`, `recurring`, `thumb`, `private`, `active`) VALUES ('1', 'Trial', 'This is 7 days membership', '0.00', '7', 'D', '0', '', '0', '1');
INSERT INTO `memberships` (`id`, `title`, `description`, `price`, `days`, `period`, `recurring`, `thumb`, `private`, `active`) VALUES ('2', 'Bronze', 'This is 30 days basic membership', '2.99', '1', 'M', '1', 'bronze.png', '0', '1');
INSERT INTO `memberships` (`id`, `title`, `description`, `price`, `days`, `period`, `recurring`, `thumb`, `private`, `active`) VALUES ('3', 'Gold', 'This is 90 days basic membership', '6.99', '90', 'D', '0', 'gold.png', '0', '1');
INSERT INTO `memberships` (`id`, `title`, `description`, `price`, `days`, `period`, `recurring`, `thumb`, `private`, `active`) VALUES ('4', 'Platinum', 'Platinum Yearly Subscription', '149.99', '1', 'Y', '1', 'platinum.png', '0', '1');
INSERT INTO `memberships` (`id`, `title`, `description`, `price`, `days`, `period`, `recurring`, `thumb`, `private`, `active`) VALUES ('5', 'Silver', 'This is 7 days basic membership.', '1.99', '1', 'W', '0', 'silver.png', '1', '1');


-- --------------------------------------------------
# -- Table structure for table `news`
-- --------------------------------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `author` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `news`
-- --------------------------------------------------

INSERT INTO `news` (`id`, `title`, `body`, `author`, `created`, `active`) VALUES ('1', 'Welcome to our Client Area!', '<p>We are pleased to announce the new release of fully responsive Membership Manager Pro v 4.0</p>', 'Web Master', '2015-03-14 04:00:00', '1');
INSERT INTO `news` (`id`, `title`, `body`, `author`, `created`, `active`) VALUES ('2', 'Test', 'Lrem ipsum<br>', 'Web Master', '2020-01-14 17:25:59', '1');


-- --------------------------------------------------
# -- Table structure for table `payments`
-- --------------------------------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(50) DEFAULT NULL,
  `membership_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `rate_amount` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  `tax` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  `coupon` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  `total` decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  `currency` varchar(4) DEFAULT NULL,
  `pp` varchar(20) NOT NULL DEFAULT 'Stripe',
  `ip` varbinary(16) DEFAULT '000.000.000.000',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_membership` (`membership_id`),
  KEY `idx_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `payments`
-- --------------------------------------------------

INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('1', 'txn_4rX4ydAuaWCC3h', '1', '2', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '181.129.184.180', '2017-07-12 01:20:12', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('2', 'txn_4rX4ydAuaWCC3h', '4', '3', '9.99', '0.00', '0.00', '9.99', 'USD', 'PayPal', '158.233.20.216', '2017-05-10 16:38:15', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('3', 'txn_4rX4ydAuaWCC3h', '4', '4', '19.99', '0.00', '0.00', '19.99', 'USD', 'Ideal', '194.141.14.224', '2017-06-17 16:11:22', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('4', 'txn_4rX4ydAuaWCC3h', '2', '5', '49.99', '0.00', '0.00', '49.99', 'USD', '2Checkout', '96.186.181.70', '2017-05-31 04:40:47', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('5', 'txn_4rX4ydAuaWCC3h', '3', '6', '5.99', '0.00', '0.00', '5.99', 'USD', 'Authorize.net', '33.147.193.164', '2017-03-26 18:02:24', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('6', 'txn_4rX4ydAuaWCC3h', '1', '7', '9.99', '0.00', '0.00', '9.99', 'USD', 'PayPal', '88.59.10.81', '2017-06-14 02:34:14', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('7', 'txn_4rX4ydAuaWCC3h', '1', '8', '19.99', '0.00', '0.00', '19.99', 'USD', 'PayPal', '27.145.174.24', '2017-03-26 06:45:44', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('8', 'txn_4rX4ydAuaWCC3h', '1', '9', '49.99', '0.00', '0.00', '49.99', 'USD', 'PayPal', '128.164.177.74', '2017-07-06 20:34:34', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('9', 'txn_4rX4ydAuaWCC3h', '1', '10', '5.99', '0.00', '0.00', '5.99', 'USD', 'PayPal', '121.196.218.135', '2017-03-28 10:27:34', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('10', 'txn_4rX4ydAuaWCC3h', '2', '11', '9.99', '0.00', '0.00', '9.99', 'USD', 'PayPal', '237.200.148.212', '2017-08-22 13:27:01', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('11', 'txn_4rX4ydAuaWCC3h', '3', '12', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '50.182.246.202', '2017-02-22 09:48:17', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('12', 'txn_4rX4ydAuaWCC3h', '4', '13', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '218.77.236.235', '2017-02-18 18:58:22', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('13', 'txn_4rX4ydAuaWCC3h', '3', '14', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '163.160.227.38', '2017-06-25 14:43:19', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('14', 'txn_4rX4ydAuaWCC3h', '1', '15', '9.99', '0.00', '0.00', '9.99', 'USD', 'Ideal', '129.121.141.239', '2017-02-05 20:50:25', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('15', 'txn_4rX4ydAuaWCC3h', '2', '16', '19.99', '0.00', '0.00', '19.99', 'USD', 'Ideal', '76.131.33.77', '2017-03-05 10:56:14', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('16', 'txn_4rX4ydAuaWCC3h', '3', '17', '49.99', '0.00', '0.00', '49.99', 'USD', 'Ideal', '206.12.140.116', '2017-06-12 23:41:01', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('17', 'txn_4rX4ydAuaWCC3h', '4', '21', '5.99', '0.00', '0.00', '5.99', 'USD', 'Ideal', '37.77.193.187', '2017-02-13 21:32:37', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('18', 'txn_4rX4ydAuaWCC3h', '3', '2', '9.99', '0.00', '0.00', '9.99', 'USD', 'Ideal', '230.224.179.98', '2017-05-31 03:18:09', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('19', 'txn_4rX4ydAuaWCC3h', '3', '3', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '185.83.36.33', '2017-06-26 19:45:12', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('20', 'txn_4rX4ydAuaWCC3h', '1', '4', '49.99', '0.00', '0.00', '49.99', 'USD', '2Checkout', '136.29.84.164', '2017-04-24 15:28:47', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('21', 'txn_4rX4ydAuaWCC3h', '4', '5', '5.99', '0.00', '0.00', '5.99', 'USD', '2Checkout', '142.190.92.206', '2017-01-27 07:56:57', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('22', 'txn_4rX4ydAuaWCC3h', '2', '6', '9.99', '0.00', '0.00', '9.99', 'USD', '2Checkout', '115.232.232.162', '2017-03-22 21:16:49', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('23', 'txn_4rX4ydAuaWCC3h', '4', '7', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '146.97.28.41', '2017-04-19 14:23:47', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('24', 'txn_4rX4ydAuaWCC3h', '3', '8', '49.99', '0.00', '0.00', '49.99', 'USD', 'Authorize.net', '34.240.96.38', '2017-07-09 03:40:45', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('25', 'txn_4rX4ydAuaWCC3h', '4', '9', '5.99', '0.00', '0.00', '5.99', 'USD', 'Authorize.net', '163.108.198.195', '2017-02-11 18:10:09', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('26', 'txn_4rX4ydAuaWCC3h', '4', '10', '9.99', '0.00', '0.00', '9.99', 'USD', 'Authorize.net', '226.95.25.145', '2017-05-23 14:39:56', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('27', 'txn_4rX4ydAuaWCC3h', '3', '11', '19.99', '0.00', '0.00', '19.99', 'USD', 'Authorize.net', '83.172.80.137', '2017-06-15 18:54:14', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('28', 'txn_4rX4ydAuaWCC3h', '3', '12', '49.99', '0.00', '0.00', '49.99', 'USD', 'Authorize.net', '164.97.132.132', '2017-04-11 07:35:59', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('29', 'txn_4rX4ydAuaWCC3h', '3', '13', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '21.191.176.28', '2017-03-15 14:24:47', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('30', 'txn_4rX4ydAuaWCC3h', '2', '14', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '82.148.38.127', '2017-01-07 14:01:09', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('31', 'txn_4rX4ydAuaWCC3h', '2', '15', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '76.218.241.15', '2017-05-19 06:57:44', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('32', 'txn_4rX4ydAuaWCC3h', '3', '16', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '228.189.0.172', '2017-06-23 01:22:21', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('33', 'txn_4rX4ydAuaWCC3h', '1', '17', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '224.37.35.27', '2017-06-22 02:29:49', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('34', 'txn_4rX4ydAuaWCC3h', '2', '21', '9.99', '0.00', '0.00', '9.99', 'USD', 'PayPal', '94.132.216.227', '2017-04-01 21:33:34', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('35', 'txn_4rX4ydAuaWCC3h', '4', '2', '19.99', '0.00', '0.00', '19.99', 'USD', 'PayPal', '133.5.150.47', '2017-01-12 16:24:05', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('36', 'txn_4rX4ydAuaWCC3h', '2', '3', '49.99', '0.00', '0.00', '49.99', 'USD', 'PayPal', '220.9.44.232', '2017-04-08 04:33:20', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('37', 'txn_4rX4ydAuaWCC3h', '2', '4', '5.99', '0.00', '0.00', '5.99', 'USD', 'PayPal', '12.89.155.142', '2017-05-12 22:34:46', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('38', 'txn_4rX4ydAuaWCC3h', '3', '5', '9.99', '0.00', '0.00', '9.99', 'USD', 'PayPal', '179.37.41.11', '2017-04-25 00:42:54', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('39', 'txn_4rX4ydAuaWCC3h', '2', '6', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '198.90.9.116', '2017-07-05 17:32:25', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('40', 'txn_4rX4ydAuaWCC3h', '3', '7', '49.99', '0.00', '0.00', '49.99', 'USD', '2Checkout', '192.160.82.117', '2017-02-16 11:26:12', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('41', 'txn_4rX4ydAuaWCC3h', '1', '8', '5.99', '0.00', '0.00', '5.99', 'USD', '2Checkout', '38.63.172.14', '2017-01-10 18:10:48', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('42', 'txn_4rX4ydAuaWCC3h', '2', '9', '9.99', '0.00', '0.00', '9.99', 'USD', '2Checkout', '153.196.187.89', '2017-04-15 10:25:12', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('43', 'txn_4rX4ydAuaWCC3h', '2', '10', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '148.228.144.173', '2017-06-01 21:49:27', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('44', 'txn_4rX4ydAuaWCC3h', '1', '11', '49.99', '0.00', '0.00', '49.99', 'USD', 'Ideal', '224.207.80.223', '2017-06-08 14:02:57', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('45', 'txn_4rX4ydAuaWCC3h', '2', '12', '5.99', '0.00', '0.00', '5.99', 'USD', 'Ideal', '192.173.248.253', '2017-03-27 05:16:25', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('46', 'txn_4rX4ydAuaWCC3h', '2', '13', '9.99', '0.00', '3.99', '9.99', 'USD', 'Ideal', '17.235.229.83', '2017-08-22 04:10:03', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('47', 'txn_4rX4ydAuaWCC3h', '4', '14', '19.99', '0.00', '0.00', '19.99', 'USD', 'Ideal', '81.143.255.252', '2017-06-03 14:09:05', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('48', 'txn_4rX4ydAuaWCC3h', '3', '15', '49.99', '0.00', '0.00', '49.99', 'USD', 'Ideal', '141.220.96.80', '2017-06-12 03:03:36', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('49', 'txn_4rX4ydAuaWCC3h', '4', '16', '5.99', '0.00', '0.00', '5.99', 'USD', 'Payfast', '229.153.72.68', '2017-05-28 14:14:27', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('50', 'txn_4rX4ydAuaWCC3h', '1', '17', '9.99', '0.00', '0.00', '9.99', 'USD', 'Payfast', '126.221.75.41', '2017-04-12 20:03:58', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('51', 'txn_4rX4ydAuaWCC3h', '4', '21', '14.99', '0.00', '5.00', '14.99', 'USD', 'Payfast', '90.85.225.0', '2017-01-15 13:01:45', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('52', 'txn_4rX4ydAuaWCC3h', '4', '2', '49.99', '0.00', '0.00', '49.99', 'USD', 'Payfast', '17.184.168.1', '2017-05-02 16:13:03', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('53', 'txn_4rX4ydAuaWCC3h', '4', '3', '5.99', '0.00', '0.00', '5.99', 'USD', 'Payfast', '141.118.158.195', '2017-03-15 21:22:24', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('54', 'txn_4rX4ydAuaWCC3h', '2', '4', '9.99', '0.00', '0.00', '9.99', 'USD', 'Payfast', '194.66.205.153', '2017-06-21 14:39:40', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('55', 'txn_4rX4ydAuaWCC3h', '2', '5', '19.99', '0.00', '0.00', '19.99', 'USD', 'PayPal', '220.139.199.93', '2017-01-24 21:34:30', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('56', 'txn_4rX4ydAuaWCC3h', '3', '6', '49.99', '0.00', '0.00', '49.99', 'USD', 'PayPal', '2.238.251.56', '2017-01-15 23:41:07', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('57', 'txn_4rX4ydAuaWCC3h', '4', '7', '5.99', '0.00', '0.00', '5.99', 'USD', 'PayPal', '49.116.26.163', '2017-04-29 05:00:23', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('58', 'txn_4rX4ydAuaWCC3h', '3', '8', '9.99', '0.00', '0.00', '9.99', 'USD', 'PayPal', '130.178.232.75', '2017-04-25 11:22:41', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('59', 'txn_4rX4ydAuaWCC3h', '1', '9', '19.99', '0.00', '0.00', '19.99', 'USD', 'PayPal', '49.9.82.72', '2017-02-19 00:55:42', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('60', 'txn_4rX4ydAuaWCC3h', '2', '10', '49.99', '0.00', '0.00', '49.99', 'USD', 'PayPal', '20.227.144.73', '2017-04-19 11:56:18', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('61', 'txn_4rX4ydAuaWCC3h', '3', '11', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '21.66.44.195', '2017-02-19 19:43:55', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('62', 'txn_4rX4ydAuaWCC3h', '2', '12', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '26.154.49.252', '2017-06-12 13:11:29', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('63', 'txn_4rX4ydAuaWCC3h', '3', '13', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '18.218.140.112', '2017-04-26 23:55:26', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('64', 'txn_4rX4ydAuaWCC3h', '3', '14', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '54.128.203.71', '2017-06-29 00:22:23', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('65', 'txn_4rX4ydAuaWCC3h', '4', '15', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '229.191.33.60', '2017-08-22 02:47:14', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('66', 'txn_4rX4ydAuaWCC3h', '4', '16', '9.99', '0.00', '0.00', '9.99', 'USD', '2Checkout', '166.250.255.176', '2017-06-05 18:57:15', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('67', 'txn_4rX4ydAuaWCC3h', '3', '17', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '150.64.211.112', '2017-05-07 11:52:13', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('68', 'txn_4rX4ydAuaWCC3h', '2', '21', '49.99', '0.00', '0.00', '49.99', 'USD', '2Checkout', '189.235.139.7', '2017-04-26 07:35:07', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('69', 'txn_4rX4ydAuaWCC3h', '1', '2', '5.99', '0.00', '0.00', '5.99', 'USD', '2Checkout', '104.103.83.155', '2017-03-28 16:29:11', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('70', 'txn_4rX4ydAuaWCC3h', '1', '3', '9.99', '0.00', '0.00', '9.99', 'USD', '2Checkout', '128.183.242.247', '2017-05-22 14:14:58', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('71', 'txn_4rX4ydAuaWCC3h', '4', '4', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '164.99.236.175', '2017-07-05 18:44:22', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('72', 'txn_4rX4ydAuaWCC3h', '4', '5', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '139.23.98.15', '2017-03-30 05:10:32', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('73', 'txn_4rX4ydAuaWCC3h', '2', '6', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '50.231.130.103', '2017-05-01 18:46:16', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('74', 'txn_4rX4ydAuaWCC3h', '4', '7', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '102.44.161.103', '2017-05-29 17:44:22', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('75', 'txn_4rX4ydAuaWCC3h', '2', '8', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '8.221.161.208', '2017-04-19 17:43:36', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('76', 'txn_4rX4ydAuaWCC3h', '2', '9', '49.99', '0.00', '0.00', '49.99', 'USD', '2Checkout', '96.92.25.176', '2017-03-01 18:18:15', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('77', 'txn_4rX4ydAuaWCC3h', '4', '10', '5.99', '0.00', '0.00', '5.99', 'USD', '2Checkout', '86.94.118.27', '2017-03-23 01:50:15', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('78', 'txn_4rX4ydAuaWCC3h', '2', '11', '9.99', '0.00', '0.00', '9.99', 'USD', '2Checkout', '212.60.9.21', '2017-02-08 08:01:32', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('79', 'txn_4rX4ydAuaWCC3h', '2', '12', '19.99', '0.00', '0.00', '19.99', 'USD', '2Checkout', '86.230.89.10', '2017-04-01 16:46:53', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('80', 'txn_4rX4ydAuaWCC3h', '3', '13', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '73.88.31.102', '2017-06-27 12:31:46', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('81', 'txn_4rX4ydAuaWCC3h', '4', '14', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '43.26.159.147', '2017-01-13 22:15:42', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('82', 'txn_4rX4ydAuaWCC3h', '2', '15', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '41.19.155.251', '2017-01-15 14:10:50', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('83', 'txn_4rX4ydAuaWCC3h', '4', '16', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '145.52.83.56', '2017-07-02 10:32:15', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('84', 'txn_4rX4ydAuaWCC3h', '3', '17', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '236.92.14.214', '2017-05-27 14:15:02', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('85', 'txn_4rX4ydAuaWCC3h', '3', '21', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '221.183.168.14', '2017-03-20 08:31:19', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('86', 'txn_4rX4ydAuaWCC3h', '4', '2', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '24.151.76.70', '2017-05-21 07:13:10', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('87', 'txn_4rX4ydAuaWCC3h', '4', '3', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '144.201.220.34', '2017-03-14 16:14:42', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('88', 'txn_4rX4ydAuaWCC3h', '4', '4', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '229.133.224.51', '2017-05-09 19:32:40', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('89', 'txn_4rX4ydAuaWCC3h', '4', '5', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '104.216.87.223', '2017-05-11 00:31:38', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('90', 'txn_4rX4ydAuaWCC3h', '1', '6', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '46.212.97.229', '2017-02-01 19:33:07', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('91', 'txn_4rX4ydAuaWCC3h', '2', '7', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '220.46.114.135', '2017-06-21 00:20:21', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('92', 'txn_4rX4ydAuaWCC3h', '2', '8', '49.99', '2.99', '0.00', '49.99', 'USD', 'Stripe', '16.223.187.78', '2017-08-22 08:01:11', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('93', 'txn_4rX4ydAuaWCC3h', '1', '9', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '44.169.223.48', '2017-06-08 10:46:55', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('94', 'txn_4rX4ydAuaWCC3h', '4', '10', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '138.137.161.253', '2017-04-17 20:01:26', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('95', 'txn_4rX4ydAuaWCC3h', '3', '11', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '174.251.40.95', '2017-01-25 19:42:45', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('96', 'txn_4rX4ydAuaWCC3h', '2', '12', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '243.13.252.35', '2017-05-26 13:22:23', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('97', 'txn_4rX4ydAuaWCC3h', '3', '13', '5.99', '0.00', '0.00', '5.99', 'USD', 'Stripe', '240.79.189.180', '2017-03-28 02:38:15', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('98', 'txn_4rX4ydAuaWCC3h', '3', '14', '9.99', '0.00', '0.00', '9.99', 'USD', 'Stripe', '128.152.170.164', '2017-05-16 18:10:21', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('99', 'txn_4rX4ydAuaWCC3h', '4', '15', '19.99', '0.00', '0.00', '19.99', 'USD', 'Stripe', '96.166.155.215', '2017-05-19 15:58:45', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('100', 'txn_4rX4ydAuaWCC3h', '2', '16', '49.99', '0.00', '0.00', '49.99', 'USD', 'Stripe', '213.144.173.87', '2017-06-08 14:55:50', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('105', '1579273931', '2', '21', '2.99', '0.00', '0.00', '2.99', 'CAD', 'Stripe', '127.0.0.1', '2020-01-17 15:12:11', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('104', '1575997357', '2', '21', '2.99', '0.00', '0.00', '2.99', 'CAD', 'Stripe', '127.0.0.1', '2019-12-10 17:02:37', '1');
INSERT INTO `payments` (`id`, `txn_id`, `membership_id`, `user_id`, `rate_amount`, `tax`, `coupon`, `total`, `currency`, `pp`, `ip`, `created`, `status`) VALUES ('106', '1579274156', '2', '21', '2.99', '0.00', '0.00', '2.99', 'CAD', 'Stripe', '127.0.0.1', '2020-01-17 15:15:56', '1');


-- --------------------------------------------------
# -- Table structure for table `privileges`
-- --------------------------------------------------
DROP TABLE IF EXISTS `privileges`;
CREATE TABLE `privileges` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(60) DEFAULT NULL,
  `mode` varchar(8) NOT NULL,
  `type` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `privileges`
-- --------------------------------------------------

INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('1', 'manage_users', 'Manage Users', 'Permission to add/edit/delete users', 'manage', 'Users');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('2', 'manage_files', 'Manage Files', 'Permission to access File Manager', 'manage', 'Files');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('3', 'manage_pages', 'Manage Pages', 'Permission to Add/edit/delete pages', 'manage', 'Pages');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('4', 'manage_menus', 'Manage Menus', 'Permission to Add/edit and delete menus', 'manage', 'Menus');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('5', 'manage_email', 'Manage Email Templates', 'Permission to modify email templates', 'manage', 'Emails');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('6', 'manage_languages', 'Manage Language Phrases', 'Permission to modify language phrases', 'manage', 'Languages');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('7', 'manage_backup', 'Manage Database Backups', 'Permission to create backups and restore', 'manage', 'Backups');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('8', 'manage_memberships', 'Manage Memberships', 'Permission to manage memberships', 'manage', 'Memberships');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('9', 'edit_user', 'Edit Users', 'Permission to edit user', 'edit', 'Users');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('10', 'add_user', 'Add User', 'Permission to add users', 'add', 'Users');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('11', 'delete_user', 'Delete Users', 'Permission to delete users', 'delete', 'Users');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('12', 'manage_coupons', 'Manage Coupons', 'Permission to Add/Edit and delete coupons', 'manage', 'Coupons');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('13', 'manage_fields', 'Mange Fileds', 'Permission to Add/edit and delete custom fields', 'manage', 'Fields');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('14', 'manage_news', 'Manage News', 'Permission to Add/edit and delete news', 'manage', 'News');
INSERT INTO `privileges` (`id`, `code`, `name`, `description`, `mode`, `type`) VALUES ('15', 'manage_newsletter', 'Manage Newsletter', 'Permission to send newsletter and emails', 'manage', 'Newsletter');


-- --------------------------------------------------
# -- Table structure for table `role_privileges`
-- --------------------------------------------------
DROP TABLE IF EXISTS `role_privileges`;
CREATE TABLE `role_privileges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(6) unsigned NOT NULL DEFAULT '0',
  `pid` int(6) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx` (`rid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `role_privileges`
-- --------------------------------------------------

INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('1', '1', '1', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('2', '2', '1', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('3', '3', '1', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('4', '1', '2', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('5', '2', '2', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('6', '3', '2', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('7', '1', '3', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('8', '2', '3', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('9', '3', '3', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('10', '1', '4', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('11', '2', '4', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('12', '3', '4', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('13', '1', '5', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('14', '2', '5', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('15', '3', '5', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('16', '1', '6', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('17', '2', '6', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('18', '3', '6', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('19', '1', '7', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('20', '2', '7', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('21', '3', '7', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('22', '1', '8', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('23', '2', '8', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('24', '3', '8', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('25', '1', '9', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('26', '2', '9', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('27', '3', '9', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('28', '1', '10', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('29', '2', '10', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('30', '3', '10', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('31', '1', '11', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('32', '2', '11', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('33', '3', '11', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('34', '1', '12', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('35', '2', '12', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('36', '3', '12', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('37', '1', '13', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('38', '2', '13', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('39', '3', '13', '0');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('40', '1', '14', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('41', '2', '14', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('42', '3', '14', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('43', '1', '15', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('44', '2', '15', '1');
INSERT INTO `role_privileges` (`id`, `rid`, `pid`, `active`) VALUES ('45', '3', '15', '0');


-- --------------------------------------------------
# -- Table structure for table `roles`
-- --------------------------------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `roles`
-- --------------------------------------------------

INSERT INTO `roles` (`id`, `code`, `icon`, `name`, `description`) VALUES ('1', 'owner', 'badge', 'Site Owner', 'Site Owner is the owner of the site, has all privileges and could not be removed.');
INSERT INTO `roles` (`id`, `code`, `icon`, `name`, `description`) VALUES ('2', 'staff', 'trophy', 'Staff Member', 'The "Staff" members  is required to assist the Owner, has different privileges and may be created by Site Owner.');
INSERT INTO `roles` (`id`, `code`, `icon`, `name`, `description`) VALUES ('3', 'editor', 'note', 'Editor', 'The "Editor" is required to assist the Staff Members, has different privileges and may be created by Site Owner.');


-- --------------------------------------------------
# -- Table structure for table `settings`
-- --------------------------------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) NOT NULL,
  `site_email` varchar(80) NOT NULL,
  `psite_email` varchar(80) DEFAULT NULL,
  `site_dir` varchar(100) DEFAULT NULL,
  `reg_allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `reg_verify` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `notify_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `auto_verify` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `perpage` tinyint(1) unsigned NOT NULL DEFAULT '12',
  `backup` varchar(60) DEFAULT NULL,
  `logo` varchar(40) DEFAULT NULL,
  `plogo` varchar(40) DEFAULT NULL,
  `currency` varchar(4) DEFAULT NULL,
  `enable_tax` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `long_date` varchar(50) DEFAULT NULL,
  `short_date` varchar(50) DEFAULT NULL,
  `time_format` varchar(20) DEFAULT NULL,
  `dtz` varchar(80) DEFAULT NULL,
  `locale` varchar(20) DEFAULT NULL,
  `lang` varchar(20) DEFAULT NULL,
  `weekstart` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `inv_info` text,
  `inv_note` text,
  `offline_info` text,
  `social_media` blob,
  `enable_dmembership` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dmembership` smallint(3) unsigned NOT NULL DEFAULT '0',
  `file_dir` varchar(100) DEFAULT NULL,
  `mailer` enum('PHP','SMTP','SMAIL') NOT NULL DEFAULT 'PHP',
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `smtp_port` varchar(6) DEFAULT NULL,
  `is_ssl` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sendmail` varchar(150) DEFAULT NULL,
  `wojon` decimal(4,2) unsigned NOT NULL DEFAULT '1.00',
  `wojov` decimal(4,2) unsigned NOT NULL DEFAULT '1.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `settings`
-- --------------------------------------------------

INSERT INTO `settings` (`id`, `company`, `site_email`, `psite_email`, `site_dir`, `reg_allowed`, `reg_verify`, `notify_admin`, `auto_verify`, `perpage`, `backup`, `logo`, `plogo`, `currency`, `enable_tax`, `long_date`, `short_date`, `time_format`, `dtz`, `locale`, `lang`, `weekstart`, `inv_info`, `inv_note`, `offline_info`, `social_media`, `enable_dmembership`, `dmembership`, `file_dir`, `mailer`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `is_ssl`, `sendmail`, `wojon`, `wojov`) VALUES ('1', 'Membership Manager', 'alex.kuzmanovic@gmail.com', '', 'mmp5', '1', '0', '0', '1', '12', '20-Aug-2016_16-19-03.sql', 'logo.png', 'print_logo.png', 'CAD', '0', 'MMMM dd, yyyy hh:mm a', 'dd MMM yyyy', 'HH:mm', 'America/Toronto', 'en_CA', 'en', '0', '<p><b>ABC Company Pty Ltd</b><br>123 Burke Street, Toronto ON, CANADA<br>Tel : (416) 1234-5678, Fax : (416) 1234-5679, Email : sales@abc-company.com<br>Web Site : www.abc-company.com</p>', '<p>TERMS &amp; CONDITIONS<br>1. Interest may be levied on overdue accounts. <br>2. Goods sold are not returnable or refundable</p>', '<p>Instructions for offline payments...</p>', '{"facebook":"facebook_page","twitter":"twitter_page"}', '1', '5', 'W:\\public_html\\mmp4\\downloads\\', 'PHP', '', '', '', '0', '0', 'sendmail path', '1.00', '4.50');


-- --------------------------------------------------
# -- Table structure for table `trash`
-- --------------------------------------------------
DROP TABLE IF EXISTS `trash`;
CREATE TABLE `trash` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` varchar(15) DEFAULT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `type` varchar(15) DEFAULT NULL,
  `dataset` blob,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `trash`
-- --------------------------------------------------



-- --------------------------------------------------
# -- Table structure for table `user_custom_fields`
-- --------------------------------------------------
DROP TABLE IF EXISTS `user_custom_fields`;
CREATE TABLE `user_custom_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `field_id` int(11) unsigned NOT NULL DEFAULT '0',
  `field_name` varchar(40) DEFAULT NULL,
  `field_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user` (`user_id`),
  KEY `idx_field` (`field_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `user_custom_fields`
-- --------------------------------------------------

INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('1', '1', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('2', '1', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('3', '2', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('4', '2', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('5', '3', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('6', '3', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('7', '4', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('8', '4', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('9', '5', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('10', '5', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('11', '6', '1', '001', 'NA');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('12', '6', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('13', '7', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('14', '7', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('15', '8', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('16', '8', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('17', '9', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('18', '9', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('19', '10', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('20', '10', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('21', '11', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('22', '11', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('23', '12', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('24', '12', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('25', '13', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('26', '13', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('27', '14', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('28', '14', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('29', '15', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('30', '15', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('31', '16', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('32', '16', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('33', '17', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('34', '17', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('35', '18', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('36', '18', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('37', '19', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('38', '19', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('39', '20', '1', '001', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('40', '20', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('41', '21', '1', '001', 'wojoscripts');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('42', '21', '2', '002', '1888 255-1234');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('43', '25', '1', '001', 'No Company');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('44', '25', '2', '002', '555-5555555');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('45', '26', '1', '001', 'Na');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('46', '26', '2', '002', '');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('47', '27', '1', '001', 'Na');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('48', '27', '2', '002', 'Na');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('49', '28', '1', '001', 'No Company');
INSERT INTO `user_custom_fields` (`id`, `user_id`, `field_id`, `field_name`, `field_value`) VALUES ('50', '28', '2', '002', '');


-- --------------------------------------------------
# -- Table structure for table `user_memberships`
-- --------------------------------------------------
DROP TABLE IF EXISTS `user_memberships`;
CREATE TABLE `user_memberships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `mid` int(11) unsigned NOT NULL DEFAULT '0',
  `activated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expire` timestamp NULL DEFAULT NULL,
  `recurring` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 = expired, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `user_memberships`
-- --------------------------------------------------

INSERT INTO `user_memberships` (`id`, `tid`, `uid`, `mid`, `activated`, `expire`, `recurring`, `active`) VALUES ('1', '105', '21', '2', '2020-01-17 15:12:11', '2020-02-17 15:12:11', '1', '1');
INSERT INTO `user_memberships` (`id`, `tid`, `uid`, `mid`, `activated`, `expire`, `recurring`, `active`) VALUES ('2', '106', '21', '2', '2020-01-17 15:15:56', '2020-02-17 15:15:56', '1', '1');


-- --------------------------------------------------
# -- Table structure for table `users`
-- --------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `membership_id` int(2) unsigned NOT NULL DEFAULT '0',
  `mem_expire` varchar(20) DEFAULT NULL,
  `salt` varchar(25) NOT NULL,
  `hash` varchar(70) NOT NULL,
  `token` varchar(40) NOT NULL DEFAULT '0',
  `userlevel` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'member',
  `trial_used` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `email` varchar(60) NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `lastip` varbinary(16) DEFAULT '000.000.000.000',
  `login_info` varchar(150) DEFAULT NULL,
  `login_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `avatar` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(4) DEFAULT NULL,
  `notes` tinytext,
  `newsletter` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `stripe_cus` varchar(100) DEFAULT NULL,
  `stripe_pm` varchar(80) DEFAULT NULL,
  `custom_fields` varchar(200) DEFAULT NULL,
  `active` enum('y','n','t','b') NOT NULL DEFAULT 'n',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------
# Dumping data for table `users`
-- --------------------------------------------------

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('1', 'admin', 'Web', 'Master', '0', '', 'L..NwF88Gcnz6WwzTSjWI', '$2a$10$L..NwF88Gcnz6WwzTSjWI.yr7380z36pe.RInVwfoGTCogGjGB3iq', '0', '9', 'owner', '0', 'alex.kuzmanovic@email.com', '2020-03-05 21:27:33', '127.0.0.1', '', '0', '', '20 main Street', 'Toronto', 'ON', 'M5A 3S4', 'CA', 'Notes...', '1', '', '', '', 'y', '2016-04-10 18:16:22');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('2', 'adean0', 'Adam', 'Dean', '1', '2016-08-27 21:12:05', 'LE2Uja', 'lJb2OY9iJw', '0', '1', 'member', '0', 'adean0@google.com', '2016-01-04 15:40:31', '67.17.209.65', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'b', '2015-10-27 07:46:36');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('3', 'jrussell1', 'Joe', 'Russell', '0', '', 'weEB4PIcfUFTFwsqKMx8n', '$2a$10$weEB4PIcfUFTFwsqKMx8n.gTWu4DFpt6JlP7AOhcbwwk8U0wJJfAa', '0', '1', 'member', '0', 'jrussell1@ameblo.jp', '2016-03-28 01:48:09', '157.63.80.191', '', '0', '', '', '', '', '', 'CA', '', '1', '', '', 'NA', 'y', '2015-10-25 03:58:34');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('4', 'tfields2', 'Timothy', 'Fields', '0', '', 'nJLb3wagqy0t', '3CFHV0lyyZD', '0', '1', 'member', '0', 'tfields2@intel.com', '2016-02-28 17:18:17', '111.190.169.45', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-08-01 15:46:02');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('5', 'hreyes3', 'Henry', 'Reyes', '0', '', 'dQXdFHuic', 'FNQB0g', '0', '7', 'editor', '0', 'hreyes3@chron.com', '2015-07-11 17:49:47', '1.106.167.78', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2016-01-19 00:16:26');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('6', 'sryan4', 'Steven', 'Ryan', '4', '2021-02-15 17:02:55', 'va37W3nR', '4onG2AWLXW', '0', '1', 'member', '0', 'sryan4@spotify.com', '2015-07-03 23:05:28', '178.59.157.64', '', '0', '', '', '', '', '', 'CA', '', '1', '', '', '', 'y', '2016-02-09 19:39:50');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('7', 'smartin5', 'Stephen', 'Martin', '0', '', 'nTXHTIue56zX', 'VKEh5bwWKv', '0', '1', 'member', '0', 'smartin5@nifty.com', '2015-09-23 21:49:19', '59.198.134.2', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-09-17 11:05:39');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('8', 'kbutler6', 'Keith', 'Butler', '1', '', 'vWYn7fOqaE2', 'kPSPPu4VJ', '0', '1', 'member', '0', 'kbutler6@samsung.com', '2015-08-12 19:08:43', '222.241.145.180', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2016-04-27 00:44:30');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('9', 'bcook7', 'Betty', 'Cook', '0', '', 'qnu1WckaplTn', 'PZBrJCykQY', '0', '1', 'member', '0', 'bcook7@arstechnica.com', '2016-02-29 15:05:09', '63.124.247.191', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-07-13 05:19:49');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('10', 'kmontgomery8', 'Kelly', 'Montgomery', '2', '2016-12-22 13:13:12', 'j8IGc6z', 'PUxQiB', '0', '1', 'member', '0', 'kmontgomery8@jigsy.com', '2015-11-26 20:47:26', '215.155.170.159', '', '0', 'av4.jpg', '', '', 'Alabama', '0', '', '', '1', '', '', '', 'b', '2016-03-23 07:13:45');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('11', 'khart9', 'Kenneth', 'Hart', '2', '2016-12-27 13:13:12', 'MWxdiPxA17FkAaGUXhMBi', '$2a$10$MWxdiPxA17FkAaGUXhMBi.yvQx6y.iNFPzkpAv5ifR.PHFdv.0b9S', '1234567879', '1', 'member', '0', 'keneth.h@email.com', '2015-07-01 09:07:16', '67.190.72.55', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'n', '2015-12-25 12:29:37');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('12', 'rdiaza', 'Rose', 'Diaz', '1', '', 'QHM.iQqGvsTJA4OZKwlHd', '$2a$10$QHM.iQqGvsTJA4OZKwlHd.DqMq5OspChlD6BrdFusAB6OaDhN31zy', '0', '1', 'member', '0', 'rdiaza@zdnet.com', '2015-09-02 02:04:32', '11.153.2.80', '', '0', 'av6.jpg', '', '', '', '', 'CA', '', '1', '', '', 'Na', 'y', '2016-03-21 01:46:11');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('13', 'cbowmanb', 'Christina', 'Bowman', '0', '', 'VYsZ7aD', 'fR6CGo', '0', '8', 'staff', '0', 'cbowmanb@toplist.cz', '2015-08-10 06:40:32', '80.107.128.226', '', '0', 'av3.jpg', '', '', '', '', '', '', '1', '', '', '', 'y', '2016-04-17 00:35:52');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('14', 'nclarkc', 'Norma', 'Clark', '0', '', 'XEuMXdvbeV', '1XbKgN4eta', '0', '1', 'member', '0', 'nclarkc@photobucket.com', '2015-08-02 13:58:09', '233.218.102.38', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-08-01 05:40:01');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('15', 'bcarrolld', 'Bobby', 'Carroll', '0', '', 'QyB4cs3OMZ1b', 'TYovRT', '0', '1', 'member', '0', 'bcarrolld@studiopress.com', '2016-01-11 23:09:47', '135.193.165.87', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-07-11 03:12:08');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('16', 'gwoode', 'Gary', 'Wood', '0', '', 'lnMidbcLg', '5ssS8HaelP', '0', '1', 'member', '0', 'gwoode@ovh.net', '2016-03-03 05:20:09', '236.20.248.232', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-10-20 06:18:10');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('17', 'byoungf', 'Bonnie', 'Young', '0', '', 'Xkrohx2', 'VmkMDwxWuW', '0', '1', 'member', '0', 'byoungf@samsung.com', '2015-08-13 22:00:34', '42.88.57.133', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-10-10 12:07:44');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('18', 'rcunninghamg', 'Ralph', 'Cunningham', '0', '', '7YXoDhiJlxVt', 'EORNbgXTQLvp', '0', '1', 'member', '0', 'rcunninghamg@amazon.co.jp', '2015-12-06 00:07:08', '120.189.133.254', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-10-27 14:37:18');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('19', 'jcooperh', 'Joyce', 'Cooper', '0', '', 'Kphd7jV', 'QQqkTzEudI', '0', '1', 'member', '0', 'jcooperh@xrea.com', '2015-09-19 06:36:16', '223.133.187.198', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 'y', '2015-09-10 12:51:46');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('20', 'scastilloi', 'Steve', 'Castillo', '3', '2017-02-24 21:12:46', 'wJmrTw', 'HOsXFAee9s0', '0', '1', 'member', '0', 'scastilloi@apple.com', '2015-12-21 00:40:06', '246.173.179.12', '', '0', '', '', '', '', '', '', '', '1', '', '', '', 't', '2016-01-21 19:00:05');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('21', 'demo', 'Andrew', 'Burns', '2', '2020-02-17 10:15:56', 'L..NwF88Gcnz6WwzTSjWI', '$2a$10$L..NwF88Gcnz6WwzTSjWI.yr7380z36pe.RInVwfoGTCogGjGB3iq', '0', '1', 'member', '0', 'alex.kuzmanovic@gmail.com', '2020-01-17 10:10:20', '127.0.0.1', '', '0', 'av1.jpg', '37 Main St', 'Mobile', 'Colorado', '36605', 'CA', '', '1', 'cus_GZ4dIIEgG0Esk9', 'pm_0G1wUSN6BdWyOz5lTfedjMmV', 'Wojoscripts::1800 123 45678', 'y', '2016-07-18 22:07:57');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('25', 'UU2BIRDx', 'Alex', 'kuzma', '2', '2018-08-06 10:55:46', 'r3LAPUBq0ZMDXFMNgtTRF', '$2a$10$r3LAPUBq0ZMDXFMNgtTRF.CCk0mCLFKMvHhIdohskP.VSanf56XSK', '8825837', '1', 'member', '0', 'alex.kuzmanovic@email.com', '', '000.000.000.000', '', '0', '', '25 main ', 'Toronto', 'On', '123456', 'CA', '', '1', '', '', '', 't', '2017-09-25 02:42:18');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('26', 'wMCf5fsH', 'Albert', 'Anstain', '0', '', 'JOu5ObwrHjMp242XEQmjI', '$2a$10$JOu5ObwrHjMp242XEQmjI.6inW1QWys5f6hwYyEPXzcgQ1E/efxU2', '4252362', '1', 'member', '0', 'webmaster@gmail.com', '', '000.000.000.000', '', '0', '', '24 Main ', 'Toro', 'On', '12345678', 'CA', '', '1', '', '', '', 't', '2018-09-17 20:56:23');
INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `membership_id`, `mem_expire`, `salt`, `hash`, `token`, `userlevel`, `type`, `trial_used`, `email`, `lastlogin`, `lastip`, `login_info`, `login_status`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `notes`, `newsletter`, `stripe_cus`, `stripe_pm`, `custom_fields`, `active`, `created`) VALUES ('28', 'jimmy', 'Jimmy', 'Wallace', '2', '2019-06-14 16:54:46', 'TBBkzmNU2SdX1SlAlOwcP', '$2a$10$TBBkzmNU2SdX1SlAlOwcP.GAU.4lYTOVvNsJwZzMngzzNMUSc2DxC', '0', '1', 'member', '0', 'jimmy@mail.com', '2019-06-10 10:28:39', '127.0.0.1', '', '0', '', '', '', '', '', 'CA', '', '0', 'cus_ExuE3LcXQPzYF8', '', '', 'y', '2019-04-27 21:49:17');


