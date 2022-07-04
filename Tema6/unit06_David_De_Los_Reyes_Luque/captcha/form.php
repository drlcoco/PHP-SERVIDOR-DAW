<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="captcha.css " />
    <title>Captcha</title>
</head>
<body>
    <form action="" method="POST">
        <img src="captcha.php"/><br />
        <label for="captcha">Insert text from image</label><br />
        <input type="text" name="captcha" value="<?php session_start();
        if(isset($_POST['submit']) && isset($_POST['captcha'])){
            echo $_POST['captcha'];
        }?>" />
    <?php 
        if(isset($_POST['submit']) && empty($_POST['captcha'])){
            echo "<span class ='messageError' style=color:red;><h1>--You must enter a captcha!</h1></span>";
        }?>
        <a href="form.php">Refresh</a>
        <br /><br />
        <input type="submit" value="Submit" name="submit" />
    <?php
        if (isset($_POST['submit']) && $_POST['captcha'] != "" && md5($_POST['captcha']) != $_SESSION['key']){ 
            die("<span class ='messageError' style=color:red;><h1>Error: The code is not correct.</h1></span>");
        } if (isset($_POST['submit']) && md5($_POST['captcha']) == $_SESSION['key'] ) {
            echo "<span style=color:green;><h1>Correct! You are a human.</h1></span>";
        }
        ?>
    </form>
</body>
</html>



   
