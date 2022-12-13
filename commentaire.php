<?php

require('conect_bdd.php');

$error = "";
$ok = 0;


if(isset($_POST['submit'])) {

    if($_POST['commentaire'] == null){

        $error = "The comment is empty. Please write something.";

    }else{

        $comm = htmlspecialchars($_POST['commentaire']);
        $comm1 = nl2br ($comm);
        $id = $_SESSION['id'];

        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$comm1', '$id', '$date')";
    
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

            <div class="centre">

                <form action="" method="POST" class="formulaire comm">
                    <textarea name="commentaire" rows="10" cols="60" placeholder="Write your comment here..."></textarea>

                    <div class="frame">
                        <button class="custom-btn btn-4" name="submit">Send</button>
                    </div>
                </form>

                <?php

                    if($error) {echo '<strong>Error!</strong> '. $error;}

                    if($ok >= 1) {echo "<strong>Success!</strong> Your comment have been sent successfully";}

                ?>

            </div>

        </main>
    </body>
</html>
