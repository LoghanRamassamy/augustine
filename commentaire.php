<?php

	require_once('inc/bdd_conf.php');
	require_once('inc/fonctions.php');

if (empty($_SESSION['authlevel']) || $_SESSION['authlevel'] < 2) {
  header('Location: index.php');
  exit();
}

print_r($_SESSION);
?>
