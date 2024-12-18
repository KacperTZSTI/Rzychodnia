<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="restore.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
    <script defer src="e-res.js"></script>
    <title>Przychodnia Elsen</title>
</head>

<?php 

$server = "localhost";
$user = "root";
$pass = "";
$db = "przychodnia";

$conn = new mysqli($server, $user, $pass, $db);


$sql = "SELECT * FROM lekarz";
$lekarze = $conn->query($sql);

$sql = "SELECT * FROM grafik";
$grafik = $conn->query($sql);


?>

<body>
    <div class="menu">
        <a class="logo" href="index.html"><img src="media/els.png"></a>
        <a href="about.php">Aktualności</a>
        <a class="active" href="e-res.php">E-rejestracja</a>
        <a href="contact.html">Kontakt</a>
        <a id="user" onclick="uo_appear()">Użytkownik <img class="profile" src="#"></a>
    </div>
    <section>
        <div id="user_option" class="invisible"><a href="konto.php">Profil</a><a href="terminy.php">Terminy</a><a href="php/wyloguj.php">Wyloguj</a></div>
    </section>
    <main>
        <h1>Rejestracja wizyty</h1>

        <form method="POST" action="php/offer.php">
            <label for="lekarz">Lekarz:</label>
            <input role="combobox" name="lekarz" list="" id="lek">
            <datalist id="lekarze" role="listbox">
                <?php 
                while($row = $lekarze->fetch_assoc()){
                    echo "<option value=", $row['imie'], ">" , $row['id_lekarza'], " ", $row['imie'], " ", $row['nazwisko'], "</option>";
                }
                ?>
            </datalist><br>
            <label for="termin">Dostępne terminy w następnym tygodniu:</label>
            <input role="combobox" name="termin" list="" id="ter">
            <datalist id="terminy" role="listbox">
                <?php 
                while($row = $grafik->fetch_assoc()){
                    echo "<option value=", $row['dzien_tygodnia'],"-", $row['godzina_od'], ">" , $row['dzien_tygodnia'], " ", $row['godzina_od'], "-", $row['godzina_do'], "</option>";
                }
                ?>
            </datalist><br>
            <label for="powod">Powód wizyty:</label><br>
            <textarea name="powod" rows="30" cols="140"></textarea><br>

            <Input type="submit" value="Prześlij"></Input>
        </form>

    </main>
    <footer>
        
    </footer>
</body>
</html>