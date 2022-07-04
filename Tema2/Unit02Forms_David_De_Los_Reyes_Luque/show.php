<?php
    if(isset($_GET["submit"])){

        $developer = $_GET["developer"];
        $level = $_GET["level"];
        $experience = $_GET["experience"];

        echo "Developer: ".$developer."</br>Level: ".$level."</br>Experience: ".$experience;
    }
?>


