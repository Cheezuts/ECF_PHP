<?php
if (isset($_GET['p_id'])) {
    $the_serv_id = escape($_GET['p_id']);
}

$query = "SELECT * FROM services WHERE serv_id = $the_serv_id";
$select_services_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_services_by_id)) {
    $serv_id = $row['serv_id'];
    $serv_titre = escape($row['serv_titre']);
    $serv_image = escape($row['serv_image']);
    $serv_contenu = escape($row['serv_contenu']);
}

if (isset($_POST['update_serv'])) {
    $serv_titre = escape($_POST['titre']);
    $serv_image = escape($_FILES['image']['name']);
    $serv_image_temp = escape($_FILES['image']['tmp_name']);
    $serv_contenu = nl2br(escape($_POST['contenu']));

    move_uploaded_file($serv_image_temp, "../images/$serv_image");

    if (empty($serv_image)) {
        $query = "SELECT * FROM services WHERE serv_id = $the_serv_id";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $serv_image = $row['serv_image'];
        }
    }

    $query = "UPDATE services SET ";
    $query .= "serv_titre = '{$serv_titre}', ";
    $query .= "serv_image = '{$serv_image}', ";
    $query .= "serv_contenu = '{$serv_contenu}' ";
    $query .= "WHERE serv_id = {$the_serv_id} ";

    $update_serv = mysqli_query($connection, $query);

    confirmQuery($update_serv);
    echo "<p class='bg-success'>Service mis à jour! <a href='services.php?p_id={$the_serv_id}'>Retour à tous les services</a> ou retourner à l'<a href='index.php'>ACCUEIL</a></p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre</label>
        <input value="<?php echo $serv_titre ; ?>" type="text" class="form-control" name="titre">
    </div> 
        
    <div class="form-group">        
        <img width="100" src="../images/<?php echo $serv_image ; ?>" alt="">
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_content">Contenu</label>
        <textarea class="form-control "name="contenu" id="" cols="30" rows="10"><?php echo $serv_contenu ; ?></textarea>
    </div>
    
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_serv" value="Editer ">
    </div>


</form>

