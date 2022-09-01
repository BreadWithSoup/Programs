<?php
    require_once ("db.php");

    if (!empty($_POST)){
        $Kommentar=$_POST['Kommentar'];
        $Datum=$_POST['Datum'];
        echo $Kommentar;
        echo $Datum;
    }
    $sql = "SELECT * FROM `logg`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["Datum"]. " " . $row["Tid"]. "<br>";
        }
    } 
    else {
        echo "0 results";
    }
    if $sql != $logg{
        $sql = "INSERT INTO `logg` (`id`, `Datum`, `Tid`, `Händelse`, `Kommentar`) VALUES (NULL, '$Datum', '13:22', 'fixar insert data', '$Kommentar')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggbok</title>
    <link rel="stylesheet" href="loggbok.css">
</head>
<body>
    <div id=leftbox>
        <h1>Månad</h1>
        <div class="box1" id="box1a"><p>1</p>
            <form method="post">
                Kommentar: <input type="text" name="Kommentar" required="require"><br>
                Datum: <input type="date" name="Datum"><br>
                <input type="submit">
            </form>
        </div>
        <div class="box1" id="box1b"><p>2</p></div>
        <div class="box1" id="box1c"><p>3</p></div>
        <div class="box1" id="box1d"><p>4</p></div>
        <div class="box1" id="box1e"><p>5</p></div>
        <div class="box1" id="box1f"><p>6</p></div>
    </div>
    <div id="rightbox">
        <a href="loggbok1.php"><div class="box2" id="box2a"></div></a>
        <a href="loggbok2.php"><div class="box2" id="box2b"></div></a>
        <a href="loggbok3.php"><div class="box2" id="box2c"></div></a>
        <a href="loggbok4.php"><div class="box2" id="box2d"></div></a>
    </div>
</body>
<script src="loggbok.js"></script>
