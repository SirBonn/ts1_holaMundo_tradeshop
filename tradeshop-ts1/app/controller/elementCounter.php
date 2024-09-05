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

function getTotallyPostsAvaible()
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM posts WHERE isAvaible = 1");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getInventoryCost($dpi)
{
    global $con;
    $sql = ("SELECT SUM(p.price) FROM user_inventory ui LEFT JOIN products p ON p.UIDC = ui.product_uidc WHERE ui.trader_dpi = '$dpi'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["SUM(p.price)"];
    } else {
        return null;
    }
}

function getTotallyOffers($dpi)
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM posts p
                RIGHT JOIN offers o ON o.post_uid = p.UIDC WHERE p.trader_dpi = '$dpi'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getPendingOffers($dpi)
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM posts p
                RIGHT JOIN offers o ON o.post_uid = p.UIDC WHERE p.trader_dpi = '$dpi' AND offerstate = 0");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getTotallInventoryProducts($dpi)
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM user_inventory WHERE trader_dpi = '$dpi'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}

function getNotPendingOffers($dpi)
{
    global $con;
    $sql = ("SELECT COUNT(*) FROM posts p
                RIGHT JOIN offers o ON o.post_uid = p.UIDC WHERE p.trader_dpi = '$dpi' AND offerstate != 0");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["COUNT(*)"];
    } else {
        return null;
    }
}
