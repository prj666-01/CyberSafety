<?php

//Define the constants for the database
define("DB_HOST", "localhost");
define("DB_USERNAME", "user01");
define("DB_PASSWORD", "Password123!");
define("DB_DATABASE", "PRJ666");

// Headers required for the API to function
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept");

//Start connection with database
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($mysqli->connect_error) {
  //die("Database connection established Failed..<br><br>");
}
else {
  echo "Connected to " . DB_DATABASE . " database.<br><br>";
}

//reads the body of the request
$data = json_decode(file_get_contents("php://input"));
if(empty($data->title)) {
    echo "The request does not have a body.<br><br>";
}
//reads the URI and creates an array with the command words.
$request = explode("/", ltrim($_SERVER['REQUEST_URI'], '/'));
array_shift($request);

//
$requestAction = $request[0];
$requestTarget = $request[1];
$requestTargetId = $request[2];
$query = "";
if (empty($requestTarget))
    echo "Please define a target for your action<br><br>";
else {
    switch($requestAction) {
        case 'get' :
            if (empty($requestTargetId))
                echo "This action needs a target ID<br><br>";
            else {
                if($requestTarget == 'course') {
                    echo "You are getting data from a course<br><br>";
                }
                else if ($requestTarget == 'module') {
                    echo "You are getting data from a module<br><br>";
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
                }
                else {
                    echo "This is a bad request<br><br>";
                }
            }
            break;

        case 'create' :
            switch($requestTarget) {
                case 'course' :
                    echo "You are creating a new course<br><br>";
                    break;
                case 'module' :
                    echo "You are creating a new module<br><br>";
                    if (!empty($data->title)) {
                        $moduleTitle = $data->title;
                        $contentType = $data->contentType;
                        $content = $data->content;
                        $query =  "INSERT INTO videoModule(title, contentType, content) VALUES ('$moduleTitle','$contentType', '$content')";
                    }
                    break;
                default : 
                    echo "This is a bad request<br><br>";
            }
            $res = $mysqli->query($query);
            break;
        case 'modify' :
            if (empty($requestTargetId))
                echo "This action needs a target ID<br><br>";
            else {
                if($requestTarget == 'course') {
                    echo "You are modifying a course<br><br>";

                } else if($requestTarget == 'module') {
                    echo "You are modifying a module<br><br>";
                }
                else {
                    echo "This is a bad request<br><br>";
                }
            }
            break;
            
        case 'remove' :
            if (empty($requestTargetId))
                    echo "This action needs a target ID<br><br>";
            else {
                if($requestTarget == 'course') {
                    echo "You are removing a course<br><br>";

                } else if($requestTarget == 'module') {
                    echo "You are removing a module<br><br>";
                }
                else {
                    echo "This is a bad request<br><br>";
                }
            }
            break;
        default : 
        echo "This is a bad request<br><br>";
            break;
    }
}

//testing the variables
echo "<strong>Action: </strong>". $requestAction . "<br>";
echo "<strong>Target: </strong>". $requestTarget . "<br>";
echo "<strong>Target Id: </strong>". $requestTargetId . "<br>";


//closes the DB connection
mysqli_close($mysqli);

?>
