<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('mis-4013-hw2.mysql.database.azure.com','D3misres', 'ILL92@41', '4013hw3db');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}

?>
