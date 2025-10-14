<?php
$servername = "_SERVER_NAME_";
$username = "_USER_NAME_";
$password = "_PASSWORD_";
$dbname = "_DATABASE_NAME_";
$conn = "";




$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "databáze připojena";


mysqli_close($conn);
?>