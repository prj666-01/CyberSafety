<?php
   require('./Request.php');
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require 'includes/Exception.php';
   require 'includes/PHPMailer.php';
   require 'includes/SMTP.php'
   
   $username_error = "";
   $email_error = "";
   $pass_error = "";
   $signup_sucess = "";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $auth = false;
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['pass'];
      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $cpass = $_POST['cpass'];
      $param_verification = bin2hex(random_bytes(16));
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
      $txt = ' <div style = " background: #fff; border-radius: 2px;height: 70%;  width: 50%;   box-sizing: border-box;  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);  margin: 100px auto;">';
      $txt .= '<nav class="navbar navbar-inverse">
      <div class="container-fluid">
         <h2 class="text-center" style="color:#f5f5f5;"> KnowledgeFLow </h2>
      </div>
      </nav><div style="padding: 20px;">';
      $txt .= '<p style="text-align: left;  font-size: 14px;">Hi Manali,</p> ';
      $txt .= ' <p style="text-align: left; font-size: 14px;">
               Thank You for Signing in up.
            </p>';
      $txt .= '<p style="text-align: left; font-size: 14px;">In order to complete your sign up process please verify your account by clicking on the button below.
      </p>';
 
      //Email Link
      $txt .='<div><a href="https://drive.google.com/drive/u/1/folders/13WMl4RdXE1kY_nzvtYFewJgH0zLwnH7a" target="_blank"><button class="btn btn-default btn-success center-block">Verify Account</button></a></div>';
      $txt .= ' </div>  </div>';
      sendMail( $email,$firstname,$param_verification,$txt)
      // header('Location: signIn.php');
   }
   function sendMail ( $email,$firstname,$param_verification,$email_msg){
      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'knowledgeflowmail@gmail.com';                 // SMTP username
    $mail->Password = 'xvLO7429op';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('noreply@cybersafetyfoundation.org', 'CyberSafety');
    $mail->addAddress($email);     // Add a recipient          // Name is optional
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'KnowledgeFlow - Account Verification';
    $mail->Body    = $email_msg;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

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
                        oninput="this.setCustomValidity('')"  maxlength="30">
                           </div>
                           <div class="form-group col-xs-6">
                              <label for="lname">Last Name</label>
                              <input type="text" class="form-control" id="lname"name="lname" placeholder="Enter Last Name" 	required
                        oninvalid="this.setCustomValidity('Please enter a last name')"
                        oninput="this.setCustomValidity('')"  maxlength="30">
                           </div>
                        </div>
								</div>
								<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" 	required
                        oninvalid="this.setCustomValidity('Please enter a username')"
                        oninput="this.setCustomValidity('')"  maxlength="30">
								</div>
                        <?php if(!empty($username_error)){
                             echo '<span class="text-danger">'. $username_error .'</span>';
                          } ?>
								<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Please enter an email in valid email format (example@example.com)')"
                                oninput="this.setCustomValidity('')" maxlength="30"  >
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
                        oninput="this.setCustomValidity('')" minlength="8" maxlength="20" >
										</div>
										<div class="form-group col-xs-6">
											<label for="cpass">Confirm Password</label>
											<input type="password" class="form-control" id="cpass" name="cpass" placeholder="Re-enter password" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?-_])[A-Za-z\d$@$!%*#?-_]{8,}$"
                        oninvalid="this.setCustomValidity('Password must be at least 8 characters long and can only contain symbols $ @ ! % * # ? - _')"
                        oninput="this.setCustomValidity('')" minlength="8" maxlength="20"  >
										</div>
									</div>
								</div>
                        <?php if(!empty($pass_error)){
                             echo '<span class="text-danger">'. $pass_error .'</span>';
                          } ?>
								<div class="form-check">
								<input type="checkbox" class="form-check-input" id="terms" required >
								<label class="form-check-label" for="terms"> I accept and agree to the <a>Terms of Service </a></label>
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