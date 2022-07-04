<?php
$id = $_GET["id"];
$name = $_GET["name"];
$phone = $_GET["phone"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>
</head>
<body>
    <h1>Contact Info</h1>
    <ul>
        <li><?php echo "- ID: ".$id; ?></li>
        <li><?php echo "- NAME: ".$name; ?></li>
        <li><?php echo "- PHONE: ".$phone; ?></li>
    </ul>
    <a href="index.php">Come Back</a>
</body>
</html>