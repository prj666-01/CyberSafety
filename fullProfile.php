<?php
 require("includes/header.php");
?>
<style>
/* For the function */
.msf_hide{
  display: none;
}
.msf_show{
  display: block;
}
.msf_bullet_o{
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
}
.msf_bullet_o > div{
  height: 15px;
  width: 15px;
  margin: 20px 10px;
  border-radius: 100px;
  z-index: 2;
}
.msf_bullet{
  background-color: lightgrey;
  
}
.msf_bullet_active{
  background-color: darkgrey !important;
}

/* Just for decoration */
.msf_line{
  opacity: 0.3;
  background: lightgrey;
  height: 3px;
  width: 70px;
  display: block;
  left: 50%;
  margin-top: -29px;
  margin-left: -35px;
  position: absolute;
  z-index: 1;
}
.form_wrapper{
  min-width: 300px;
  position: absolute;
  top: 50%;
  margin-top: -160px;
}
fieldset{
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  box-shadow: rgba(0,0,0,0.1) 0px 1px 30px;
  border-radius: 0px;
  border: none;
  padding: 10px 20px !important;
}
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
                      <h1>Full Profile</h1>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form id="fullprofile" action="#" method="post">
                        <fieldset class="msf_hide">
                        <h2>Step 1</h2>
                          <div class="form-group">
                            <input type="text" name="username" id="username"  class="form-control" value="Jane Doe" readonly/>
                            <input type="hidden" name="userID" id="userID"  class="form-control" value="1"/>
                          </div>
                          <div class="form-group">
                            <label for="eduLevel">Education Level:</label>
                            <input type="text" name="eduLevel" id="eduLevel" class="form-control" placeholder="Education Level" maxlength="13">
                            </div>
                            <div class="form-group">
                            <label for="specialization">Specialization:</label>
                            <input type="text" name="specialization" id="specialization" class="form-control" placeholder="Specialization" maxlength="30">
                          </div>
                          <div class="form-group">
                            <label for="interest">Interest:</label>
                            <input type="text" name="interest" id="interest" class="form-control" placeholder="Interest" maxlength="1">
                          </div>
                          <div class="form-group">
                            <label for="experience">Years of Experience:</label>
                            <input type="text" name="experience" id="experience" class="form-control" placeholder="Years of Experience" maxlength="2">
                            </div>
                            <div class="form-group">
                            <label for="accreditations">Accreditations:</label>
                            <input type="text" name="accreditations" id="accrediations" class="form-control" placeholder="Accreditations" maxlength="300">
                          </div>
                          <?php
                            $profile = true;
                            $profileStatus = 2;
                            if(!$profile){
                              echo '<button type="submit" name="fullprofile" id="fullprofile" tabindex="5" class="form-control btn btn-register" value="Submit"> Submit </button>'; 
                            }else if ($profileStatus == 1){
                              echo '<a href="#" onclick="showFull()">Become an Educator</a>';
                              echo '<button type="submit" name="fullprofile" id="fullprofile" tabindex="5" class="form-control btn btn-register" value="Submit"> Submit </button>';
                            }else if ($profile || $profileStatus ==2) {
                              echo '<input type="button" name="next" value="Next"  onclick="msf_btn_next()">';
                            }
                          ?>
                          <input type="button" name="back" value="Back"  onclick="msf_btn_back()">
	                        
                        </fieldset>
                        <fieldset class="msf_hide">
                        <h2>Step 2</h2>
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
                            <label for="targetAge">Target Age:</label>
                            <input type="text" name="targetAge" id="targetAge" class="form-control" placeholder="Target Age" maxlength="2">
                          </div>
                          <div class="form-group">
                            <label for="district">District:</label>
                            <input type="text" name="district" id="district" tabindex="2" class="form-control" placeholder="District" maxlength="100"/>
                            </div>
                            <div class="form-group">
                            <label for="eduBoard">Board of Education:</label>
                            <input type="text" name="eduBoard" id="eduBoard" tabindex="2" class="form-control" placeholder="Board of Education" maxlength="100"/>
                          </div>
                          <input type="button" name="back" value="Back"  onclick="msf_btn_back()">
	                        <input type="button" name="next" value="Next"  onclick="msf_btn_next()">
                        </fieldset>
                        <fieldset class="msf_hide">
                        <h2>Step 3</h2>
                          <div class="form-group">
                            <label for="pNum">Phone Number:</label>
                            <input type="text" name="pNum" id="pNum" tabindex="2" class="form-control" placeholder="6471234567" maxlength="25"/>
                            </div>
                            <div class="form-group">
                            <label for="pCode">Postal Code:</label>
                            <input type="text" name="pCode" id="pCode" tabindex="2" class="form-control" placeholder="A1B 2C3" maxlength="7"/>
                          </div>
                          <div class="form-group">
                            <label for="pEmail">Professional Email:</label>
                            <input type="email" name="pEmail" id="pEmail" tabindex="2" class="form-control" placeholder="j.doe@tdsb.ca" maxlength="254"/>
                            </div>
                            <div class="form-group">
                            <label for="linkIN">LinkedIN Account:</label>
                            <input type="text" name="linkIN" id="linkIN" tabindex="2" class="form-control" placeholder="linkedin.com/help/linkedin/answer/49315/finding-your-linkedin-public-profile-url?lang=en"  maxlength="150"/>
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
                              <input type="button" name="back" value="Back"  onclick="msf_btn_back()">
                              <button type="submit" name="fullprofile" id="fullprofile" tabindex="5" class="form-control btn btn-register" value="Submit"> Submit </button>
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
                        </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <script>
    console.log("Reloaded");

// dom variables
var msf_getFsTag = document.getElementsByTagName("fieldset");

// declaring the active fieldset & the total fieldset count
var msf_form_nr = 0;
var fieldset = msf_getFsTag[msf_form_nr];
fieldset.className = "msf_show";

// removes the first back button & the last next button
document.getElementsByName("back")[0].className = "msf_hide";

// Validation loop & goes to the next step
function msf_btn_next() {
    var msf_val = true;

    var msf_fs = document.querySelectorAll("fieldset")[msf_form_nr];
    var msf_fs_i_count = msf_fs.querySelectorAll("input").length;

    for (i = 0; i < msf_fs_i_count; ++i) {
        var msf_input_s = msf_fs.querySelectorAll("input")[i];
        if (msf_input_s.getAttribute("type") === "button") {
            // nothing happens
        } else {
            if (msf_input_s.value === "") {
                msf_input_s.style.backgroundColor = "pink";
                msf_val = false;
            } else {
                if (msf_val === false) {} else {
                    msf_val = true;
                    msf_input_s.style.backgroundColor = "lime";
                }
            }
        };
    };
    if (msf_val === true) {
        // goes to the next step
        var selection = msf_getFsTag[msf_form_nr];
        selection.className = "msf_hide";
        msf_form_nr = msf_form_nr + 1;
        var selection = msf_getFsTag[msf_form_nr];
        selection.className = "msf_show";
        
    }
};

// goes one step back
function msf_btn_back() {
    msf_getFsTag[msf_form_nr].className = "msf_hide";
    msf_form_nr = msf_form_nr - 1;
    msf_getFsTag[msf_form_nr].className = "msf_showhide";
};

console.log("loaded");
    </script> 
  <?php
     require("includes/footer.php");
    ?>
