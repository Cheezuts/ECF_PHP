<?php
if (isset($_GET['user_id'])) {
    $the_user_id = $_GET['user_id'];
    $query = "SELECT * FROM admins WHERE user_id = $the_user_id";
    $select_users_query = mysqli_query($connection, $query);
    confirmQuery($select_users_query);
    while ($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row['user_id'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
    }
}

if (isset($_POST['update_user'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];

    // Hachage du mot de passe
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

    $query = "UPDATE admins SET ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "WHERE user_id = {$the_user_id}";

    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);

    echo '<div class="alert alert-success text-center">
    <strong>Votre modification a été effectuée ! </strong>
    <a href="users.php">Retour à la liste des utilisateurs</a> |
    <a href="index.php">Retour à l\'accueil</a>
    </div>';
}
?>

<form action="" method="post">
    <div class="form-group">
        <label for="user_email">E-mail:</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email" required>
    </div>
    <div class="form-group">
        <label for="user_password">Mot de passe:</label>
        <input value="" type="password" class="form-control" name="user_password" placeholder="Saisissez un nouveau mot de passe">
    </div>
    <div class="form-group">
        <label for="user_role">Rôle:</label>
        <select class="form-control" name="user_role">
            <option value="user" <?php if ($user_role == 'user') echo "selected"; ?>>Utilisateur</option>
            <option value="admin" <?php if ($user_role == 'admin') echo "selected"; ?>>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Editer Utilisateur">
    </div>
</form>