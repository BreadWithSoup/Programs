<?php
    require_once ("db.php");
    if (!empty($_POST['id'])){
            
        $PostID = $_POST['id'];
        $sql = "DELETE FROM `projekt` WHERE `projekt`.`id` = $PostID";
        if ($conn->query($sql) === TRUE) {
            //echo "New record deleted successfully";
        } 
    }

    $ProjektNamn = NULL;
    $Same = FALSE;

    if (!empty($_POST)){
        $ProjektNamn = @$_POST['ProjektNamn'];
    }

    $sql = "SELECT * FROM `projekt`";
    $result = $conn->query($sql);
    if ($ProjektNamn == NULL){
        $Same = TRUE;
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($ProjektNamn == $row['ProjektNamn']){
                $Same = TRUE;
            }
            

            //echo "ProjektNamn: " .$row['ProjektNamn'] ."<br>";
            //echo "id: " .$row['id'] ." - Datum: " .$row['Datum'] ." - TidStart: " .$row['TidStart'] ." - TidSlut: " .$row['TidSlut'] ." - Händelse: " .$row['Händelse'] ." - Kommentar: " .$row['Kommentar'] ."<br>";
        }
    }

    if ($Same == FALSE){
        $sql = "INSERT INTO `projekt` (`id`, `ProjektNamn`) VALUES (NULL, '$ProjektNamn')";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
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
    <div id="body2">
        <div id="leftbox">
            <h1>September</h1>
            <div class="box1" id="box1a"><p>1</p></div>
            <div class="box1" id="box1b"><p>2</p></div>
            <div class="box1" id="box1c"><p>3</p></div>
            <div class="box1" id="box1d"><p>4</p></div>
            <div class="box1" id="box1e"><p>5</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>
            <div class="box1" id="box1f"><p>6</p></div>

        </div>
        <div id="rightbox">
            <?php
                    $number = 0;
                    $sql = "SELECT * FROM `projekt`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $number = 0;
                            echo "<a href='loggbok1.php?namn=" .$row['ProjektNamn'] ."'>";
                            echo "<div class='box2' id='box2" .$number ."'>";
                            echo $row['ProjektNamn'] ."<br>"; 
                            echo "</a>";
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='id' value='" .$row['id'] ."'>";
                            echo "<input type='submit' value='Radera'>";
                            echo "</form>";
                            echo "</div>";
                        }
                    }
                        ?>  
                            <div class='box2' id='box20'>
                                <form method="post">
                                    Projekt: <input type="varchar(20)" name="ProjektNamn" required="require">
                                    <input type="submit" value="Skapa">
                                </form>    
                            </div>
                        <?php
                    ?>
            
        </div>
    </div>
</body>
<script src="loggbok.js"></script>
