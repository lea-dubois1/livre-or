<?php

require('conect_bdd.php');

$error = "";
$ok = 0;


if(isset($_POST['submit'])) {

    if($_POST['commentaire'] == null){

        $error = "The comment is empty. Please write something.";

    }else{

        $comm = $_POST['commentaire'];
        $id = $_SESSION['id'];

        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$comm', '$id', '$date')";
    
        $result = mysqli_query($db, $sql);

        $ok = 1;
    }

}

?>











<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Comment</title>
    </head>

    <body>
        <?php include 'header.php' ?>

        <main>

            <div>

                <form action="" method="POST" class="formulaire">
                    <textarea name="commentaire" rows="10" cols="65" placeholder="Write your comment here..."></textarea>

                    <button name="submit">Send</button>
                </form>

                <?php

                    if($error) {echo '<strong>Error!</strong> '. $error;}

                    if($ok >= 1) {echo "<strong>Success!</strong> Your profil have been edited successfully";}

                ?>

            </div>
            
        </main>
    </body>
</html>
