<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br />**********exercise 1**********<br />
    <?php
    $int = 3;
    $float = 7.2;
    $hexadecimal = 0x0C;
    echo $int + $float + $hexadecimal;
    ?>
    <br />**********exercise 2**********<br />
    <?php
    $mark = 10;
    $mark = $mark +1;
    const SUBJECT = "DWES";
    $string = "2";
    $fecha = getdate();
    echo "I hope to get a ".$mark  ." in ".SUBJECT. " (".$fecha["mday"]."/".$fecha["mon"]."/".$fecha["year"]." - ".$fecha["hours"].":".$fecha["minutes"].")";
    ?>
    <br />**********exercise 3**********<br />
    <?php
    require "functions.php";
    spanishDate();  
    factorial(5);   
    ?>
    <br />**********exercise 4**********<br />
    <?php
    multiplicationTable(35);
    ?>
    <br />**********exercise 5**********<br />
    <?php
    pricelt(180);
    ?>
    <br />**********exercise 6**********<br />
    <?php
    phpinfo();
    ?>
    <br />**********exercise 7**********<br />
        <table>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
    <?php
        foreach ($_SERVER as $key => $value){
    ?>
            <tr>
                <td>
                    <?php echo $key ?>
                </td>
                <td>
                    <?php echo $value ?>
                </td>
            </tr>
    <?php
                }
    ?>
        </table>
    <br />**********exercise 8**********<br />
    <?php
    $m = array (array (1,3,0,8), array (3,5,2), array (8,4,1,9,7), array (6,9));
    $max = [];
    foreach ($m as $element) {
        for($i=0; $i < count($element); $i++){
            if(count($element) > count($max)){
                $max = array_values($element);
            }
        }
    }
     print_r($max);
    ?>
    <br />**********exercise 9**********<br />
        <table>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
    <?php
        $i=0;
        $last = end($_SERVER);
        reset($_SERVER);
        do {
    ?>
            <tr>
                <td>
                    <?php print_r(key($_SERVER)); ?>
                </td>
                <td>
                    <?php print_r(current($_SERVER)); 
                    next($_SERVER); ?>
                </td>
            </tr>
    <?php
        $i++;
        } while ($i < count($_SERVER));
    ?>
        </table>
    </br>**********exercise 10**********</br>
        </br><h5>A: Create an array called $alumni that contains some names. E.g. John, Jane,...</h5>
        </br><h5>B: Implode</h5>
    <?php 
        //A
        $alumni = ["E.g. John", "Jane", "Zoe", "Lucía", "Ana", "Sara", "Soraya", "Andrea"];
        //B
        echo implode(", ", $alumni)."</br>";
    ?>
        </br><h5>C: Show the number of elements</h5>
    <?php
        //C
        echo count($alumni)."</br>";
    ?>
        </br><h5>D: Alphabetically ordered array</h5>
        <table>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
    <?php
        //D
        $copy = $alumni;
        asort($copy);
        foreach ($copy as $key => $value){
    ?>
            <tr>
                <td>
                    <?php echo $key ?>
                </td>
                <td>
                    <?php echo $value ?>
                </td>
            </tr>
    <?php
        }
    ?>
        </table>
        </br><h5>E: Array in the reverse order</h5>
        <table>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
    <?php
        //E
        $reverse = array_reverse($alumni, true);
        foreach ($reverse as $key => $value){
    ?>
            <tr>
                <td>
                    <?php echo $key ?>
                </td>
                <td>
                    <?php echo $value ?>
                </td>
            </tr>
    <?php
        }
    ?>
        </table>
        </br><h5>F: Find a specific name "Soraya"</h5>
        <table>
            <tr>
                <th>Key</th>
            </tr>
    <?php 
        //F
        $search = "Soraya";
        $result = array_search("Soraya", $alumni);
    ?>
            <tr>
                <td>
                    <?php echo $result ?>
                </td>
            </tr>
        </table>
        </br><h5>G: Create a new array called $students</h5>
    <?php
        //G
        $students = array(
            array ("id" => 1843, "name" => "Samuel", "age" => 29), 
            array ("id" => 3951, "name" => "Patricia", "age" => 26), 
            array ("id" => 8716, "name" => "Daniel", "age" => 32), 
            array ("id" => 6104, "name" => "Jose", "age" => 36)
        );
    ?>
        </br><h5>H: Table HTML for $students</h5>
        <table>
            <tr>
                <th>key</th>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
            </tr>
    <?php
        //H
        foreach ($students as $key => $value){
    ?>
            <tr>
                <td>
                    <?php echo $key ?>
                </td>
                <td>
                    <?php echo $value["id"] ?>
                </td>
                <td>
                    <?php echo $value["name"] ?>
                </td>
                <td>
                    <?php echo $value["age"] ?>
                </td>
            </tr>
    <?php
        }
    ?>
        </table>
        </br><h5>I: Display the names only</h5>
    <?php 
        //I
        $names = array_column($students, "name");
        print_r($names); 
    ?>
</body>
</html>



