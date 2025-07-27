<?php

// Error handling
error_reporting(E_ALL);
ini_set('display_errors', 0); 
ini_set('log_errors', 1);

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// File existence check
if (!file_exists(__DIR__ . "/baseInfo.php") || !file_exists(__DIR__ . "/config.php")) {
    error_log("Required files not found");
    die("Required files not found");
}

try {
    require_once __DIR__ . "/baseInfo.php";
    require_once __DIR__ . "/config.php";
} catch (Exception $e) {
    error_log("Error including files: " . $e->getMessage());
    die("Configuration error");
}

// Database connection check
if (!isset($connection) || $connection->connect_error) {
    error_log("Database connection failed: " . ($connection->connect_error ?? "Connection not established"));
    die("Database connection failed");
}

try {
    // Prepare statement with better error handling
    $stmt = $connection->prepare("SELECT * FROM `server_plans` WHERE (`type` IS NULL OR `type` = '') AND `inbound_id` != 0");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $connection->error);
    }
    
    $stmt->execute();
    $list = $stmt->get_result();
    $stmt->close();

    if ($list->num_rows > 0) {
        $updated_count = 0;
        $error_count = 0;
        
        while ($row = $list->fetch_assoc()) {
            $serverId = $row['server_id'];
            $inboundId = $row['inbound_id'];
            $rowId = $row['id'];
            
            try {
                // Function call with error handling
                if (!function_exists('getJson')) {
                    throw new Exception("getJson function not found");
                }
                
                $response = getJson($serverId);
                if (!$response || !isset($response->obj)) {
                    error_log("Invalid response from getJson for server ID: $serverId");
                    $error_count++;
                    continue;
                }
                
                $netType = null;
                foreach ($response->obj as $config) {
                    if (isset($config->id) && $config->id == $inboundId) {
                        if (isset($config->streamSettings)) {
                            $streamSettings = json_decode($config->streamSettings);
                            if ($streamSettings && isset($streamSettings->network)) {
                                $netType = $streamSettings->network;
                            }
                        }
                        break;
                    }
                }
                
                if (!is_null($netType) && !empty($netType)) {
                    $stmt = $connection->prepare("UPDATE `server_plans` SET `type` = ? WHERE `id` = ?");
                    if ($stmt) {
                        $stmt->bind_param("si", $netType, $rowId);
                        if ($stmt->execute()) {
                            $updated_count++;
                        } else {
                            error_log("Update failed for row ID $rowId: " . $stmt->error);
                            $error_count++;
                        }
                        $stmt->close();
                    }
                }
                
            } catch (Exception $e) {
                error_log("Error processing server $serverId, inbound $inboundId: " . $e->getMessage());
                $error_count++;
                continue;
            }
        }
        
        // Log results
        error_log("Update completed. Updated: $updated_count, Errors: $error_count");
        echo json_encode([
            'status' => 'success',
            'message' => 'REFRESH PAGE',
            'updated' => $updated_count,
            'errors' => $error_count
        ]);
        
    } else {
        echo json_encode([
            'status' => 'complete',
            'message' => 'DONE'
        ]);
    }
    
} catch (Exception $e) {
    error_log("Fatal error in updateShareConfig: " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'An error occurred during update'
    ]);
} finally {
    // Close database connection if still open
    if (isset($connection) && $connection->ping()) {
        $connection->close();
    }
}
?>
