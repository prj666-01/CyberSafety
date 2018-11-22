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
    }
    // Close MySQL connection when instance dies
    function __destruct() {
        mysqli_close($this->mysqli);
    }
    // This function gets all objects from database using a target
    public function getAll($target) {
        switch($target) {
            // GET: api/courses
            case 'courses' :
                $query =  "SELECT * FROM Courses";
                $res = $this->mysqli->query($query);
                $array = array();
                while ($row = $res->fetch_assoc()) {
                    $module = [
                        "courseId" => $row['Course_ID'],
                        "courseTitle" => $row['Course_Title'],
                        "courseAuthor"=> $row['Author'],
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
            // GET: api/modules
            case 'modules' :
                $query =  "SELECT * FROM Modules";
                $res = $this->mysqli->query($query);
                $array = array();
                while ($row = $res->fetch_assoc()) {
                    $module = [
                        "moduleId" => $row[Module_ID],
                        "moduleTitle" => $row[Module_Title],
                        "content_Type"=> $row[Content_Type],
                        "content"=> $row[Content],
                        "quiz"=> $row[Quiz],
                        "courseId"=> $row[Course_ID],
                        "sequenceId"=> $row[Sequence_ID],
                    ];
                    array_push($array, $module);
                }
                return $array;
                break;
            // GET: api/users
            case 'users' :
            $query =  "SELECT * FROM Users";
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
                        "courseAuthor"=> $row['Author'],
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
                        "courseAuthor"=> $row['Author'],
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
    // This function gets one object from database using a target and a target id
    public function getOne($target, $targetId) {
        switch($target) {
            // GET api/courses/42
            case 'courses' :
                $query =  "SELECT * FROM Courses WHERE Course_ID = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $course = [
                      "courseId" => $row[Course_ID],
                      "courseTitle" => $row[Course_Title],
                      "courseAuthor"=> $row[Author],
                      "courseDescription" => $row[Description],
                      "courseTeachingLevel" => $row[Teaching_Level],
                      "dateCreated" => $row[Date_Created],
                      "dateLastUpdated" => $row[Date_Last_Updated],
                      "courseStatus" => $row[Course_Status],
                      "isApproved" => $row[Approved],
                      "userId" => $row[User_ID],
                    ];
                    return $course;
                }
                break;
            // GET api/modules/42
            case 'modules' :
                $query =  "SELECT * FROM Modules WHERE Module_ID = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $module = [
                      "moduleId" => $row[Module_ID],
                      "moduleTitle" => $row[Module_Title],
                      "content_Type"=> $row[Content_Type],
                      "content"=> $row[Content],
                      "quiz"=> $row[Quiz],
                      "courseId"=> $row[Course_ID],
                      "sequenceId"=> $row[Sequence_ID],
                    ];
                    return $module;
                }
                break;
            // GET api/users/42
            case 'users' :
                $query =  "SELECT * FROM Users WHERE User_ID = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $user = [
                      "userId"   => $row['User_ID'],
                      "username"=> $row['Username'],
                      "password"=> $row['Password'],
                      "email" => $row['Email'],
                      "firstName" => $row['First_Name'],
                      "lastName" => $row['Last_Name'],
                      "lastLogin" => $row['Last_Login'],
                      "dateJoined" => $row['Date_Joined'],
                      "approved" => $row['Approved'],
                      "badge" => $row['Badge'],
                    ];
                return $user;
                }
                break;
            case 'userbyusername' :
                $query =  "SELECT * FROM Users WHERE Username = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $user = [
                      "userId"   => $row['User_ID'],
                      "username"=> $row['Username'],
                      "password"=> $row['Password'],
                      "email" => $row['Email'],
                      "firstName" => $row['First_Name'],
                      "lastName" => $row['Last_Name'],
                      "lastLogin" => $row['Last_Login'],
                      "dateJoined" => $row['Date_Joined'],
                      "approved" => $row['Approved'],
                      "badge" => $row['Badge'],
                    ];
                return $user;
                }
                break;
        }
    }
    // This function gets objects from database using a target and a target id and a specifier
    public function get($target, $targetId, $specifier) {
        switch($target) {
            case 'courses' :
                // GET: api/courses/42/modules
                if ($specifier == 'modules') {
                    $query =  "SELECT * FROM Modules WHERE Course_ID = '" . $targetId . "'";
                    $res = $this->mysqli->query($query);
                    $array = array();
                    while ($row = $res->fetch_assoc()) {
                        $module = [
                          "moduleId" => $row[Module_ID],
                          "moduleTitle" => $row[Module_Title],
                          "content_Type"=> $row[Content_Type],
                          "content"=> $row[Content],
                          "quiz"=> $row[Quiz],
                          "courseId"=> $row[Course_ID],
                          "sequenceId"=> $row[Sequence_ID],
                        ];
                        array_push($array, $module);
                    }
                    echo $array;
                }
                break;
            case 'modules' :
                break;
            case 'users' :
                if ($specifier == 'courses') {
                    $query =  "SELECT * FROM Courses WHERE User_ID = '" . $targetId . "'";
                    $res = $this->mysqli->query($query);
                    $array = array();
                    while ($row = $res->fetch_assoc()) {
                        $module = [
                          "courseId" => $row[Course_ID],
                          "courseTitle" => $row[Course_Title],
                          "courseAuthor"=> $row[Author],
                          "courseDescription" => $row[Description],
                          "courseTeachingLevel" => $row[Teaching_Level],
                          "dateCreated" => $row[Date_Created],
                          "dateLastUpdated" => $row[Date_Last_Updated],
                          "courseStatus" => $row[Course_Status],
                          "isApproved" => $row[Approved],
                          "userId" => $row[User_ID],
                        ];
                        array_push($array, $module);
                    }
                    return $array;
                }
                break;
        }
    }
    // This function gets the last object from database using a target
    public function getLast($target) {
        switch($target) {
            // GET api/courses/last
            case 'courses' :
                $query =  "SELECT * FROM Courses ORDER BY Course_ID DESC LIMIT 1";
                $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $module = [
                      "courseId" => $row[Course_ID],
                      "courseTitle" => $row[Course_Title],
                      "courseAuthor"=> $row[Author],
                      "courseDescription" => $row[Description],
                      "courseTeachingLevel" => $row[Teaching_Level],
                      "dateCreated" => $row[Date_Created],
                      "dateLastUpdated" => $row[Date_Last_Updated],
                      "courseStatus" => $row[Course_Status],
                      "isApproved" => $row[Approved],
                      "userId" => $row[User_ID],
                ];
                echo $module;
            }
            break;
            // GET api/modules/last
            case 'modules' :
                $query =  "SELECT * FROM Modules ORDER BY Module_ID DESC LIMIT 1";
                $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $module = [
                      "moduleId" => $row[Module_ID],
                      "moduleTitle" => $row[Module_Title],
                      "content_Type"=> $row[Content_Type],
                      "content"=> $row[Content],
                      "quiz"=> $row[Quiz],
                      "courseId"=> $row[Course_ID],
                      "sequenceId"=> $row[Sequence_ID],
                    ];
                    return $module;
                }
                break;
            // GET api/users/last
            case 'users' :
            $query =  "SELECT * FROM Users ORDER BY User_ID DESC LIMIT 1";
            $res = $this->mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
                    $user = [
                      "userId"   => $row['User_ID'],
                      "username"=> $row['Username'],
                      "password"=> $row['Password'],
                      "email" => $row['Email'],
                      "firstName" => $row['First_Name'],
                      "lastName" => $row['Last_Name'],
                      "lastLogin" => $row['Last_Login'],
                      "dateJoined" => $row['Date_Joined'],
                      "approved" => $row['Approved'],
                      "badge" => $row['Badge'],
                    ];
                return $user;
                }
                break;
        }
    }
    // This function adds one object to database using a target and a request body
    public function add($target, $data) {
        switch($target) {
            // POST: api/courses
            case 'courses' :
                $Course_Title = $data->title;
                $Course_Author = $data->author;
                $Course_Teaching_Level = $data->teachingLevel;
                ($data->userId == 0) ? $User_Id = 1 : $User_Id = $data->userId;
                $Course_Description = $data->description;
                $Date_Created = date("Y-m-d H:i:s");
                $Date_Last_Updated = date("Y-m-d H:i:s");
                $Course_Status = $data->courseStatus;
                ($data->isApproved == '') ? $Is_Approved = 0 : $Is_Approved = $data->isApproved;
                $query =  "INSERT INTO Course(Course_Title, Course_Author, Course_Teaching_Level, User_Id, Course_Description, Date_Created, Date_Last_Updated, Course_Status, Is_Approved) VALUES ('$Course_Title','$Course_Author', '$Course_Teaching_Level', '$User_Id', '$Course_Description', '$Date_Created', '$Date_Last_Updated', '$Course_Status', '$Is_Approved')";
                $res = $this->mysqli->query($query);
                $last_id = $this->mysqli->insert_id;
                $query =  "SELECT * FROM Courses WHERE Course_Id = '" . $last_id . "'";
                $res = $this->mysqli->query($query);
                $row = $res->fetch_assoc();
                $course = [
                  "courseId" => $row[Course_ID],
                  "courseTitle" => $row[Course_Title],
                  "courseAuthor"=> $row[Author],
                  "courseDescription" => $row[Description],
                  "courseTeachingLevel" => $row[Teaching_Level],
                  "dateCreated" => $row[Date_Created],
                  "dateLastUpdated" => $row[Date_Last_Updated],
                  "courseStatus" => $row[Course_Status],
                  "isApproved" => $row[Approved],
                  "userId" => $row[User_ID],
                    ];
                    return $course;
                break;
            // POST: api/modules
            case 'modules' :
                $Module_Title = $data->Module_Title;
                $Course_Id = $data->Course_Id;
                $Content_Type = $data->Content_Type;
                $Content = $data->Content;
                ($data->$Quiz == '') ? $Quiz = 0 : $Quiz = $data->Quiz;
                $query =  "INSERT INTO Module(Module_Title, Course_Id, Content_Type, Content, Quiz) VALUES ('$Module_Title','$Course_Id', '$Content_Type', '$Content', '$Quiz')";
                $res = $this->mysqli->query($query);
                $last_id = $this->$mysqli->insert_id;
                $query =  "SELECT * FROM Module WHERE Module_Id = '" . $last_id . "'";
                $res = $this->mysqli->query($query);
                $row = $res->fetch_assoc();
                $module = [
                  "moduleId" => $row[Module_ID],
                  "moduleTitle" => $row[Module_Title],
                  "content_Type"=> $row[Content_Type],
                  "content"=> $row[Content],
                  "quiz"=> $row[Quiz],
                  "courseId"=> $row[Course_ID],
                  "sequenceId"=> $row[Sequence_ID],
                ];
                return $module;
                break;
            // POST: api/users
        }
    }
    // This function edits one object on database using a target, target id and a request body
    public function edit($target, $targetId, $data) {
        switch($target) {
            // PUT: api/courses
            case 'courses' :
                $Course_Title = $data->courseTitle;
                $Course_Author = $data->courseAuthor;
                $Course_Teaching_Level = $data->courseTeachingLevel;
                $User_Id = $data->User_Id;
                $Course_Description = $data->courseDescription;
                $Date_Created = $data->courseDataCreated;
                $Date_Last_Updated = $data->courseDataLastUpdated;
                $Course_Status = $data->Course_Status;
                $Is_Approved = $data->Is_Approved;
                $query =  "UPDATE Course SET Course_Title = '$Course_Title', Course_Author = '$Course_Author', Course_Teaching_Level = '$Course_Teaching_Level', User_Id = '$User_Id', Course_Description = '$Course_Description', Date_Created = '$Date_Created', Date_Last_Updated = '$Date_Last_Updated', Course_Status = '$Course_Status', Is_Approved = '$Is_Approved' WHERE Course_Id = '$targetId'";
                $res = $this->$mysqli->query($query);
                $query =  "SELECT * FROM Course WHERE Course_Id = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                $row = $res->fetch_assoc();
                $course = [
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
                    echo json_encode($course, JSON_PRETTY_PRINT);
                break;
            // PUT: api/modules
            case 'modules' :
                $Module_Title = $data->Module_Title;
                $Course_Id = $data->Course_Id;
                $Content_Type = $data->Content_Type;
                $Content = $data->Content;
                $Quiz = $data->Quiz;
                $query =  "UPDATE Module SET Module_Title = '$Module_Title', Course_Id = '$Course_Id', Content_Type = '$Content_Type', Content = '$Content', Quiz = '$Quiz' WHERE Module_Id = '$targetId'";
                $res = $this->mysqli->query($query);
                $last_id = $this->mysqli->insert_id;
                $query =  "SELECT * FROM Module WHERE Module_Id = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                $row = $res->fetch_assoc();
                $module = [
                    "Module_Id"   => $row[Module_Id],
                    "Module_Title" => $row[Module_Title],
                    "Course_Id"=> $row[Course_Id],
                    "Content_Type"=> $row[Content_Type],
                    "Content"=> $row[Content],
                    "Quiz"=> $row[Quiz],
                ];
                echo json_encode($module, JSON_PRETTY_PRINT);
                break;
            // PUT: api/users
            case 'users' :
                $Username = $data->Username;
                $Email = $data->Email;
                $Password = $data->Password;
                $First_Name = $data->First_Name;
                $Last_Name = $data->Last_Name;
                $Is_Authenticated = $data->Is_Authenticated;
                $Teaching_Level = $data->Teaching_Level;
                $Date_Joined = $data->Date_Joined;
                $Last_Login = $data->Last_Login;
                $Badge_Id = $data->Badge_Id;
                $Is_Administrator = $data->Is_Administrator;
                $query =  "UPDATE User SET Username = '$Username', Email = '$Email', Password = '$Password', First_Name = '$First_Name', Last_Name = '$Last_Name', Is_Authenticated = '$Is_Authenticated', Teaching_Level = '$Teaching_Level', Date_Joined = '$Date_Joined', Last_Login = '$Last_Login', Badge_Id = '$Badge_Id', Is_Administrator = '$Is_Administrator'  WHERE User_Id = '$targetId'";
                $res = $this->mysqli->query($query);
                $query =  "SELECT * FROM User WHERE User_Id = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                $row = $res->fetch_assoc();
                $user = [
                    "User_Id"   => $row['User_Id'],
                    "Username"=> $row['Username'],
                    "Email" => $row['Email'],
                    "Password"=> $row['Password'],
                    "First_Name" => $row['First_Name'],
                    "Last_Name" => $row['Last_Name'],
                    "Is_Authenticated" => $row['Is_Authenticated'],
                    "Teaching_Level" => $row['Teaching_Level'],
                    "Date_Joined" => $row['Date_Joined'],
                    "Last_Login" => $row['Last_Login'],
                    "Badge_Id" => $row['Badge_Id'],
                    "Is_Administrator" => $row['Is_Administrator'],
                ];
                echo json_encode($user, JSON_PRETTY_PRINT);
                break;
        }
    }
    // This function deletes one object to database using a target and a target id
    public function delete($target, $targetId) {
        switch($target) {
            // DELETE: api/courses/42
            case 'courses' :
                $query =  "DELETE FROM Course WHERE Course_Id = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                break;
            // DELETE: api/modules/42
            case 'modules' :
                $query =  "DELETE FROM Module WHERE  Module_Id = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                break;
            // DELETE: api/users/42
            case 'users' :
                $query =  "DELETE FROM User WHERE User_Id = '" . $targetId . "'";
                $res = $this->mysqli->query($query);
                break;
        }
    }
    public function addUser($data) {
      $username = $data['username'];
      $password = $data['password'];
      $email = $data['email'];
      $firstName = $data['firstName'];
      $lastName = $data['lastName'];
      $lastLogin = $data['lastLogin'];
      $dateJoined = $data['dateJoined'];
      $approved = $data['approved'];
      $badge = $data['badge'];
      $query =  "INSERT INTO Users (Username, Password, Email, First_Name, Last_Name, Last_Login, Date_Joined, Approved, Badge) VALUES ('$username', '$password', '$email','$firstName','$lastName', '$lastLogin', '$dateJoined', '$approved', '$badge')";
      echo $query;
      $res = $this->mysqli->query($query);
      if ($this->mysqli->affected_rows > 0) {
        return true;
      } else {
        return false;
      }
    }
    public function addBasicProfile($data) {
      $userId = $data['userId'];
      $city = $data['city'];
      $province = $data['province'];
      $country = $data['country'];
      $occupation = $data['occupation'];
      $birthday = $data['birthday'];
      $gender = $data['gender'];
      $query =  "INSERT INTO Basic_Profiles (User_ID, City , Province, Country, Occupation, Birth_Date, Gender) VALUES ('$userId', '$city', '$province','$country','$occupation', '$birthday', '$gender')";
      //echo $query;
      $res = $this->mysqli->query($query);
      if ($this->mysqli->affected_rows > 0) {
        return true;
      } else {
        return false;
      }
    }
    public function addFullProfile($data) {
      $userId = $data['userId'];
      $educationLevel = $data['educationLevel'];
      $interest = $data['interest'];
      $newsletter = $data['newsletter'];
      $postalCode = $data['postalCode'];
      $specialization = $data['specialization'];
      $experience = $data['experience'];
      $district = $data['district'];
      $eduBoard = $data['eduBoard'];
      $profEmail = $data['profEmail'];
      $phone = $data['phone'];
      $accreditations = $data['accreditations'];
      $linkedin = $data['linkedin'];
      $audLocation = $data['audLocation'];
      $targetAge = $data['targetAge'];
      $audSize = $data['audSize'];
      $currEduLevel = $data['currEduLevel'];
      $importantAreas = $data['importantAreas'];
      $query =  "INSERT INTO User(User_ID, Education_Level , Interest, Newsletter, Postal_Code, Specialization, Experience, District, Edu_Board, Prof_Email, Phone, Accreditations, LinkedIN, Aud_Location, Target_Age, Aud_Size, Curr_Edu_Level, Important_Areas) VALUES ('$userId', '$educationLevel', '$interest','$newsletter','$postalCode', '$specialization', '$experience', '$district', '$eduBoard', '$profEmail', '$phone', '$accreditations', '$linkedin', '$audLocation', '$targetAge', '$audSize', '$currEduLevel','$importantAreas')";
      echo $query;
      $res = $this->mysqli->query($query);
      if ($this->mysqli->affected_rows > 0) {
        return true;
      } else {
        return false;
      }
    }
    // Check if the passed $username exists
    public function userExists($username) {
      $query =  "SELECT * FROM Users WHERE Username = '" . $username . "'";
      $res = $this->mysqli->query($query);
      return (mysqli_num_rows($res) != 0) ? true : false;
    }
    // Check if the passed $email exists
    public function emailExists($email) {
      $query =  "SELECT * FROM Users WHERE Email = '" . $email . "'";
      $res = $this->mysqli->query($query);
      return (mysqli_num_rows($res) != 0) ? true : false;
    }
    public function getPassword($login) {
      $query =  "SELECT Password FROM Users WHERE Username = '" . $login . "' OR Email = '" . $login . "'";
      $res = $this->mysqli->query($query);
      $row = $res->fetch_assoc();
      return $row['Password'];
    }

    public function getBadge($login) {
        $query =  "SELECT Badge FROM Users WHERE Username = '" . $login . "' OR Email = '" . $login . "'";
        $res = $this->mysqli->query($query);
        $row = $res->fetch_assoc();
        return $row['Password'];
      }
}
?>