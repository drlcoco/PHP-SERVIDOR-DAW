<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body class="bg-primary">

    <?php
    session_start();
    $name;
    $readable = 0;
    $writable = 0;
    $admin = 0;
    $isvalid = true;
    require_once "Connection.php";
        if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password'])) {
            $login = $_POST['user'];
            $password = $_POST['password']; 
            mysqli_select_db($connection, $database) or die("I cannot find the database.");

            if ($connection->connect_errno) {
                echo "Error connecting to MySQL: ". $connection->connect_error;
                exit();  //Not Connected.
            }
            else{
                //Connect.
                //Insert values.
                $crypt = password_hash($password, PASSWORD_BCRYPT);
                $insert = "INSERT INTO `users`(`login`, `password`, `name`, `readable`, `writable`, `admin`) VALUES ('$login','$crypt','$name','$readable','$writable','$admin');";                
                $query = mysqli_query($connection, $insert);
                if($query){
                    header("Location: login.php?login=".$login);
                }
                else{
                    echo "Error en el query";
                }
                
            } 
            
        }      
        
    ?>
        <div class="container mt-4 bg-primary">
        <div class="row text-center justify-content-center mt-4">
            <div class="col-8 d-flex flex-column justify-content-center align-self-center">
                <img src="images/book.jpg" alt="logo" class="rounded mx-auto d-block w-50 m-4">
            </div>
        </div>
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
            <form name="form" action="" method="post"> 
                <h1 class="mb-4">Register</h1>

                <div class="messageError">
                    
                    <?php
                    if(!$isvalid){
                        echo "Login fail, try again!!!";
                    }
                    ?>
                </div>
                <div class="mb-3 row">
                    <label for="user" class="col-sm-2 col-form-label">User </label>
                    <div class="col-sm-10">
                        <input type="text" name="user" id="user" class="form-control" placeholder="User name" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['user'])){
                        echo $_POST['user'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['user'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter an user!</span>";
                    }?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['password'])){
                        echo $_POST['password'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['password'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter a password!</span>";
                    }?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password2" class="col-sm-2 col-form-label">Verify Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Verify Password" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['password2'])){
                        if($_POST['password'] == $_POST['password2']){
                            echo $_POST['password2'];
                        }
                        else{
                            echo "<span class ='messageError' style=color:darkred>- Incorrect password!</span>";
                        }
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['password'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter a password!</span>";
                    }?>
                    </div>
                </div>
                <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto mt-4">
                            <button type="submit" name="submit" class="btn btn-dark">Register</button>
                        </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>        
</body>
</html>