<?php
 $isLoggedIn = false;
 $signSucess = false;
 session_start();
 require('includes/Request.php');
   $error_message = "";
   $password_error = "";
   $v_error = "";
   $block_user ="";
   $verifyMsg = "";
   $accverify = false;
   if(isset($_GET['v'])) {
      $_SESSION['verify_code'] = $_GET['v'];
      $accverify = true;
      $verifyMsg = "Please Sign in to verify your account";
   }
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $auth = false;
      $redirect = true;
      $username = $_POST['usrname']; 
      $password = $_POST['pass'];
      $request = new Request();
      if ($request->userExists($username) || $request->emailExists($username)) {
         $dbUserPassword = $request->getPassword($username);
         if(password_verify($password, $dbUserPassword)){
            $signedinuser = $request->getOne("userbyusername", $username);
            // print_r($signedinuser);
            if ($signedinuser["status"]== 0){
               $block_user = "User is block";
               $redirect = false;
            } else {
               if(!empty($_SESSION['verify_code'])) {
                  if ($signedinuser["auth_code"] == $_SESSION['verify_code']){
                     $data = [
                        "value" => 1
                     ];
                     $fieldname = 'Is_Authenticated';
                     $addAuth =  $request->updateAuth($signedinuser["username"],$fieldname,$data); // aa is
                     if ($addAuth){
                        $data = [
                           "value" => 'NULL'
                        ];
                        $fieldname = 'Authentication_code';
                        $removeAuthCode =  $request->updateAuth($signedinuser["username"],$fieldname,$data);
                     }
                  }
                  else{
                     $verifyMsg = "You already validate your";
                  }
               } else if($signedinuser['is_auth'] == 0){
                  $redirect = false;
                  $accverify = true;
                  $verifyMsg = "You haven't verify email yet.";
               }
            }
            if($redirect == true){
               unset($_SESSION['signup_success']);
               unset($_SESSION['verify_code']); 
               $_SESSION["signedinuser"]["isapproved"] = $signedinuser["approved"];
               $_SESSION["signedinuser"]["badgeid"] = $signedinuser["badge"];
               $_SESSION["signedinuser"]["username"] = $signedinuser["username"];
               header('Location: index.php');
            }
            
         }else {
            $error_message = "Invalid username/password ";
            if(isset($_SESSION['verify_code'])){
               header('Location: signIn.php?v='.$_SESSION['verify_code']);
            }else{
               header('Location: signIn.php');
            }
         }
        
      }else{
         $error_message = "Invalid username/password ";
         if(isset($_SESSION['verify_code'])){
            header('Location: signIn.php?v='.$_SESSION['verify_code']);
         }else{
            header('Location: signIn.php');
         }
      }
   }
   require("includes/header.php");
?>
</head>
<body>
<?php
require("includes/nav.php");
if ($accverify) {
   echo '<div class="alert alert-info alert-dismissible" style="width:25%; margin: 0px auto;">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    '. $verifyMsg .  '</div>';
 }
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
    <div class="container">
     <div class="row">

       <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-login">
           <div class="panel-body">
            <div class="row">
              <form id="signInForm" style="padding:20px;" method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> <!--  . "?v=" . $_GET['v'] -->
                <div class="form-group">
                  <label for="usrname">Username</label>
                  <input type="text" class="form-control" id="usrname"  name="usrname" placeholder="Enter Username" required autofocus  maxlength="30" 
                        oninvalid="this.setCustomValidity('Please enter a username')"
                        oninput="this.setCustomValidity('')" />
                  <span class="text-danger" style="display:none;"></span>
		</div>
                <div class="form-group">
                  <label for="pass"> Password</label>
                  <input type="password" class="form-control" id="pass" name ="pass" placeholder="Enter password" oninvalid="this.setCustomValidity('Please enter a password')"
                        oninput="this.setCustomValidity('')" required  minlength="8" maxlength="20" />
                  <span class="text-danger" style="display:none;"></span>
                </div>
            <div>
            <?php if(!empty($error_message)){
                     echo '<span class="text-danger">'. $error_message .'</span>';
            } ?>
           </div>
           <div class="form-group">
             <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                 <button type="submit" name="signin-submit" id="signin-submit" tabindex="4" class="form-control btn btn-register" ><span style="color:#000000;font-weight:bold;">Sign In</span></button>
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
</body>
</html>