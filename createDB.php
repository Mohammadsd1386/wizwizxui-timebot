<?php

include "baseInfo.php";
$connection = new mysqli('localhost',$dbUserName,$dbPassword,$dbName);
if($connection->connect_error){
    exit("error " . $connection->connect_error);  
}
$connection->set_charset("utf8mb4");

$connection->query("CREATE TABLE `chats` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `create_date` int(255) NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `category` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `state` int(5) NOT NULL,
  `rate` int(5) NOT NULL,
  PRIMARY KEY (`id`)
)");

// جدول برای ذخیره اطلاعات کاربرانی که اکانت تست گرفتند ولی خرید نکردند
$connection->query("CREATE TABLE `test_users_analytics` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `test_date` int(255) NOT NULL,
  `server_id` int(255) NOT NULL,
  `purchased` int(1) NOT NULL DEFAULT 0,
  `purchase_date` int(255) NULL,
  PRIMARY KEY (`id`)
)");

// جدول برای قرعه کشی
$connection->query("CREATE TABLE `lottery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `start_date` int(255) NOT NULL,
  `end_date` int(255) NOT NULL,
  `prize_type` varchar(50) NOT NULL COMMENT 'wallet, config, discount',
  `prize_value` varchar(500) NOT NULL,
  `participants` text,
  `winner_id` bigint(10) NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای امتیازدهی کاربران
$connection->query("CREATE TABLE `user_ratings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `order_id` int(255) NOT NULL,
  `rating` int(1) NOT NULL COMMENT '1-5',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `rating_date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت چندین شماره کارت
$connection->query("CREATE TABLE `bank_accounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `card_number` varchar(20) NOT NULL,
  `holder_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `bank_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `active` int(1) NOT NULL DEFAULT 1,
  `usage_count` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)");

// جدول برای پیام‌های زمان‌بندی شده
$connection->query("CREATE TABLE `scheduled_messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `message_type` varchar(50) NOT NULL COMMENT 'config_expiry, volume_warning, renewal_reminder',
  `message_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `send_date` int(255) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT 0,
  `order_id` int(255) NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `deleted_configs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `server_id` int(255) NOT NULL,
  `inbound_id` int(255) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `delete_date` int(255) NOT NULL,
  `delete_reason` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `can_renew` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای آموزش‌های دسته‌بندی شده
$connection->query("CREATE TABLE `tutorials` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL COMMENT 'ios, android, windows, mac',
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `file_id` varchar(500) NULL,
  `file_type` varchar(20) NULL COMMENT 'photo, video, document',
  `order_num` int(255) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت نمایندگان
$connection->query("CREATE TABLE `agents_requests` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `request_date` int(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending' COMMENT 'pending, approved, rejected',
  `admin_response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `response_date` int(255) NULL,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت بکاپ دیتابیس
$connection->query("CREATE TABLE `backup_logs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `backup_date` int(255) NOT NULL,
  `file_id` varchar(500) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'success',
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت کمپین‌های خیریه
$connection->query("CREATE TABLE `charity_campaigns` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `target_amount` int(255) NOT NULL,
  `current_amount` int(255) NOT NULL DEFAULT 0,
  `start_date` int(255) NOT NULL,
  `end_date` int(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای ذخیره کمک‌های خیریه
$connection->query("CREATE TABLE `charity_donations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(255) NOT NULL,
  `user_id` bigint(10) NOT NULL,
  `amount` int(255) NOT NULL,
  `donation_date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `chats_info` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `chat_id` int(255) NOT NULL,
  `sent_date` int(255) NOT NULL,
  `msg_type` varchar(50) DEFAULT NULL,
  `text` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `discounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `hash_id` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `amount` int(255) NOT NULL,
  `expire_date` int(255) NOT NULL,
  `expire_count` int(255) NOT NULL,
  `used_by` text DEFAULT NULL,
  `can_use` int(255) NOT NULL DEFAULT 1,
  `usage_type` varchar(50) NOT NULL DEFAULT 'all' COMMENT 'new_purchase, renewal, wallet_charge, all',
  `server_id` int(255) NULL,
  `burn_on_entry` int(1) NOT NULL DEFAULT 0,
  `hourly_discount` int(1) NOT NULL DEFAULT 0,
  `first_purchase_only` int(1) NOT NULL DEFAULT 0,
  `discount_for_renewal_only` int(1) NOT NULL DEFAULT 0,
  `for_test_users_only` int(1) NOT NULL DEFAULT 0,
  `for_inactive_users` int(1) NOT NULL DEFAULT 0,
  `min_days_inactive` int(3) NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `gift_list` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `server_id` int(255) NOT NULL,
  `volume` int(255) NOT NULL,
  `day` int(255) NOT NULL,
  `offset` int(255) DEFAULT 0,
  `server_offset` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `increase_day` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `volume` float NOT NULL,
  `price` int(255) NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `increase_order` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `server_id` int(255) NOT NULL,
  `inbound_id` int(255) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `increase_plan` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `volume` float NOT NULL,
  `price` int(255) NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `needed_sofwares` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `category` varchar(50) NOT NULL DEFAULT 'general' COMMENT 'ios, android, windows, mac, general',
  PRIMARY KEY (`id`)
)");

$connection->query("INSERT INTO `needed_sofwares` (`id`, `title`, `link`, `status`, `category`) VALUES
(1, 'ios fair-vpn', 'https://apps.apple.com/us/app/fair-vpn/id1533873488', 1, 'ios'),
(2, 'ios napsternetv', 'https://apps.apple.com/us/app/napsternetv/id1629465476', 1, 'ios'),
(3, 'ios oneclick', 'https://apps.apple.com/us/app/id1545555197', 1, 'ios'),
(4, 'android v2rayng', 'https://play.google.com/store/apps/details?id=com.v2ray.ang&hl=en&gl=US', 1, 'android'),
(5, 'android sagernet', 'https://play.google.com/store/apps/details?id=io.nekohasekai.sagernet&hl=de&gl=US', 1, 'android'),
(6, 'android onclick', 'https://play.google.com/store/apps/details?id=earth.oneclick', 1, 'android'),
(7, 'windows v2rayng', 'https://google.com', 1, 'windows'),
(8, 'mac fair', 'https://apps.apple.com/us/app/fair-vpn/id1533873488', 1, 'mac');
");

$connection->query("CREATE TABLE `orders_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `transid` varchar(150) NOT NULL,
  `fileid` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `inbound_id` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(100) NOT NULL,
  `uuid` text NOT NULL,
  `protocol` varchar(20) NOT NULL,
  `expire_date` int(11) NOT NULL,
  `link` text NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `notif` int(11) NOT NULL DEFAULT 0,
  `rahgozar` int(10) DEFAULT 0,
  `agent_bought` int(1) NOT NULL DEFAULT 0,
  `last_connection` int(255) NULL,
  `custom_remark` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `auto_delete_date` int(255) NULL,
  `auto_renewal` int(1) NOT NULL DEFAULT 0,
  `tutorial_sent` int(1) NOT NULL DEFAULT 0,
  `rating_requested` int(1) NOT NULL DEFAULT 0,
  `charity_contribution` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci");

$connection->query("CREATE TABLE IF NOT EXISTS `pays` (
    `id` int(255) NOT NULL AUTO_INCREMENT,
    `hash_id` varchar(1000) NOT NULL,
    `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
    `payid` varchar(500) DEFAULT NULL,
    `user_id` bigint(10) NOT NULL,
    `type` varchar(100),
    `plan_id` int(255),
    `volume` int(255),
    `day` int(255),
    `price` int(255) NOT NULL,
    `request_date` int(255) NOT NULL,
    `state` varchar(255) NOT NULL,
    `agent_bought` int(1) NOT NULL DEFAULT 0,
    `agent_count` int(255) NOT NULL DEFAULT 0,
    `message_id` INT NULL DEFAULT NULL,
    `chat_id` VARCHAR(500) NULL DEFAULT NULL,
    `tron_price` decimal(10,2) NULL,
    `stars_price` int(255) NULL,
    PRIMARY KEY (`id`)
);");

$connection->query("CREATE TABLE `server_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `step` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `display_order` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci");

$connection->query("CREATE TABLE `server_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panel_url` varchar(254) NOT NULL,
  `ip` text NOT NULL,
  `sni` varchar(254) NOT NULL,
  `header_type` enum('none','http') NOT NULL,
  `request_header` text NOT NULL,
  `response_header` text NOT NULL,
  `security` enum('xtls', 'tls','none') NOT NULL,
  `tlsSettings` text NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port_type` varchar(10) DEFAULT 'auto',
  `reality` varchar(10) DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci");

$connection->query("CREATE TABLE `server_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ucount` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remark` varchar(100) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `state` int(255) NOT NULL DEFAULT 1,
  `display_order` int(255) NOT NULL DEFAULT 0,
  `server_capacity_warning` int(255) NOT NULL DEFAULT 80,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci");

$connection->query("CREATE TABLE `server_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` varchar(250) NOT NULL,
  `catid` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `inbound_id` int(11) NOT NULL DEFAULT 0,
  `acount` bigint(20) NOT NULL,
  `limitip` int(11) NOT NULL DEFAULT 1,
  `title` varchar(150) NOT NULL,
  `protocol` varchar(100) NOT NULL,
  `days` float NOT NULL,
  `volume` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `descr` text NOT NULL,
  `pic` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `step` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `rahgozar` int(10) DEFAULT 0,
  `dest` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `serverNames` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `spiderX` varchar(500) DEFAULT NULL,
  `flow` varchar(50) NULL DEFAULT 'None',
  `custom_path` int(10) DEFAULT 1,
  `custom_port` int(255) NOT NULL DEFAULT 0,
  `custom_sni` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `test_volume_mb` int(255) NOT NULL DEFAULT 1024,
  `test_duration_hours` int(255) NOT NULL DEFAULT 24,
  `display_order` int(255) NOT NULL DEFAULT 0,
  `charity_enabled` int(1) NOT NULL DEFAULT 1,
  `show_capacity` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci");

$connection->query("CREATE TABLE `setting` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("INSERT INTO `setting` (`id`, `type`, `value`) VALUES
(1, 'TICKETS_CATEGORY', 'شکایت'),
(2, 'INVITE_BANNER_AMOUNT', '3000'),
(3, 'INVITE_BANNER_TEXT', '{\"type\":\"photo\",\"caption\":\"\\ud83d\\udd30\\u0628\\u0631\\u062a\\u0631\\u06cc\\u0646 \\u0648 \\u0628\\u0647\\u062a\\u0631\\u06cc\\u0646 \\u0631\\u0628\\u0627\\u062a vpn \\u0628\\u0627 \\u06a9\\u0627\\u0646\\u06a9\\u0634\\u0646 \\u0647\\u0627\\u06cc \\u0631\\u0627\\u06cc\\u06af\\u0627\\u0646\\n\\u2705 \\u062d\\u062a\\u0645\\u0627 \\u0639\\u0636\\u0648 \\u0631\\u0628\\u0627\\u062a \\u0628\\u0634\\u06cc\\u062f \\u0648 \\u0627\\u0632 \\u062a\\u062e\\u0641\\u06cc\\u0641 \\u0647\\u0627\\u06cc \\u0648\\u06cc\\u0698\\u0647 \\u0644\\u0630\\u062a \\u0628\\u0628\\u0631\\u06cc\\u0646\\n\\n\\ud83d\\udd17 LINK\",\"file_id\":\"AgACAgQAAxkBAAJRKWRtX3wObRa3qAR_gkJgyKDdkHZsAAKAuzEbRaBpU3QQ2kLLt7MVAQADAgADeAADLwQ\"}'),
(4, 'PAYMENT_KEYS', '{\"nowpayment\":\"cccc-cccc-cccc-cccc\",\"zarinpal\":\"aaaa-aaaa-aaaa-aaaa\",\"nextpay\":\"bbbb-bbbb-bbbb-bbbb\",\"bankAccount\":\"6104-6104-6104-6104\",\"holderName\":\"\\u0648\\u06cc\\u0632\\u0648\\u06cc\\u0632\",\"tronwallet\":\"TRX_WALLET_ADDRESS_HERE\",\"starsRate\":\"50\"}'),
(5, 'BOT_STATES', '{\"requirePhone\":\"off\",\"requireIranPhone\":\"off\",\"sellState\":\"on\",\"botState\":\"on\",\"searchState\":\"on\",\"rewaredTime\":\"3\",\"cartToCartState\":\"on\",\"nextpay\":\"on\",\"zarinpal\":\"on\",\"nowPaymentWallet\":\"on\",\"nowPaymentOther\":\"on\",\"walletState\":\"on\",\"rewardChannel\":\"@wizwizdev\",\"lockChannel\":\"@wizwizch\",\"changeProtocolState\":null,\"renewAccountState\":null,\"switchLocationState\":\"on\",\"increaseTimeState\":\"on\",\"increaseVolumeState\":\"on\",\"gbPrice\":\"100\",\"dayPrice\":\"100\",\"subLinkState\":\"on\",\"plandelkhahState\":\"off\",\"weSwapState\":\"on\",\"TRXRate\":\"15000\",\"USDRate\":\"50000\",\"agencyState\":\"on\",\"testAccount\":\"on\",\"sharedExistence\":\"on\",\"individualExistence\":\"on\",\"remark\":\"digits\",\"updateConnectionState\":\"robot\",\"cartToCartAutoAcceptType\":\"0\",\"otherFeaturesState\":\"on\",\"earningMoneyState\":\"on\",\"tutorialManagementState\":\"on\",\"smartDiscountsState\":\"on\",\"fraudDetectionAdvanced\":\"on\",\"autoBackupFrequency\":\"24\",\"telegramStarsRate\":\"100\",\"maxConfigsPerUser\":\"10\",\"referralBonusPercent\":\"10\",\"agentCommissionPercent\":\"15\",\"highBalanceNotificationThreshold\":\"100000\",\"charityPercentagePerPurchase\":\"2\"}'),
(6, 'AUTO_RENEWAL_STATE', 'off'),
(7, 'HIDE_CARD_FOR_NEW_USERS', 'on'),
(8, 'CAPACITY_WARNING_PERCENT', '80'),
(9, 'AUTO_DELETE_EXPIRED_CONFIGS', 'on'),
(10, 'AUTO_DELETE_DAYS', '3'),
(11, 'LOTTERY_STATE', 'off'),
(12, 'RATING_SYSTEM_STATE', 'on'),
(13, 'DEEP_LINK_STATE', 'on'),
(14, 'TEST_PER_SERVER', 'off'),
(15, 'STARS_PAYMENT_STATE', 'off'),
(16, 'BACKUP_CHANNEL', ''),
(17, 'MULTI_LOCATION_TEST_ONLY', 'off'),
(18, 'MINIMUM_WALLET_CHARGE', '10000'),
(19, 'MAXIMUM_WALLET_CHARGE', '1000000'),
(20, 'CHARITY_STATE', 'off'),
(21, 'AUTO_JOIN_VERIFICATION', 'off'),
(22, 'FRAUD_DETECTION_STATE', 'on'),
(23, 'PANEL_SUB_STATE', 'off'),
(24, 'WEB_PANEL_STATE', 'off');
");

$connection->query("CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `refcode` varchar(50) NOT NULL,
  `wallet` int(11) NOT NULL DEFAULT 0,
  `date` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `refered_by` bigint(10) DEFAULT NULL,
  `step` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'none',
  `freetrial` varchar(10) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `first_start` varchar(10) DEFAULT NULL,
  `temp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `is_agent` int(1) NOT NULL DEFAULT 0,
  `discount_percent` VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `agent_date` int(255) NOT NULL DEFAULT 0,
  `spam_info` varchar(500),
  `last_purchase_date` int(255) NULL,
  `auto_renewal` int(1) NOT NULL DEFAULT 0,
  `display_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `free_trial_per_server` text NULL COMMENT 'JSON format for per-server trial tracking',
  `last_online` int(255) NULL,
  `fraud_warnings` int(3) NOT NULL DEFAULT 0,
  `banned_until` int(255) NULL,
  `last_balance_notification` int(255) NOT NULL DEFAULT 0,
  `web_token` varchar(255) NULL,
  `notification_settings` text NULL COMMENT 'JSON format',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci");

$connection->query("CREATE TABLE `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `backupchannel` varchar(200) CHARACTER SET utf8 NOT NULL,
  `lang` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
)");

$connection->query("CREATE TABLE `black_list` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `info` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `reason` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `date_added` int(255) NOT NULL,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت financial reports با بازه‌های زمانی
$connection->query("CREATE TABLE `financial_reports` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `report_type` varchar(50) NOT NULL COMMENT 'daily, weekly, monthly, custom',
  `start_date` int(255) NOT NULL,
  `end_date` int(255) NOT NULL,
  `total_income` int(255) NOT NULL DEFAULT 0,
  `total_orders` int(255) NOT NULL DEFAULT 0,
  `generated_date` int(255) NOT NULL,
  `generated_by` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
)");

$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz$#@';
$random_username = substr(str_shuffle($characters), 0, 15);
$random_password = substr(str_shuffle($characters), 0, 15);

$connection->query("INSERT INTO `admins` (`username`, `password`, `backupchannel`, `lang`) VALUES
('$random_username', '$random_password', '-1002545458541', 'en');
");

$connection->query("CREATE TABLE `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(200) NOT NULL,
  `port` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `panel` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `panel_type` varchar(50) NOT NULL DEFAULT 'xui' COMMENT 'xui, hiddify, marzban',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci");

$connection->query("CREATE TABLE `send_list` (
        `id` int(255) NOT NULL AUTO_INCREMENT,
        `offset` int(255) NOT NULL DEFAULT 0,
        `type` varchar(20) NOT NULL,
        `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
        `chat_id` bigint(10),
        `message_id` int(255),
        `file_id` varchar(500),
        `state` int(1) NOT NULL DEFAULT 0,
        PRIMARY KEY (`id`)
        )");

// جدول برای مدیریت کانفیگ‌های حذف شده قابل بازیابی
$connection->query("CREATE TABLE `recoverable_configs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `original_order_id` int(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `server_id` int(255) NOT NULL,
  `inbound_id` int(255) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `volume` float NOT NULL,
  `days` float NOT NULL,
  `expire_date` int(255) NOT NULL,
  `delete_date` int(255) NOT NULL,
  `recovery_deadline` int(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'recoverable' COMMENT 'recoverable, recovered, expired',
  PRIMARY KEY (`id`)
)");

// جداول اضافی مورد نیاز

// جدول برای مدیریت تخفیفات ساعتی
$connection->query("CREATE TABLE `hourly_discounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `server_id` int(255) NOT NULL,
  `discount_percent` int(3) NOT NULL,
  `start_hour` int(2) NOT NULL,
  `end_hour` int(2) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت subscription پنل‌ها
$connection->query("CREATE TABLE `panel_subscriptions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `panel_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `panel_url` varchar(500) NOT NULL,
  `subscription_id` varchar(200) NOT NULL,
  `start_date` int(255) NOT NULL,
  `expire_date` int(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
)");

// جدول برای ردیابی اتصالات کاربران
$connection->query("CREATE TABLE `user_connections` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `order_id` int(255) NOT NULL,
  `connection_time` int(255) NOT NULL,
  `ip_address` varchar(50) NULL,
  `country` varchar(100) NULL,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت کمپین‌های بازاریابی
$connection->query("CREATE TABLE `marketing_campaigns` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `target_users` varchar(100) NOT NULL COMMENT 'all, test_only, buyers_only, inactive',
  `sent_count` int(255) NOT NULL DEFAULT 0,
  `created_date` int(255) NOT NULL,
  `send_date` int(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
)");

// جدول برای کدهای دعوت اختصاصی
$connection->query("CREATE TABLE `special_invite_codes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `creator_id` bigint(10) NOT NULL,
  `usage_limit` int(255) NOT NULL DEFAULT 1,
  `used_count` int(255) NOT NULL DEFAULT 0,
  `bonus_amount` int(255) NOT NULL,
  `expire_date` int(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت اطلاعیه‌های سیستمی
$connection->query("CREATE TABLE `system_notifications` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'maintenance, update, promotion, warning',
  `target_users` varchar(100) NOT NULL DEFAULT 'all',
  `show_popup` int(1) NOT NULL DEFAULT 0,
  `start_date` int(255) NOT NULL,
  `end_date` int(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)");

// جدول برای مدیریت لاگ‌های سیستم
$connection->query("CREATE TABLE `system_logs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NULL,
  `action` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `ip_address` varchar(50) NULL,
  `timestamp` int(255) NOT NULL,
  `severity` varchar(20) NOT NULL DEFAULT 'info' COMMENT 'info, warning, error, critical',
  PRIMARY KEY (`id`)
)");

// اضافه کردن نمونه داده‌های اولیه
$connection->query("INSERT INTO `bank_accounts` (`card_number`, `holder_name`, `bank_name`, `active`) VALUES
('6104-1234-5678-9012', 'نام دارنده کارت', 'بانک ملی', 1)");

$connection->query("INSERT INTO `tutorials` (`category`, `title`, `content`, `order_num`, `active`) VALUES
('ios', 'نصب و راه‌اندازی در iOS', 'مراحل نصب برنامه Fair VPN در iOS...', 1, 1),
('android', 'نصب و راه‌اندازی در Android', 'مراحل نصب برنامه V2rayNG در Android...', 1, 1),
('windows', 'نصب و راه‌اندازی در Windows', 'مراحل نصب برنامه V2rayN در Windows...', 1, 1),
('mac', 'نصب و راه‌اندازی در macOS', 'مراحل نصب برنامه Fair VPN در macOS...', 1, 1)");

// به‌روزرسانی تنظیمات با مقادیر جدید
$connection->query("INSERT INTO `setting` (`type`, `value`) VALUES
('OTHER_FEATURES_STATE', 'on'),
('EARNING_MONEY_STATE', 'on'),
('TUTORIAL_MANAGEMENT_STATE', 'on'),
('SMART_DISCOUNTS_STATE', 'on'),
('FRAUD_DETECTION_ADVANCED', 'on'),
('AUTO_BACKUP_FREQUENCY', '24'),
('TELEGRAM_STARS_RATE', '100'),
('MAX_CONFIGS_PER_USER', '10'),
('REFERRAL_BONUS_PERCENT', '10'),
('AGENT_COMMISSION_PERCENT', '15'),
('HIGH_BALANCE_NOTIFICATION_THRESHOLD', '100000'),
('CHARITY_PERCENTAGE_PER_PURCHASE', '2')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)");

echo "🎉 Database setup completed successfully!\n\n";
echo "📊 Created Tables:\n";
echo "✅ Main system tables (users, orders, servers, etc.)\n";
echo "✅ Analytics tables (test_users_analytics, user_connections)\n";
echo "✅ Feature tables (lottery, user_ratings, tutorials)\n";
echo "✅ Payment & Financial tables (bank_accounts, financial_reports)\n";
echo "✅ Management tables (scheduled_messages, system_logs)\n";
echo "✅ Advanced features (charity campaigns, marketing campaigns)\n\n";

echo "🔑 Admin Credentials:\n";
echo "Username: $random_username\n";
echo "Password: $random_password\n\n";

echo "⚠️ IMPORTANT: Please save these credentials safely!\n";

?>
