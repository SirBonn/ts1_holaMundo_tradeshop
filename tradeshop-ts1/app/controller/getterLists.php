<?php
require_once '../../model/Trader.php';
require_once '../../model/Post.php';
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
            $p = new Post($row["UIDC"], $row["postAt"], $row["desc_post"], $row["price"], $row["isAvaible"]);
            $p->setTrader(getTrader($row["trader_dpi"]));
            $p->setProduct(getProduct($row["product_uidc"]));
            $posts[] = $p;
        }
        return $posts;
    } else {
        return null;
    }
}
