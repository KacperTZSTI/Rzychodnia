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


$id = $_SESSION["id"];
$lekarz = $_POST['lekarz'];
$termin = $_POST['termin'];
$pow = $_POST['powod'];


$sql = "SELECT id_lekarza FROM lekarz WHERE imie LIKE '$lekarz'";
$dane = mysqli_query($conn, $sql);
while($row = $dane->fetch_assoc()){
  $id_lek = $row["id_lekarza"];
}


$sql = 
"INSERT INTO
  wizyta (data_wizyty, id_pacjenta, id_lekarza, powod_wizyty, status_wizyty)
 VALUES
 (
  '$termin',
  '$id',
  '$id_lek',
  '$pow',
  'zaplanowana'
 )";

// nie dziala :(
// if ($stmt = $conn->prepare($sql)) {
//    $stmt->bind_param('ssssssss',$_POST['Imie'],$_POST['Nazwisko'],$_POST['Dataur'],'62532738902',$_POST['Adres'],$_POST['Tel'],$_POST['Email'],$_POST['pass']);    
//   if($stmt->execute()){
//     header("Location: ../logowanie.html");
//   }
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
//   echo "</br>Stmt error: ".$stmt->error();
// }

if(mysqli_query($conn, $sql)){
  echo "sukces!";
  header("refresh: 5; url=../e-res.php");
}else{
  echo "ty głupi ciulu";
}


mysqli_close($conn);
?>