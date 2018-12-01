<?php
require("includes/config.php");

//Created By ColinC

// TODO
function addBasicProfile($profileInfoArray) {
  $mysqli = openConnection();
  $query =  "INSERT INTO Basic_Profiles
  (User_ID,
   City ,
   Province,
   Country,
   Occupation,
   Gender)
    VALUES
    ($profileInfoArray[0],
    '$profileInfoArray[1]',
    '$profileInfoArray[2]',
    '$profileInfoArray[3]',
    '$profileInfoArray[4]',
    '$profileInfoArray[5]'
     )";
    if ($mysqli->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}


function openConnection() {
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  if ($mysqli->connect_error) {
      die('Connect Error: ' . $mysqli->connect_error);
    }
  else {
    return $mysqli;
  }
}

//Created By ColinM

//Created By Yan
function closeConnection() {
  mysqli_close($mysqli);
}

function getAll($data) {
  $mysqli = openConnection();
  $query =  "SELECT * FROM " . $data;
  $res = $mysqli->query($query);
  return $res;
}
function getById($data, $id) {
  $mysqli = openConnection();
  switch($data) {
    case 'Courses' :
      $query =  "SELECT * FROM " . $data . " WHERE Course_Id = " . $id;
      break;
    case 'Modules' :
      $query =  "SELECT * FROM "  . $data . " WHERE Module_Id = " . $id;
      break;
    case 'Users' :
      $query =  "SELECT * FROM  " . $data . " WHERE User_Id = " . $id;
      break;
  }
  $res = $mysqli->query($query);
  return $res;
}

function getAllApproved($target) {
  $mysqli = openConnection();
  $query =  "SELECT * FROM " . $target . " WHERE Approved = 1";
  $res = $mysqli->query($query);
  return $res;
}
function getAllNotApproved($target) {
  $mysqli = openConnection();
  $query =  "SELECT * FROM ". $target . " WHERE Approved = 0";
  $res = $mysqli->query($query);
  return $res;
}

function getOne($target, $condition, $value) {
  $mysqli = openConnection();
  $target = ucfirst($target);
  $query =  "SELECT * FROM " . $target . " WHERE " . $condition . " = '" . $value . "'";
  //echo $query;
  $res = $mysqli->query($query);
  return $res;
}
function doesExist($row, $data) {
      $mysqli = openConnection();
      $query =  "SELECT * FROM Users WHERE " . $row . " = '" . $data . "'";
      $res = $mysqli->query($query);
      return $res;
}
// it is being replaced by doesExist();
function userExists($username) {
      $mysqli = openConnection();
      $query = "SELECT * FROM Users WHERE Username = '" . $username . "'";
      $res = $mysqli->query($query);
      return (mysqli_num_rows($res) != 0) ? true : false;
}
// Check if the passed $email exists, it is being replaced by doesExist();
function emailExists($email) {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Users WHERE Email = '" . $email . "'";
  $res = $mysqli->query($query);
  return (mysqli_num_rows($res) != 0) ? true : false;
    }

// Returns the password by username or email
function getPassword($login) {
  $mysqli = openConnection();
  $query =  "SELECT Password FROM Users WHERE Username = '" . $login . "' OR Email = '" . $login . "'";
  $res = $mysqli->query($query);
  $row = $res->fetch_assoc();
  return $row['Password'];
}

// Ignore this code for now
function getQuizLast() {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Quizzes WHERE Username = '" . $login . "' OR Email = '" . $login . "'";
  $res = $mysqli->query($query);
  $row = $res->fetch_assoc();
  return $row['Password'];
}

// Add a quiz by an array containing the data.
function addQuiz($data) {
  $mysqli = openConnection();
  $title = $data['title'];
  $description = $data['description'];
  $courseid = $data['courseId'];
  $quizType = $data['quizType'];
  $query =  "INSERT INTO Quizzes (Quiz_Title, Quiz_Description, Course_Id, Quiz_Type) VALUES ('$title', '$description', '$courseid', '$quizType')";
  //echo $query;
  $res = $mysqli->query($query);
  if ($mysqli->affected_rows > 0) {
    return $last_id = $mysqli->insert_id;
  } else {
    return 0;
  }
}

// Add a question by an array containing the data.
function addQuestion($data) {
  $mysqli = openConnection();
  $question = $mysqli->real_escape_string($data['question']);
  $quizId = $mysqli->real_escape_string($data['quizId']);
  $query =  "INSERT INTO Questions (Question, Quiz_Id) VALUES ('$question', '$quizId')";
  //echo $query;
  $res = $mysqli->query($query);
  if ($mysqli->affected_rows > 0) {
    return $last_id = $mysqli->insert_id;
  } else {
    return 0;
  }
}
// Add an answer for a question by an array containing the data.
function addAnswer($data) {
  $mysqli = openConnection();
  $answer = $mysqli->real_escape_string($data['answer']);
  $questionId = $mysqli->real_escape_string($data['questionId']);
  $correct = $mysqli->real_escape_string($data['isCorrect']);
  $query =  "INSERT INTO Answers (Answer, isCorrect, Question_Id) VALUES ('$answer', '$correct', '$questionId')";
      //echo $query;
  $res = $mysqli->query($query);

  if ($mysqli->affected_rows > 0) {
    return $last_id = $mysqli->insert_id;
  } else {
    return 0;
  }
}

// Return a questions array by ID
function getQuestionsById($id) {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Questions WHERE Quiz_Id = " . $id;
  $res = $mysqli->query($query);
  $array = array();
  while ($row = $res->fetch_assoc()) {
    $question = [
      "questionId" => $row['Question_Id'],
      "question" => $row['Question']
    ];
    array_push($array, $question);
  }
  return $array;
}

// Return an answer array by ID
function getAnswerById($id) {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Answers WHERE Question_Id = " . $id;
  $res = $mysqli->query($query);
  $array = array();
  while ($row = $res->fetch_assoc()) {
    $answer = [
      "answerId" => $row['Answer_Id'],
      "answer" => $row['Answer']
    ];
    array_push($array, $answer);
  }
  return $array;
}

// TODO
function addFullProfile() {
  $mysqli = openConnection();
  //$query =  "INSERT INTO User(User_ID, Education_Level , Interest, Newsletter, Postal_Code, Specialization, Experience, District, Edu_Board, Prof_Email, Phone, Accreditations, LinkedIN, Aud_Location, Target_Age, Aud_Size, Curr_Edu_Level, Important_Areas) VALUES ('$userId', '$educationLevel', '$interest','$newsletter','$postalCode', '$specialization', '$experience', '$district', '$eduBoard', '$profEmail', '$phone', '$accreditations', '$linkedin', '$audLocation', '$targetAge', '$audSize', '$currEduLevel','$importantAreas')";
  $query = "";
  $res = $mysqli->query($query);
  if ($mysqli->affected_rows > 0) {
    return true;
  } else {
    return false;
  }
}

//Created By Manali\
function addUser($data) {
    $mysqli = openConnection();
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $lastLogin = $data['lastLogin'];
    $dateJoined = $data['dateJoined'];
    $approved = $data['approved'];
    $badge = $data['badge'];
    $is_auth = $data['Is_Authenticated'];
    $Auth_code = $data['Authentication_code'];
    $admin = $data['Is_Admin'];
    $profile = $data['User_Profiles'];
    $query =  "INSERT INTO Users (Username, Password, Email, First_Name, Last_Name, Last_Login, Date_Joined, Approved, Badge,Is_Authenticated,Authentication_code,Is_Admin,User_Profiles) VALUES ('$username', '$password', '$email','$firstName','$lastName', '$lastLogin', '$dateJoined', '$approved', '$badge','$is_auth','$Auth_code','$admin','$profile')";
    $res = $mysqli->query($query);
    if ($mysqli->affected_rows > 0) {
      return true;
    } else {
      return false;
    }
  }


?>
