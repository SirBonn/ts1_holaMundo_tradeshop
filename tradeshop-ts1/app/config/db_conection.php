<?php

function connect()
{
    $conn = new mysqli("localhost", "sirRoot", "sirRoot", "tradeshop_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>