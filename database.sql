CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `system_settings` (`setting_key`, `setting_value`) VALUES
('app_timezone', 'Asia/Manila'),
('smtp_host', 'smtp.gmail.com'),
('smtp_user', 'email_mo@gmail.com'),
('smtp_pass', 'app_password_mo_dito'),
('smtp_port', '587'),
('smtp_secure', 'tls');