<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "przychodnia";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = 
'INSERT INTO
  pacjent (imie, nazwisko, data_urodzenia, pesel, adres, telefon, email, haslo)
 VALUES
 (
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?
 )';

if ($stmt = $conn->prepare($sql)) {
   $stmt->bind_param('ssssssss',$_POST['Imie'],$_POST['Nazwisko'],$_POST['Dataur'],'78901234567',$_POST['Adres'],$_POST['Tel'],$_POST['Email'],$_POST['pass']);    
  if($stmt->execute()){
    header("Location: ../logowanie.html");
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "</br>Stmt error: ".$stmt->error();
}


mysqli_close($conn);
?>