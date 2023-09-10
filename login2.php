<div class="container">
    <?php
    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";
    ?>


<?php

    if(isset($_POST['login'])) {

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $query = "SELECT * FROM admins WHERE user_email = '{$user_email}'";
        $select_user_query = mysqli_query($connection, $query);

        if(!$select_user_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query)) {
            $db_user_id = $row['user_id'];
            $db_user_email = $row['user_email'];
            $db_user_password = $row['user_password'];
            $db_user_role = $row['user_role'];
        }

        if($user_email !== $db_user_email && $user_password !== $db_user_password) {
            header("Location: ../index.php");
        } else if($user_email == $db_user_email && $user_password == $db_user_password) {
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['user_role'] = $db_user_role;
            header("Location: ../admin");
        } else {
            header("Location: ../index.php");
        }
    } 
    
    ?>

    <!-- Page Content -->


    <h2 class="text-center">Horaires</h2>
    <?php include "includes/horaires.php" ?>

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>

</div>

<!-- nom prénom , e-mail , téléphone, message + sujet formulaire = annonce
A CONTINUER PLUS TARD
-->