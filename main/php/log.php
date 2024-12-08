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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["pass"];
    echo $email, $password;
  $sql = "SELECT * FROM pacjent WHERE email = '$email' AND haslo = '$password'";
  $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);

  if (mysqli_num_rows($result) == 1) {
    $sql = "SELECT * FROM pacjent WHERE email = '$email' AND haslo = '$password'";
    $dane = mysqli_query($conn, $sql);
while($row = $dane->fetch_assoc()){
    $_SESSION["id"] = $row["id_pacjenta"];
    $_SESSION["username"] = $row["imie"];
    $_SESSION["nazw"] = $row["nazwisko"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["adr"] = $row["adres"];
}
    header("Location: ../konto.php");
  } else {
    echo "Invalid username or password.";
  }
}
mysqli_close($conn);
?>