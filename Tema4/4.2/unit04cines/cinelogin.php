<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Login</title>
</head>
<body class="bg-primary">
<?php
    $isvalid = true;
    $login = $_POST['user'];
    $password = $_POST['password'];
    $user;
    require_once "Connection.php";
        if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password'])) {
            $login = $_POST['user'];
            $password = $_POST['password']; 
            mysqli_select_db($connection, $database) or die("I cannot find the database.");

            if ($connection->connect_errno) {
                echo "<h1>Error connecting to MySQL: ". $connection->connect_error."</h1>";
                exit();  //Not Connected.
            }
            else{
                //Connect.
                //Insert values.
                $select = "SELECT * FROM users;";
                $query = mysqli_query($connection, $select);
                if($query){
                    while($userdb = mysqli_fetch_array($query)){
                        $isvalid = $userdb["login"] == $login && $password == $userdb["password"];
                        if($isvalid){ 
                            header("Location:cinepagina.php?login=".$login);
                        }
                    }  
                }
                else{
                    echo "<h1>Error: ". $connection->error."</h1>";
                } 
            } 
        }            
    ?>
    <div class="container mt-2 bg-primary">
        <div class="row text-center justify-content-center">
            <div class="col-8 d-flex flex-column justify-content-center align-self-center">
                <img src="images/logo.png" alt="logo" class="img-fluid">
            </div>
        </div>
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
                <div class="messageError">
                    <?php
                    if(!$isvalid){
                        echo "<h1 class='text-danger'>Login fail, try again!!!</h1>";
                    }
                    else{
                        echo "<h1>Introduce your credentials</h1>";
                    }
                    ?>
                </div>
                <form action="" method="POST" class="m-5">
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
                <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="submit" class="btn btn-dark">Login</button>
                            <h2 class="m-4">Don't you have an account? <a class="text-light" href="cineregistro.php">Sign Up</a></h2>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>