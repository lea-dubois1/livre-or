<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Golden</title>
    </head>

    <body>
        <?php include 'header.php' ?>
        <?php require 'conect_bdd.php' ?>

        <main>

            <h2 class="users-data">Comments</h2>

            <?php 
                                        
                $sql = "SELECT * FROM utilisateurs INNER JOIN commentaires WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC";
                $rs = mysqli_query($db,$sql);
                $result = mysqli_fetch_assoc($rs);
                $dateOld = $result['date'];
                $date =  date('d-m-Y', strtotime($dateOld));

                while ($result !=NULL){

                    echo 'POST THE ' . $date . ' BY ' . $result['login'] . '<br>';
                    echo $result['commentaire'] . '<br><br>';

                    $result = mysqli_fetch_assoc($rs);
                    echo '</tr>';
                }
            ?>
        </main>
    </body>
</html>




