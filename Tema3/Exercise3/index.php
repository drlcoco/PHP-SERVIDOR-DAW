<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to NBA</h1>
    <?php
    require_once ("Unit03B/Center.php");
    require_once ("Unit03B/ShootingG.php");
    require_once ("Unit03B/PowerForward.php");
    require_once ("Unit03B/Forward.php");
    require_once ("Unit03B/Guard.php");
    require_once ("Unit03B/Team.php");
    require_once ("Unit03B/Player.php");

    $guard = new Guard(1,"Anthony Edwards",202, 85);
    $shootingG = new ShootingG(2,"Karl-Anthony Towns",200, 52);
    $forward = new Forward(3,"DÁngelo Russell",199,79);
    $PowerForward = new PowerForward(4,"Patrick Beverley",208,44);
    $center = new Center(5,"Jarred Vanderbilt",196,144);
    
    $team = new Team("Minnesota Timberwolves", $guard, $shootingG, $forward, $PowerForward, $center);

    echo "<h2>  - TEAM: ".$team->Name."</h2>";

    echo $team->__toString();
    echo $team->averageHeight();
    echo $team->maximumHeight();
    ?>
</body>
</html>
