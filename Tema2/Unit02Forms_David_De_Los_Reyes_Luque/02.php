<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms unit 2</title>
</head>
<body>
    <h1>Developer Information</h1>
<?php
    if(isset($_POST["submit"]) && isset($_POST["developer"]) && isset($_POST["languages"]) && !empty(trim($_POST["experience"])) && strlen($_POST["experience"]) !== 0 && trim($_POST["experience"]) != ""){
        $developer = $_POST["developer"];
        $languages = $_POST["languages"];
        $experience = $_POST["experience"];

        echo "Developer: ".$developer."</br>Languages: "; 
        echo implode(", ", $languages);
        echo "</br>Experience: ".$experience;
        ?> </br><a href="">Come Back</a> <?php
    }
    else{
?>
    <form action="#" method="POST" name="form2">
        <label for="developer">Developer</label>    
        <input type="text" name="developer" id="developer" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['developer'])){
                        echo $_POST['developer'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['developer'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter a developer!</span>";
                    }?>
        </br></br>
        <label>Languages:</label>
        </br>
        <input type="checkbox" name="languages[]" value="PHP" <?php 
            if(isset($_POST["languages"]) && in_array("PHP", $_POST["languages"])){
                echo "checked";
            } ?>>
        <label for="experience">PHP</label>
        </br>
        <input type="checkbox" name="languages[]" value="JavaScript" <?php
            if(isset($_POST["languages"]) && in_array("JavaScript", $_POST["languages"])){
                echo "checked";
            } ?>>
        <label for="experience">JavaScript</label>
        </br>
        <input type="checkbox" name="languages[]" value="Java" <?php
            if(isset($_POST["languages"]) && in_array("Java", $_POST["languages"])){
                echo "checked";
            } ?>>
        <label for="experience">Java</label>
        </br>
        <?php if(isset($_POST["submit"]) && empty($_POST["languages"])){
            echo "<span class='messageError' style=color:darkred>- You must enter a language!</span></br>";
        } ?> </br>
        <label for="experience">Experience</label>
        </br>
        <textarea name="experience" rows="6" cols="30" ><?php 
                    if(isset($_POST['submit']) && isset($_POST['experience'])){
                        echo $_POST['experience'];
                    }?>
        </textarea></br>
              <?php if(isset($_POST['submit']) && trim($_POST['experience']) == ""){
                        echo "<span class='messageError' style=color:darkred>- You must enter an experience!</span></br>";
                    }?>
        </br>
        <input type="submit" name="submit" id="submit" value="Submit">
    </form>
</body>
</html>
<?php
    }
?>