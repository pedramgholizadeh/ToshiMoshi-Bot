<?php
include 'DatabaseConfig.php';


if(ISSET($_POST['telegram_user_id'])) {
    // Data to be inserted
    
    // Check for duplicate 'telegram_user_id'
    $update_query = "UPDATE users SET collected = ? WHERE telegram_user_id = ?";
    
    // Prepare statement
    $stmt = $conn->prepare($update_query);
    
    // Bind parameters
    $stmt->bind_param("ii", $collected, $telegram_user_id);
    
    // Set parameters
    $collected = $_POST['collected'];
    $telegram_user_id = $_POST['telegram_user_id'];

    // Execute query
    $stmt->execute();
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}