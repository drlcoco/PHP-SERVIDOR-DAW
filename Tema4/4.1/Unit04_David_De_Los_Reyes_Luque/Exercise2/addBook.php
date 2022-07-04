<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit 4 - Exercise 2</title>
</head>
<body>
    <h1>Add Book</h1>
    <form action="" method="POST">
        <label for="id">Id: </label>
        <input type="number" name="id" id="id" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['id'])){
                        echo $_POST['id'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['id'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter an id!</span>";
                    }?></br>
        <label for="title">Title: </label>
        <input type="text" name="title" id="title" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['title'])){
                        echo $_POST['title'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['title'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter a title!</span>";
                    }?></br>
        <label for="author">Author: </label>
        <input type="text" name="author" id="author" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['author'])){
                        echo $_POST['author'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['author'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter an author!</span>";
                    }?></br>
        <label for="pages">Pages: </label>
        <input type="number" name="pages" id="pages" value="<?php 
                    if(isset($_POST['submit']) && isset($_POST['pages'])){
                        echo $_POST['pages'];
                    }?>" />
                <?php 
                    if(isset($_POST['submit']) && empty($_POST['pages'])){
                        echo "<span class ='messageError' style=color:darkred>- You must enter the number of pages!</span>";
                    }?></br>
        <input type="submit" name="submit" id="submit" value="Add Book">
    </form>
    <?php
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $pages = $_POST['pages'];

        $connection = new mysqli("localhost", "root", "", "booksPrueba");
        $error = $connection->connect_errno;

        if($error == null)
        {
            if(isset($_POST['submit']) && !empty($id) && !empty($title) && !empty($author) && !empty($pages))
            {
                $insert = "INSERT INTO books VALUES ($id, '$title', '$author', $pages);";
                $query = $connection->query($insert);
                if($query)
                {
                    echo "<h2>Inserting data correctly</h2>";
                }
            }
            $query2 = $connection->query("SELECT * FROM books;");
            if($query2)
            {
                echo "<h2>Display all books</h2>";
                $result = $query2->fetch_assoc();
                if($result)
                {
                    echo "<table border='1'><tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th></tr>";
                    while($result != null)
                    {
                        echo "<tr><td>".$result['id']."</td><td>".$result['title']."</td><td>".$result  ['author']."</td><td>".$result['pages']."</td></tr>";
                        $result = $query2->fetch_assoc();
                    }
                    echo "</table>";
                }
            }
        }   
    ?>
</body>
</html>