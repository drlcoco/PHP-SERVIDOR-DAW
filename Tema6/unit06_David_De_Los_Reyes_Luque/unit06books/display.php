<?php
    session_start();
    if (!empty($_GET['id'])){
        $id = $_GET['id'];
        /* $ext = $_GET['ext']; */
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "dbbooks";
        $port = "8080";
        $connection = mysqli_connect($server, $user, $pass, $database);
        /* if($ext == 'jpeg' || $ext == 'jpg'){
            header('Content-type: image/jpeg'); 
        }
        else if($ext == 'gif'){
            header("Content-type: image/gif");
        }
        else if($ext == 'png'){
            header('Content-type: image/png');
        } */
        
        mysqli_select_db($connection, $database) or die("I cannot find the database.");
        if ($connection->connect_errno) {
            echo "Error connecting to MySQL: ". $connection->connect_error;
            exit();  //Not Connected.
        }
        else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Delete</title>
</head>
<body>
    <div class="container mt-2 bg-light rounded rounded-lg">
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
<?php
            // Get the image from the DB
            $consulta = "SELECT * FROM books WHERE id = {$id} ";
            $resultado = mysqli_query($connection, $consulta);
            if ($resultado->num_rows > 0) {
                $row = $resultado->fetch_assoc();
                // Display image
                echo "<div class='row bg-light m-4'>
                <div class='col text-center'><h1>Displaying DB images</h1><img class='img-fluid rounded' src='data:image/jpeg;base64,".base64_encode($row['img'])." alt=''>
                <a class='btn btn-lg btn-primary m-4' href='books.php' role='button'>See Books</a></div></div>";
            }else{
                echo 'Sorry, the image does not exist.'; 
            }
        }
        mysqli_close($connection);
    }
?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"  crossorigin="anonymous"></script>
</body>
</html>


