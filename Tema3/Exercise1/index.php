<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>OOP Unit 3</title>
</head>
<body class="text-center">
    <h1 class="text-primary">Phone Book</h1>
    <div class="m-4">
    <?php
        require_once "PhoneBook.php";
        require_once "Contact.php";

        $id = 1;
        $names = ["Andrés", "Paco", "Juan", "David", "John", "Sergio", "Luís", "Rober", "Pedro", "Rafa"];
        $phone = 655842531;
        $contacts = array();

        for($i=0; $i<10; $i++){
            $contact = new Contact($id, $names[$i], $phone);
            array_push($contacts, $contact);
            echo $contact."</br>";
            $id++;
            $phone += 11111;
        }

        $phoneBook = new PhoneBook($contacts);

        $newContact1 = new Contact(11, "Román", 677334455);
        echo $newContact1;
        $phoneBook->addContact($newContact1); 

        $newContact2 = new Contact(12, "Francisco", 647563631);
        $phoneBook->addContact($newContact2); 

        $newContact3 = new Contact(13, "Manolo", 670514741);
        $phoneBook->addContact($newContact3);

        $phoneBook->deleteContact(8);
        $phoneBook->deleteContact(4);
    ?>
    </div>
    <div class="m-4">
    <?php
        echo $phoneBook;
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>