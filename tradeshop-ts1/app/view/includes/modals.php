<div class="modal fade" id="completarPerfil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <?php
                    if ($trader->getName() == null || $trader->getForename() == null || $trader->getPhone() == null || $trader->getAddress() == null) {
                        echo "Completar perfil";
                    } else {
                        echo "Editar perfil";
                    }
                    ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="../../controller/userController.php" method="POST">

                    <div class="form-inline text-center">
                        <label for="email" class="mr-sm-2">DPI:</label>
                        <input readonly class="form-control mb-2 mr-sm-2" <?php echo 'value="' . $user->getDPI() . '"' ?>>
                        <label for="pwd" class="mr-sm-2">Usuario:</label>
                        <input readonly class="form-control mb-2 mr-sm-2" <?php echo 'value="' . $user->getUsername() . '"' ?>>
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre"
                            <?php
                            if ($trader->getName() != null) {
                                echo 'value="' . $trader->getName() . '"';
                            }
                            ?>>
                    </div>
                    <div class="form-group>
                        <label for=" forename">Apellido:</label>
                        <input type="text" class="form-control" name="forename" placeholder="Apellido"
                            <?php
                            if ($trader->getName() != null) {
                                echo 'value="' . $trader->getForename() . '"';
                            }
                            ?>>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono:</label>
                        <input type="text" class="form-control" name="phone" placeholder="Telefono"
                            <?php
                            if ($trader->getName() != null) {
                                echo 'value="' . $trader->getPhone() . '"';
                            }
                            ?>>
                    </div>
                    <div class="form-group>">
                        <label for=" address">Direccion:</label>
                        <input type="text" class="form-control" name="address" placeholder="Direccion"
                            <?php
                            if ($trader->getName() != null) {
                                echo 'value="' . $trader->getAddress() . '"';
                            }
                            ?>>
                    </div>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>

                <a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="agregarProducto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    Agregar producto
                </h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="../../controller/productController.php" method="POST">

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for=" forename">Descripcion:</label>
                        <textarea class="form-control" rows="5" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Precio:</label>
                        <input type="number" class="form-control" step="0.01" name="price" placeholder="Precio">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="isIntercambiable" value="0">No Intercambiable
                        </label>

                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>

                <a type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- crearOferta -->
<div class="modal fade" id="crearOferta">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    Nueva Oferta
                </h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="../../controller/offerController.php" method="POST">

                    <div class="form-group">
                        <div class="form-inline text-center flex-nowrap"">
                            <label for=" email" class="mr-sm-2">DPI:</label>
                            <input readonly class="form-control mb-2 mr-sm-2" <?php echo 'value="' . $user->getDPI() . '"' ?>>
                            <label for="pwd" class="mr-sm-2">Usuario:</label>
                            <input readonly class="form-control mb-2 mr-sm-2" <?php echo 'value="' . $user->getUsername() . '"' ?>>
                            <label for="pwd" class="mr-sm-2">Post</label>
                            <input id="postId" name="postId" readonly class="form-control mb-2 mr-sm-2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6 ">
                            <label for="name">Producto:</label>
                            <select class="custom-select" name="product" id="product">
                                <option value="0">Seleccionar producto</option>
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
                        </div>
                        <div class="col-6">
                            <label for="phone">Precio oferta:</label>
                            <input type="number" class="form-control col-4" step="0.01" name="price" placeholder="Precio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=" forename">Mensaje:</label>
                        <textarea class="form-control" rows="5" name="offerMessage"></textarea>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>

                <a type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal" id="inventaryView">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Inventario</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="row container">
                    <?php

                    $prods = getInventory($trader->getDPI());
                    if ($prods != null) {
                        foreach ($prods as $prod) { ?>
                            <div class="col-4">
                                <div class="card" style="width:300px; margin-bottom:20px;">
                                    <div class="card-body disabled btn-outline-secondary">
                                        <h4 class="card-title"> <?php echo $prod->getName() ?></h4>
                                        <p class="card-text"><?php echo $prod->getDescription() ?></p>
                                        <a href="#" class="btn disabled btn-outline-secondary">precio: <br> Q. <?php echo $prod->getPrice() ?></a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<div class="alert alert-warning" role="alert">
                                No tienes productos en tu inventario
                              </div>';
                    }
                    ?>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="offersToMeView">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Ofertas recibidas</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="row container">
                    <?php

                    $offers = getOffersToMe($trader->getDPI());
                    if ($offers != null) {
                        foreach ($offers as $offer) { ?>

                            <div class="col-4">
                                <form action="../../controller/offerController.php" method="POST">
                                    <div class="card" style="width:300px; margin-bottom:20px;">
                                        <div class="card-body disabled btn-outline-secondary">
                                            <h4 class="card-title">Tu producto: <?php echo $offer->getPost()->getProduct()->getName() ?></h4>
                                            <input id="offer" name="offer" value=<?php echo $offer->getID() ?> readonly class="form-control mb-2 mr-sm-2"></input>
                                            <small class="card-text">Oferta:
                                                <?php
                                                if ($offer->getPaidProduct() != null) {
                                                    echo $offer->getPaidProduct()->getName();
                                                } else {
                                                    echo 'Q.' . $offer->getAmount();
                                                }
                                                ?></small><br>
                                            <small class="card-text">Negociante: <?php echo $offer->getTrader()->getName() . ' ' . $offer->getTrader()->getForeName() ?></h5>
                                                <h6>Mensaje:<br> <?php echo $offer->getMessage() ?></h6>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-outline-success" name="action" value="acept">Aceptar</button>
                                            <button type="submit" class="btn btn-outline-danger" name="action" value="decline">Rechazar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<div class="alert alert-warning" role="alert">
                                Nadie ha ofertado por tus productos
                              </div>';
                    }
                    ?>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>