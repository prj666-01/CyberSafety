<?php
header('Content-Type: application/json');

require("Request.php");

$data = json_decode(file_get_contents("php://input"));
// Read the URI and creates an array with the command words.
// Trim the leading slash and separate the words into elements of a array, using slash as separator.
$request = explode("/", ltrim($_SERVER['REQUEST_URI'], '/'));
// Removes the element in the array, which is the 'api'
array_shift($request);
$requestTarget = $request[0];
$requestTargetId = $request[1];
$requestSpecifier = $request[2];
// Get request method
$method = $_SERVER['REQUEST_METHOD'];

// Check if request body is empty
if(count($data) == 0) {
    //echo "The request does not have a body.<br><br>";
}
// Check for bad requests
$badRequest = false;
//echo $requestTarget;
if ($requestTarget != '' && $requestTarget != 'courses' && $requestTarget != 'modules' && $requestTarget != 'users') {
    $badRequest = true;
}

// Check if is bad request
if ($badRequest) {
    header("HTTP/1.1 400 Bad Request");
} else {
    // Check if user is accessing /api/ path
    if($requestTarget == '') {
        header('Location: https://github.com/prj666-01/CyberSafety/blob/master/api/README.md');
    } else {
        switch($method) {
            // GET: /api/courses
            case 'GET':
                if(!empty($requestSpecifier)) {
                    $request = new Request();
                    echo $request->get($requestTarget, $requestTargetId, $requestSpecifier);
                }
                else if(empty($requestSpecifier) && !empty($requestTargetId)) {
                    $request = new Request();
                    echo $request->getOne($requestTarget, $requestTargetId);
                } else {
                    $request = new Request();
                    echo $request->getAll($requestTarget);
                    
                }
                break;
            // POST: /api/courses
            case 'POST':
                // Check if it's bad request
                if(!empty($requestTargetId)) {
                    header("HTTP/1.1 400 Bad Request");
                } else {
                    if (count($data) != 0) {
                        $request = new Request();
                        echo $request->add($requestTarget, $data);
                    } else {
                        header("HTTP/1.1 400 Bad Request");
                    }
                }
                break;
            // PUT: /api/courses
            case 'PUT':
                echo "You are PUTting";

                break;
            // DELETE: /api/courses
            case 'DELETE':
                echo "You are DELETEing";

                break;
        }
    }
}
// Check if user is accessing /api/
?>
