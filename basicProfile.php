<?php
require('./Request.php');
// Check if the user submitted the username form
if (!empty($_POST['basicprofile'])) {
  $array = [
    "userId" => $_POST['userID'],
    "city" => $_POST['city'],
    "province" => $_POST['province'],
    "country" => $_POST['country'],
    "occupation" => $_POST['occupation'],
    "birthday" => $_POST['birthday'],
    "gender" => $_POST['gender'],
  ];
  //Instantiate new Request class
  $request = new Request();
  ($request->addBasicProfile($array)) ? $result = "Profile added successfully." : $result = "Profile couldn't be added successfully.";
  echo $result;
}
?>
<?php
 require("includes/header.php");
?>
<style>
input{
  display: block;
  width: 100%;
  height: 20px;
  margin: 15px 0px;
}
input[type="text"], input[type="email"]{
  outline: none;
  border: none;
  background-color: lightgrey;
  padding: 5px 0px!important;
  text-align: center;
  transition: all 250ms;
}
input[type="text"]:focus, input[type="email"]:focus{
  opacity: 0.5;
}
input[type="button"], input[type="submit"]{
  margin-top: 20px !important;
  cursor: pointer;
  outline: none;
  border: none;
  padding: 15px !important;
  line-height: 0px;
  background-color: #fff;
  transition: all 150ms;
  box-shadow: rgba(0,0,0,0.2) 0px 1px 5px;
}
input[type="button"]:hover, input[type="submit"]:hover{
  background-color: darkgrey;
  color: white;
}
h2{
  text-align: center;
  font-size: 22px;
  font-family: opensans;
  font-weight: 400;
  display: block;
  margin-bottom: 25px !important;
}
</style>
</head>
<body>
<?php
require("includes/nav.php");
 ?>
    <div class="container">
              <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                  <div class="panel-heading">
                    <div class="row">
                      <div style="margin:0px auto">
                       <h1>Basic Profile</a> </h1>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form id="basicprofile" name="basicprofile" method="POST" action="#">
                          <div class="form-group">
                            <input type="text" name="username" id="username"  class="form-control" placeholder="Jane Doe" readonly/>
                            <input type="hidden" name="userID" id="userID"  class="form-control" value="1"/>
                          </div>
                          <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" tabindex="1" class="form-control" placeholder="City" maxlength="25" required/>
                          </div>
                          <div class="form-group">
                            <label for="province">Province:</label>
                            <input type="text" name="province" id="province" tabindex="2" class="form-control" placeholder="Province" maxlength="30" required/>
                          </div>
                          <div class="form-group">
                            <label for="country">Country:</label>
                            <input type="text" name="country" id="country" tabindex="3" class="form-control" placeholder="Country" maxlength="25" required/>
                          </div>
                          <div class="form-group">
                            <label for="occupation">Occupation:</label>
                            <input type="text" name="occupation" id="occupation" tabindex="2" class="form-control" placeholder="Occupation" maxlength="25" required/>
                          </div>
                          <div class="form-group">
                            <label for="birthday">Birth Date:</label>
                            <input type="date" name="birthday" id="birthday" tabindex="2" class="form-control" required/>
                          </div>
                          <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" required>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Other</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" name="basicprofile" id="basicprofile" tabindex="5" class="form-control btn btn-register" value="Submit"> Update </button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-12">
                                 We need from Claudiu the basic information he wants to keep on people that just want to view public courses
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
    if(isset($result))
      echo $result
   ?>
    </div>
  <?php
     require("includes/footer.php");
    ?>
