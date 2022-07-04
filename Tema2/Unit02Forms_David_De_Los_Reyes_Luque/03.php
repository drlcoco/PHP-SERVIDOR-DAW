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
    include "function.php";
        if(isset($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["music"])){
            $name = $_POST["name"];
            $music = $_POST["music"];

            echo "- Name: ".$name;
            echo "</br>- Music: ". implode(", ", $music);
            echo "</br>- IP Address: ".getIPClient();
            echo "</br>- Name of the Client Machine: ".$_SERVER['HTTP_USER_AGENT'];
    ?>      </br><a href="">Come Back</a> 
    <?php
        }
        else{
    ?>
    <form action="" method="POST" name="form3">
        <label for="name">Name <span style=color:darkred> *</span></label>    
        <input type="text" name="name" id="name" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['name'])){
                        echo $_POST['name'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['name'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter a name!</span>";
                    }?>
        </br></br>
        <label for="music">Music type<span style=color:darkred> *</span></label>
        </br>
        <select name="music[]" multiple size="8" id="music">
            <option value="Acoustic"<?php
                if(isset($_POST["music"]) && in_array("Acoustic", $_POST["music"])){
                    echo "selected";
                } ?> >Acoustic</option>
            <option value="BSO" <?php
                if(isset($_POST["music"]) && in_array("BSO", $_POST["music"])){
                    echo "selected";
                } ?> >BSO</option>
            <option value="R&B" <?php
                if(isset($_POST["music"]) && in_array("R&B", $_POST["music"])){
                    echo "selected";
                } ?> >R&B</option>
            <option value="Electronic" <?php
                if(isset($_POST["music"]) && in_array("Electronic", $_POST["music"])){
                    echo "selected";
                } ?> >Electronic</option>
            <option value="Folk" <?php
                if(isset($_POST["music"]) && in_array("Folk", $_POST["music"])){
                    echo "selected";
                } ?> >Folk</option>
            <option value="Jazz" <?php
                if(isset($_POST["music"]) && in_array("Jazz", $_POST["music"])){
                    echo "selected";
                } ?> >Jazz</option>
            <option value="Pop" <?php
                if(isset($_POST["music"]) && in_array("Pop", $_POST["music"])){
                    echo "selected";
                } ?> >Pop</option>
            <option value="Rock" <?php
                if(isset($_POST["music"]) && in_array("Rock", $_POST["music"])){
                    echo "selected";
                } ?> >Rock</option>
        </select>
        <?php 
                    if(isset($_POST['submit']) && empty($_POST['music'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter a music type!</span>";
                    }?>
        </br></br>
        <input type="submit" name="submit" id="submit" value="submit"/>
    </form>
</body>
</html>
<?php
    }
?>