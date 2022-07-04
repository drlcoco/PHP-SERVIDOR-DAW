<?php
require_once "Connection.php";
$namemovies = array();
$movies = array();
$seats;
$movieselected;
$login=$_GET['login'];
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
            array_push($namemovies, $moviedb["title"]); //Titles movies.
            array_push($movies, $moviedb); //Titles and seats movies.
        }
        if(empty($_POST["selectPelicula"])){
            if(isset($_GET["movie"])){
                $movieselected = $_GET["movie"]; //Show selected movie.
            }
            else{
                $movieselected = $namemovies[0]; //First movie to show.
            }
        }
        else{
            $movieselected = $_POST["selectPelicula"]; //Show selected movie.
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
    <title>Cine Pagina</title>
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
                <p>Welcome, <strong><?php echo $login ?></strong>! (<a href="cinelogin.php" class="text-light">logout</a>)</p>
                <h1>Buy Tickets</h1>
                <h2>Movie: <?php echo $movieselected ?></h2>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-2 d-flex flex-column justify-content-center align-self-center">
                <img id="imgPant" src="images/pant.png" class="img-fluid"/>
            </div>
        </div>
    <?php
        foreach ($movies as $item) {
            if($item["title"] == $movieselected){
                $seats = $item["seats"];
            }
        }
    ?>
        <div class="row d-flex justify-content-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
                <table class="table table-dark">
        <?php
                    //Set red image or yelow image.
                    $seats = str_split($seats);
                    for ($i=0; $i < count($seats); $i++) { 
                        if($i == 0){echo "<tr>";}
                        if($seats[$i] == 0){
                            echo "<td class='text-center'><img src='images/butaca_roja.png'/></td>";
                        }
                        else{
                            echo "<td class= 'amarilla text-center'><a href='cinecomprada.php?id=$i&movieselected=$movieselected&login=$login'><img src='images/butaca_amarilla.png'/></a></td>";
                        }
                        if($i == 9 || $i == 19 || $i == 29 || $i == 39){ //Break row.
                            echo "</tr><tr>";
                        }
                        if($i == 50 ){echo "</tr>";}   
                    }
        ?>
                </table>
            </div>
        </div>
        <div class="row text-center">
            <div class="col d-flex flex-row justify-content-center">
                <form action="" method="post">
                    <select name="selectPelicula" class="custom-select">
        <?php
                         //Select movie as selected.
                        foreach ($namemovies as $namemovie ) {
                            if($namemovie == $movieselected){
                                echo "<option selected value='$namemovie'>$namemovie</option>";
                            }
                            else{
                                echo "<option value='$namemovie'>$namemovie</option>";
                            }
                        }
        ?>
                    </select>
                    <button type="submit" name="submit">Choose Film</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>