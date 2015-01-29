<?php 

    include_once('inc/bdd_conf.php'); // inclut le fichier bdd_conf.php
    include_once('inc/fonctions.php');

if (isset($_POST['username'])) 
{
    // est-ce un utilisateur du système ?
    $user = getUserByNamePw($_POST['username'], $_POST['password']);
    if ($user)
    {
        $_SESSION['id'] = $user['id'];
        $_SESSION['user'] = $user['name'];
        $_SESSION['authlevel'] = $user['authlevel'];
        $_SESSION['pass'] = $user['pass'];
    }
}
header('Location: index.php');

?>