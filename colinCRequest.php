<?php

// Defines the constants to access DB
require_once('includes/config.php');

class Request {

    public $mysqli = NULL;

    // Initiate Request object with a MySQL connection
    function __construct() {
        $this->mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if ($this->mysqli->connect_error) {
          die('Connect Error: ' . $mysqli->connect_error);
        }

    // Close MySQL connection when instance dies
  }
    function __destruct() {
        mysqli_close($this->mysqli);
    }

    // Function will return all courses with approved status of 1
    public function getAllApproved($target) {

        switch($target) {
            // GET: api/courses
            case 'courses' :
                $query =  "SELECT * FROM Courses WHERE Approved = 1";
                $res = $this->mysqli->query($query);
                $array = array();
                while ($row = $res->fetch_assoc()) {
                    $module = [
                        "courseId" => $row['Course_ID'],
                        "courseTitle" => $row['Course_Title'],
                        "courseDescription" => $row['Description'],
                        "courseTeachingLevel" => $row['Teaching_Level'],
                        "dateCreated" => $row['Date_Created'],
                        "dateLastUpdated" => $row['Date_Last_Updated'],
                        "courseStatus" => $row['Course_Status'],
                        "approved" => $row['Approved'],
                        "userId" => $row['User_ID'],
                    ];
                    array_push($array, $module);
                }
                return $array;
                break;

            default:
                return "Something went wrong...";
        }
    }

    // Function will return all courses with approved status of 1
    public function getAllNotApproved($target) {

        switch($target) {
            // GET: api/courses
            case 'courses' :
                $query =  "SELECT * FROM Courses WHERE Approved = 0";
                $res = $this->mysqli->query($query);
                $array = array();
                while ($row = $res->fetch_assoc()) {
                    $module = [
                        "courseId" => $row['Course_ID'],
                        "courseTitle" => $row['Course_Title'],
                        "courseDescription" => $row['Description'],
                        "courseTeachingLevel" => $row['Teaching_Level'],
                        "dateCreated" => $row['Date_Created'],
                        "dateLastUpdated" => $row['Date_Last_Updated'],
                        "courseStatus" => $row['Course_Status'],
                        "approved" => $row['Approved'],
                        "userId" => $row['User_ID'],
                    ];
                    array_push($array, $module);
                }
                return $array;
                break;

            default:
                return "Something went wrong...";
        }
    }

    public function getAllAdmins($target) {

        switch($target) {
            case 'admins' :
            $query =  "SELECT * FROM Users WHERE Is_Admin = 1";
            $res = $this->mysqli->query($query);
            $array = array();
                while ($row = $res->fetch_assoc()){
                    $users = [
                        "userId"   => $row['User_ID'],
                        "username"=> $row['Username'],
                        "password"=> $row['Password'],
                        "email" => $row['Email'],
                        "firstName" => $row['First_Name'],
                        "lastName" => $row['Last_Name'],
                        "lastLogin" => $row['Last_Login'],
                        "dateJoined" => $row['Date_Joined'],
                        "approved" => $row['Approved'],
                        "badge" => $row['Badge']
                    ];
                    array_push($array, $users);
                }
                return $array;
                break;

            default:
                return "Something went wrong...";
        }
    }

    public function getAllCoursesByUser($target, $userInput) {

        switch($target) {
            case 'coursesByUser' :
            $query =  "SELECT * FROM Courses WHERE User_ID = $userInput";
            $res = $this->mysqli->query($query);
            $array = array();
            while ($row = $res->fetch_assoc()) {
                $module = [
                    "courseId" => $row['Course_ID'],
                    "courseTitle" => $row['Course_Title'],
                    "courseDescription" => $row['Description'],
                    "courseTeachingLevel" => $row['Teaching_Level'],
                    "dateCreated" => $row['Date_Created'],
                    "dateLastUpdated" => $row['Date_Last_Updated'],
                    "courseStatus" => $row['Course_Status'],
                    "approved" => $row['Approved'],
                    "userId" => $row['User_ID'],
                ];
                array_push($array, $module);
            }
            return $array;
            break;

            default:
                return "Something went wrong...";
        }
    }

}
?>
