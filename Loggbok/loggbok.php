<?php
    require_once ("db.php");

    $ProjektNamn = NULL;
    $Same = FALSE;

    if (!empty($_POST)){
        $ProjektNamn = $_POST['ProjektNamn'];
    }

    $sql = "SELECT * FROM `projekt`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($ProjektNamn == $row['ProjektNamn']){
                $Same = TRUE;
            }

            //echo "id: " .$row['id'] ." - Datum: " .$row['Datum'] ." - TidStart: " .$row['TidStart'] ." - TidSlut: " .$row['TidSlut'] ." - Händelse: " .$row['Händelse'] ." - Kommentar: " .$row['Kommentar'] ."<br>";
        }
    } 
    else {
        echo "0 results";
    }

    if ($Same == FALSE){
        $sql = "INSERT INTO `projekt` (`id`, `ProjektNamn`) VALUES (NULL, '$ProjektNamn')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " .$sql ."<br>" .$conn->error;
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
        <h1>September</h1>
        <div class="box1" id="box1a"><p>1</p></div>
        <div class="box1" id="box1b"><p>2</p></div>
        <div class="box1" id="box1c"><p>3</p></div>
        <div class="box1" id="box1d"><p>4</p></div>
        <div class="box1" id="box1e"><p>5</p></div>
        <div class="box1" id="box1f"><p>6</p></div>
    </div>
    <div id="rightbox">
        <!-- <a href="loggbok1.php"> -->
            <div class="box2" id="box2a">
                <form method="post">
                    Projekt: <input type="varchar(20)" name="ProjektNamn" required="require">
                    <input type="submit">
                </form>
            </div>
        <!-- </a> -->
        <a href="loggbok2.php"><div class="box2" id="box2b"></div></a>
        <a href="loggbok3.php"><div class="box2" id="box2c"></div></a>
        <a href="loggbok4.php"><div class="box2" id="box2d"></div></a>
    </div>
</body>
<script src="loggbok.js"></script>
