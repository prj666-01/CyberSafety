<?php

require('../Request.php');

// Check if the user submitted the username form
if (!empty($_POST['basicprofile'])) {
  $array = [
    "userId" => $_POST['userId'],
    "city" => $_POST['city'],
    "province" => $_POST['province'],
    "country" => $_POST['country'],
    "occupation" => $_POST['occupation'],
    "birthday" => $_POST['birthday'],
    "gender" => $_POST['gender'],
  ];
  //Instantiate new Request class
  $request = new Request();

  ($request->addBasicProfile($array)) ? $result = "Profile added successfully." : $result = "Profile couldn't be added successfully.";
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Basic Profile</title>
  </head>
  <body>
    <h1>Add Basic Profile</h1>
    <i>This page is a test page for adding a basic profile. Note this is a test and it doesn't follow the good practices for form, it should be used for understanding how the addBasicProfile() logic works.</i>
    <h3>Insert the following info:</h3>
    <form id="basicprofile" name="basicprofile" method="post" action="#">
        User ID:
        <input type="text" name="userId"></input>
        <br>
        City:
        <input type="text" name="city"></input>
        <br>
        Province:
        <input type="text" name="province"></input>
        <br>
        Country:
        <input type="text" name="country"></input>
        <br>
        Occupation:
        <input type="text" name="occupation"></input>
        <br>
        Birthday:
        <input type="text" name="birthday"></input>
        <br>
        Gender:
        <input type="text" name="gender"></input>
    </form>
    <br>
    <button type="submit" name="basicprofile" form="basicprofile" value="Submit">Submit</button>
    <br>
    <br>
    <?php
    if(isset($result))
      echo $result
   ?>
  </body>
</html>
