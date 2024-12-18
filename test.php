<?php
// Test Redis connection

$redis = new Redis(); // Create Redis instance

// Connect to Redis server
$redis->connect('127.0.0.1', 6379);  // Default Redis server IP and port

// Test Redis connection
if ($redis->ping()) {
    echo "Connected to Redis server successfully!";
} else {
    echo "Failed to connect to Redis server.";
}
?>

