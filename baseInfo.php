<?php

// Prevent direct access
if (!defined('SYSTEM_ACCESS')) {
    define('SYSTEM_ACCESS', true);
}

// Security check
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('Direct access not allowed');
}

// Database Configuration
$dbHost = 'localhost';
$dbUserName = 'your_db_username';
$dbPassword = 'your_db_password';
$dbName = 'your_database_name';
$dbPort = 3306;
$dbCharset = 'utf8mb4';

try {
    $connection = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName, $dbPort);
    
    if ($connection->connect_error) {
        error_log("Database connection failed: " . $connection->connect_error);
        die("Database connection failed");
    }
    
    if (!$connection->set_charset($dbCharset)) {
        error_log("Error loading character set $dbCharset: " . $connection->error);
    }
    
} catch (Exception $e) {
    error_log("Database connection exception: " . $e->getMessage());
    die("Database connection failed");
}

// Bot Configuration
$botToken = 'YOUR_BOT_TOKEN_HERE';
$admin = 123456789; 
$botUserName = '@YourBotUsername';

// System Paths
define('BASE_PATH', __DIR__);
define('CONFIG_PATH', BASE_PATH . '/config');
define('LOGS_PATH', BASE_PATH . '/logs');
define('TEMP_PATH', BASE_PATH . '/temp');
define('ASSETS_PATH', BASE_PATH . '/assets');

// Create directories if they don't exist
$directories = [LOGS_PATH, TEMP_PATH, CONFIG_PATH];
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Security Settings
define('ENCRYPTION_KEY', 'your_32_character_encryption_key');
define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_NAME', 'wizwiz_session');

// Rate limiting settings
define('RATE_LIMIT_REQUESTS', 30); // requests per minute
define('RATE_LIMIT_WINDOW', 60); // seconds

// API Configuration
$apiConfig = [
    'timeout' => 30,
    'connect_timeout' => 10,
    'user_agent' => 'WizWiz Bot/1.0',
    'verify_ssl' => true
];

// ==========================================
// Payment Gateways Configuration
// ==========================================
$paymentConfig = [
    'zarinpal' => [
        'merchant_id' => 'YOUR_ZARINPAL_MERCHANT_ID',
        'sandbox' => false, // true for testing
        'callback_url' => 'https://yourdomain.com/callback/zarinpal'
    ],
    'nowpayments' => [
        'api_key' => 'YOUR_NOWPAYMENTS_API_KEY',
        'sandbox' => false,
        'callback_url' => 'https://yourdomain.com/callback/nowpayments'
    ],
    'perfectmoney' => [
        'account_id' => 'YOUR_PERFECTMONEY_ACCOUNT',
        'passphrase' => 'YOUR_PERFECTMONEY_PASSPHRASE',
        'callback_url' => 'https://yourdomain.com/callback/perfectmoney'
    ]
];

// ==========================================
// Server Panel APIs Configuration
// ==========================================
$panelConfig = [
    'xui' => [
        'default_timeout' => 30,
        'max_retries' => 3
    ],
    'marzban' => [
        'default_timeout' => 30,
        'max_retries' => 3
    ],
    'sanaei' => [
        'default_timeout' => 30,
        'max_retries' => 3
    ]
];

// ==========================================
// System Settings
// ==========================================
$systemConfig = [
    'timezone' => 'Asia/Tehran',
    'language' => 'fa',
    'currency' => 'IRT', // Iranian Toman
    'date_format' => 'Y-m-d H:i:s',
    'max_file_size' => 5 * 1024 * 1024, // 5MB
    'allowed_file_types' => ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt'],
    'pagination_limit' => 15,
    'session_lifetime' => 3600, // 1 hour
    'cache_ttl' => 300 // 5 minutes
];

// Set timezone
date_default_timezone_set($systemConfig['timezone']);

// ==========================================
// Logging Configuration
// ==========================================
$logConfig = [
    'enabled' => true,
    'level' => 'INFO', // DEBUG, INFO, WARNING, ERROR
    'max_size' => 10 * 1024 * 1024, // 10MB
    'max_files' => 5,
    'file_path' => LOGS_PATH . '/system.log'
];

// ==========================================
// Cache Configuration
// ==========================================
$cacheConfig = [
    'enabled' => true,
    'type' => 'file', // file, redis, memcached
    'path' => TEMP_PATH . '/cache',
    'prefix' => 'wizwiz_',
    'ttl' => $systemConfig['cache_ttl']
];

// ==========================================
// Email Configuration (if needed)
// ==========================================
$emailConfig = [
    'enabled' => false,
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_username' => 'your_email@gmail.com',
    'smtp_password' => 'your_app_password',
    'from_email' => 'noreply@yourdomain.com',
    'from_name' => 'WizWiz Bot'
];

// ==========================================
// Feature Flags
// ==========================================
$features = [
    'maintenance_mode' => false,
    'registration_enabled' => true,
    'payment_enabled' => true,
    'test_accounts_enabled' => true,
    'agent_system_enabled' => true,
    'search_enabled' => true,
    'file_upload_enabled' => true,
    'backup_enabled' => true,
    'webhook_enabled' => true
];

// ==========================================
// Validation Rules
// ==========================================
$validationRules = [
    'username' => [
        'min_length' => 3,
        'max_length' => 50,
        'pattern' => '/^[a-zA-Z0-9_]+$/'
    ],
    'password' => [
        'min_length' => 8,
        'max_length' => 100,
        'require_special' => false
    ],
    'email' => [
        'max_length' => 255,
        'pattern' => '/^[^\s@]+@[^\s@]+\.[^\s@]+$/'
    ],
    'phone' => [
        'pattern' => '/^(\+98|0)?9\d{9}$/' // Iranian phone format
    ]
];

// ==========================================
// Default Values
// ==========================================
$defaultValues = [
    'user_credit' => 0,
    'user_role' => 'user',
    'server_status' => 1,
    'plan_status' => 1,
    'order_status' => 'pending',
    'test_account_duration' => 1, // days
    'test_account_volume' => 1024, // MB
    'agent_commission' => 10, // percent
    'min_payment' => 1000 // minimum payment amount
];

// ==========================================
// Helper Functions
// ==========================================

/**
 * Get configuration value with dot notation
 */
function config($key, $default = null) {
    global $systemConfig, $paymentConfig, $panelConfig, $features;
    
    $keys = explode('.', $key);
    $config = compact('systemConfig', 'paymentConfig', 'panelConfig', 'features');
    
    foreach ($keys as $k) {
        if (isset($config[$k])) {
            $config = $config[$k];
        } else {
            return $default;
        }
    }
    
    return $config;
}

/**
 * Check if feature is enabled
 */
function isFeatureEnabled($feature) {
    global $features;
    return isset($features[$feature]) && $features[$feature] === true;
}

/**
 * Get database connection
 */
function getDbConnection() {
    global $connection;
    
    if (!$connection || !$connection->ping()) {
        // Reconnect if connection is lost
        global $dbHost, $dbUserName, $dbPassword, $dbName, $dbPort, $dbCharset;
        
        $connection = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName, $dbPort);
        
        if ($connection->connect_error) {
            throw new Exception("Database reconnection failed: " . $connection->connect_error);
        }
        
        $connection->set_charset($dbCharset);
    }
    
    return $connection;
}

/**
 * Generate secure random string
 */
function generateSecureToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Validate input based on rules
 */
function validateInput($value, $type) {
    global $validationRules;
    
    if (!isset($validationRules[$type])) {
        return false;
    }
    
    $rules = $validationRules[$type];
    
    if (isset($rules['min_length']) && strlen($value) < $rules['min_length']) {
        return false;
    }
    
    if (isset($rules['max_length']) && strlen($value) > $rules['max_length']) {
        return false;
    }
    
    if (isset($rules['pattern']) && !preg_match($rules['pattern'], $value)) {
        return false;
    }
    
    return true;
}

/**
 * Sanitize input data
 */
function sanitizeInput($data, $type = 'string') {
    switch ($type) {
        case 'string':
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        case 'int':
            return filter_var($data, FILTER_VALIDATE_INT);
        case 'float':
            return filter_var($data, FILTER_VALIDATE_FLOAT);
        case 'email':
            return filter_var($data, FILTER_VALIDATE_EMAIL);
        case 'url':
            return filter_var($data, FILTER_VALIDATE_URL);
        default:
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
}

/**
 * Log system events
 */
function logEvent($message, $level = 'INFO') {
    global $logConfig;
    
    if (!$logConfig['enabled']) {
        return;
    }
    
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
    
    // Rotate log if needed
    if (file_exists($logConfig['file_path']) && 
        filesize($logConfig['file_path']) > $logConfig['max_size']) {
        
        for ($i = $logConfig['max_files'] - 1; $i > 0; $i--) {
            $oldFile = $logConfig['file_path'] . '.' . $i;
            $newFile = $logConfig['file_path'] . '.' . ($i + 1);
            
            if (file_exists($oldFile)) {
                rename($oldFile, $newFile);
            }
        }
        
        rename($logConfig['file_path'], $logConfig['file_path'] . '.1');
    }
    
    file_put_contents($logConfig['file_path'], $logEntry, FILE_APPEND | LOCK_EX);
}

// ==========================================
// Auto-load required files
// ==========================================
$requiredFiles = [
    'jdf.php',      // Persian date functions
    'functions.php' // Additional helper functions
];

foreach ($requiredFiles as $file) {
    $filePath = BASE_PATH . '/' . $file;
    if (file_exists($filePath)) {
        require_once $filePath;
    }
}

// ==========================================
// Error Handler
// ==========================================
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $errorTypes = [
        E_ERROR => 'ERROR',
        E_WARNING => 'WARNING',
        E_NOTICE => 'NOTICE',
        E_USER_ERROR => 'USER_ERROR',
        E_USER_WARNING => 'USER_WARNING',
        E_USER_NOTICE => 'USER_NOTICE'
    ];
    
    $type = isset($errorTypes[$errno]) ? $errorTypes[$errno] : 'UNKNOWN';
    $message = "PHP {$type}: {$errstr} in {$errfile} on line {$errline}";
    
    logEvent($message, 'ERROR');
    
    // Don't execute PHP internal error handler
    return true;
}

// Set custom error handler
set_error_handler('customErrorHandler');

// ==========================================
// Initialization Complete
// ==========================================
logEvent("System initialized successfully", 'INFO');

// Define that base info has been loaded
define('BASE_INFO_LOADED', true);
?>
