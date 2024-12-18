<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "przychodnia";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(!$_POST["user"]|| !$_POST["pass"]){
    header("url=adminLog.html");
}

$user = $_POST["user"];
$password = $_POST["pass"];

$sql = "SELECT * FROM admin WHERE username = '$user' AND pass = '$password'";
$result = mysqli_query($conn, $sql);
  echo mysqli_num_rows($result);

if (mysqli_num_rows($result) == 0) {
    header("Location: adminLog.html");
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
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
        <a id="user" class="active" onclick="uo_appear()"><?php echo $user?> <img class="profile" src="#"></a>
    </div>
    <section>
        <div id="user_option" class="invisible"><a href="konto.php">Profil</a><a href="terminy.php">Terminy</a><a href="php/wyloguj.php">Wyloguj</a></div>
    </section>
    <main>
        <form action="php/tablica.php" method="POST">
            <button class="n1" submit" name="table" value="lekarz">LEKARZE</button>
            <button class="n1" type="submit" name="table" value="grafik">GRAFIK</button>
            <button class="n1" type="submit" name="table" value="specjalizacja">SPECJALIZACJE</button>
            <button class="n1" type="submit" name="table" value="wizyta">WIZYTY</button>
            <button class="n1" type="submit" name="table" value="pacjent">PACJENCI</button>
            <button class="n1" type="submit" name="table" value="rozliczenie">ROZLICZENIA</button>
            <button class="n1" type="submit" name="table" value="akt">AKTUALNOŚCI</button>
        </form>
    </main>
    <footer>
        
    </footer>
</body>
</html>