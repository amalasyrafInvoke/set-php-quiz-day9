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

    #list-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      width: 100%;
    }

    .list-item {
      display: flex;
      width: 100%;
      flex-direction: row;
      justify-content: space-around;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>Editing A Time-Log</h3>

    <?php
    $logID = $_POST['editID'];
    // echo $logID;
    $getdb = mysqli_select_db($mysqli, $db_db);

    if ($result = $mysqli->query("SELECT * FROM attendance_log INNER JOIN employee ON attendance_log.emp_id = employee.emp_id INNER JOIN department ON employee.department_id = department.department_id WHERE attendance_log.log_id = $logID")) {
      echo "Returned rows are: " . $result->num_rows;
      $row = $result->fetch_all(MYSQLI_ASSOC);
      // var_dump($row);
    }

    echo "
    <form action='done-edit.php' method='POST'>
      <input type='datetime-local' name='edit-datetime' id='edit-datetime'>
      <button style='align-self: center;' type='submit' value='{$logID}' name='submit-edit'>Confirm Edit</button>
    </form>
    "
    ?>
    <form action="admin.php" method="POST">
      <button style="align-self: center;" type="submit" name="submit">Back</button>
    </form>
    <div>
</body>

</html>