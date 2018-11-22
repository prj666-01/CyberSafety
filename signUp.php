<?php
   require('./Request.php');
   // $error_message = "";
   // $password_error = "";
   // if($_SERVER["REQUEST_METHOD"] == "POST"){
   //    $auth = false;
   //    $username = $_POST['usrname'];
   //    $password = $_POST['pass'];
   //    $request = new Request();
   // }
   $username_error = "";
   $email_error = "";
   $pass_error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $auth = false;
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['pass'];
      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $cpass = $_POST['cpass'];
      $request = new Request();
      ($request->userExists($username)) ? $username_error = "User Already Exists" : $username_error = "";
      ($request->emailExists($email)) ? $email_error = "Email Already Exists" : $email_error = "";
      ($password != $cpass) ? $pass_error = "Password did not match" : $pass_error = "";
      $data = [
        "username" => $username,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "email" => $email,
        "firstName" => $firstname,
        "lastName" => $lastname,
        "lastLogin" => date("Y-m-d H:i:s"),
        "dateJoined" => date("Y-m-d H:i:s"),
        "approved" => 0,
        "badge" => 0,
      ];
      $user = $request->addUser($data);
      header('Location: signIn.php');
   }
 require("includes/header.php");
?>
</head>
<body>
<?php
require("includes/nav.php");
 ?>
<div class="row">
   <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
         <div class="panel-heading">
            <div class="row">
               <div style="margin:0px auto">
                  <a href="#" id="register-form-link" class="active">Sign Up</a>
               </div>
            </div>
            <hr>
         </div>
         <div class="panel-body">
            <div class="row">
               <form id="signUpForm" style="padding:20px;" method="POST" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <div class="form-group">
                        <div class="row">
                           <div class="form-group col-xs-6">
                              <label for="fname">Fist Name</label>
                              <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" 	required autofocus
                        oninvalid="this.setCustomValidity('Please enter a first name')"
                        oninput="this.setCustomValidity('')">
                           </div>
                           <div class="form-group col-xs-6">
                              <label for="lname">Last Name</label>
                              <input type="text" class="form-control" id="lname"name="lname" placeholder="Enter Last Name" 	required
                        oninvalid="this.setCustomValidity('Please enter a last name')"
                        oninput="this.setCustomValidity('')" >
                           </div>
                        </div>
								</div>
								<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" 	required
                        oninvalid="this.setCustomValidity('Please enter a username')"
                        oninput="this.setCustomValidity('')">
								</div>
                        <?php if(!empty($username_error)){
                             echo '<span class="text-danger">'. $username_error .'</span>';
                          } ?>
								<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Please enter an email in valid email format (example@example.com)')"
                                oninput="this.setCustomValidity('')"  >
								</div>
                        <?php if(!empty($email_error)){
                             echo '<span class="text-danger">'. $email_error .'</span>';
                          } ?>
								<div class="form-group">
									<div class="row">
										<div class="form-group col-xs-6">
											<label for="pass"> Password</label>
											<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?-_])[A-Za-z\d$@$!%*#?-_]{8,}$"
                        oninvalid="this.setCustomValidity('Password must be at least 8 characters long and can only contain symbols $ @ ! % * # ? - _')"
                        oninput="this.setCustomValidity('')" >
										</div>
										<div class="form-group col-xs-6">
											<label for="cpass">Confirm Password</label>
											<input type="password" class="form-control" id="cpass" name="cpass" placeholder="Re-enter password" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?-_])[A-Za-z\d$@$!%*#?-_]{8,}$"
                        oninvalid="this.setCustomValidity('Password must be at least 8 characters long and can only contain symbols $ @ ! % * # ? - _')"
                        oninput="this.setCustomValidity('')" >
										</div>
									</div>
								</div>
                        <?php if(!empty($pass_error)){
                             echo '<span class="text-danger">'. $pass_error .'</span>';
                          } ?>
								<div class="form-check">
								<input type="checkbox" class="form-check-input" id="terms" >
								<label class="form-check-label" for="terms"> I accept and agree to the Terms of Service</label>
                </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" name="signup-submit" id="signup-submit" tabindex="4" class="form-control btn btn-register">Sign Up </button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   require('./includes/footer.php');
   ?>
</div>
<script>
   document.getElementById("panel").style.display = "block";
</script>
</body>
</html>