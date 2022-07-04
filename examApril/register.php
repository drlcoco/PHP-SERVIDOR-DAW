<?php
    require_once "class/Connection.php";
    if (isset($_POST['send']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
        $login = $_POST['user'];
        $password = $_POST['pass']; 
        /* mysqli_select_db($connection, $database) or die("I cannot find the database."); */
        $connection = new Connection();

        
            //Connect.
            //Insert values.
            $crypt = password_hash($password, PASSWORD_BCRYPT);
            $connection= new Connection();
            $pdoObject = $connection->getConnection();
            $sql = "INSERT INTO `users`(`login`, `password`) VALUES (:login, :password);";
            $sentence = $pdoObject->prepare($sql);
            $sentence->bindParam(':login', $login); 
            $sentence->bindParam(':password', $crypt); 
            try {
                $sentence->execute();
                if ($sentence){
                    header("Location: login.php");
                }
            } catch (\Exception $th) {
                echo "This user already exists!!!";
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
    <?php
   
    ?>
        <div id="contenido">
            <div>
                <h1>Registration form</h1>
                <?php
                    if(isset($isvalid) && !$isvalid){
                        echo "Login fail, try again!!!";
                    }
                    ?>
                <form action="" method="post">
                    <label for="user">New user:</label>
                    <input type="text" id="user" name="user" value="<?php if(isset($_POST['send']) && isset($_POST['user'])){
                        echo $_POST['user'];
                    } ?>">
                    <?php
                        if(isset($_POST['send']) && empty($_POST['user'])){
                            echo "<span class ='messageError' style=color:darkred>- You must enter an user!</span>";
                        }
                    ?>
                    <label for="pass">Type password:</label>
                    <input type="password" id="pass" name="pass" value="<?php if(isset($_POST['send']) && isset($_POST['password'])){
                        echo $_POST['password'];
                    } ?>">
                    <?php
                        if(isset($_POST['send']) && empty($_POST['pass'])){
                            echo "<span class ='messageError' style=color:darkred>- You must enter a password!</span>";
                        }
                    ?>
                    <input type="submit" id="send" name="send" value="Create new user" />
                </form>
                <p><a href='login.php'><button class='button'>Back</button></a></p>
            </div>
        </div>
    <?php
  
    ?>
</body>

</html>