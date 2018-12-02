<?php
  session_start();
  $_SESSION['isLoggedIn'] = true;
  $_SESSION['profile'] = true;
  $_SESSION['userID'] = 82;
  $userID = $_SESSION['userID'];

  if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
  require './includes/Request.php';

  $result = getBasicProfile($userID);
  $resultTwo = getFullProfile($userID);
?>
<?php
require("includes/header.php");
?>
<div class="row user-infos cyruxx">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information - Full Profile</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                                     alt="User Pic">
                            </div>
                            <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50"
                                     alt="User Pic">
                            </div>
                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                              <table class="table table-user-information">
                                  <tbody>
                                  <tr>
                                      <td>User</td>
                                      <td>
                                        <p>USER FULL NAME FROM SESSION</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>City</td>
                                      <td>
                                        <?php print_r($result[0]['city']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Province</td>
                                      <td>
                                        <?php print_r($result[0]['province']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Country</td>
                                      <td>
                                        <?php print_r($result[0]['country']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Occupation</td>
                                      <td>
                                        <?php print_r($result[0]['occupation']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Gender</td>
                                      <td>
                                        <?php print_r($result[0]['gender']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Education Level</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['educationLevel']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Specialization</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['specialization']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Interest</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['interest']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Years of Experience</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['experience']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Accreditations</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['accreditations']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Cybersafety Awareness Level</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['currEduLevel']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Audience Location</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['audLocation']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Average Audience Size</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['audSize']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Target Age</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['targetAge']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>District</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['district']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Board of Education</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['eduBoard']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Phone Number</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['phone']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Postal Code</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['postalCode']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Professional Email</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['profEmail']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>LinkedIN Account</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['linkedIN']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Important Areas to Cover</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['importantAreas']); ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>KnowledgeFlow Newsletter</td>
                                      <td>
                                        <?php print_r($resultTwo[0]['newsLetter']); ?>
                                      </td>
                                  </tr>
                                  </tbody>
                              </table>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                              <table class="table table-user-information">
                                  <tbody>
                                  <tr>
                                      <td>User</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>City</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Province</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Country</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Occupation</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Gender</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Education Level</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Specialization</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Interest</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Years of Experience</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Accreditations</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Cybersafety Awareness Level</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Audience Location</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Average Audience Size</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Target Age</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>District</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Board of Education</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Phone Number</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Postal Code</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Professional Email</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>LinkedIN Account</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>Important Areas to Cover</td>
                                      <td>DATA</td>
                                  </tr>
                                  <tr>
                                      <td>KnowledgeFlow Newsletter</td>
                                      <td>DATA</td>
                                  </tr>
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                      <button class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-original-title="">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
           require("includes/footer.php");
          ?>
          <?php
            } else {
              echo "Please log in to see this page.";
            }
          ?>
