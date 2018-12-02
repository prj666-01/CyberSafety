<?php
  session_start();
  $_SESSION['isLoggedIn'] = true;
  $_SESSION['profile'] = true;
  $_SESSION['userID'] = 82;
  $userID = $_SESSION['userID'];

  if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
  require './includes/Request.php';

  $result = getBasicProfile();
?>
<?php
require("includes/header.php");
?>
<div class="row user-infos cyruxx">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information - Basic Profile - USERNAME UP HERE?</h3>
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
                                        <p>NEED TO ECHO USERNAME FROM SESSION</p>
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
                                  </tbody>
                              </table>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                              <table class="table table-user-information">
                                  <tbody>
                                  <tr>
                                      <td>User</td>
                                      <td>
                                        <p>NEED TO ECHO USERNAME FROM SESSION</p>
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
