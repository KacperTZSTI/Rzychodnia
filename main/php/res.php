<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "przychodnia";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$imie = $_POST['Imie'];
$nazw = $_POST['Nazwisko'];
$dat = $_POST['Dataur'];
$pes = '62532738902';
$adr = $_POST['Adres'];
$tel = $_POST['Tel'];
$email = $_POST['Email'];
$pass = $_POST['pass'];

$sql = 
"INSERT INTO
  pacjent (imie, nazwisko, data_urodzenia, pesel, adres, telefon, email, haslo)
 VALUES
 (
  '$imie',
  '$nazw',
  '$dat',
  '$pes',
  '$adr',
  '$tel',
  '$email',
  '$pass'
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
  header("refresh: 5; url=../logowanie.html");
}else{
  echo "ty głupi ciulu";
}


mysqli_close($conn);
?>