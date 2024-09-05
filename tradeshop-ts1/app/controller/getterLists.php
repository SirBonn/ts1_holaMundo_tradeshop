<?php
require_once '../../model/Trade.php';
require_once '../../model/Trader.php';
require_once '../../model/Post.php';
require_once '../../model/Product.php';
require_once '../../model/Card.php';
require_once '../../model/Inventory.php';
require_once '../../model/Offer.php';
require_once '../../model/Payment.php';
require_once '../../model/Shipment.php';
require_once '../../model/User.php';
require_once '../../config/db_conection.php';
require_once 'getterElement.php';


$con = connect();


function getTraders()
{
    global $con;
    $sql = ("SELECT * FROM traders");
    $result = $con->query($sql);
    $traders = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $traders[] = new Trader(
                $row["user_dpi"],
                $row["mainname"],
                $row["forename"],
                $row["uAddress"],
                $row["no_card"],
                $row["phone"],
                $row["birthday"]
            );
        }
        return $traders;
    } else {
        return null;
    }
}

function getLatestPosts()
{
    global $con;
    $sql = ("SELECT * FROM posts ORDER BY postAt DESC LIMIT 10");
    $result = $con->query($sql);
    $posts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $p = new Post($row["UIDC"], $row["postAt"], $row["desc_post"], $row["isAvaible"]);
            $p->setTrader(getTrader($row["trader_dpi"]));
            $p->setProduct(getProduct($row["product_uidc"]));
            $posts[] = $p;
        }
        return $posts;
    } else {
        return null;
    }
}

function getLatestTrades()
{
    global $con;
    $sql = ("SELECT * FROM trades ORDER BY aceptedAt DESC LIMIT 10");
    $result = $con->query($sql);
    $trades = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $t = new Trade($row["UIDC"], $row["aceptedAt"], $row["tradetype"]);
            $t->setOffer(getOffer($row["offer_uid"]));
            $trades[] = $t;
        }
        return $trades;
    } else {
        return null;
    }
}

function getMyLatestTrades($dpi)
{
    global $con;
    $sql = ("SELECT * FROM trades LEFT JOIN tradeshop_db.offers o ON o.UIDC = trades.offer_uid WHERE trader_dpi= $dpi ORDER BY aceptedAt DESC LIMIT 5");
    $result = $con->query($sql);
    $trades = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $t = new Trade($row["UIDC"], $row["aceptedAt"], $row["tradetype"]);
            $t->setOffer(getOffer($row["offer_uid"]));
            $trades[] = $t;
        }
        return $trades;
    } else {
        return null;
    }
}

function getPosts($off)
{
    global $con;
    $offset = ($off - 1) * 10;
    $sql = ("SELECT * FROM posts ORDER BY postAt DESC LIMIT 10 OFFSET $offset");
    $result = $con->query($sql);
    $posts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $p = new Post($row["UIDC"], $row["postAt"], $row["desc_post"], $row["isAvaible"]);
            $p->setTrader(getTrader($row["trader_dpi"]));
            $p->setProduct(getProduct($row["product_uidc"]));
            $posts[] = $p;
        }
        return $posts;
    } else {
        return null;
    }
}

function getOffers($dpi)
{
    global $con;
    $sql = (" SELECT * FROM offers WHERE trader_dpi = $dpi AND offerstate = 0 ORDER BY offerdate DESC LIMIT 5");
    $result = $con->query($sql);
    $offers = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $o = new Offer($row["UIDC"], $row["offerdate"], $row["amount"], $row["offerstate"], $row["offermessage"]);
            $o->setTrader(getTrader($row["trader_dpi"]));
            $o->setPaidProduct(getProduct($row["paid_product"]));
            $o->setPost(getPost($row["post_uid"]));
            $offers[] = $o;
        }
        return $offers;
    } else {
        return null;
    }
}

function getInventoryProducts($dpi)
{
    global $con;
    $sql = ("SELECT * FROM user_inventory WHERE trader_dpi = '$dpi'");
    $result = $con->query($sql);
    $products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = getProduct($row["product_uidc"]);
        }
        return $products;
    } else {
        return null;
    }
}

function getInventory($dpi)
{
    global $con;
    $sql = ("SELECT * FROM user_inventory ui LEFT JOIN products p ON ui.product_uidc = p.UIDC  WHERE trader_dpi = '$dpi'");
    $result = $con->query($sql);
    $inventory = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $inventory[] = new Product($row["UIDC"], $row["prodname"], $row["proddesc"], $row["price"], $row["isIntercambiable"]);
        }
        return $inventory;
    } else {
        return null;
    }
}

function getOffersToMe($dpi)
{
    global $con;
    $sql = ("SELECT * FROM posts p
                RIGHT JOIN offers o ON o.post_uid = p.UIDC WHERE p.trader_dpi = $dpi AND offerstate = 0");
    $result = $con->query($sql);
    $offers = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $o = new Offer($row["UIDC"], $row["offerdate"], $row["amount"], $row["offerstate"], $row["offermessage"]);
            $o->setTrader(getTrader($row["trader_dpi"]));
            $o->setPaidProduct(getProduct($row["paid_product"]));
            $o->setPost(getPost($row["post_uid"]));
            $offers[] = $o;
        }
        return $offers;
    } else {
        return null;
    }
}
