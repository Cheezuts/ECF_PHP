<?php
if (isset($_POST['create_user'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];
    
    // Assurez-vous de valider et sécuriser les données entrées par l'utilisateur avant de les utiliser dans la requête SQL
    
    $query = "INSERT INTO admins (user_email, user_password, user_role) ";
    $query .= "VALUES ('$user_email', '$user_password', '$user_role')";
    $create_user_query = mysqli_query($connection, $query);
    
    // Vérifiez si la requête d'insertion a réussi
    
    if ($create_user_query) {        
        header("Location: users.php");
    } else {
        confirmQuery($create_user_query);
    }
}
?>

<!-- Formulaire de création d'utilisateur -->
<form method="post" action="">
    <div class="form-group">
        <label for="user_email">E-mail:</label>
        <input type="email" class="form-control" name="user_email" required>
    </div>
    <div class="form-group">
        <label for="user_password">Mot de passe:</label>
        <input type="password" class="form-control" name="user_password" required>
    </div>
    <div class="form-group">
        <label for="user_role">Rôle:</label>
        <select class="form-control" name="user_role">
            <option value="user">Selectioner un role</option>
            <option value="user">Utilisateur</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Créer Utilisateur">
    </div>
</form>