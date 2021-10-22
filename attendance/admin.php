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
    <h3>Showing All Employee Attendance Record</h3>

    <?php
    $getdb = mysqli_select_db($mysqli, $db_db);

    if ($result = $mysqli->query("SELECT * FROM attendance_log INNER JOIN employee ON attendance_log.emp_id = employee.emp_id INNER JOIN department ON employee.department_id = department.department_id ORDER BY attendance_log.log_id")) {
      echo "Returned rows are: " . $result->num_rows;
      $row = $result->fetch_all(MYSQLI_ASSOC);
      // var_dump($row);
      // Free result set
      // $result->free_result();
    }

    echo "<div id='list-container'>";
    for ($i = 0; $i < count($row); $i++) {
      echo
      "<div class='list-item'>
        <p>{$row[$i]['log_id']}</p>
        <p>{$row[$i]['emp_name']}</p>
        <p>{$row[$i]['department_name']}</p>
        <p>{$row[$i]['log_datetime']}</p>
        <form action='edit-log.php' method='POST'>
          <button style='align-self: center;' type='submit' name='editID' value={$row[$i]['log_id']}>Edit</button>
        </form>
      </div>

      ";
    }
    echo "</div>";

    ?>
    <form action="index.php" method="POST">
      <button style="align-self: center;" type="submit" name="submit">Back</button>
    </form>
    <div>
</body>

</html>