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
    <?php
        session_start();
        //Delete book.
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "booksPrueba";
        $port = "8080";
        $connection = mysqli_connect($server, $user, $pass, $database);
        
        mysqli_select_db($connection, $database) or die("I cannot find the database.");
        if ($connection->connect_errno) {
            echo "Error connecting to MySQL: ". $connection->connect_error;
            exit();  //Not Connected.
        }
        else{
            if(isset($_GET['deletedId'])){
                $id = $_GET['deletedId'];
                $delete = "DELETE FROM books WHERE id = $id";
                $query = mysqli_query($connection, $delete);
                if($query){
                    echo "<div class='row bg-light mt-2'>
                    <div class='col text-center'><h2>Deleted book ".$id." succesfully</h2>
                    <a class='btn btn-lg btn-primary m-4' href='books.php' role='button'>See Books</a></div></  div>";
                }
                else{
                    echo "Error, can,t delete.";
                }
            }
            mysqli_close($connection);
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"  crossorigin="anonymous"></script>
</body>
</html>
