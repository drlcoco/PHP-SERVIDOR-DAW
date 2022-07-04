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
    <title>Country Result</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Articles</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="insertform.php"><i class="bi bi-cloud-arrow-up"></i> Insert</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="searchform.php"><i class="bi bi-search"></i> Search</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-2 bg-light">
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
    <?php
        require("dataconnection.php");
        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if (mysqli_connect_errno()) {
            echo "Houston, we have a problem. - ".mysqli_connect_error(); 
        exit();
        }
        // select the connection and the database (if true, no longer dies)
        mysqli_select_db($connection, $db_name) or die("I cannot find the database."); // to support ñ and      tildes (charset to interact with the database)
        mysqli_set_charset($connection, "utf8");
        // we create the SQL statement replacing the criteria with ?
        $sql = "SELECT code, section, price, country FROM products WHERE country = ?";
        $result = mysqli_prepare($connection, $sql);
        $country = $_GET["country"]; 
        mysqli_stmt_bind_param($result, "s", $country);
        // finally, we execute the prepared statement
        $ok = mysqli_stmt_execute($result);
        if (!$ok) {
            echo "Error executing query";
        }else{
            // associating new variables to the result of the query
            mysqli_stmt_bind_result($result, $mycode, $mysection, $myprice, $mycountry); // showing the     values  on the screen...
            echo "<h3 class='mt-4'>Found Items:</h3> <br /><br /> ";
                     // scrolling through the result rows
            echo "<table class='table table-dark table-striped rounded-2'><tr><th>CODE</th><th>SECTION</th><th>PRICE</th><th>COUNTRY</th></tr>";
            while (mysqli_stmt_fetch($result)) {
                echo "<tr><td>".$mycode."</td><td>".$mysection."</td><td>".$myprice."</td><td>".$mycountry."</td></tr>";
            }
            echo "</table>";
            echo "</br><a class='btn btn-primary mb-4' href='searchform.php' role='button'>Come Back</a>";
                     //IMPORTANT: closing the $result object
            mysqli_stmt_close($result); 
        }
                 // closing connection
            mysqli_close($connection); 
    ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>