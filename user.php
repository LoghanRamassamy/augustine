<!DOCTYPE HTML>

<?php 

    require_once('inc/bdd_conf.php');
    require_once('inc/fonctions.php');
    include_once('inc/header.php');
    include_once('inc/menu.php');

if (empty($_SESSION['authlevel']) || $_SESSION['authlevel'] < 3) {    
    header('Location: index.php');
    exit();
}

$users = array();

?>

<html>
    <body style="background-color:black;">

<?php 

      // TODO : remettre de l'ordre ci-dessous en supprimant 
      // les balises center et en utilisant des classes bootstrap twitter  

?> 
    
        <table style="width:100%;height:100%;">
            <tr>
                <td style="border:0px;width:100%;height:100%;">
                    <div style="width:500px;border:1px solid white;color:white;">
                        <p style="padding:3px;"><strong><big>Utilisateurs (<a href="index.php"><FONT
                                                 COLOR="lightgreen">Retour</font></a>)</big></strong></p>
                        <hr>
                        <div style="padding:1em;height:auto;width:auto;"><u>G&eacute;rer un utilisateur</u><br>
                            <table style="width:100%;border:0px;">
                                        <?php 
                                        foreach ($users as $s) {
                                            // Affichage des utilisateurs.
                                            echo "<tr><form action='user.php?id=" . $s['id'] . "' method='post'>";
                                            echo "<td><div style='border:1px solid white;color:white;background-color:black;width:100%;'><small>ID: " . $s['id'] . "</small></div></td>";
                                            echo "<td><input type='text' name='username' style='border:1px solid white;color:white;background-color:black;text-align:center;width:100%;' value='" . $s['name'] . "'></td>";
                                            echo "<td><input type='password' name='password' style='border:1px solid white;color:white;background-color:black;text-align:center;width:100%;' value='password'></td>";
                                            echo "<td style='width:0px;'><input type='text' name='authlevel' style='width:25px;border:1px solid white;color:white;background-color:black;text-align:center;' value='" . $s['authlevel'] . "'></td>";
                                            echo "<td><input type='submit' style='border:1px solid white;color:white;background-color:black;width:100%;' value='Modifier'></td>";
                                            if ($s['authlevel'] == 3) {
                                                echo "<td><div style='border:1px solid white;color:white;background-color:black;width:100%;'><small>--</small></div></td>";
                                            } else {
                                                echo "<td><div style='border:1px solid white;color:white;background-color:black;width:100%;cursor:pointer;' onclick='window.location = \"user.php?user&delete=" . $s['id'] . "\"'><small>&nbsp;&nbsp;Supprimer&nbsp;&nbsp;</small></div></td>";
                                            }
                                            echo "</form></tr>";                                            
                                        }
                                        ?>
                            </table>
                        </div>
                        <br><br>

                        <div style="padding:1em;height:auto;width:auto;"><u>Cr&eacute;er un utilisateur</u><br>
    <?php
    $username = getPost('username', 'username');
    $pw = getPost('password', 'password');
    $authlevel = getPost('authlevel','1');
    ?>
                            <form action="doUser.php" method="post">
                                <table style="width:100%;border:0px;">
                                    <tr>
                                        <td><input type='text' name='username'
                                                           style='border:1px solid white;color:white;background-color:black;text-align:center;width:100%;'
                                                           value='<?php echo $username; ?>'></td>
                                        <td><input type='text' name='password'
                                                           style='border:1px solid white;color:white;background-color:black;text-align:center;width:100%;'
                                                           value='<?php echo $pw; ?>'></td>
                                        <td style='width:0px;'><input type='text' name='authlevel'
                                                                              style='width:25px;border:1px solid white;color:white;background-color:black;text-align:center;'
                                                                              value='<?php echo $authlevel; ?>'></td>
                                        <td><input type='submit'
                                                           style='border:1px solid white;color:white;background-color:black;width:100%;'
                                                           value='Cr&eacute;er'></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <small>
                            <p style="text-align:justify;padding:1em;"><u>Notice</u> : Vous ne pouvez modifier
                                        qu'un utilisateur &agrave; la fois. Il s'agit d'une interface fragile. N'ex&eacute;cutez
                                        aucune action sans en connaitre les cons&eacute;quences. Renseignez vous aupr&egrave;s
                                        d'un administrateur.</p>
                            <u>Authlevel</u><br>1 => Mod&eacute;rateur<br>2 => Administrateur<br>3 =>
                                    Super-Administrateur (1 seul normalement)<br>
                        </small>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
