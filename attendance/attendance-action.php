<html>
<?php include('../db.sql.php'); ?>

<head>
  <title>Employee Attendance</title>
  <style>
    .container {
      height: 90%;
      width: 800px;
      margin: 0 auto;
      border: 1px solid lightslategray;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>Thank you for submitting your attendance!</h3>
    <h4>Your attendance record has been recorded</h4>

    <?php
    $empID = (int)$_POST['emp-name'];
    // echo $empID;

    $getdb = mysqli_select_db($mysqli, $db_db);
    $sql = "INSERT INTO attendance_log (emp_id) VALUES ($empID)";

    // echo "<br>";
    if ($mysqli->query($sql) === TRUE) {
      echo "<h4>New record created successfully</h4>";
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    ?>
    <form action="index.php" method="POST">
      <button style="align-self: center;" type="submit" name="submit">Back</button>
    </form>
    <div>
</body>

</html>