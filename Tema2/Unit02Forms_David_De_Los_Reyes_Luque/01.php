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
    <form action="show.php" method="GET" name="form1">
        <label for="developer">Developer</label>    
        <input type="text" name="developer" id="developer">
        </br>
        <label>Level</label>
        <select name="level" id="level">
            <option value="Frontend">Frontend</option>
            <option value="Backend">Backend</option>
            <option value="Full stack">Full stack</option>
        </select>
        </br>
        <label>Experience</label>
        </br>
        <input type="radio" name="experience" id="more" value="More than 5 years">
        <label for="more">More than 5 years</label>
        </br>
        <input type="radio" name="experience" id="less" value="Less than 5 years">
        <label for="less">Less than 5 years</label>
        </br>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>
</html>