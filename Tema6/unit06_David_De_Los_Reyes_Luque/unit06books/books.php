<?php
    session_start();
    $ext = 'jpg';
    /* if(isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] == $_SESSION['login']) {
        $connection = new mysqli("localhost", "root", "", "dbsessions");
        if ($connection->connect_errno == null) { 
            date_default_timezone_set('Europe/Madrid');
            $sql = "SELECT login FROM users WHERE login = '".$_SESSION['login']."'";
            $myquery = $connection->query($sql);
            if($myquery->fetch_assoc() == null) {
                // If it does not exist, asking for credentials again
                header('WWW-Authenticate: Basic realm="Restricted_content"'); 
                header("HTTP/1.0 401 Unauthorized");
                exit;
            } else {
                if (isset($_COOKIE[$_SESSION['login']])) {
                    $last_login = $_COOKIE[$_SESSION['login']]; 
                }
                setcookie($_SESSION['login'], time(), time()+60*60); 
            }
            $myquery->close();
            $connection->close();
        }
    }else{
        // Not authenticated user?: Asking for credentials. 
        header('WWW-Authenticate: Basic realm="Restricted_content"'); 
        header("HTTP/1.0 401 Unauthorized");
        exit;
    } */
    if(!isset($_SESSION['login']))
    {
        header("Location:login.php");
    }else
    {
        if(isset($_COOKIE[$_SESSION['login']])){
            $last_login = $_COOKIE[$_SESSION['login']]; 
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
    <title>Books</title>
</head>
<body>
    <div class="container mt-2 bg-light rounded rounded-lg">
        <div class="row text-center">
            <div class="col d-flex flex-column justify-content-center align-self-center">
<?php           
        echo "<h3>¡¡¡Welcome ". $_SESSION['login'] .", you can: ";
        if ($_SESSION['readable'] == 1){echo '(View)';}
        if ($_SESSION['writable'] == 1){echo '(Add)';}
        if ($_SESSION['admin'] == 1){echo '(Delete)';} 
        echo " books,";
        if (isset($last_login)){
            echo " Last time login: " . date("d/m/y \a \l\a\s H:i", $last_login);
            }else{
                echo "Welcome for the first time!";
            }
        echo "!!!</h3>  <a href='logout.php'>[Logout]</a>";  
        $disabled = 'disabled';
?>
    <h1>Books Table</h1>
    <form name="form1" action="" method="post" enctype= "multipart/form-data">  
    <input type="hidden" name="MAX_FILE_SIZE" value="2086285">
    <div class="mb-3 row">  
        <label for="id" class="col-sm-2 col-form-label">* Id: </label>
        <div class="col-sm-10">
        <?php if ($_SESSION['readable'] < 2 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){ ?>
                <input type='text' id='id' class="form-control" name='id' disabled />
        <?php }
            else{ ?>
                <input type='tex' id='id' class="form-control" name='id' value="<?php
                if(isset($_POST['submit']) && isset($_POST['id'])){
                    echo $_POST['id'];
                }
            }
            ?>" />
        <?php 
            if(isset($_POST['submit']) && empty($_POST['id'])){
                echo "<span style=color:darkred> You must enter an id!</span>";
            }?>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title: </label>
        <div class="col-sm-10">
<?php       if ($_SESSION['readable'] < 2 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){ ?>
                <input type='text' id='title' class="form-control" name='title' disabled />
<?php       }
            else{ ?>
                <input type='tex' id='title' name='title' class="form-control" value="<?php
                if(isset($_POST['submit']) && isset($_POST['title'])){
                    echo $_POST['title'];
                }
            }
?>" />
        <?php 
            if(isset($_POST['submit']) && empty($_POST['title'])){
                echo "<span style=color:darkred> You must enter a title!</span>";
            }?>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="author" class="col-sm-2 col-form-label">* Author: </label>
        <div class="col-sm-10">
        <?php if ($_SESSION['readable'] < 2 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){ ?>
                <input type='text' id='author' class="form-control" name='author' disabled />
        <?php }
            else{ ?>
                <input type='tex' id='author' class="form-control" name='author' value="<?php
                if(isset($_POST['submit']) && isset($_POST['author'])){
                    echo $_POST['author'];
                }
            }
            ?>" />
        <?php 
            if(isset($_POST['submit']) && empty($_POST['author'])){
                echo "<span style=color:darkred> You must enter an author!</span>";
            }?>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="pages" class="col-sm-2 col-form-label">* Pages: </label>
        <div class="col-sm-10">
        <?php if ($_SESSION['readable'] < 2 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){ ?>
                <input type='text' id='pages' class="form-control" name='pages' disabled />
        <?php }
            else{ ?>
                <input type='tex' id='pages' class="form-control" name='pages' value="<?php
                if(isset($_POST['submit']) && isset($_POST['pages'])){
                    echo $_POST['pages'];
                }
            }
            ?>"/>
        <?php  
            if(isset($_POST['submit']) && empty($_POST['pages'])){
                echo "<span style=color:darkred> You must enter a number of pages!</span>";
            }
            //If you only have a view permission and submit, have a message Permission Denied!!!
            if (isset($_POST['submit']) && $_SESSION['readable'] == 1 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){
                echo "<span style=color:darkred>Permission Denied!!!</span>";
            }
            ?>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="pages" class="col-sm-2 col-form-label">Select an image: </label>
        <div class="col-sm-10">
        <input type="hidden" name="MAX_FILE_SIZE" value="2086285">
        <?php if ($_SESSION['readable'] < 2 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){ ?>
                <input class="form-control" type="file" name="image" id="formFile" disabled>
        <?php }
            else{ ?>
                <input class="form-control" type="file" name="image" id="formFile"> <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" name="submit" class="btn btn-primary mb-4">Add Book</button>
            </div>
    </div>

        <?php  
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "dbbooks";
        $port = "8080";
        $connection = mysqli_connect($server, $user, $pass, $database);
        
        mysqli_select_db($connection, $database) or die("I cannot find the database.");
        if ($connection->connect_errno) {
            echo "Error connecting to MySQL: ". $connection->connect_error;
            exit();  //Not Connected.
        }
        else{
            //Connect.
            //Insert values.
            //Show the table.
            if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['pages'])){
                $id = $_POST['id'];
                $title = $_POST['title'];
                $author = $_POST['author'];
                $pages = $_POST['pages'];
                $img = $_FILES['image']["tmp_name"];
                $imgEncode = addslashes(file_get_contents($img));
                $imageDate = date('Y-m-d H:i:s');

                /* if(isset($_FILES['image'])){ 
                    $ext = $_FILES['image']['type'];
                    require_once("thumbnail.php");
                    if($_FILES['image']['error'] != UPLOAD_ERR_OK){
                        echo 'Error';
                        //Check for all the errors
                        switch ($_FILES['image']['error']){
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                echo 'The file is too big';
                                break;
                            case UPLOAD_ERR_PARTIAL:
                                echo 'Only part of the file could be uploaded';
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                echo ': The file could not be uploaded';
                                break;
                            default:
                                echo 'Undefined error';
                        }
                    }else if($_FILES['image']['type'] != 'image/gif' && $_FILES['image']['type'] != 'image/png' 
                        && $_FILES['image']['type'] != 'image/jpeg'){
                        echo 'Error: The file type is not correct.';
                    }else if(is_uploaded_file($_FILES['image']['tmp_name'])){
                        $name = "./uploads/".$_FILES['image']['name'];
                        if (is_file($name) === true){
                            $name="./uploads/".time()."_".$_FILES['image']['name'];
                        }
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $name)){
                            if($_FILES['image']['type'] == 'image/jpeg'){
                                header('Content-type: image/jpeg'); 
                            }
                            if($_FILES['image']['type'] == 'image/jpg'){
                                header('Content-type: image/jpg'); 
                            }
                            if($_FILES['image']['type'] == 'image/gif'){
                                header("Content-type: image/gif");
                            }
                            if($_FILES['image']['type'] == 'image/png'){
                                header('Content-type: image/png');
                            }
                            // I open the file, read it and display its content on the screen.
                            $fp = fopen($name, 'r');
                            $content =fread($fp, filesize($name));
                            fclose($fp);
                           // echo $content;
                          
                        }else{
                            echo "error: The file can not be moved into its destiny.";
                        }
                    }else{
                        echo 'Error: possible attack2. Name: '.$_FILES['image']['name'];
                    } */
                    /* if(!empty($_FILES['image']['name'])){
                        $arrayName = explode(".", $_FILES['image']['name']);
                        $ext=$arrayName[1];
                        //Call the function.
                        thumbnail($name,"./uploads/thumbnail50".$id.".".$ext, 50, 50);
                    } */
                /* } */
            }
            $consulta = "SELECT * FROM books";
            $resultado = mysqli_query($connection, $consulta);
            if ($resultado->num_rows > 0) {
                //View
                if ($_SESSION['readable'] == 1 && $_SESSION['writable'] == 0 && $_SESSION['admin'] == 0){
                    $string = "<div class='mb-3 row'><div class='col m-4'><table class='table table-dark table-striped rounded rounded-lg'>";
                    $string .= "<tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th><th>IMAGE</th><th>CREATED</th></tr>";
                    while($row = $resultado->fetch_assoc()) {
                        $string .= "<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['pages']."</td>";
                        if(isset($row['img'])){
                            $string .= "<td><a href='display.php?id=".$row['id']."'><img src='./uploads/thumbnail50".$row['id'].".".$ext."'></a></td><td>".$row['created']."</td></tr>";
                        }
                        else{
                            $string .= "<td>No image</td><td>".$row['created']."</td></tr>";
                        }
                    } 
                    $string .= "</table></div></div>";
                    echo $string;
                }

                //View and Write.
                if ($_SESSION['readable'] == 1 && $_SESSION['writable'] == 1 && $_SESSION['admin'] == 0){
                    //Write book.
                    if (isset($_POST['submit']) && !empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['pages'])) {   
                        $insertar = "INSERT INTO books(id, title, author, pages, img, created) VALUES ('$id', '$title', '$author', '$pages', '$imgEncode', '$imageDate');";
                        $query = mysqli_query($connection, $insertar);
                        if($query){
                            header("Location: insert.php?id=".$id);
                        }
                        else{
                            echo "<span style=color:darkred>Error creating book!</span>";
                        } 
                    } 
                    $string = "<div class='mb-3 row'><div class='col m-4'><table class='table table-dark table-striped rounded rounded-lg'>";
                    $string .= "<tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th><th>IMAGE</th><th>CREATED</th></tr>";
                    while($row = $resultado->fetch_assoc()) {
                        $string .= "<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['pages']."</td>";
                        if(isset($row['img']) && $row['img'] != null){
                            $string .= '<td><a href="display.php?id='.$row['id'].'"><img width="50px" height="50px"; alt="" src="data:image/jpeg;base64,'.base64_encode($row["img"]).'"</td><td>'.$row['created']."</td></tr>";
                        }
                        /* if(isset($row['img'])){
                            $string .= "<td><a href='display.php?id=".$row['id']."'><img src='./uploads/thumbnail50".$row['id'].".".$ext."'></a></td><td>".$row['created']."</td></tr>";
                        } */
                        else{
                            $string .= "<td>No image</td><td>".$row['created']."</td></tr>";
                        }
                    }
                    $string .= "</table></div></div>";
                    echo $string;
                }

                //View, Write and Admin.
                if ($_SESSION['readable'] == 1 && $_SESSION['writable'] == 1 && $_SESSION['admin'] == 1){
                    //Write book.
                    if (isset($_POST['submit']) && !empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['pages'])) {   
                        $insertar = "INSERT INTO books(id, title, author, pages, img, created) VALUES ('$id', '$title', '$author', '$pages', '$imgEncode', '$imageDate');";
                        $query = mysqli_query($connection, $insertar); 
                        if($query){
                            header("Location: insert.php?id=".$id);
                        }
                        else{
                            echo "<span style=color:darkred>Error creating book!</span>";
                        }
                    } 
                    $string = "<div class='mb-3 row'><div class='col m-4'><table class='table table-dark table-striped rounded rounded-lg'>";
                    $string .= "<tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th><th>IMAGE</th><th>CREATED</th><th>DELETE</th></tr>";
                    while($row = $resultado->fetch_assoc()) {
                        $string .= "<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['pages']."</td>";
                        if(isset($row['img'])){
                            $string .= "<td><a href='display.php?id=".$row['id']."&ext=".$ext."'><img src='./uploads/thumbnail50".$row['id'].".".$ext."'></a></td><td>".$row['created']."</td><td><a href='delete.php?deletedId=".$row['id']."'>Delete</a></td></tr>";
                        }
                        else{
                            $string .= "<td>No image</td><td>".$row['created']."</td><td><a href='delete.php?deletedId=".$row['id']."'>Delete</a></td></tr>";
                        }
                    }
                    $string .= "</table></div></div>";
                    echo $string;
                }
            } 
            else {
                echo "No results to show.";
            }
            
            mysqli_close($connection);
        }?> 
    </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"  crossorigin="anonymous"></script>
</body>
</html>
<?php
    } 
?>