<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbName = 'almdudler';

      $conn = mysqli_connect($servername, $username, $password, $dbName);

      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error() . "\n");
      }

      $sql = "SELECT id, string FROM justastring;";
      $result = mysqli_query($conn, $sql);

      echo "<table width=\"300px\" border=\"1\"><tr><th><h4>ID</h4></th><th><h4>STRING</h4></th></tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['string']}</td></tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
      mysqli_close($conn);

      if (isset($_POST["send"]) && !empty($_POST["send"])) {
        $dbName = $_POST['dbName'];
        $submitBtn = $_POST['send'];

        $dbCreate = 'CREATE DATABASE IF NOT EXISTS '.$dbName.';';
        $tableCreate = 'CREATE TABLE IF NOT EXISTS justastring(
                                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                string CHAR(50) NOT NULL
                              );';

        if  (mysqli_query($conn, $dbCreate)) {
           echo "Database $dbName created successfully! \n";
        } else {
           echo "Error creating database $dbName: " . mysqli_error($conn);
        }

        $connn = mysqli_connect($servername, $username, $password, $dbName);

        if  (mysqli_query($connn, $tableCreate)) {
           echo "Table justastring created successfully! \n";
        } else {
           echo "Error creating table \"justastring\": " . mysqli_error($conn);
        }
      }

      if (isset($_POST["insert"]) && !empty($_POST["insert"])) {
        $dbName = $_POST['dbName'];
        $data = htmlentities($_POST['data']);
        $insertString = "INSERT INTO justastring(string) VALUES('".$data."');";

        $connn = mysqli_connect($servername, $username, $password, $dbName);

        if (mysqli_query($connn, $insertString)) {
            echo "New record created.\n";
        } else {
           echo  "Record creation error for: " . $insertString . "\n" . mysqli_error($connn);
        }
        mysqli_close($connn);
      }
    ?>

    <form class="" action="index.php" method="post">
      <label for="dbName">insert DB name:
        <input type="text" name="dbName" value="almdudler" placeholder="DB name">
      </label>
      <label for="data">insert any data (only string!):
        <input type="text" name="data" placeholder="type a string here">
      </label>
      <input type="submit" name="send" value="create DB and table">
      <input type="submit" name="insert" value="insert data">
    </form>
  </body>
</html>
