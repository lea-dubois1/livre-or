<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Golden Book</title>
    </head>

    <body>
        <?php require 'conect_bdd.php' ?>
        <?php include 'header.php' ?>

        <main>

            <div class="centre livreor">

                <h2>Comments</h2>


                <?php 
                                            
                    $sql = "SELECT * FROM utilisateurs INNER JOIN commentaires WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC";
                    $rs = mysqli_query($db,$sql);
                    $result = mysqli_fetch_assoc($rs);
                    $dateOld = $result['date'];
                    $date =  date('d-m-Y', strtotime($dateOld));

                    echo '<div class="flou">';
                        while ($result !=NULL){

                            echo '<br>POST THE ' . $date . ' BY ' . $result['login'] . ' :<br><br>';
                            echo $result['commentaire'] . '<br><br><div class="border"></div>';

                            $result = mysqli_fetch_assoc($rs);
                            echo '</tr>';
                        }
                    echo '</div>';

                    echo '<br>'
                ?>

                <?php if($_SESSION){echo '<div class="frame"> <a href="commentaire.php"><button class="custom-btn btn-4">Comment</button></a> </div><br>';} ?>

            </div>

        </main>
    </body>
</html>





