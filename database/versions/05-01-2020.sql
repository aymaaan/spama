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
INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '233', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '234', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '235', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '236', CURRENT_TIMESTAMP, NULL);
ALTER TABLE `departments` ADD `parent_id` INT NULL DEFAULT '0' AFTER `title_en`;


DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `direct_manager` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_english` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_childrens` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_escorts` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_work` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shunt_work` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identification_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identification_expiry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_expiry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `private_situation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_start_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_days` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_times` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `total_salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `basic_salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `housing_allowance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transportation_allowance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_allowance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `employees_files`;
CREATE TABLE IF NOT EXISTS `employees_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `file_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `employees_identifiers_persons`;
CREATE TABLE IF NOT EXISTS `employees_identifiers_persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

