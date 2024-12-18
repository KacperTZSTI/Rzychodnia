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
$operacja = $_POST["op"];
$id = $_POST["id"];

if($operacja==""){
    echo "KILL YOURSELF!!!!!!!!!!!!!!!!!!!!!";
    header("Refresh:2; url=../index.html");
}

$conn = new mysqli($server, $user, $pass, $db);

$sql = "UPDATE wizyta SET status_wizyty = '$operacja' WHERE id_wizyty = '$id'";

if($conn->query($sql)){
    echo $_POST["id"];
    echo '<h3>sukces...<h3>';
    header("Refresh:2; url=../terminy.php");
}else{
    echo '0__0';
}
?>


</body>
</html>