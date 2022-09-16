<?php include 'components/header.php'?>

<body>
    <?php include 'components/navbar.php' ?>
    <form action="includes/login_check.inc.php" method="post">
        <div class="row">
            <div class="col s12 m8 l4 offset-m2 offset-l4">
                <div class="card">

                    <div class="card-action deep-purple lighten-1 white-text">
                        <h3>Login</h3>
                    </div>

                    <div class="card-content">
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="red-text"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <div class="form-field">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username">
                        </div><br>

                        <div class="form-field">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password">
                        </div><br>

                        <div class="form-field">
                            <label>
                                <input type="checkbox" />
                                <span>Remember me</span>
                            </label>
                        </div><br>

                        <div class="form-field">
                            <button class="btn-large deep-purple waves-effect waves-dark"
                                style="width:100%;">Login</button>
                        </div><br>

                        <div class="form-field">
                            <label for="register">Forgot your <a href="reset_password.php">password</a>?</label>
                        </div><br>

                        <div class="form-field">
                            <label for="register">New to <?php echo $site_name?>? Create an account <a
                                    href="register.php">here</a></label>
                        </div><br>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>
<?php include 'components/footer.php' ?>

</html>