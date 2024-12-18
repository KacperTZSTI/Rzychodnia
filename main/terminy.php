<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">\
    <link rel="stylesheet" href="terminy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
    <title>Przychodnia Elsen</title>
</head>
<body>
    <div class="menu">
        <a class="logo" href="index.html"><img src="media/els.png"></a>
        <a href="about.html">Aktualności</a>
        <a href="e-res.php">E-rejestracja</a>
        <a href="contact.html">Kontakt</a>
        <a id="user" class="active" onclick="uo_appear()">Użytkownik <img class="profile" src="#"></a>
    </div>
    <section>
        <div id="user_option" class="invisible"><a href="konto.php">Profil</a><a href="terminy.php">Terminy</a><a href="php/wyloguj.php">Wyloguj</a></div>
    </section>
    
<?php 

session_start();
if (!isset($_SESSION["username"])) {
  header("Location: ../logowanie.html");
  exit();
}

$host = "localhost";
$username = "root";
$password = "";
$database = "przychodnia";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM wizyta WHERE id_pacjenta = '$id' AND status_wizyty LIKE 'zaplanowana'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $id_w = $row["id_wizyty"];
    $l = $row['id_lekarza'];
    $sql2 = "SELECT imie FROM lekarz WHERE id_lekarza = '$l'";
    $l2 = $conn->query($sql2);
    while($row2 = $l2->fetch_assoc()){
        $lekarz = $row2["imie"];
    }
    echo "<form method='POST' action='php/term.php'><div class='term'><h1>", $lekarz, "</h1>   <h2>", $row["data_wizyty"], "</h2><br><p>", $row["powod_wizyty"], "</p>
    <input name='id' type='num' class='invisible2' value='$id_w'></input>
    <input name='op' type='submit' value='odwolana'></input>
    <input name='op' type='submit' value='zakonczona'></input></div><form>";
}

?>

    <footer>
        
    </footer>
</body>
</html>