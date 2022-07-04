<?php
    if (!empty($_GET['id'])){
        $id = $_GET['id'];
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
            // Get the image from the DB
            $consulta = "SELECT img FROM books WHERE id = {$id} ";
            $resultado = mysqli_query($connection, $consulta);
            if ($resultado->num_rows > 0) {
                $row = $resultado->fetch_assoc();
                // Display image
                header("Content-type: ".$_FILES["image"]["type"]); 
                return $row["img"]; 
            }else{
                echo 'Sorry, the image does not exist.'; 
            }
        }
    }
?>

<?php
/* if (!empty($_GET['id'])){
$db = new mysqli('localhost', 'root', '', 'dbbooks');
if ($db->connect_error){
die("Failed connection: " . $db->connect_error);
}
// Get the image from the DB
$result = $db->query("SELECT img FROM books WHERE id = {$_GET['id']} ");
if($result->num_rows > 0){
$row = $result->fetch_assoc();
        // Display image
$size= $_GET["size"];
header("Content-type: ".$_FILES["image"]["type"]);
return $row['img']; }else{
echo 'Sorry, the image does not exist.'; }
} */
?>

