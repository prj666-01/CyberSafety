<?php
// Defines the constants to access DB
define("DB_HOST", "localhost");
define("DB_USERNAME", "user01");
define("DB_PASSWORD", "Password123!");
define("DB_DATABASE", "Course_Creation");

class Request {
    public $connection = NULL;

    function __construct() {
        $this->$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }
    function __destruct() {
        mysqli_close($this->$connection);
    }

    // getAll() function for different targets
    public function getAll($target) {
        switch($target) {

            // GET: api/courses
            case 'courses' :
                $query =  "SELECT * FROM Course";
                $res = $this->$connection->query($query);
                $array = array();
                while ($row = $res->fetch_assoc()) {
                    $module = [
                        "Course_Id" => $row[Course_Id],
                        "Course_Title" => $row[Course_Title],
                        "Course_Author"=> $row[Course_Author],
                        "User_Id" => $row[User_Id],
                        "Course_Description" => $row[Course_Description],
                        "Date_Created" => $row[Date_Created],
                        "Date_Last_Updated" => $row[Date_Last_Updated],
                        "Course_Status" => $row[Course_Status],
                        "Is_Approved" => $row[Is_Approved],
                    ];
                    array_push($array, $module);
                }
                return json_encode($array, JSON_PRETTY_PRINT);
                //return "DONE";
                break;


            // GET: api/modules
            case 'modules' :
                //echo "Selecting everything from module";
                $query =  "SELECT * FROM Module";
                $res = $this->$mysqli->query($query);
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
                return json_encode($array, JSON_PRETTY_PRINT);
                break;


            // GET: api/users
            case 'users' :
                $query =  "SELECT * FROM `User`";
                $res = $this->$mysqli->query($query);
                $array = array();
                while ($row = $res->fetch_assoc()){
                    $users = [
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
                        "Is_Administrator" => $row['Is_Administrator']
                    ];
                    array_push($array, $users);
                }
                return json_encode($array, JSON_PRETTY_PRINT);
                break;

            default: 
                return "Something went wrong...";
        }
    }
    // get one for different targets
    function getOne($target, $targetId) {
        switch($target) {
            // GET api/courses/42
            case 'courses' : 
                $query =  "SELECT * FROM Course WHERE Course_Id = '" . $targetId . "'";
                $res = $this->$mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
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
                    echo json_encode($module, JSON_PRETTY_PRINT);
                }
                
                break;
            // GET api/modules/42
            case 'modules' :
                $query =  "SELECT * FROM Module WHERE Module_Id = '" . $targetId . "'";
                $res = $this->$mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
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
                }
                break;
            // GET api/users/42
            case 'users' :
                $query =  "SELECT * FROM User WHERE User_Id = '" . $targetId . "'";
                $res = $this->$mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
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
                }
                break;
        }
    }
    function get($target, $targetId, $specifier) {

        switch($target) {
            case 'courses' : 
                // GET: api/courses/42/modules
                if ($specifier == 'modules') {
                    $query =  "SELECT * FROM Module WHERE Course_Id = '" . $targetId . "'";
                    $res = $this->$mysqli->query($query);
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
                    echo json_encode($array, JSON_PRETTY_PRINT);
                }
                break;
            case 'modules' :
                break;
            case 'users' :
                if ($specifier == 'courses') {
                    $query =  "SELECT * FROM Course WHERE User_Id = '" . $targetId . "'";
                    $res = $this->$mysqli->query($query);
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
                    echo json_encode($array, JSON_PRETTY_PRINT);
                }
                break;
        }
    }

    public function getLast($target){
       
        switch($target) {
            // GET api/courses/last
            case 'courses' : 
                $query =  "SELECT * FROM Course ORDER BY Course_Id DESC LIMIT 1";
                $res = $this->$mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
                    $row = $res->fetch_assoc();
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
                echo json_encode($module, JSON_PRETTY_PRINT);
            }
                
            break;
            // GET api/modules/last
            case 'modules' :
                $query =  "SELECT * FROM Module ORDER BY Module_Id DESC LIMIT 1";
                $res = $this->$mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
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
                }
                break;
            // GET api/users/last
            case 'users' :
            $query =  "SELECT * FROM User ORDER BY User_Id DESC LIMIT 1";
            $res = $this->$mysqli->query($query);
                if ($res->num_rows == 0) {
                    break;
                } else {
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
                }
                break;
        }
    }

    function add($target, $data) {

        switch($target) {
            
            // POST: api/courses
            case 'courses' :
                $Course_Title = $data->courseTitle;
                $Course_Author = $data->courseAuthor;
                $Course_Teaching_Level = $data->courseTeachingLevel;
                ($data->UserId == 0) ? $User_Id = 1 : $User_Id = $data->User_Id;
                $Course_Description = $data->courseDescription;
                $Date_Created = date("Y-m-d H:i:s");
                $Date_Last_Updated = date("Y-m-d H:i:s");
                $Course_Status = $data->Course_Status;
                ($data->Is_Approved == '') ? $Is_Approved = 0 : $Is_Approved = $data->Is_Approved;
                $query =  "INSERT INTO Course(Course_Title, Course_Author, Course_Teaching_Level, User_Id, Course_Description, Date_Created, Date_Last_Updated, Course_Status, Is_Approved) VALUES ('$Course_Title','$Course_Author', '$Course_Teaching_Level', '$User_Id', '$Course_Description', '$Date_Created', '$Date_Last_Updated', '$Course_Status', '$Is_Approved')";                   
                $res = $this->$mysqli->query($query);

                $last_id = $this->$mysqli->insert_id;

                $query =  "SELECT * FROM Course WHERE Course_Id = '" . $last_id . "'";
                $res = $this->$mysqli->query($query);
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

            // POST: api/modules
            case 'modules' :
                $Module_Title = $data->Module_Title;
                $Course_Id = $data->Course_Id;
                $Content_Type = $data->Content_Type;
                $Content = $data->Content;
                ($data->$Quiz == '') ? $Quiz = 0 : $Quiz = $data->Quiz;
                $query =  "INSERT INTO Module(Module_Title, Course_Id, Content_Type, Content, Quiz) VALUES ('$Module_Title','$Course_Id', '$Content_Type', '$Content', '$Quiz')";
                $res = $this->$mysqli->query($query);

                $last_id = $this->$mysqli->insert_id;

                $query =  "SELECT * FROM Module WHERE Module_Id = '" . $last_id . "'";
                $res = $this->$mysqli->query($query);
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

            // POST: api/users
            case 'users' :
                $Username = $data->Username;
                $Email = $data->Email;
                $Password = $data->Password;
                $First_Name = $data->First_Name;
                $Last_Name = $data->Last_Name;
                ($data->Is_Authenticated == '') ? $Is_Authenticated = 0 : $Is_Authenticated = $data->Is_Authenticated;
                $Teaching_Level = $data->Teaching_Level;
                $Date_Joined = date("Y-m-d H:i:s");
                $Last_Login = $data->Last_Login;
                ($data->Badge_Id == '') ? $Badge_Id = 0 : $Badge_Id = $data->Badge_Id;
                ($data->Is_Administrator == '') ? $Is_Administrator = 0 : $Is_Administrator = $data->Is_Administrator;
                $query =  "INSERT INTO User(Username, Email , Password, First_Name, Last_Name, Is_Authenticated, Teaching_Level, Date_Joined, Last_Login, Badge_Id, Is_Administrator) VALUES ('$Username', '$Email', '$Password','$First_Name','$Last_Name', '$Is_Authenticated', '$Teaching_Level', '$Date_Joined','$Last_Login','$Badge_Id', '$Is_Administrator')";
                echo $query;
                $res = $this->$mysqli->query($query);

                $last_id = $this->$mysqli->insert_id;

                $query =  "SELECT * FROM User WHERE User_Id = '" . $last_id . "'";
                $res = $this->$mysqli->query($query);
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
}

?>
