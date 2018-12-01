<?php
 require("includes/header.php");
 session_start();
?>
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
                       <h2>Basic Profile</a> </h2>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form id="register-form" action="/sign_up.php" method="post">
                          <div class="form-group">
                            <input type="text" name="username" id="username"  class="form-control" placeholder="Jane Doe" readonly/>
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
                            <label for="bDay">Birth Date:</label>
                            <input type="date" name="bDay" id="bDay" tabindex="2" class="form-control" required/>
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
                                <button type="submit" name="register-submit" id="register-submit" tabindex="5" class="form-control btn btn-register"> Update </button>
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
    </div>
  <?php
     require("includes/footer.php");
    ?>
