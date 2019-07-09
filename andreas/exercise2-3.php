<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Exercise 02-03</title>
  </head>
  <body>
    <?php

      if (isset($_POST['send']) && !empty($_POST['send'])) {
        echo "Data have been sent:<br>".$_POST['firstname']."<br>".$_POST['lastname']." ";
      }
    ?>
    <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <label for="firstname">
        <input type="text" name="firstname" placeholder="Firstname">
      </label>
      <label for="lastname">
        <input type="text" name="lastname" placeholder="Lastname">
      </label>
      <input type="submit" name="send" value="send">
    </form>

    <?php
      function divide($a, $b) {
        echo $a/$b;
      }

      divide(12, 3);
    ?>
  </body>
</html>
