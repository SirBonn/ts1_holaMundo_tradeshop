<?php
require_once __DIR__ . '/../../config/routes.php';
require_once __DIR__ . '/../../model/User.php';
require_once __DIR__ . '/../../config/db_conection.php';

if (isset($_SESSION["usr"])) {
    echo '
<header class="bg-dark site-header py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2 text-white" href=' . getMain() . ' aria-label="Product">
                TRADESHOP
            </a>
        <div class="btn-group">
            <button type="button" class="btn btn-white text-white" disabled>'. $_SESSION["usr"]->getUsername()  .'</button>
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href='. getLogin() . '>Cerrar Sesion</a>
            </div>
        </div>
        </nav>
    </header>';
} else {
    echo '
<header class="bg-dark site-header py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href=' . getMain() . ' aria-label="Product">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img"
                    viewBox="0 0 24 24">
                    <title>Product</title>
                    <circle cx="12" cy="12" r="10" />
                    <path
                        d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                </svg>
            </a>
            <a class="py-2 d-none d-md-inline-block" href=' . getMain() . '>Regresar</a>
        </nav>
    </header>';
}
