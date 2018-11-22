<?php
   require('./Request.php');
   $error_message = "";
   $password_error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $auth = false;
      $username = $_POST['usrname']; 
      $password = $_POST['pass'];
      $request = new Request();
      if ($request->userExists($username) || $request->emailExists($username)) {
         $dbUserPassword = $request->getPassword($username);
         if(password_verify($password, $dbUserPassword)){
            $signedinuser = $request->getOne("userbyusername", $username);
            session_start();
            $_SESSION["signedinuser"]["isapproved"] = $signedinuser["approved"];
            $_SESSION["signedinuser"]["badgeid"] = $signedinuser["badge"];
            $_SESSION["signedinuser"]["username"] = $signedinuser["username"];
            header('Location: index.php');
         }else {
            $error_message = "Invalid username/password ";
         }
        
      }else{
         $error_message = "Invalid username/password ";
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
                  <a href="#" id="register-form-link" class="active">Sign In</a>
               </div>
            </div>
            <hr>
         </div>
         <div class="panel-body">
            <div class="row">
               <form id="signInForm" style="padding:20px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                   <div class="form-group">
								   <label for="usrname">Username</label>
                   <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Enter Username" oninvalid="this.setCustomValidity('Please enter a username')"
                        oninput="this.setCustomValidity('')" required autofocus \>
                   <span class="text-danger" style="display:none;"></span>
								</div>
								<div class="form-group">
								   <label for="pass"> Password</label>
                   <input type="password" class="form-control" id="pass" name ="pass" placeholder="Enter password" oninvalid="this.setCustomValidity('Please enter a password')"
                        oninput="this.setCustomValidity('')" required >
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
                        <button type="submit" name="signin-submit" id="signin-submit" tabindex="4" class="form-control btn btn-register" >Sign In </button>
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

   // $(document).ready(function() {
      // $(document).on("click","#signin-submit",function(){ 
      //    // $("#signin-submit").click(function () {
      //    alert("Clicked signin");
      //    var userName = $('#usrname').val();
      //    var password = $('#pass').val();
      //    $('form[id="signInForm"]').validate({
      //          rules: {
      //             usrname: 'required',
      //             pass : 'required'
      //          },
      //          messages: {
      //             usrname: 'Please enter a username',
      //             pass : 'Please enter a password'
      //          },
      //          submitHandler: function(form) {
      //             form.submit();
      //             form.reset();
      //          }
      //    });
      // });

   
</script> 
</body>
</html>