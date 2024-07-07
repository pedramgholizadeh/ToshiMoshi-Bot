<?php
include 'DatabaseConfig.php';


if(ISSET($_POST['collected'])) {
    // Data to be inserted
    $telegram_user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $collected = $_POST['collected'];
    
    // Check for duplicate 'telegram_user_id'
    $query = "SELECT * FROM users WHERE telegram_user_id = '$telegram_user_id'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        // Error
    } else {
        // Insert new row
        $query = "INSERT INTO users (telegram_user_id, first_name, last_name, collected) VALUES ('$telegram_user_id', '$first_name', '$last_name', '$collected')";
        $conn->query($query);
    }
    
    $conn->close();
}