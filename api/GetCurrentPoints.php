<?php 
include 'DatabaseConfig.php';

if(ISSET($_POST['userID'])) {
    $telegram_user_id = $_POST['userID'];
    $query = "SELECT collected FROM users WHERE telegram_user_id = '$telegram_user_id'";
    $result = $conn->query($query);
    $conn->close();
    
    $resultString = '';
    while ($row = $result->fetch_assoc()) {
        $resultString .= json_encode($row);
    }

    $value = json_decode($resultString);
    
    echo $value->collected;
}