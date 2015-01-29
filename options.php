<!DOCTYPE HTML>

<?php 

    include_once('inc/bdd_conf.php'); 
    include_once('inc/fonctions.php');
    include_once('inc/menu.php');
    include_once('inc/header.php');

?>

<html>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Options</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <ol class="breadcrumb">Modifier son mot de passe</ol>
                <div class="center" style='background:#FF6600'>
                    <form method="post" action="doChangePW.php">
                        <label>Mot de passe actuel : <input type="password" name="actuel" ></label>
                        <label>Nouveau mot de passe : <input type="password" name="nouveau" ></label>
                        <label>Verification mot de passe : <input type="password" name="verife" ></label>
                        <input type="submit" name="submit" value=" Envoyer ">
                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php include_once('inc/footer.php'); ?>

</html>