<?php
require_once('bdd_conf.php');

// f_utilis.php
function getGet($cle, $valDefault = ''){
  $value = (isset($_GET[$cle]) ? $_GET[$cle] : $valDefault);     
  // $value = htmlspecialchars($value, ENT_QUOTES); // Protège des injections HTML
  return trim($value); // supprime les blancs aux extrémités
}

function getPost($cle, $valDefault = ''){
  $value = (!empty($_POST[$cle]) ? $_POST[$cle] : $valDefault);     
  // $value = htmlspecialchars($value, ENT_QUOTES); // Protège des injections HTML
  return trim($value); // supprime les blancs aux extrémités
}

// f_commentaire.php; 
function getCommentairesByIdActualite($idActu) {
  global $pdo;

  $query = 'SELECT * FROM commentaire WHERE idActu=:id ORDER BY id DESC'; 
  $prep = $pdo->prepare($query);

  $prep->bindValue(':id', $idActu);
  $prep->execute();

  $commentaires = $prep->fetchAll();

  $prep->closeCursor();
  $prep = NULL;

  return $commentaires;
}

//f_actualite.php; permet d'afficher les actualités contenues dans la base de donnée.
function getLastActualite() {
  global $pdo;
  $query = 'SELECT * FROM actualite ORDER BY id DESC LIMIT 1'; 
  $prep = $pdo->prepare($query);

  $prep->execute();
  $actu = $prep->fetch();

  $prep->closeCursor();
  $prep = NULL;

  return $actu;
}

////////////// USER MANAGER ///////////////////////////////////////////////////////////

/**
* permet la création d'un utilisateur à partir de données présentes dans $_POST
* @return true si le SGBDR n'a rencontré une erreur à l'exécution de l'ordre SQL
*         false sinon  
*/
function createUser(){
   $username = getPost('username');
   $pw = getPost('password');
   $authlevel = getPost('authlevel');

   // TODO faire quelques vérfications ici

   $sql = "INSERT INTO augustine2_user VALUE('','" 
          . $username 
          . "','" 
          . $pw 
          . "','" 
          . $authlevel 
          . "')";
   // print($sql); return false;
   $res = mysql_query($sql); // or die(mysql_error());
   
   return $res; // voir API mysql_query pour connaitre le sens de la valeur retournée
}

function getUserByNamePw($name, $pw) {
  //TODO
  $user = array('id'=>1, 'name'=>'testName', 'authlevel'=> 3, 'pass'=>'pass');
  return $user;
}

// LA SUITE ICI ...

?>
