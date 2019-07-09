<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      $viewer = getenv( "HTTP_USER_AGENT" );
      $browser = "An unidentified browser";

      if(preg_match('/Chrome/i' , "$viewer")) {
        $browser = 'Google Chrome';
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"exercise1-chrome.css\">";
      } elseif( preg_match( "/Mozilla/i", "$viewer" )) {
        $browser = "Mozilla";
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"exercise1-mozilla.css\">";
      } else {
        $browser = 'unindentified browser';
      }

    ?>
    <meta charset="utf-8">
    <title>Exercise 01</title>
  </head>
  <body>
    <?php echo "<h1>You are using {$browser} at the moment.</h1>"; ?>
  </body>
</html>
