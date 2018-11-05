<?php

//Define the constants for the database
define("DB_HOST", "localhost");
define("DB_USERNAME", "user01");
define("DB_PASSWORD", "Password123!");
define("DB_DATABASE", "Course_Creation");

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
  //echo "Connected to " . DB_DATABASE . " database.<br><br>";
}

//reads the body of the request
$data = json_decode(file_get_contents("php://input"));

if(count($data) == 0) {
    //echo "The request does not have a body.<br><br>";
}
//reads the URI and creates an array with the command words.
$request = explode("/", ltrim($_SERVER['REQUEST_URI'], '/'));
array_shift($request);

//
$requestAction = $request[0];
$requestTarget = $request[1];
$requestTargetId = $request[2];
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
                else if ($requestTarget == 'coursesByUser') {
                    $query =  "SELECT * FROM Course WHERE User_Id = '" . $requestTargetId . "'";
                    $res = $mysqli->query($query);
                    $array = array();
                    while ($row = $res->fetch_assoc()) {
                        $module = [
                        "Course_Id"   => $row[Course_Id],
                        "Course_Title" => $row[Course_Title],
                        "Course_Author"=> $row[Course_Author],
                        "User_Id"=> $row[User_Id],
                        "Course_Description"=> $row[Course_Description],
                        "Date_Created"=> $row[Date_Created],
                        "Date_Last_Updated"=> $row[Date_Last_Updated],
                        "Course_Status"=> $row[Course_Status],
                        "Is_Approved"=> $row[Is_Approved],
                        ];
                        array_push($array, $module);
                    }
                    echo json_encode($array);
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
        
                else if ($requestTarget == 'modulesByCourse') {
                    $query =  "SELECT * FROM Module WHERE Course_Id = '" . $requestTargetId . "'";
                    $res = $mysqli->query($query);
                    $array = array();
                    while ($row = $res->fetch_assoc()) {
                        $module = [
                        "Module_Id"   => $row[Module_Id],
                        "Module_Title" => $row[Module_Title],
                        "Course_Id"=> $row[Course_Id],
                        "Content_Type"=> $row[Content_Type],
                        "Content"=> $row[Content],
                        "Quiz"=> $row[Quiz],
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
                    if (count($data) != 0) {
                        $Course_Title = $data->courseTitle;
                        $Course_Author = $data->courseAuthor;
                        $Course_Teaching_Level = $data->courseTeachingLevel;
                        $User_Id = $data->User_Id;
                        $Course_Description = $data->courseDescription;
                        $Date_Created = $data->Date_Created;
                        $Date_Last_Updated = $data->Date_Last_Updated;
                        $Course_Status = $data->Course_Status;
                        $Is_Approved = $data->Is_Approved;
                        $query =  "INSERT INTO Course(Course_Title, Course_Author, Course_Teaching_Level, User_Id, Course_Description, Date_Created, Date_Last_Updated, Course_Status, Is_Approved) VALUES ('$Course_Title','$Course_Author', '$Course_Teaching_Level', '$User_Id', '$Course_Description', '$Date_Created', '$Date_Last_Updated', '$Course_Status', '$Is_Approved')";                        
                        $res = $mysqli->query($query);
                        echo "Course '" . $title . "' created.";
                    }
                    break;
                case 'module' :
                    if (count($data) != 0) {
                        $Module_Title = $data->Module_Title;
                        $Course_Id = $data->Course_Id;
                        $Content_Type = $data->Content_Type;
                        $Content = $data->Content;
                        $Quiz = $data->Quiz;

                        $query =  "INSERT INTO Module(Module_Title, Course_Id, Content_Type, Content, Quiz) VALUES ('$Module_Title','$Course_Id', '$Content_Type', '$Content', '$Quiz')";
                        $res = $mysqli->query($query);
                        echo "Module '" . $Module_Title . "' created.";
                    }
                    break;
                default : 
                    echo "This is a bad request<br><br>";
            }
            //$res = $mysqli->query($query);
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
//echo $query . "-> SQL <br><br>";
//testing the variables
//echo "<strong>Action: </strong>". $requestAction . "<br>";
//echo "<strong>Target: </strong>". $requestTarget . "<br>";
//echo "<strong>Target Id: </strong>". $requestTargetId . "<br>";


//closes the DB connection
mysqli_close($mysqli);

?>

