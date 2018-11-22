<?php

require('../Request.php');

// Check if the user submitted the username form
if (!empty($_POST['usernameform'])) {

  //Instantiate new Request class
  $request = new Request();

  // Call Request function userExists(), which returns a boolean. If exists output a message letting user know.
  ($request->userExists($_POST['username'])) ? $result = "User Already Exists" : $result = "User Does Not Exist";
}

// Check if the user submitted the email form
if (!empty($_POST['emailform'])) {

  //Instantiate new Request class
  $request = new Request();

  // Call Request function emailExists(), which returns a boolean. If exists output a message letting user know.
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
    <h1>User Info Checks</h1>
    <i>This page is a test page for username and email checks. It sends a request to DB to check if Username or Email exists</i>
    <h3>Check if this username exists:</h3>
    <form id="usernameform" name="usernameform" method="post" action="#">
        <input type="text" name="username"></input>
    </form>
    <button type="submit" name="usernameform" form="usernameform" value="Submit">Submit</button>
    <br>
    <h3>Check if this email exists:</h3>
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
