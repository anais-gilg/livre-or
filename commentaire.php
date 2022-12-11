<?php
    session_start();

    require("include/dbconnect.php");

    #----------------creation of a variable for error messages ----------------#
    $msgError = "";
    $msgSuccess = "";

    #----------------When you press the buton----------------#
    if(isset($_POST['envoyer'])){

        #----------------Check if the fields are filled in----------------#
        if(!empty($_POST['comment'])){

            #----------------Security----------------#
            // htmlspecialchars is for security so that nobody can insert
            // an html or javascript code in this field and thus make an attack Cross-Site Scripting
            $com = htmlspecialchars($_POST['comment']);
            $idUser = $_SESSION['id'][0];
            // time zone and date/time format to be used to insert it in the db
            date_default_timezone_set('Europe/Paris');
            $date = date('Y/m/d H:i:s');

            
            // allows to add special characters such as the apostrophe in the db
            $com = mysqli_real_escape_string($connect, $_POST['comment']);


                #----------------Add user in db----------------#
                if(strlen($com) >= 10){
                    $insertCom = $connect -> query("INSERT INTO `commentaires` (`commentaire`, `id_utilisateur`, `date`) VALUES ('$com', '$idUser', '$date')");
                    $msgSuccess = "the comment has been taken into account";
                }
                else{
                    $msgError = "Your comment has not been taken into account, <br> it must be at least 10 characters long";
                }

        }
                
    }

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Comment</title>
    </head>

    <body>

        
        <?php require("include/header.php"); ?>
        

        <main>

            <div class="otherpage">
                <h1 class="commeth1">Comment</h1>

                <p class="msgsuccess"><?php echo $msgSuccess; ?></p>
                <p class="msgerror"><?php echo $msgError;  ?></p>

                <form action="" method="post" id="from" class="bref" >
                    <div class="newinfo">
                        <textarea class="bloccomment" name="comment" id="" cols="30" rows="10" placeholder="Enter your text here :)" required></textarea>
                        <input class="submit" type="submit" name="envoyer" value="Enter" id="buton">
                    </div>
                </form>
            </div>
        </main>

        <?php require("include/footer.php")?>

    </body>

</html>