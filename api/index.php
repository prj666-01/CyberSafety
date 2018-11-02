<?php


//Define the constants for the database
define("DB_HOST", "localhost");
define("DB_USERNAME", "user01");
define("DB_PASSWORD", "Password123!");
define("DB_DATABASE", "PRJ666");

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($mysqli->connect_error) {
  //die("Database connection established Failed..");
}
else {
  echo "Connected to " . DB_DATABASE . " database.";
}

$request = explode("/", ltrim($_SERVER['REQUEST_URI'], '/'));
array_shift($request);

$requestAction = $request[0];
$requestTarget = $request[1];
$RequestTargetId = $request[2];

echo "<strong>Action: </strong>". $requestAction . "<br>";
echo "<strong>Target: </strong>". $requestTarget . "<br>";
echo "<strong>Target Id: </strong>". $RequestTargetId . "<br>";

$data = json_decode(file_get_contents("php://input"));

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept");


if (!empty($data->title)) {
  $moduleTitle = $data->title;
  $contentType = $data->contentType;
  $content = $data->content;
  $query =  "INSERT INTO videoModule(title, contentType, content) VALUES ('$moduleTitle','$contentType', '$content')";
  $res = $mysqli->query($query);
}
$query =  "SELECT * FROM videoModule";
$res = $mysqli->query($query);
$array = array();

while ($row = $res->fetch_assoc()) {
    $module = [
      "id"   => $row[id],
      "title" => $row[title],
      "contentType"=> $row[contentType],
      "content"=> $row[content],
    ];
    array_push($array, $module);
}
echo json_encode($array);
?>
