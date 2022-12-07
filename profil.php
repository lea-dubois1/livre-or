<?php

require('conect_bdd.php');

$error = "";
$ok = 0;

if(isset($_POST['submit'])) {

    // Set variables to use in the following request.
    $login = $_SESSION['login'];
    $loginNew = $_POST['login'];

    $passwordTrue = $_SESSION['password'];
    $password = $_POST['old-password'];
    $passwordNew = $_POST['new-password'];
    $passwordNewConfirm = $_POST['confirm-password'];

    // Colect all datas from the user
    $sql = "select * from utilisateurs where login = '$login'";
    $rs = mysqli_query($db,$sql);
    $numRows = mysqli_num_rows($rs);


    if(password_verify($password,$passwordTrue)){
        
        if (!empty($passwordNew)){

            if(strlen($passwordNew) <= 5){    // If the password's lenght is less or equal to 5

                $error = "The password is too short";

            }elseif (empty($passwordNewConfirm)){

                $error = "Please confirm password";

            }elseif(($passwordNew != $passwordNewConfirm)) {    // If the password is different than the password's confirmation

                $error = "The passwords are differents";

            }else{

                // Cripting the new password
                $hash = password_hash($passwordNew, PASSWORD_DEFAULT);

                $sqlPass = "update utilisateurs set password = '$hash' where login = '$login'";
                $rs = mysqli_query($db,$sqlPass);
                $_SESSION['password'] = $hash;
                $ok = 1;

            }

        }
        
        if ($login != $loginNew){
            if($numRows!=1){

                $error = "The login already exist";

            }elseif(strlen($login) <= 5){    // If the login's lenght is less or equal to 5

                $error = "The login is too short";

            }elseif(preg_match("[\W]", $loginNew)){    // If there is non-alphanumeric characters in the login

                $error = "Specials characters are not allowed";

            }else{

                $sqlLog = "update utilisateurs set login = '$loginNew' where login = '$login'";
                $rs = mysqli_query($db,$sqlLog);
                $_SESSION['login'] = $loginNew;
                $ok = 1;

            }

        }
        
    }else{

        $error = "Wrong password";

    }
}

?>













<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Change profile</title>
    </head>

    <body>
        <?php include 'header.php' ?>

        <main>

            <div class="centre">

                <h2 class="title_change">CHANGE PROFILE</h2>

                <form action="" method="POST" class="formulaire">

                    <div class="group">      
                        <input type="text" name="login" value="<?php {echo $_SESSION['login'];} ?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Login</label>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="old-password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="new-password" placeholder="New password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="confirm-password" placeholder="Confirm new password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>

                    <button name="submit"><span>Edit</span></button>
                    
                    <?php

                        if($error) {echo '<strong>Error!</strong> '. $error;}

                        if($ok >= 1) {echo "<strong>Success!</strong> Your profil have been edited successfully";}

                    ?>

                </form>

            </div>

        </main>
    </body>
</html>