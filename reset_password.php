<?php include 'components/header.php'?>

<body>
    <?php include 'components/navbar.php' ?>
    <form action="includes/reset-request.inc.php" method="post">
        <div class="row">
            <div class="col s12 m8 l4 offset-m2 offset-l4">
                <div class="card">

                    <div class="card-action deep-purple lighten-1 white-text">
                        <h3>Reset password</h3>
                    </div>

                    <div class="card-content">
                        <div class="form-field">
                            <label>An email will be sent to you with instructions on how to change your
                                password.</label>
                        </div><br>

                        <div class="form-field">
                            <?php if (isset($_GET['success'])) { ?>
                            <p class="error"><?php echo "Check your email!"; ?></p>
                            <?php } ?>
                        </div><br>

                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                        </div><br>

                        <div class="form-field">
                            <button name="reset_request_btn" type="email"
                                class="btn-large deep-purple waves-effect waves-dark"
                                style="width:100%;">Submit</button>
                        </div><br>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>
<?php include 'components/footer.php' ?>

</html>