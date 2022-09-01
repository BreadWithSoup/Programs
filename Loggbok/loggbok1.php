<?php
    require_once("db.php");

    if (!empty($_POST)){
        $Kommentar=$_POST['Kommentar'];
    }

    $sql = "INSERT INTO `logg` (`id`, `Datum`, `Tid`, `Händelse`, `Kommentar`) VALUES (NULL, '2022-09-01', '13:22', 'fixar insert data', '$Kommentar')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggbok1</title>
    <link rel="stylesheet" href="loggbok.css">
</head>
<body>
    <form action="loggbok.php" method="post">
        Kommentar: <input type="text" name="Kommentar"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
</body>
<script src="loggbok.js"></script>
