<?php include "includes/admin_header.php"; ?>

<?php 
if(isset($_SESSION['user_email'])) {

    $user_email = $_SESSION['user_email'];

    $query = "SELECT * FROM admins WHERE user_email = '{$user_email}'";
    $select_user_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
    }
}

?>

<?php
if(isset($_POST['edit_user'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];    

    $query = "UPDATE admins SET ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "WHERE user_email = '{$user_email}'";
    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);

    header("Location: users.php");
}
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Mon profil
                            <small><?php echo $_SESSION['user_email'] ;?></small>
                    </h1>

<form action="" method="post">
    <div class="form-group">
        <label for="user_email">E-mail:</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email" required>
    </div>
    <div class="form-group">
        <label for="user_password">Mot de passe:</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password" required>
    </div>
    <div class="form-group">
        <label for="user_role">Rôle:</label>
        <select class="form-control" name="user_role">
            <option value="user" <?php if ($user_role == 'user') echo "selected"; ?>>Utilisateur</option>
            <option value="admin" <?php if ($user_role == 'admin') echo "selected"; ?>>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Editer Profil">
    </div>
</form>
                    

                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <?php include "includes/admin_footer.php"; ?>