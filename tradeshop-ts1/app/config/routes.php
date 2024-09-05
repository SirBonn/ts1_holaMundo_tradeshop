<?php



function getRoot()
{
    return "http://localhost/tradeshop-ts1";
}

function getMain()
{
    return getRoot() . "/index.php";
}

function getLogin()
{
    return getRoot() . "/app/view/login/login.php";
}

function goTrades()
{
    return getRoot() . "/app/view/users/traders.php?page=1";
}

function goPageTrades($page)
{
    return getRoot() . "/app/view/users/traders.php?page=" . $page;
}

function goAdmin()
{
    return getRoot() . "/app/view/users/admin.php";
}

function getInitSesion($usr)
{    
    if ($usr != null) {
        $rol = $usr->getRol();
        if ($rol == 0) {
            return getRoot() . "/app/view/users/admin.php";
        } elseif ($rol == 1) {
            return getRoot() . "/app/view/users/traders.php?page=1";
        }
    }
}
