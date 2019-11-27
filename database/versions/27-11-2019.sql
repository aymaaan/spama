ALTER TABLE `customers_assessment_products` ADD `unit_price` VARCHAR(255) NULL AFTER `unit_id`;


DROP TABLE IF EXISTS `customers_pricing_settings`;
CREATE TABLE IF NOT EXISTS `customers_pricing_settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `serial` int(11) NOT NULL,
  `discount` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `customers_pricing_settings` ADD `created_at` TIMESTAMP NULL AFTER `discount`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`;

