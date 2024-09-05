<?php
require_once __DIR__ . '/../../model/User.php';
require_once __DIR__ . '/../../model/Trader.php';
require_once __DIR__ . '/../../model/Product.php';
require_once __DIR__ . '/../../model/Offer.php';

require_once __DIR__ . '/../../config/routes.php';
require_once __DIR__ . '/../../config/db_conection.php';
require_once __DIR__ . '/../../controller/elementCounter.php';
require_once __DIR__ . '/../../controller/getterElement.php';
require_once __DIR__ . '/../../controller/getterLists.php';

?>

<?php
session_start();

if (isset($_SESSION["usr"])) {
    $user = $_SESSION["usr"];
    if ($user->getRol() != 1) {
        $_SESSION["error_message"] = "No tienes permisos para acceder a esta página";
        header("Location: " . getLogin());
        exit();
    }

    $trader = getTrader($user->getDPI());
    $_SESSION["trdr"] = $trader;
} else {
    header("Location: " . getLogin());
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include '../includes/head.php';
?>

<body>
    <?php
    include '../includes/navbar.php';
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="py-5 fixed-div-left ">
                    <div class="card">
                        <div class="card-header">
                            <div class="row container">
                                <div class="col-9">
                                    <?php
                                    echo $trader->getName() . " " . $trader->getForename();
                                    ?>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#completarPerfil">Editar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-right">
                                <?php
                                echo 'Telefono: ' . $trader->getPhone();
                                echo "<br>";
                                echo 'Direccion: ' . $trader->getAddress();
                                echo "<br>";
                                if ($trader->getCard() != null) {
                                    echo $trader->getCard() . '</p>';
                                } else {
                                    echo '</p><a class="card-text text-right">No has registrado una tarjeta</a>';
                                }
                                ?>

                        </div>
                    </div><br>
                    <div class="card">
                        <div class="card-header">
                            <div class="row container">
                                <div class="col-9">
                                    Inventario
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#inventaryView">Abrir</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="card-text text-right">
                                <?php
                                try {
                                    echo 'Articulos: ' . getTotallInventoryProducts($trader->getDPI());
                                } catch (Exception $e) {
                                    $_SESSION["error_message"] = "Error al cargar los productos: " . $e->getMessage();
                                }
                                ?>
                            </h2>
                        </div>
                    </div><br>
                    <div class="card">
                        <div class="card-header">Inversion</div>
                        <div class="card-body">
                            <h5 class="card-text text-right">
                                <?php
                                try {
                                    echo 'Costo del inventario ' . getInventoryCost($trader->getDPI());
                                } catch (Exception $e) {
                                    $_SESSION["error_message"] = "Error al cargar los productos: " . $e->getMessage();
                                }
                                ?>
                            </h5>
                        </div>
                    </div><br>
                    <div class="card">
                        <div class="card-header">
                            <div class="row container">
                                <div class="col-9">
                                    Ofertas Recibidas
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#offersToMeView">Revisar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-text text-left">
                                Ofertas por revisar: <?php echo getPendingOffers($_SESSION['trdr']) ?><br>
                                Ofertas revisadas: <?php echo getNotPendingOffers($_SESSION['trdr']) ?><br>
                                Ofertas Totales: <?php echo getTotallyOffers($_SESSION['trdr']) ?>
                            </h6>
                        </div>
                    </div><br>
                </div>
            </div>
            <div class="py-2 col-6">

                <?php

                if (isset($_SESSION["warn_message"])) {
                    echo '<div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            ' . $_SESSION["warn_message"] . '
                            </div>';
                    unset($_SESSION["warn_message"]);
                }
                if (isset($_SESSION["error_message"])) {
                    echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        ' . $_SESSION["error_message"] . '
                        </div>';
                    unset($_SESSION["error_message"]);
                }
                if (isset($_SESSION["success_message"])) {
                    echo '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        ' . $_SESSION["success_message"] . '
                        </div>';
                    unset($_SESSION["success_message"]);
                }
                ?>
                <?php

                if ($trader->getName() == null || $trader->getForename() == null || $trader->getPhone() == null || $trader->getAddress() == null) {
                ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h2><strong>Recordatorio</strong></h2> Aun no has completado tu perfil,
                        por favor completa tu perfil para poder acceder a todas las funcionalidades de la plataforma.
                        <br><br><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#completarPerfil">Completar perfil</button>
                    </div>
                <?php
                } else { ?>
                    <div>
                        <div class="py-2">
                            <div class="card">
                                <div class="card-header">
                                    <form action="../../controller/postController.php" method="POST">
                                        <div class="row container-fluid">
                                            <div class="col-11">
                                                <h2>Publicar post</h2>
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-success">Publicar</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control container-fluid" rows="5" name="desc" placeholder="Que estas vendiendo?"></textarea>
                                </div>
                                <div class="py-3">
                                    <div class="row container-fluid">
                                        <div class="col-8">
                                            <strong>Agregar Producto</strong>
                                        </div>
                                        <div class="col-4">
                                            <select class="col-6 custom-select" name="product" id="product">
                                                <option value="0">Seleccionar</option>
                                                <?php
                                                try {
                                                    $products = getInventoryProducts($trader->getDPI());
                                                    foreach ($products as $product) {
                                                        echo '<option value="' . $product->getId() . '">' . $product->getName() . '</option>';
                                                    }
                                                } catch (Exception $e) {
                                                    $_SESSION["error_message"] = "Error al cargar los productos: " . $e->getMessage();
                                                }

                                                ?>
                                            </select>

                                            <button type="button" class="col-5 btn btn-warning text-black" data-toggle="modal" data-target="#agregarProducto">Agregar</button>

                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <h1>Posts</h1>
                <div class="card">
                    <div class="card-body">

                        <?php
                        $url = $_SERVER['REQUEST_URI'];
                        $tab = intval($_GET["page"]);
                        $numTabs = 0;

                        if ($tab != null) {
                            $numTabs = getTotallyPostsAvaible();
                            if ($numTabs >= 10) {
                                $numTabs /= 10;
                            }
                        }

                        $posts = getPosts($tab);

                        foreach ($posts as $post) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-10">
                                            <h5> <?php echo $post->getProduct()->getName() ?> </h5>
                                            <small> <?php ?> </small>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#crearOferta"
                                                onclick="setPostId(<?php echo $post->getId() ?> )">Ofertar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" card-body">
                                    <p> <?php echo $post->getDescription() ?> </p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Precio: Q. <?php echo $post->getProduct()->getPrice() ?></h5>
                                        </div>
                                        <div class="col-3"><?php
                                                            if ($post->getIsAvailable() == 1) {
                                                                echo '<h5 class="btn disabled btn-outline-success text-black">Disponible</h5>';
                                                            } else {
                                                                echo '<h5 class="btn disabled btn-outline-danger text-black">No disponible</h5>';
                                                            } ?>
                                        </div>
                                        <div class="col-3"><?php
                                                            if ($post->getProduct()->isIntercambiable()) {
                                                                echo '<h5 class="btn disabled btn-outline-success text-black">Intercambiable</h5>';
                                                            } else {
                                                                echo '<h5 class="btn disabled btn-outline-danger text-black">No intercambiable</h5>';
                                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        <?php

                        }

                        ?>

                    </div>
                    <div class="card-footer">
                        <ul class="pagination  justify-content-center">
                            <?php

                            $tabNum = intval($tab);
                            for ($i = 1; $i <= $numTabs; $i++) {
                                if ($i == $tabNum) {
                                    echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="' . goPageTrades($i) . '">' . $i .  ' </a></li>';
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="fixed-div-right">
                    <div class="card">
                        <div class="card-header">Mis offertas:</div>
                        <div class="card-body" style="max-height: 350px; overflow-y: auto;">

                            <?php
                            $offers = getOffers($trader->getDPI());

                            if ($offers == null) {
                                echo "<h5> No tienes ofertas </h5>";
                            } else {

                                foreach ($offers as $offer) {
                                    echo "<div class=\"card\">";
                                    echo "<div class=\"card-header\">";
                                    echo "            <h4> Producto de interes: " . $offer->getPost()->getProduct()->getName() . "</h4>";
                                    if ($offer->getPaidProduct() != null) {
                                        echo "            <h5><small> por: " . $offer->getPaidProduct()->getName() . "</small></h5";
                                    } else {
                                        echo "            <h5><small> por: Q. " . $offer->getAmount() . "</small></h5";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class=\"card-body\">";
                                    echo "Oferta:<br>";
                                    echo $offer->getMessage();
                                    echo "</div>";
                                    echo "<div class=\"card-footer text-right\">";
                                    echo "            <small>" . " Creada el " . $offer->getDate() . "</small>";
                                    echo "</div>";
                                    echo "</div> <br>";
                                }
                            }
                            ?>
                        </div>
                    </div><br>
                    <div class="card">
                        <div class="card-header">Ultimos Tradeos:</div>
                        <div class="card-body" style="max-height: 350px; overflow-y: auto;">
                            <?php
                            $trades = getMyLatestTrades($trader->getDPI());

                            if ($trades == null) {
                                echo "<h5> No has realizado ningun trade</h5>";
                            } else {

                                foreach ($trades as $trade) {
                                    echo "<div class=\"card\">";
                                    echo "<div class=\"card-header\">";
                                    echo "            <h4> Producto obtenido:" . $trade->getOffer()->getPost()->getProduct()->getName() . "</h4>";
                                    if ($trade->getOffer()->getPaidProduct() != null) {
                                        echo "            <h5><small> por: " . $trade->getOffer()->getPaidProduct()->getName() . "</small></h5";
                                    } else {
                                        echo "            <h5><small> por: Q. " . $trade->getOffer()->getAmount() . "</small></h5";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class=\"card-footer text-right\">";
                                    echo "            <small>" . " Aceptado el " . $trade->getDate() . "</small>";
                                    echo "</div>";
                                    echo "</div> <br>";
                                }
                            }
                            ?>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modals -->
    <?php
    include '../includes/modals.php';
    ?>

    </div>
</body>
<script>
    function setPostId(postId) {
        document.getElementById('postId').value = postId;
    }
</script>
<div class="container">
    <?php
    include '../includes/footer.php';
    ?>
</div>

</html>