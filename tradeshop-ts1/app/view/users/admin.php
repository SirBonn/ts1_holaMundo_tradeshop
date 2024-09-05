<?php
require_once __DIR__ . '/../../config/routes.php';
require_once __DIR__ . '/../../model/User.php';
require_once '../../controller/getterLists.php';
require_once '../../controller/elementCounter.php';
?>
<?php
session_start();

if (isset($_SESSION['usr'])) {
    $user = $_SESSION['usr'];
    if ($user->getRol() != 0) {
        header("Location: " . getMain());
        exit();
    }
} else {
    header("Location: " . getMain());
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include '../includes/head.php';
?>


<body>

    <header class="bg-dark site-header py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="../../../index.php" aria-label="Product">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img"
                    viewBox="0 0 24 24">
                    <title>Product</title>
                    <circle cx="12" cy="12" r="10" />
                    <path
                        d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                </svg>
            </a>
            <a class="py-2 d-none d-md-inline-block" href="#">Tour</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
            <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="py-5 col-2">
                <div class="card">
                    <div class="card-header">Usuarios activos en la pagina:</div>
                    <div class="card-body">
                        <h2 class="card-text text-right">
                            <?php
                            echo getTotallyTraders();
                            ?>
                        </h2>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">Productos publicados:</div>
                    <div class="card-body">
                        <h2 class="card-text text-right">
                            <?php
                            echo getTotallyProducts();
                            ?>
                        </h2>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">Post publicados:</div>
                    <div class="card-body">
                        <h2 class="card-text text-right">
                            <?php
                            echo getTotallyPosts();
                            ?>
                        </h2>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">Ganancias totales:</div>
                    <div class="card-body">
                        <h2 class="card-text text-right"> Q.
                            <?php
                            echo getTotallyEarnings();
                            ?>
                        </h2>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">Intercambios realizados:</div>
                    <div class="card-body">
                        <h2 class="card-text text-right">
                            <?php
                            echo getTotallyExchanges();
                            ?>

                        </h2>
                    </div>
                </div><br>
            </div>
            <div class="py-5 col-6">
                <div class="card">
                    <div class="card-header">Usuarios activos en la pagina:</div>
                    <div class="card-body" style="max-height: 800px; overflow-y: auto;">

                        <?php
                        $traders = getTraders();
                        foreach ($traders as $tr) {
                            echo "<div class=\"card\">";
                            echo "<div class=\"card-header\">";
                            echo "    <div class=\"row\">";
                            echo "        <div class=\"col-8\">";
                            echo "            <h3>" . $tr->getName() . " " . $tr->getForename() . "</h3>";
                            echo "        </div>";
                            echo "        <div class=\"col-4 text-right\">";
                            echo "            <button type=\"button\" class=\"btn btn-primary\">Editar</button>";
                            echo "            <button type=\"button\" class=\"btn btn-danger\">Banear</button>";
                            echo "        </div>";
                            echo "    </div>";
                            echo "</div>";
                            echo "<div class=\"card-body row\">";
                            echo "    <div class=\"col-4\">";
                            echo "        hola <br> hola2";
                            echo "    </div>";
                            echo "    <div class=\"col-4\">";
                            echo "        hola <br> hola2";
                            echo "    </div>";
                            echo "</div>";
                            echo "</div> <br>";
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="py-5 col-4">
                <div class="card">
                    <div class="card-header">Ultimos Post:</div>
                    <div class="card-body" style="max-height: 350px; overflow-y: auto;">

                        <?php
                        $posts = getLatestPosts();
                        foreach ($posts as $tr) {
                            echo "<div class=\"card\">";
                            echo "<div class=\"card-header\">";
                            echo "            <h4> Post de: " . $tr->getTrader()->getName() . $tr->getTrader()->getForename() . "</h4>";
                            echo "</div>";
                            echo "<div class=\"card-body\">";
                            echo "    <h5 class=\"card-title\">" . $tr->getProduct()->getName() . "</h5>";
                            echo $tr->getDescription();
                            if ($tr->getProduct()->isIntercambiable()) {
                                echo "<p class=\"text-right\"> <small>Producto Intercambiable </small></p>";
                            } else {
                                echo "<p class=\"text-right\"> <small> Costo: Q." . $tr->getProduct()->getPrice() . "</small></p>";
                            }
                            echo "</div>";
                            echo "<div class=\"card-footer text-right\">";
                            echo "            <small>" . " publicado en " . $tr->getDate() . "</small>";
                            echo "</div>";
                            echo "</div> <br>";
                        }
                        ?>

                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">Ultimos Tradeos:</div>
                    <div class="card-body" style="max-height: 350px; overflow-y: auto;">

                        <?php
                        $trades = getLatestTrades();
                        foreach ($trades as $tr) {
                            echo "<div class=\"card\">";
                            echo "<div class=\"card-header\">";
                            echo "            <h4> Producto intercambiado: " . $tr->getOffer()->getPost()->getProduct()->getName() . "</h4>";
                            if ($tr->getType() == 0) {
                                echo "            <h5><small> por: " . $tr->getOffer()->getPaidProduct()->getName() . "</small></h5";
                            } else {
                                echo "            <h5><small> por: Q. " . $tr->getOffer()->getAmount() . "</small></h5";
                            }
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"card-body\">";
                            if ($tr->getType() == 0) {
                                echo "    <h5 class=\"card-title\"> Intercambio </h5>";
                            } else {
                                echo "    <h5 class=\"card-title\"> Venta </h5>";
                            }

                            echo $tr->getOffer()->getMessage();
                            echo "</div>";
                            echo "<div class=\"card-footer text-right\">";
                            echo "            <small>" . " Aceptado el " . $tr->getDate() . "</small>";
                            echo "</div>";
                            echo "</div> <br>";
                        }
                        ?>

                    </div>
                </div><br>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <?php
        include '../includes/footer.php';
        ?>
    </div>
</body>



</html>