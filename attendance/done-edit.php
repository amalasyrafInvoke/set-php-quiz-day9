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
    <h4>Your attendance record has been edited</h4>

    <?php
    $logID = $_POST['submit-edit'];
    $updatedDateTime = $_POST['edit-datetime'];
    // echo $updatedDateTime;
    // echo $logID;
    $getdb = mysqli_select_db($mysqli, $db_db);
    $sql = "UPDATE attendance_log SET log_datetime = '{$updatedDateTime}' WHERE log_id = {$logID}";
    if ($mysqli->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $mysqli->error;
    }

    ?>
    <form action="admin.php" method="POST">
      <button style="align-self: center;" type="submit" name="submit">Log List</button>
    </form>
    <div>
</body>

</html>