
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

$sql = "SELECT * FROM akt";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
    <title>Przychodnia Elsen</title>
</head>
<body>
    <div class="menu">
        <a class="logo" href="index.html"><img src="media/els.png"></a>
        <a class="active" href="about.php">Aktualności</a>
        <a href="e-res.php">E-rejestracja</a>
        <a href="contact.html">Kontakt</a>
        <a id="user" onclick="uo_appear()">Użytkownik <img class="profile" src="#"></a>
    </div>
    <section>
        <div id="user_option" class="invisible"><a href="konto.php">Profil</a><a href="terminy.php">Terminy</a><a href="php/wyloguj.php">Wyloguj</a></div>
    </section>
    <main>

        <?php

        while($row = $result->fetch_assoc()){
            $tyt = $row['tytul'];
            $tek = $row['tekst'];

            echo "        
            <div class='akt'><img>
            <div>
            <h3>$tyt</h3>
                <P>$tek</P>
            </div>
            </div>";
        }

        ?>
        
    </main>
    <footer>
        
    </footer>
</body>
</html>