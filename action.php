<html>
<?php
include('db.sql.php');

$getdb = mysqli_select_db($mysqli,$db_db);

$fname = $_POST['fname'];
$sql = "INSERT INTO training (name) VALUES ('$fname')";
// mysqli_query($mysqli, $sql);

echo "<br>";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>

</html>