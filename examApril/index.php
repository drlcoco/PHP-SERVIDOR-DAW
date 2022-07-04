<!-- In this page, you will have to create new php tags, like <?php  ?> to add new code-->
<?php
session_start(); // This permits to continue session.
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
/**
 * This function checks if a checkbox was selected after the form is submitted.
 */
function checkSport($sport)
{
    if(isset($_POST["sports"]) && in_array($sport, $_POST["sports"])){
        echo "checked";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partial exam April</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div id="contenido">
        <div>
            <p><a href="logout.php"><button class="button">Log out</button></a></p>

            <?php
                if(isset($_POST["send"]) && isset($_POST["sports"]) && !empty(trim($_POST["comments"])) && strlen       ($_POST["comments"]) !== 0 && trim($_POST["comments"]) != ""){
                    $sports = $_POST["sports"];
                    $comments = $_POST["comments"];
                    if(count($sports) == 1){
                        echo "<h1>There are ".count($sports)." Sport</h1>";
                    }else{
                        echo "<h1>There are ".count($sports)." Sports</h1>";
                    }
                    
                    echo "<h1>There are ".strlen(trim($_POST["comments"]))." Characters</h1>";
                    ?> </br><p><a href="index.php"><button class="button">Come Back</button></a></p> <?php
                
                    
                }else{
            ?>

            <form action="" method="post">
                <h3> Welcome, ! </h3>
                <label for="sports"><b>*</b> Sports: </label>
                <span class="caja">
                    <input type="checkbox" name="sports[]" value="BS" <?php 
                    checkSport("BS") ?>>Baseball</input> <br />
                    <input type="checkbox" name="sports[]" value="BK" <?php
                    checkSport("BK") ?>>Basketball</input> <br />
                    <input type="checkbox" name="sports[]" value="FO" 
                    <?php
                    checkSport("FO") ?>>Football</input> <br />
                    <input type="checkbox" name="sports[]" value="IH" 
                    <?php
                    checkSport("IH") ?>>Ice Hockey</input> <br />
                    <input type="checkbox" name="sports[]" value="SO" 
                    <?php
                    checkSport("SO") ?>>Soccer</input> <br />
                </span>

                <label for="pass"><b>*</b> Comments:</label><br />
                <textarea id="comments" name="comments">
                    <?php 
                    if(isset($_POST['submit']) && isset($_POST['comments'])){
                        echo $_POST['comments'];
                    }?>
                </textarea>
                <?php if(isset($_POST['submit']) && trim($_POST['comments']) == ""){
                        echo "<span class='messageError' style=color:darkred>- You must enter a comment!</span></br>";
                    }?>
                <input type="submit" id="send" name="send" value="Count items" />
            </form>
            <?php
                }
            ?>
        </div>
    </div>

</body>

</html>
