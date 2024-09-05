<?php
require_once __DIR__ . '/../model/Trader.php';
require_once __DIR__ . '/../model/Post.php';
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Card.php';
require_once __DIR__ . '/../model/Inventory.php';
require_once __DIR__ . '/../model/Offer.php';
require_once __DIR__ . '/../model/Payment.php';
require_once __DIR__ . '/../model/Shipment.php';
require_once __DIR__ . '/../model/Trade.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../config/db_conection.php';


$con = connect();

function getUser($username, $password){
    global $con;
    $sql = ("SELECT * FROM users WHERE username = '$username' AND usrpass = '$password'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new User($row["DPI"], $row["username"], $row["usrpass"], $row["usr_rol"], $row["email"],  $row["isActive"]);
    } else {
        return null;
    }
}


function getTrader($dpi)
{
    global $con;
    $sql = ("SELECT * FROM traders WHERE user_dpi = '$dpi'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new Trader($row["user_dpi"], $row["mainname"], $row["forename"], $row["uAddress"], $row["no_card"], $row["phone"], $row["birthday"]);
    } else {
        return null;
    }

}

function getProduct($id)
{
    global $con;
    $sql = ("SELECT * FROM products WHERE UIDC = '$id'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new Product($row["UIDC"], $row["prodname"], $row["proddesc"], $row["price"], $row["isIntercambiable"]);
    } else {
        return null;
    }

}

function getPost($id)
{
    global $con;
    $sql = ("SELECT * FROM posts WHERE UIDC = '$id'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $post = new Post($row["UIDC"], $row["postAt"], $row["desc_post"], $row["isAvaible"]);
        $post->setTrader(getTrader($row["trader_dpi"]));
        $post->setProduct(getProduct($row["product_uidc"]));
        return $post;
    } else {
        return null;
    }

}

function getOffer($id)
{
    global $con;
    $sql = ("SELECT * FROM offers WHERE UIDC = '$id'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $offer = new Offer($row["UIDC"], $row["offerdate"], $row["amount"], $row["offerstate"], $row["offermessage"]);
        $offer->setPaidProduct(getProduct($row["paid_product"]));
        $offer->setTrader(getTrader($row["trader_dpi"]));
        $offer->setPost(getPost($row["post_uid"]));
        return $offer;
    } else {
        return null;
    }

}

function verifyInventory($uidc, $dpi){
    global $con;
    $sql = ("SELECT * FROM user_inventory WHERE product_uidc = '$uidc' AND trader_dpi = '$dpi'");
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
?>
