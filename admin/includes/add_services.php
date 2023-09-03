<?php

    if(isset($_POST['create_service'])) {
        
                $serv_titre        = ($_POST['titre']);
                
                $serv_image        = ($_FILES['image']['name']);
                $serv_image_temp   = ($_FILES['image']['tmp_name']);
                
                $serv_contenu      = ($_POST['contenu']);
        
                
                
            move_uploaded_file($serv_image_temp, "../images/$serv_image" );
            
            
            $query = "INSERT INTO services(serv_titre, serv_image, serv_contenu) ";

            $query .= "VALUES('{$serv_titre}','{$serv_image}','{$serv_contenu}') ";

            $create_service_query = mysqli_query($connection, $query);
            
            confirmQuery($create_service_query);
            
            header("Location: services.php");

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
        <textarea class="form-control "name="contenu" id="" cols="30" rows="10">
        </textarea>
    </div>
    
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_service" value="Publier">
    </div>


</form>