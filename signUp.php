<?php
   require('./Request.php');
   require_once('./phpmailer/PHPMailerAutoload.php');
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
      $ver = bin2hex(random_bytes(16));
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
        "Is_Authenticated" =>0,
        "Authentication_code" => $ver,
        "Is_Admin" => 0,
        "User_Profiles" => 0
      ];
     
      $txt = ' <div style = " background: #fff; border-radius: 2px;height: 70%;  width: 50%;   box-sizing: border-box;  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);  margin: 100px auto;">';
      $txt .= '<nav style="margin: 0; padding: 0;overflow: hidden;background-color: #333;">
               <div class="container-fluid">
                    <h2 class="text-center" style="color:#f5f5f5;"> KnowledgeFLow </h2>
               </div>
               </nav><div style="padding: 20px;">';
      $txt .= '<p style="text-align: left;  font-size: 14px;">Hi'.  $firstname  .',</p> ';
      $txt .= ' <p style="text-align: left; font-size: 14px;">
                   Thank You for Signing in up.
                </p>';
       $txt .= '<p style="text-align: left; font-size: 14px;">In order to complete your sign up process please verify your account by clicking on the button below.
                        </p>';

  //Email Link
  $txt .='<div><a href="http://localhost:8081/CyberSafety/signIn.php?v=' . $ver.'" target="_blank"><button class="btn btn-default btn-success center-block">Verify Account</button></a></div>';
  $txt .= ' </div>  </div>';
      if (empty($username_error) && empty( $email_error) && empty($pass_error)) {
         $user = $request->addUser($data);
         if($user){
            sendMail( $email,$firstname,$ver,$txt);
            $login_success = 'An email will be sent to you shortly with a verification link. Simply click on the link to verify your email. Should you not see the 
            verification email in your Inbox, please check your email “Junk” folder.';    
            session_start();
            $_SESSION['signup_success']= $login_success;
            header('Location: signIn.php');
    
         }
      }
      
   }
   
  function sendMail($email,$firstname,$param_verification,$email_msg) {
   //PHPMailer Object
   $mail = new PHPMailer();
   $mail->IsSMTP();
   // optional
   // used only when SMTP requires authentication
   $mail->Host = "smtp.gmail.com";
   //Set this to true if SMTP host requires authentication to send email
   $mail->SMTPAuth = true;
   //Provide username and password
   $mail->Username = 'knowledgeflowmail@gmail.com';                 // SMTP username
   $mail->Password = 'xvLO7429op';  
   //If SMTP requires TLS encryption then set it
   $mail->SMTPSecure = "tls";
   //Set TCP port to connect to
   $mail->Port = 587;
      //To address and name
      $mail->addAddress($email); //Recipient name is optional
      $mail->FromName = "KnowledgeFLow";

   $mail->Subject = 'Account Verification';
  
   $mail->addCustomHeader('MIME-Version: 1.0');
   $mail->addCustomHeader('Content-Type: text/html; charset=ISO-8859-1');
   $mail->Body = $email_msg;
   $mail->isHTML(true);
   if(!$mail->send())
           {
               echo "Something went wrong";
           }
}
 require("includes/header.php");
?>
</head>
<body>
<?php
require("includes/nav.php");  
?>
<div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <img src="includes/images/rsz_ed-logo.png" alt="KnowledgeFlow Education" title="KnowledgeFlow Education" />
          </div>
          <div class="col-sm-8 text-center" style="color:#486048">
            <h2>Welcome to Cybersafety Education Platform</h2>
          </div>
        </div>
      </div>
 </div>
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
                              <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" pattern="\s*(\S\s*)"	required autofocus
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