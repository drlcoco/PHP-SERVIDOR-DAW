<?php
    function spanishDate(){
        $day = getSpanishDay();
        $month = getSpanishMonth();
        $year = getYear();
        echo $day.$month.$year;
    }

    function getSpanishDay(){
        $date = getdate();
        $day = $date["wday"];
        $spanishDay = [" Domingo, "," Lunes, "," Martes, "," Miércoles, "," Jueves, "," Viernes, "," Sábado, "];
        return $spanishDay[$day];
    }

    function getSpanishMonth(){
        $date = getdate();
        $day = $date["mday"];
        $monthNumber = $date["mon"];
        $spanishMonth = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        return $day." de ".$spanishMonth[$monthNumber];
    }

    function getYear(){
        $date = getdate();
        $year = " de ".$date["year"].".";
        return $year;
    }

    function factorial($number){
        echo "<br/>";
        echo $number."! = ";
        $result = 1;
        $fact = $number;
        for ($i = 0; $i < $number; $i++){
            $result = $result+($result * ($fact -1));
            echo $fact;
            if($fact==1){
                echo " = ".$result;
            }
            else{
                echo " x ";
            }
            $fact--;
        }
    }

    function multiplicationTable($number){
        echo "
        <table border=1px>
            <tr align='center'>
                <th colspan='5'>Table: $number</th>
            </tr>";
        for($i=0; $i<=10; $i++){
            echo "
            <tr>
                <td>$number</td>
                <td> x </td>
                <td> $i </td>
                <td> = </td>
                <td>".$number * $i."</td>
            </tr>";
        }
        echo "</table>";
    }

    function pricelt($price){
        switch ($price){
            case $price < 100:
                echo "Initial price: ".$price." € (No discount is applied)</br>
                Final price: ".$price." €";
                break;
            case $price >= 100 && $price <= 500:
                echo "Initial price: ".$price." € (10% discount is applied)</br>
                Final price: ".$price - ($price * 0.1)." €";
                break;
            case $price > 500:
                echo "Initial price: ".$price." € (15% discount is applied)</br>
                Final price: ".$price - ($price * 0.15)." €";
                break;
        }
    }
    
?>