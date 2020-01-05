DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `direct_manager` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `label`, `is_menu`, `order_list`, `icon`, `parent_id`, `created_at`, `updated_at`) VALUES (NULL, 'departments', 'الاقسام الادارية', '1', '07', 'la la-group', '0', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permissions` (`id`, `name`, `label`, `is_menu`, `order_list`, `icon`, `parent_id`, `created_at`, `updated_at`) VALUES (NULL, 'create_departments', 'اضافة قسم ادارى', '0', '', NULL, '233', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permissions` (`id`, `name`, `label`, `is_menu`, `order_list`, `icon`, `parent_id`, `created_at`, `updated_at`) VALUES (NULL, 'update_departments', 'تحديث قسم ادارى', '0', NULL, NULL, '233', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permissions` (`id`, `name`, `label`, `is_menu`, `order_list`, `icon`, `parent_id`, `created_at`, `updated_at`) VALUES (NULL, 'delete_departments', 'حذف قسم ادارى', '0', NULL, NULL, '233', CURRENT_TIMESTAMP, NULL);


