<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: logowanie.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="konto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
    <title>Przychodnia Elsen</title>
</head>
<body>
    <div class="menu">
        <a class="logo" href="index.html"><img src="media/els.png"></a>
        <a href="about.php">Aktualności</a>
        <a href="e-res.php">E-rejestracja</a>
        <a href="contact.html">Kontakt</a>
        <a id="user" class="active" onclick="uo_appear()">Użytkownik <img class="profile" src="#"></a>
    </div>
    <section>
        <div id="user_option" class="invisible"><a href="konto.php">Profil</a><a href="terminy.php">Terminy</a><a href="php/wyloguj.php">Wyloguj</a></div>
    </section>
    <main>

    <div>
        <img></img>
        <div>
        <h3><?php echo $_SESSION["username"], " ", $_SESSION["nazw"]; ?></h3>
        <h5><?php echo $_SESSION["email"];?></h5>
        <p><?php echo $_SESSION["adr"];?></p>
        </div>
    </div>
    </main>
    <footer>
        
    </footer>
</body>
</html>