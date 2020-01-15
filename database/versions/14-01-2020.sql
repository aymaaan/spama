DROP TABLE `elweeeys_products_system`.`nationalities`;
ALTER TABLE `cities` ADD `parent_id` INT NOT NULL AFTER `status`;


DROP TABLE IF EXISTS `nationalities`;
CREATE TABLE IF NOT EXISTS `nationalities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `nationalities` (`id`, `code`, `country_name_ar`, `country_name_en`, `title`, `title_en`, `status`,  `created_at`, `updated_at`) VALUES
(1, 'SA', 'السعودية', 'Saudi', 'سعودى', 'Saudi', 1,  '2019-11-08 18:42:02', '2019-11-08 18:42:02'),
(2, 'EG', 'مصر', 'Egypt', 'مصرى', 'Egyptian', 1,  '2019-11-08 18:42:23', '2019-11-08 18:42:23'),
(3, 'TR', 'تركيا', 'Turky', 'تركى', 'Turky', 1,  '2019-11-08 18:42:37', '2019-11-08 18:42:37');

TRUNCATE TABLE `employees`
ALTER TABLE `employees` CHANGE `work_place` `work_place_country` INT NULL DEFAULT NULL;
ALTER TABLE `employees` ADD `work_place_city` INT NULL AFTER `work_place_country`;

DROP TABLE `elweeeys_products_system`.`cities`;
DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cities` (`id`, `title`, `title_en`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', 'riyadh', 1, 1, '2019-11-08 19:52:25', '2019-11-20 01:35:53'),
(2, 'جده', 'Jeddah', 1, 1, '2019-11-08 19:53:26', '2019-11-08 19:53:26'),
(3, 'المدينه المنوره', 'Medina', 1, 1, '2019-11-08 19:53:45', '2019-11-08 19:53:45'),
(4, 'القاهرة', 'Cairo', 1, 2, '2020-01-15 08:39:53', '2020-01-15 08:39:53'),
(5, 'الجيزة', 'Giza', 1, 2, '2020-01-15 08:40:11', '2020-01-15 08:40:11'),
(6, 'انقرة', 'Ankra', 1, 3, '2020-01-15 09:03:15', '2020-01-15 09:03:15');

