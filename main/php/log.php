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
    $sql = "SELECT imie FROM pacjent WHERE email = '$email' AND haslo = '$password'";
    $imie = mysqli_query($conn, $sql);
while($row = $imie->fetch_assoc()){
    $_SESSION["username"] = $row["imie"];
}
    header("Location: ../konto.php");
  } else {
    echo "Invalid username or password.";
  }
}
mysqli_close($conn);
?>