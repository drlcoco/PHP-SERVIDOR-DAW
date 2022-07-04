<?php
session_start();
require_once "class/Connection.php";
    $isvalid = true;
    $userdb = false;

    if (isset($_POST['send']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
        $login = $_POST['user'];
        $password = $_POST['pass'];
        /* mysqli_select_db($connection, $database) or die("I cannot find the database."); */
        $connection = new Connection(); 
        $pdoObject = $connection->getConnection();
        $sql = "SELECT * FROM users";
        if ($connection->connect_errno) {
            echo "Error connecting to MySQL: ". $connection->connect_error;
            exit();  //Not Connected.
        }
        else{
            //Connect.
            //Insert values.
            $crypt = password_hash($password, PASSWORD_BCRYPT);
            $select = "SELECT password FROM users WHERE login='". $login ."'";
            $connection = new Connection(); 
            $pdoObject = $connection->getConnection();
            $result = $pdoObject->prepare($select);
            $result->execute();
            if ($userdb = $result->fetch()) 
            {
                
                $isvalid = password_verify($password, $userdb["password"]);
                    if($isvalid){ 
                        echo "He entrado en el if";
                        $_SESSION['login'] = $login;
                        header("Location:index.php");
                    } 
            }
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
            <?php
                if(!$isvalid){
                    echo "<h1 class='text-danger'>Login fail, try again!!!</h1>";
                }
            ?>
            <form action="" method="post">
                <label for="user">User:</label>
                <input type="text" id="user" name="user" value="<?php if(isset($_POST['send']) && isset($_POST['user'])){
                        echo $_POST['user'];
                    } ?>">
                <?php
                    if(isset($_POST['send']) && empty($_POST['user'])){
                        echo "</br><span class ='messageError' style=color:darkred>- You must enter an user!</span>";
                    }
                ?>
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" value="<?php if(isset($_POST['send']) && isset($_POST['pass'])){
                        echo $_POST['pass'];
                    } ?>">
                <?php
                    if(isset($_POST['send']) && empty($_POST['pass'])){
                        echo "</br><span class ='messageError' style=color:darkred>- You must enter a password!</span>";
                    }
                ?>
                <input type="submit" id="send" name="send" value="Log in" />
            </form>
            <a href='register.php'><button class='button'>Go to registration</button></a>
        </div>
    </div>
</body>

</html>