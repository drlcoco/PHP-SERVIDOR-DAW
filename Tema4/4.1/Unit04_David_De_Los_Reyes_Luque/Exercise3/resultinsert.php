<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Result Insert</title>
</head>
<body>
<?php
    require_once ("dataconnection.php");
    require_once("insertform.php");

    if(isset($_POST['submit']) && !empty($_POST['section']) && !empty($_POST['article']) && !empty($_POST['price']) && !empty($_POST['country']))
    {
        $section = $_POST['section'];
        $article = $_POST['article'];
        $price = $_POST['price'];
        $country = $_POST['country'];

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        $error = $connection->connect_errno;

        if($error == null)
        {
            if (!($insert = $connection->prepare("INSERT INTO products (section, article, price, country) VALUES (?, ?, ?, ?)"))) 
            {
                echo "Prepare Error: (" . $connection->errno . ") " . $connection->error;
            }

            if (!$insert->bind_param('ssis', $section, $article, $price, $country)) 
            {
                echo "Bind Param Error: (" . $insert->errno . ") " . $insert->error;
            }
            
            if (!$insert->execute()) 
            {
                echo "Execute Error: (" . $insert->errno . ") " . $insert->error;
            }
            echo "<div class='row bg-light mt-2'>
            <div class='col text-center'><h2>Item ".$article." was inserted in ".$section."</h2>
            <a class='btn btn-lg btn-primary m-4' href='insertform.php' role='button'>Insert New</a></div></div>";
            
        }else
        {
            echo "<h2>".$connection->connect_error."</h2>";
        }
        $connection->close();
    }else
    {
        return;
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"  crossorigin="anonymous"></script>
</body>
</html>