<?php
    
    $userConnected = false;

    if(isset ($_SESSION['id'])){
        $id = $_SESSION['id'][0];
        $userConnected = true;

        $login = $_SESSION['login'];

        $recupUser = mysqli_query($connect, "SELECT login FROM `utilisateurs` WHERE id = '$id'" );
        $correctUser = mysqli_fetch_array($recupUser);
    }

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Header</title>
    </head>

    <body>
        <div class="containerheader">
            <?php if ($userConnected == false) {?>
                
                <div class="hder2">            
                    <header>
                        <nav>
                            <ul>
                                <li><a href="http://localhost:8888/livreor/index.php">Home</a></li>
                                <li><a href="http://localhost:8888/livreor/livreor.php">Guestbook</a></li> 
                                <li><a href="http://localhost:8888/livreor/connexion.php">Log in</a></li> 
                                <li><a href="http://localhost:8888/livreor/inscription.php">Create an account</a></li>
                            </ul>
                        </nav>
                    </header>
                </div>

            <?php } else { ?>
                    
                <div class="hder2">
                    <header>
                        <nav>
                            <ul>
                                <li><a href="http://localhost:8888/livreor/index.php">Home</a></li>
                                <li><a href="http://localhost:8888/livreor/profil.php">Modification</a></li>
                                <li><a href="http://localhost:8888/livreor/commentaire.php">Comment</a></li>
                                <li><a href="http://localhost:8888/livreor/livreor.php">Guestbook</a></li> 
                                <li><a href="http://localhost:8888/livreor/include/logout.php">Logout</a></li>
                            </ul>
                        </nav>
                    <header>
                </div>
                
            <?php } ?>
        </div>

    </body>
                
</html>