<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Home</title>
    </head>

    <body>
        <?php include 'header.php' ?>
        <?php if (session_status() == PHP_SESSION_NONE){ session_start();} ?>

        <main>

            <div class="centre">

                <h1 class="welcome">HELLO <?php if($_SESSION){echo '&nbsp' . strtoupper($_SESSION['login']);} ?> </h1>
                <p>WELCOME TO MY GOLDEN BOOK</p>
                <p>FEEL FREE TO LEAVE A COMMENT</p>

            </div>

        </main>
    </body>
</html>
