/*
SQLyog Trial v10.41 
MySQL - 5.5.24-log : Database - courier
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`courier` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `courier`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(11) NOT NULL,
  `account_name` varchar(150) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `addr_line1` varchar(150) NOT NULL,
  `addr_line2` varchar(150) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `credit_limit` int(11) NOT NULL,
  `billing_cycle_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `account_type_id` (`account_type_id`),
  KEY `billing_cycle_id` (`billing_cycle_id`),
  KEY `city_id` (`city_id`),
  KEY `contact_id` (`contact_id`),
  KEY `state_id` (`state_id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`account_type_id`),
  CONSTRAINT `account_ibfk_2` FOREIGN KEY (`billing_cycle_id`) REFERENCES `billing_cycle` (`billing_cycle_id`),
  CONSTRAINT `account_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  CONSTRAINT `account_ibfk_4` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`contact_id`),
  CONSTRAINT `account_ibfk_5` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `account_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `account_ibfk_7` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `account_type` */

DROP TABLE IF EXISTS `account_type`;

CREATE TABLE `account_type` (
  `account_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type_name` varchar(150) NOT NULL,
  `account_description` text NOT NULL,
  PRIMARY KEY (`account_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `awb` */

DROP TABLE IF EXISTS `awb`;

CREATE TABLE `awb` (
  `id` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `airway_bill_no` int(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `to_addr_line1` varchar(150) NOT NULL,
  `to_addr_line2` varchar(150) NOT NULL,
  `to_city_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  `to_contact_number` varchar(150) NOT NULL,
  `to_contact_person` varchar(150) NOT NULL,
  `to_zip` varchar(10) NOT NULL,
  `from_addr_line1` varchar(150) NOT NULL,
  `from_addr_line2` varchar(150) NOT NULL,
  `from_city_id` int(11) NOT NULL,
  `from_state_id` int(11) NOT NULL,
  `from_contact` varchar(150) NOT NULL,
  `from_zip` varchar(10) NOT NULL,
  `pkg_weight` varchar(10) NOT NULL,
  `pkg_dimension_w` varchar(10) NOT NULL,
  `pkg_dimension_h` varchar(10) NOT NULL,
  `pkg_dimension_l` varchar(10) NOT NULL,
  `number_of_articles` int(11) NOT NULL,
  `billed_weight` varchar(10) NOT NULL,
  `pkg_type` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `forwarding_no` int(11) NOT NULL,
  `forwarding_company_id` int(11) NOT NULL,
  `forwarding_updated` int(1) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `to_city_id` (`to_city_id`),
  KEY `to_state_id` (`to_state_id`),
  KEY `from_city_id` (`from_city_id`),
  KEY `from_state_id` (`from_state_id`),
  KEY `transaction_type_id` (`transaction_type_id`),
  KEY `agent_id` (`agent_id`),
  KEY `payment_type_id` (`payment_type_id`),
  KEY `modified_by` (`modified_by`),
  KEY `created_by` (`created_by`),
  KEY `forwarding_company_id` (`forwarding_company_id`),
  CONSTRAINT `awb_ibfk_1` FOREIGN KEY (`to_city_id`) REFERENCES `city` (`city_id`),
  CONSTRAINT `awb_ibfk_10` FOREIGN KEY (`forwarding_company_id`) REFERENCES `forwarding_company` (`forwarding_company_id`),
  CONSTRAINT `awb_ibfk_2` FOREIGN KEY (`to_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `awb_ibfk_3` FOREIGN KEY (`from_city_id`) REFERENCES `city` (`city_id`),
  CONSTRAINT `awb_ibfk_4` FOREIGN KEY (`from_state_id`) REFERENCES `state` (`state_id`),
  CONSTRAINT `awb_ibfk_5` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_types` (`transaction_type_id`),
  CONSTRAINT `awb_ibfk_6` FOREIGN KEY (`agent_id`) REFERENCES `account` (`account_id`),
  CONSTRAINT `awb_ibfk_7` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`),
  CONSTRAINT `awb_ibfk_8` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `awb_ibfk_9` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `billing_cycle` */

DROP TABLE IF EXISTS `billing_cycle`;

CREATE TABLE `billing_cycle` (
  `billing_cycle_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_cycle_name` varchar(150) NOT NULL,
  `billing_duration` varchar(150) NOT NULL,
  PRIMARY KEY (`billing_cycle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(150) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(150) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(150) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `contry_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `forwarding_company` */

DROP TABLE IF EXISTS `forwarding_company`;

CREATE TABLE `forwarding_company` (
  `forwarding_company_id` int(11) NOT NULL AUTO_INCREMENT,
  `forwarding_company_url` text NOT NULL,
  `forwarding_company_name` varchar(150) NOT NULL,
  `forwarding_company_api_key` varchar(150) NOT NULL,
  `network_name` varchar(10) NOT NULL,
  PRIMARY KEY (`forwarding_company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `forwarding_status` */

DROP TABLE IF EXISTS `forwarding_status`;

CREATE TABLE `forwarding_status` (
  `forwarding_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `airway_bill_id` int(11) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`forwarding_status_id`),
  KEY `airway_bill_id` (`airway_bill_id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  CONSTRAINT `forwarding_status_ibfk_1` FOREIGN KEY (`airway_bill_id`) REFERENCES `awb` (`id`),
  CONSTRAINT `forwarding_status_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `forwarding_status_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `payment_type` */

DROP TABLE IF EXISTS `payment_type`;

CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type_name` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`payment_type_id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  CONSTRAINT `payment_type_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `payment_type_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(150) NOT NULL,
  `role_description` text NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `state` */

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(150) NOT NULL,
  `country` int(11) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country` (`country`),
  CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `transaction_types` */

DROP TABLE IF EXISTS `transaction_types`;

CREATE TABLE `transaction_types` (
  `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_name` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`transaction_type_id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  CONSTRAINT `transaction_types_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `transaction_types_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `user_preferences` */

DROP TABLE IF EXISTS `user_preferences`;

CREATE TABLE `user_preferences` (
  `preference_id` int(11) NOT NULL,
  `secret_question` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `secret_answer` text NOT NULL,
  `mobile` int(11) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  PRIMARY KEY (`preference_id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email_id` (`email_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  KEY `modified_by` (`modified_by`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `users_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `account` (`account_id`),
  CONSTRAINT `users_ibfk_5` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `users_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `wp_commentmeta` */

DROP TABLE IF EXISTS `wp_commentmeta`;

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `wp_comments` */

DROP TABLE IF EXISTS `wp_comments`;

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_approved` (`comment_approved`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_links` */

DROP TABLE IF EXISTS `wp_links`;

CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_options` */

DROP TABLE IF EXISTS `wp_options`;

CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL DEFAULT '0',
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_postmeta` */

DROP TABLE IF EXISTS `wp_postmeta`;

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_posts` */

DROP TABLE IF EXISTS `wp_posts`;

CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` text NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_term_relationships` */

DROP TABLE IF EXISTS `wp_term_relationships`;

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `wp_term_taxonomy` */

DROP TABLE IF EXISTS `wp_term_taxonomy`;

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_terms` */

DROP TABLE IF EXISTS `wp_terms`;

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_usermeta` */

DROP TABLE IF EXISTS `wp_usermeta`;

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Table structure for table `wp_users` */

DROP TABLE IF EXISTS `wp_users`;

CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
