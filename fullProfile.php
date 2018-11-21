<?php
 require("includes/header.php");
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
                      <h2>Full Profile Step 1</h2>
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
                            <label for="edulevel">Education Level:</label>
                            <input type="text" name="edulevel" id="eduLevel" class="form-control" placeholder="Education Level" maxlength="13">
                            </div>
                            <div class="form-group">
                            <label for="specialization">Specialization:</label>
                            <input type="text" name="specialization" id="specialization" class="form-control" placeholder="Specialization" maxlength="30">
                          </div>
                          <div class="form-group">
                            <label for="experience">Years of Experience:</label>
                            <input type="text" name="experience" id="experience" class="form-control" placeholder="Years of Experience" maxlength="2">
                            </div>
                            <div class="form-group">
                            <label for="accreditations">Accreditations:</label>
                            <input type="text" name="accreditaions" id="accrediations" class="form-control" placeholder="Accreditations" maxlength="300">
                          </div>
                          <div class="form-group">
                            <label for="aware">Cybersafety Awareness Level:</label>
                            <select name="aware" id="aware">
                                <option value="L">Low</option>
                                <option value="M">Medium</option>
                                <option value="H">High</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="audLoc">Audience Location:</label>
                            <input type="text" name="audLoc" id="audLoc" class="form-control" placeholder="Audience Location" maxlength="100">
                            </div>
                            <div class="form-group">
                            <label for="audSize">Average Audience Size:</label>
                            <input type="text" name="audSize" id="audSize" class="form-control" placeholder="Audience Size" maxlength="3">
                          </div>
                          <div class="form-group">
                            <label for="district">District:</label>
                            <input type="text" name="district" id="district" tabindex="2" class="form-control" placeholder="District" maxlength="100"/>
                            </div>
                            <div class="form-group">
                            <label for="eduBoard">Board of Education:</label>
                            <input type="text" name="eduBoard" id="eduBoard" tabindex="2" class="form-control" placeholder="Board of Education" maxlength="100"/>
                          </div>
                          <div class="form-group">
                            <label for="pNum">Phone Number:</label>
                            <input type="text" name="pNum" id="pNum" tabindex="2" class="form-control" placeholder="647-123-4567" maxlength="25"/>
                            </div>
                            <div class="form-group">
                            <label for="pCode">Postal Code:</label>
                            <input type="text" name="pCode" id="pCode" tabindex="2" class="form-control" placeholder="A1B2C3" maxlength="6"/>
                          </div>
                          <div class="form-group">
                            <label for="pEmail">Professional Email:</label>
                            <input type="email" name="pEmail" id="pEmail" tabindex="2" class="form-control" placeholder="j.doe@tdsb.ca" maxlength="254"/>
                            </div>
                            <div class="form-group">
                            <label for="linkIN">LinkedIN Account:</label>
                            <input type="url" name="linkIN" id="linkIN" tabindex="2" class="form-control" placeholder="linkedin.com/help/linkedin/answer/49315/finding-your-linkedin-public-profile-url?lang=en"  maxlength="150"/>
                          </div>
                          <div class="form-group">
                            <label for="impAreas">Important Areas to Cover:</label>
                            <input type="textarea" name="impAreas" id="impAreas" tabindex="2" class="form-control" rows="3" maxlength="100"/>
                          </div>
                          <div class="form-group">
                            <label for="newsletter">KnowledgeFlow Newsletter:</label>
                            <input type="checkbox" name="newsletter" id="newsletter" class="form-check-input">
                            <label class="form-check-label" for="newsletter">Check here to sign up to be sent the KnowledgeFlow Newsletter</label>
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
