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
      justify-content: flex-start;
      align-items: center;
    }

    #form-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 90%;
    }

    #form-container>* {
      margin: 0.75rem 0;
    }

    #emp-name {
      width: 300px
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Employee Attendance</h1>
    <form id="form-container" action="attendance-action.php" method="POST">
      <label for="emp-name">Select a Name:</label>
      <?php
      $getdb = mysqli_select_db($mysqli, $db_db);

      // Perform query
      if ($result = $mysqli->query("SELECT * FROM employee")) {
        echo "Returned rows are: " . $result->num_rows;
        $row = $result->fetch_all(MYSQLI_ASSOC);
        // var_dump($row);
        // Free result set
        // $result->free_result();
      }      

      echo "<select name='emp-name' id='emp-name'>";
      for ($i = 0; $i < count($row); $i++) {
        echo "<option value='{$row[$i]['emp_id']}'>{$row[$i]['emp_name']}</option>";
      }
      echo "</select>";
      ?>
      <input type="submit" value="Submit your attendance">
    </form>

    <form action="admin.php" method="POST">
      <button type="submit" name="submit">Admin ? Click here</button>
    </form>


    <div>
</body>

</html>