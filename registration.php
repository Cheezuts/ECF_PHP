<?php
include "includes/db.php";
include "includes/header.php";

// Fonction username_exists
function username_exists($username) {
    global $connection;
    $query = "SELECT user_email FROM admins WHERE user_email = '$username'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    return mysqli_num_rows($result) > 0;
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        if (username_exists($email)) {
            echo '<div class="alert alert-warning text-center">
                    <strong>Attention!</strong> Cet email existe déjà.
                </div>';
        } else {
            // Vérification de la compatibilité Blowfish
            $hash = password_hash($password, PASSWORD_BCRYPT);
            if ($hash === false) {
                die("L'algorithme Blowfish n'est pas pris en charge par votre installation de PHP.");
            }

            $query = "INSERT INTO admins (user_email, user_password, user_role) ";
            $query .= "VALUES ('$email', '$hash', 'user' ) ";
            $register_user_query = mysqli_query($connection, $query);
            if (!$register_user_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            $message = "Votre inscription a bien été prise en compte !";
        }
    } else {
        echo '<div class="alert alert-warning text-center">
                <strong>Attention!</strong> Tous les champs doivent être remplis.
            </div>';
        $message = "";
    }
}

?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Inscription</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <?php if (!empty($message)) : ?>
                                <div class="alert alert-success text-center">
                                    <strong>Succès!</strong> <?php echo $message; ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="votre@email.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Votre mot de passe">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Inscription">
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <hr>
</div>

<?php include "includes/footer.php"; ?>