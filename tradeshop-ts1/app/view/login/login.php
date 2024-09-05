<!DOCTYPE html>

<html lang="en">


<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <script src="../../../public/Js/modal-settings.js"></script>

</head>

<body>

    <?php
    include '../includes/navbar.php';
    ?>

    <section class="hero is-ghost is-fullheight">

        <?php
        session_start();

        if (isset($_SESSION["error_message"])) {
            echo '<div class="notification is-danger">
        <button class="delete"></button>
        ' . $_SESSION["error_message"] . '
        </div>';
            unset($_SESSION["error_message"]);
        }
         session_destroy();
        ?>

        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <form method="post" action="../../controller/logincontroller.php" class="box">
                            <div class="field">
                                <label for="" class="label">Email</label>
                                <div class="control has-icons-left">
                                    <input name="username" type="text" placeholder="usernanme" class="input">
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
                            <div class="field text-right">
                                <a class="js-modal-trigger" data-target="register-modal">
                                    Open JS example modal
                                </a>
                            </div>

                            <div class="field text-center">
                                <button name="succesBtn" class="button is-success">
                                    Login
                                </button>
                                <a name="cancelBtn" class="button is-danger" href="../../../index.php">
                                    cancel
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="register-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close"></button>
            </header>

            <section class="modal-card-body">
                <form method="post" action="../../controller/singinController.php">
                    <div class="field">
                        <label class="label">DPI</label>
                        <div class="control">
                            <input name="dpi" class="input" type="number" placeholder="Text input">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Username</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="username" class="input" type="text" placeholder="Text input">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="password" class="input" type="text" placeholder="Text input">
                        </div>
                    </div>

                    <div class="field">
                    <label class="label">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="email" class="input" type="email" placeholder="Text input">
                        </div>
                    </div>
                    <div class="field">
                    <label class="label">Nacimiento</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="birthdate" class="input" type="date">
                        </div>
                    </div>

            </section>
            <footer class="modal-card-foot">
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <a class="button is-link is-light">Cancel</a>
                    </div>
                </div>
            </footer>
            </form>
        </div>
    </div>
</body>

</html>