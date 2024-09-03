<?php

require_once '../../config/db_conection.php';

$con = connect();

function getTotallyTraders()
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM traders t LEFT JOIN users u on t.user_dpi = u.DPI WHERE u.isActive = 1");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getTotallyProducts()
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM products");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getTotallyPosts()
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM posts");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getTotallyExchanges()
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM trades");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getTotallyEarnings()
{
    global $con;
    $sql = ("SELECT SUM(amount) FROM trades AS t LEFT JOIN offers o ON t.offer_uid = o.UIDC LEFT JOIN products p ON o.paid_product = p.UIDC");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["SUM(amount)"];
    } else {
        return null;
    }
}
