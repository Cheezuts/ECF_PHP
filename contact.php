<div class="container">
    <?php
    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";
    ?>


    <?php
    
    if(isset($_POST['envoyer'])) {
        $to = "tarasksoad@hotmail.com";
        $subject = $_POST['com_sujet'];
        $nom = $_POST['com_nom'];
        $prenom = $_POST['com_prenom'];
        $email = $_POST['com_email'];
        $telephone = $_POST['com_telephone'];
        $message = $_POST['com_message'];
        
        $body = "Nom: $nom\n";
        $body .= "Prénom: $prenom\n";
        $body .= "E-mail: $email\n";
        $body .= "Téléphone: $telephone\n";
        $body .= "Message:\n$message";
        
        $headers = "From: $email";
        
        if(mail($to, $subject, $body, $headers)) {
            echo "Message envoyé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi du message.";
        }
    }  
    ?>

    <!-- Page Content -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4 class="text-center">Laissez un commentaire :</h4>

            <form action="" method="post" role="form" class="form">

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="com_nom" placeholder="Votre nom">                
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="com_prenom" placeholder="Votre prénom">
                </div>

                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" class="form-control" id="email" name="com_email" placeholder="Votre e-mail">
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="text" class="form-control" id="telephone" name="com_telephone" placeholder="Votre téléphone">
                </div>

                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea class="form-control" id="message" name="com_message" rows="3" placeholder="Votre message"></textarea>
                </div>

                <div class="form-group">
                    <label for="sujet">Sujet du formulaire (annonce) :</label>
                    <input type="text" class="form-control" id="sujet" name="com_sujet" placeholder="Sujet du formulaire">
                </div>

                <button type="submit" name="envoyer" id="envoyer" class="btn btn-primary">Envoyer</button>

            </form>
        </div>
    </div>

    <h2 class="text-center">Horaires</h2>
    <?php include "includes/horaires.php" ?>

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>

</div>

<!-- nom prénom , e-mail , téléphone, message + sujet formulaire = annonce
A CONTINUER PLUS TARD
-->