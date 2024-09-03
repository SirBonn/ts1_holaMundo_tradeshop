<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>

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

    <section class="hero is-ghost is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <form method="post" class="box">
                            <div class="field">
                                <label for="" class="label">Email</label>
                                <div class="control has-icons-left">
                                    <input name="username" type="text" placeholder="" class="input">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input name="password" type="password" placeholder="*******" class="input">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="" class="checkbox">
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </div>

                            <div class="field">
                                <button name="succesBtn" class="button is-success">
                                    Login
                                </button>
                                <a name="cancelBtn" class="button is-danger" href="../../../index.php">
                                    cancel
                                </a>
                            </div>
                        </form>
                        <?php
                        include '../../controller/logincontroller.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>s
</body>

</html>