INSERT INTO `permissions` (`id`, `name`, `label`, `is_menu`, `order_list`, `icon`, `parent_id`, `created_at`, `updated_at`) VALUES (NULL, 'pricing', 'عرض الاسعار', '1', '05', 'icon-book-open', '0', CURRENT_TIMESTAMP, NULL);
INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '232', CURRENT_TIMESTAMP, NULL);
