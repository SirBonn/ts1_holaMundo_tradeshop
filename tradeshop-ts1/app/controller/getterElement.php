<?php
require_once '../../model/Trader.php';
require_once '../../model/Post.php';
require_once '../../model/Product.php';
require_once '../../model/Card.php';
require_once '../../model/Inventory.php';
require_once '../../model/Offer.php';
require_once '../../model/Payment.php';
require_once '../../model/Shipment.php';
require_once '../../model/Trade.php';
require_once '../../model/User.php';
require_once '../../config/db_conection.php';


$con = connect();

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

?>
