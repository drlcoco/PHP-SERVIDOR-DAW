<?php
require_once "Connection.php";
$namemovies = array();
$movies = array();
$seats;
$movieselected = $_GET["movieselected"];
$login=$_GET['login'];
$seatNumber = $_GET['id'] + 1;
//Set the row.
if($seatNumber > 0 && $seatNumber <= 10){$row = 1;}
if($seatNumber > 10 && $seatNumber <= 20){$row = 2;}
if($seatNumber > 20 && $seatNumber <= 30){$row = 3;}
if($seatNumber >= 30 && $seatNumber <= 40){$row = 4;}
if($seatNumber >= 40 && $seatNumber <= 50){$row = 5;}
$row;      
mysqli_select_db($connection, $database) or die("I cannot find the database.");
    if ($connection->connect_errno) {
        echo "Error connecting to MySQL: ". $connection->connect_error;
        exit();  //Not Connected.
    }
    else{
        //Connect.
        //Insert values.
        $select = "SELECT * FROM movies;";
        $query = mysqli_query($connection, $select);
        while($moviedb = mysqli_fetch_array($query)){
            array_push($movies, $moviedb);
        }
    }   
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
    <title>Cine Comprada</title>
</head>
<body class="bg-primary">
    <div class="container mt-2 bg-primary">
        <div class="row text-center justify-content-center">
            <div class="col-4 d-flex flex-column justify-content-center align-self-center">
                <img src="images/logo.png" alt="logo" class="img-fluid">
            </div>
        </div>
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
    <h1>CONGRATULATIONS <?php echo $login ?>!!!</h1>
    <p>You have bought a ticket, Click <?php echo"<a class='text-light' href='cinePdfEntrada.php?movie=$movieselected&row=$row&seat=$seatNumber'>here</a>";?> to download.</p>
    <br />
    <?php echo"<a href='cinepagina.php?movie=$movieselected&login=$login'><img src='images/botonSeguir.png'/></a>";?>
    <?php
        foreach ($movies as $movie) {
            if($movie["title"] == $movieselected){
                $seats = $movie["seats"];
            }
        }
    ?>
    <table>
        <?php
            $seats = str_split($seats);
            for ($i=0; $i < count($seats); $i++) {  
                if($_GET["id"] == $i){
                    
                    if ($connection->connect_errno) {
                        echo "Error connecting to MySQL: ". $connection->connect_error;
                        exit();  //Not Connected.
                    }
                    else{
                        //If buy a seat set this in data base.
                        $seats[$i] = 0;
                        $seats = join("", $seats);
                        $updateSeat = "UPDATE movies SET seats = '$seats' WHERE title = '$movieselected'";
                        $query = mysqli_query($connection, $updateSeat);
                        mysqli_close($connection);
                    }
                } 
            }
        ?>
    </table>
    <form action="" method="post">
    <select name="selectPelicula">     
        <?php
        foreach ($namemovies as $namemovie ) {
            echo "<option selected value='$namemovie'>$namemovie</option>";
        }
        ?>
    </select>
    <button type="submit" name="submit">Choose Film</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>