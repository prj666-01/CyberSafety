<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cybersafety</title>
</head>
<body>
<h1>Start</h1>

<?php
  $servername = "mymysql.senecacollege.ca";
  $username = "prj566_183a25";
  $password = "fjZK6545";
  $dbname = "prj566_183a25";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM Users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Users: " . $row["Username"]. "<br>";
    }
  } else {
    echo "0 results";
  }
$conn->close();
?>
</body>
</html>