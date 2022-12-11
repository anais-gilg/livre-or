<?php 
    session_start();

    // db connect
    require("include/dbconnect.php"); 

    $viewdb = mysqli_query($connect, "SELECT login, commentaire, date FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id  ORDER BY date DESC");
    $showdb = $viewdb -> fetch_all();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Livre d'or</title>
    </head>

    <body>
  
        <?php require("include/header.php"); ?>
            
        <main>
            
            <section class="csc">
                <?php 
                foreach($showdb as $key => $value) {
                ?>  
                
                <div class='post'>

                    <p class='titrepost'> 
                        Posted by <?php echo $value[0]; ?> the <?php echo $value[2] ?>
                        
                    </p>          
                        
                    <p class='com'>
                        <?php echo $value[1]; ?>
                        <br><br>
                    </p>

                    <hr>

                </div>

                <?php } ?>
            </section>

        </main>

        <?php require("include/footer.php")?>

    </body>
</html>