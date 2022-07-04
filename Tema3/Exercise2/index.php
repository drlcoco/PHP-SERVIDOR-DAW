<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        $newContact1->Id = 20;
        echo $newContact1->Id;
        echo "</br>";
        echo $newContact1;
        $phoneBook->addContact($newContact1); 

        $newContact2 = new Contact(12, "Francisco", 647563631);
        $phoneBook->addContact($newContact2); 

        $newContact3 = new Contact(13, "Manolo", 670514741);
        $phoneBook->addContact($newContact3);

        $phoneBook->deleteContact(8);
        $phoneBook->deleteContact(4);
    
        $phoneBook->showList();
    ?>
</body>
</html>