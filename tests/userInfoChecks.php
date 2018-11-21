<?php

require('../Request.php');

if (!empty($_POST['usernameform'])) {
  $request = new Request();
  ($request->userExists($_POST['username'])) ? $result = "User Already Exists" : $result = "User Does Not Exist";
}

if (!empty($_POST['emailform'])) {
  $request = new Request();
  ($request->emailExists($_POST['email'])) ? $result = "Email Already Exists" : $result = "Email Does Not Exist";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Info Checks</title>
  </head>
  <body>
    <p>This page is a test page for username and email checks. It sends a request to DB to check if Username or Email exists</p>
    <p>Username:</p>
    <form id="usernameform" name="usernameform" method="post" action="#">
        <input type="text" name="username"></input>
    </form>
    <button type="submit" name="usernameform" form="usernameform" value="Submit">Submit</button>
    <br>
    <p>Email:</p>
    <form id="emailform" name="emailform" method="post" action="#">
        <input type="email" name="email"></input>
    </form>
    <button type="submit" name="emailform" form="emailform" value="Submit">Submit</button>
    <br>
    <br>
    <?php
    if(isset($result))
      echo $result
   ?>
  </body>
</html>
