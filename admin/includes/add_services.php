<?php

if (isset($_POST['create_service'])) {
    $serv_titre = escape($_POST['titre']);
    
    $serv_image = escape($_FILES['image']['name']);
    $serv_image_temp = escape($_FILES['image']['tmp_name']);
    
    $serv_contenu = escape($_POST['contenu']);

    move_uploaded_file($serv_image_temp, "../images/$serv_image");

    $query = "INSERT INTO services (serv_titre, serv_image, serv_contenu) ";
    $query .= "VALUES ('{$serv_titre}', '{$serv_image}', '{$serv_contenu}') ";

    $create_service_query = mysqli_query($connection, $query);

    confirmQuery($create_service_query);

    $the_serv_id = mysqli_insert_id($connection);

    echo "<p class='bg-success'>Service créé ! <a href='services.php?p_id={$the_serv_id}'>Retour à tous les services</a> ou retourner à l'<a href='index.php'>ACCUEIL</a></p>";
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="titre">
    </div> 
        
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file"  name="image">
    </div>
    
    <div class="form-group">
        <label for="post_content">Contenu</label>
        <textarea class="form-control "name="contenu" id="" cols="30" rows="10"></textarea>
    </div>
    
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_service" value="Publier">
    </div>


</form>