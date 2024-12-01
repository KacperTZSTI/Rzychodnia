<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
    <title>Przychodnia Elsen</title>
</head>
<body>
    
<?php 

$server = "localhost";
$user = "root";
$pass = "";
$db = "przychodnia";
$table = $_POST["table"];

if($table==""){
    echo "KILL YOURSELF!!!!!!!!!!!!!!!!!!!!!";
    header("Refresh:2; Location: panel.php");
}

$conn = new mysqli($server, $user, $pass, $db);

$sql = "SHOW COLUMNS FROM $table";
$columns = $conn->query($sql);

$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

$coltable = [];
if($columns->num_rows>0){
    while($row = $columns->fetch_assoc()){
        array_push($coltable, $row["Field"]);
}}

if($result->num_rows>0){
    echo "<table class='tab'>";
    $i = 0;
    echo "<tr>";
    while($i<count($coltable)){
        echo "<th>",$coltable[$i],"</th>";
        $i++;
    }
    echo "</tr>";
    while($row = $result->fetch_assoc()){
        $i = 0;
        echo "<tr>";
        while($i<count($coltable)){
            echo "<td>",$row[$coltable[$i]],"</td>";
            $i++;
        }
        echo "</tr>";
    }
        echo "</table>";
}

?>


</body>
</html>