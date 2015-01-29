<?php 

  require_once('inc/bdd_conf.php');
  require_once('inc/fonctions.php');

if (empty($_SESSION['authlevel']) || $_SESSION['authlevel'] < 3) {    
    header('Location: index.php');
    exit();
} 

/**
* TODO A/ encapsuler les blocs fonctionnels (CRUD) dans des fonctions
*      B/ faire alors appel à ces fonctions (voir exemple avec create dans fonctions.php)
*      C/ transformer les messages textuel de réponse en message flash placé dans la session
*          de l'utilisateur 
*      D/ l'appel à une fonction d'écriture dans la base de données (dans cette page)
*        devra être suivi d'une réponse de redirection (pattern PRG) vers cette page 
*/


  if ($_POST && empty($POST['id'])) {
      $username = getPost('username');
      if (createUser()) {
          $_SESSION['flash'] = "Ajout utilisateur : " . htmlspecialchars($username, ENT_QUOTES); 
           
      }else {
          $_SESSION['flash'] = "Impossible d'ajouter l'utilisateur : " . htmlspecialchars($username, ENT_QUOTES); 
      }
      header('Location: user.php');
      exit();
  }

?>

 /* old code 
    // Gestion utilisateur, suppression d'un utilisateur.
    if (isset($_GET['delete'])) {
        mysql_query('DELETE FROM augustine2_user WHERE id="' . $_GET['delete'] . '"') or die('Erreur. Il est possible que l\'utilisateur n\'existe pas.<br><br>' . mysql_error() . '');
        echo '<script type="text/javascript">alert(\'Suppression utilisateur (ID) : ' . $_GET['delete'] . '\')</script>';
    }

    // Gestion utilisateur, modification d'un utilisateur.
    if (isset($_GET['id'])) {
        mysql_query('UPDATE augustine2_user SET user="' . $_POST['username'] . '" WHERE id="' . $_GET['id'] . '"') or die(mysql_error());
        if ($_POST['password'] != "password") {
            mysql_query('UPDATE augustine2_user SET pass="' . $_POST['password'] . '" WHERE id="' . $_GET['id'] . '"') or die(mysql_error());
        }
        if (!empty($_POST['authlevel'])) // TODO securité !
            mysql_query('UPDATE augustine2_user SET authlevel="' . $_POST['authlevel'] . '" WHERE id="' . $_GET['id'] . '"') or die(mysql_error());
        echo '<script type="text/javascript">alert(\'Modification utilisateur (ID) : ' . $_GET['id'] . '\')</script>';

    }
*/

