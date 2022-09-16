<?php include 'components/header.php'?>

<body>
    <?php include 'components/navbar.php' ?>
    <form action="includes/signup_check.inc.php" method="post">
        <div class="row">
            <div class="col s12 m8 l4 offset-m2 offset-l4">
                <div class="card">

                    <div class="card-action deep-purple lighten-1 white-text">
                        <h3>Register</h3>
                    </div>

                    <div class="card-content">
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="red-text"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                        <p class="green-text"><?php echo $_GET['success']; ?></p>
                        <?php } ?>

                        <div class="form-field">
                            <label for="email">Email</label>
                            <?php if (isset($_GET['email'])) { ?>
                            <input type="text" name="email" value="<?php echo $_GET['email']; ?>"><br>
                            <?php }else{ ?>
                            <input type="text" name="email"><br>
                            <?php }?>
                        </div><br>

                        <div class="form-field">
                            <label for="username">Username</label>
                            <?php if (isset($_GET['uname'])) { ?>
                            <input type="text" name="uname" value="<?php echo $_GET['uname']; ?>"><br>
                            <?php }else{ ?>
                            <input type="text" name="uname"><br>
                            <?php }?>
                        </div><br>

                        <div class="form-field">
                            <label for="username">Wallet address</label>
                            <?php if (isset($_GET['waddress'])) { ?>
                            <input type="text" name="waddress" value="<?php echo $_GET['waddress']; ?>"><br>
                            <?php }else{ ?>
                            <input type="text" name="waddress"><br>
                            <?php }?>
                        </div><br>

                        <div class="form-field">
                            <label for="username">Aadhaar</label>
                            <?php if (isset($_GET['aadhaar'])) { ?>
                            <input type="text" name="aadhaar" value="<?php echo $_GET['aadhaar']; ?>"><br>
                            <?php }else{ ?>
                            <input type="text" name="aadhaar"><br>
                            <?php }?>
                        </div><br>

                        <div class="form-field">
                            <label for="password">Password</label>
                            <input name="password" type="password" id="password">
                        </div><br>

                        <div class="form-field">
                            <label for="re_password">Confirm Password</label>
                            <input name="re_password" type="password" id="re_password">
                        </div><br>

                        <div class="form-field">
                            <label for="role">Role</label>
                            <select name=role class="browser-default" require>
                                <option value="1">Seller</option>
                                <option value="2">Buyer</option>
                            </select>

                        </div><br>

                        <div class="form-field">
                            <button class="btn-large deep-purple waves-effect waves-dark"
                                style="width:100%;">Register</button>
                        </div><br>

                        <div class="form-field">
                            <label for="login">Already a member? <a href="login.php">Login</a></label>
                        </div><br>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>
<?php include 'components/footer.php' ?>

</html>