<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
    </head>

    <header>

        <nav>

            <?php if (session_status() == PHP_SESSION_NONE){ session_start();} ?>

            <!--    Made by Erik Terwan    -->
            <!--   24th of November 2015   -->
            <!--        MIT License        -->
            <nav role="navigation">
            <div id="menuToggle">
                <!--
                A fake / hidden checkbox is used as click reciever,
                so you can use the :checked selector on it.
                -->
                <input type="checkbox" />
                
                <!--
                Some spans to act as a hamburger.
                
                They are acting like a real hamburger,
                not that McDonalds stuff.
                -->
                <span></span>
                <span></span>
                <span></span>
                
                <!--
                Too bad the menu has to be inside of the button
                but hey, it's pure CSS magic.
                -->
                <ul id="menu">
                <a href="index.php"><li>Home</li></a>
                <?php if(!$_SESSION){echo '<a href="inscription.php"><li>Signup</li></a>';} ?>
                <?php if(!$_SESSION){echo '<a href="connexion.php"><li>Login</li></a>';} ?>
                <?php if($_SESSION){echo '<a href="profil.php"><li>Profile</li></a>';} ?>
                <a href="livre-or.php"><li>Golden Book</li></a>
                <?php if($_SESSION){echo '<a href="commentaire.php"><li>Comment</li></a>';} ?>
                <a href="https://github.com/lea-dubois1" target="_blank"><li>My GitHub</li></a>
                <?php if($_SESSION){echo '<a value="deconnexion" name="deconnexion" href="logout.php"><li>Logout</li></a>';} ?>
                </ul>
            </div>
            </nav>



            <!-- <a class="lien" href="index.php">Home</a>
            <a class="lien" href="connexion.php">Login</a>
            <a class="lien" href="inscription.php">Signup</a>
            <a class="lien" href="profil.php">Profile</a>
            <a class="lien" href="livre-or.php">Golden Book</a>
            <a class="lien" href="commentaire.php">Add comment</a> -->

            <?php /* if(!$_SESSION){echo '<a class="lien" href="connexion.php">Login</a>';} ?>
            <?php if(!$_SESSION){echo '<a class="lien" href="inscription.php">Signup</a>';} ?>
            <?php if($_SESSION){echo '<a class="lien" href="profil.php">Profile</a>';} */ ?>
        </nav>
    </header>
</html>