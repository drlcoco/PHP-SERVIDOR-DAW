<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h1>Books 4.1</h1>
    <?php
        $connection = new mysqli("localhost", "root", "", "booksPrueba");
        $error = $connection->connect_errno;
        $inserts = ["INSERT INTO books VALUES (1, 'The Hobbit', 'J. R. R. Tolkien', 301);",
            "INSERT INTO books VALUES (2, 'Harry Potter and the Philosopher,s Stone', 'J. K. Rowling', 550);",
            "INSERT INTO books VALUES (3, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 302);",
            "INSERT INTO books VALUES (4, 'The Polars of the Earth', 'Ken Follet', 400);",
            "INSERT INTO books VALUES (5, 'One Hundred Years of Solitude', 'Gabriel García Márquez', 303);",
            "INSERT INTO books VALUES (6, 'The Hunger Games', 'Suzanne Collins', 450);",
            "INSERT INTO books VALUES (7, 'The Alchemist', 'Paulo Coelho', 304);",
            "INSERT INTO books VALUES (8, 'El código Da Vinci', 'Dan Brown', 500);"];
        if($error == null)
        {
            foreach($inserts as $insert)
            {
                $query = $connection->query($insert);
                if($query)
                {
                    echo "<p>$connection->affected_rows inserted records</p>";
                }
            }
            $query1 = $connection->query("SELECT * FROM books");
            if($query1)
            {
                echo "<h2>Display all books</h2>";
                $result = $query1->fetch_assoc();
                if($result)
                {
                    echo "<table border='1'><tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th></tr>";
                    while($result != null)
                    {
                        echo "<tr><td>".$result['id']."</td><td>".$result['title']."</td><td>".$result  ['author']."</td><td>".$result['pages']."</td></tr>";
                        $result = $query1->fetch_assoc();
                    }
                    echo "</table>";
                }
            }
            $query2 = $connection->query("SELECT * FROM books ORDER BY pages DESC");
            if($query2)
            {
                echo "<h2>Sorted by descending number of pages</h2>";
                $result2 = $query2->fetch_assoc();
                echo "<table border='1'><tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th></tr>";
                while($result2 != null)
                {
                    echo "<tr><td>".$result2['id']."</td><td>".$result2['title']."</td><td>".$result2['author']."</td><td>".$result2['pages']."</td></tr>";
                    $result2 = $query2->fetch_assoc();
                }
                echo "</table>";
            }
            $query3 = $connection->query("SELECT title, pages FROM books WHERE author = 'J. K. Rowling';");
            if($query3)
            {
                echo "<h2>Display title and pages of J. K. Rowling</h2>";
                $result3 = $query3->fetch_assoc();
                echo "<table border='1'><tr><th>TITLE</th><th>PAGES</th></tr>";
                while($result3 != null)
                {
                    echo "<tr><td>".$result3['title']."</td><td>".$result3['pages']."</td></tr>";
                    $result3 = $query3->fetch_assoc();
                }
                echo "</table>";
            }
            $query4 = $connection->query("DELETE FROM books WHERE author = 'J. K. Rowling';");
            if($query4)
            {
                echo "<h2>Delete J. K. Rowling's books</h2>";
                $result4 = $connection->affected_rows;
                if($result4 != null)
                {
                    echo "<h3>".$result4." books has been deleted</h3>";
                }
            }
            $query5 = $connection->query("SELECT * FROM books");
            if($query5)
            {
                $result5 = $query5->fetch_assoc();
                echo "<table border='1'><tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th></tr>";
                while($result5 != null)
                {
                    echo "<tr><td>".$result5['id']."</td><td>".$result5['title']."</td><td>".$result5['author']."</td><td>".$result5['pages']."</td></tr>";
                    $result5 = $query5->fetch_assoc();
                }
                echo "</table>";
            }
            $query6 = $connection->query("UPDATE books SET title = 'The Da Vinci Code' WHERE id = 8;");
            if($query6)
            {
                echo "<h2>Updated title where id = 8</h2>";
                $result6 = $connection->affected_rows;
                if($result6 != null)
                {
                    echo "<h3>".$result6." book has been updated</h3>";
                }
            }
            $query7 = $connection->query("SELECT * FROM books");
            $result7 = $query7->fetch_assoc();
            if($query7)
            {
                $result7 = $query7->fetch_assoc();
                echo "<table border='1'><tr><th>ID</th><th>TITLE</th><th>AUTHOR</th><th>PAGES</th></tr>";
                while($result7 != null)
                {
                    echo "<tr><td>".$result7['id']."</td><td>".$result7['title']."</td><td>".$result7['author']."</td><td>".$result7['pages']."</td></tr>";
                    $result7 = $query7->fetch_assoc();
                }
                echo "</table>";
            }
        }else
        {
            echo $error."</br>".$connection->error;
        }
        $connection->close();
    ?>
</body>
</html>