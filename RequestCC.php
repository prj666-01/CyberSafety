<?php
include 'Request.php';
////////////////////////////////////////////////////////////////////////////////////////////
//                             ADD NEW FUNCTIONS HERE                                     //
////////////////////////////////////////////////////////////////////////////////////////////
function getAllUsers() {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Users";
  $res = $mysqli->query($query);
  $array = array();
    while ($row = $res->fetch_assoc()){
        $profile = [
          "userId"   => $row['User_ID'],
          "username"=> $row['Username'],
          "password"=> $row['Password'],
          "email" => $row['Email'],
          "firstName" => $row['First_Name'],
          "lastName" => $row['Last_Name'],
          "lastLogin" => $row['Last_Login'],
          "dateJoined" => $row['Date_Joined'],
          "approved" => $row['Approved'],
          "status" => $row['User_Status'],
          "profile" => $row['User_Profiles'],
          "description" => $row['Description'],
          "admin" => $row['Is_Admin'],
          "badge" => $row['Badge'],
          "authenticated" => $row['Is_Authenticated']
        ];
        array_push($array, $profile);
    }
    return $array;
}

function getAllCourses() {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Courses";
  $res = $mysqli->query($query);
  $array = array();
    while ($row = $res->fetch_assoc()){
        $profile = [
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
        array_push($array, $profile);
    }
    return $array;
}

function addBasicProfile($profileInfoArray) {
  echo "Made it";
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

function getBasicProfile() {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Basic_Profiles WHERE User_ID = 82";
  $res = $mysqli->query($query);
  $array = array();
    while ($row = $res->fetch_assoc()){
        $profile = [
            "city" => $row['City'],
            "province" => $row['Province'],
            "country" => $row['Country'],
            "occupation" => $row['Occupation'],
            "gender" => $row['Gender']
        ];
        array_push($array, $profile);
    }
    return $array;
}

function getFullProfile() {
  $mysqli = openConnection();
  $query =  "SELECT * FROM Full_Profile WHERE User_ID = 82";
  $res = $mysqli->query($query);
  $array = array();
    while ($row = $res->fetch_assoc()){
        $profile = [
            "educationLevel" => $row['Education_Level'],
            "interest" => $row['Interest'],
            "newsLetter" => $row['Newsletter'],
            "postalCode" => $row['Postal_Code'],
            "specialization" => $row['Specialization'],
            "experience" => $row['Experience'],
            "district" => $row['District'],
            "eduBoard" => $row['Edu_Board'],
            "profEmail" => $row['Prof_Email'],
            "phone" => $row['Phone'],
            "accreditations" => $row['Accreditations'],
            "linkedIN" => $row['LinkedIN'],
            "audLocation" => $row['Aud_Location'],
            "targetAge" => $row['Target_Age'],
            "audSize" => $row['Aud_Size'],
            "currEduLevel" => $row['Curr_Edu_Level'],
            "importantAreas" => $row['Important_Areas']
        ];
        array_push($array, $profile);
    }
    return $array;
}

function updateUserProfiles($userID, $prof){
  $mysqli = openConnection();
  $query = "UPDATE Users SET
   User_Profiles = $prof
   WHERE User_ID = $userID";
  if ($mysqli->query($query) === TRUE) {
  } else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
  }
}

//COLINM
function addFullProfile($profileInfoArray) {
  $mysqli = openConnection();
  $query =  "INSERT INTO Full_Profile(
    User_ID,
    Education_Level ,
    Interest,
    Newsletter,
    Postal_Code,
    Specialization,
    Experience,
    District,
    Edu_Board,
    Prof_Email,
    Phone,
    Accreditations,
    LinkedIN,
    Aud_Location,
    Target_Age,
    Aud_Size,
    Curr_Edu_Level,
    Important_Areas)
  VALUES
    ($profileInfoArray[0],
    '$profileInfoArray[1]',
    '$profileInfoArray[2]',
    '$profileInfoArray[3]',
    '$profileInfoArray[4]',
    '$profileInfoArray[5]',
    '$profileInfoArray[6]',
    '$profileInfoArray[7]',
    '$profileInfoArray[8]',
    '$profileInfoArray[9]',
    '$profileInfoArray[10]',
    '$profileInfoArray[11]',
    '$profileInfoArray[12]',
    '$profileInfoArray[13]',
    '$profileInfoArray[14]',
    '$profileInfoArray[15]',
    '$profileInfoArray[16]',
    '$profileInfoArray[17]'
     )";
    if ($mysqli->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

function updateFullProfile($userID, $profileInfoArray) {
  $mysqli = openConnection();
  $query =  "UPDATE Full_Profile SET
    User_ID = $profileInfoArray[0],
    Education_Level = '$profileInfoArray[1]',
    Interest = '$profileInfoArray[2]',
    Newsletter = '$profileInfoArray[3]',
    Postal_Code = '$profileInfoArray[4]',
    Specialization = '$profileInfoArray[5]',
    Experience = '$profileInfoArray[6]',
    District = '$profileInfoArray[7]',
    Edu_Board = '$profileInfoArray[8]',
    Prof_Email = '$profileInfoArray[9]',
    Phone = '$profileInfoArray[10]',
    Accreditations = '$profileInfoArray[11]',
    LinkedIN = '$profileInfoArray[12]',
    Aud_Location = '$profileInfoArray[13]',
    Target_Age = '$profileInfoArray[14]',
    Aud_Size = '$profileInfoArray[15]',
    Curr_Edu_Level = '$profileInfoArray[16]',
    Important_Areas = '$profileInfoArray[17]'
    where User_ID = $userID";
    if ($mysqli->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

function updateBasicProfile($userID, $profileInfoArray) {
  $mysqli = openConnection();
  $query =  "UPDATE Basic_Profiles SET
  User_ID = $profileInfoArray[0],
   City = '$profileInfoArray[1]',
   Province = '$profileInfoArray[2]',
   Country = '$profileInfoArray[3]',
   Occupation = '$profileInfoArray[4]',
   Gender = '$profileInfoArray[5]'
   WHERE User_ID = $userID";
    if ($mysqli->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

function updateProfileFlag($userID){
  $mysqli = openConnection();
  $query = "UPDATE Users SET
   Updated_Profile = 1
   WHERE User_ID = $userID";
  if ($mysqli->query($query) === TRUE) {
  } else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
  }
}
?>
