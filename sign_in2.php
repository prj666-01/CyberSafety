
<?php
require('./Request.php');
//require('../includes/functions.php');
// Check if the the form 'loginForm' is not empty.
if (!empty($_POST['loginForm'])) {
  // Authentication variable. Default is false, the user is not authenticated.
  $auth = false;
  // Get login and password from the form. Note login can be either email or username.
  $userLogin = $_POST['login'];
  $userPassword = $_POST['password'];
  //Instantiate new Request class
  $request = new Request();
  // Check if the login info exists in the database.
  if ($request->userExists($userLogin) || $request->emailExists($userLogin)) {
    // Get password from the database, for this specific user
    $dbUserPassword = $request->getPassword($userLogin);
    //compare the password from database with the password the user input
    if ($userPassword == $dbUserPassword) {
      // Authentication confirmed
      $auth = true;
    }
  }
  // Is the user authenticated? If so, output a successful message, otherwise, notify user that the info does not match
  // It is important to hide from user what specific piece of information (login or password) is incorrect.
  $auth ? $result = "Your credentials match!" : $result = "Your email/username or password does not match our records. Please check them and try again.";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Info Test</title>
  </head>
  <body>
    <h1>Login Info Test</h1>
    <i>This page is a test page for username/email and password check. Encryption and decryption are not implemented in this page. No actual authentication is done in this page.</i>
    <h3>Sign Up</h3>
    <form id="loginForm" name="loginForm" method="post" action="#">
        Username or Email:
        <input type="text" name="login"></input>
        <br>
        Password:
        <input type="password" name="password"></input>
    </form>
    <button type="submit" name="loginForm" form="loginForm" value="Login">Login</button>
    <?php
    if(isset($result))
      echo $result
   ?>
  </body>
</html>
