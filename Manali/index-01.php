<?php
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
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center"  id="beginPart">
          <div class="panel panel-primary">
            <div class="panel-heading" style="height:120px;">
               <h2>Virtual Learning Portal</h2><h2>Taking the "e" out of eLearning</h2>
            </div>
            <div class="panel-body">
              <p><span style="font-size:14px;word-spacing:10px;text-align:justify; font-weight:bold;">
                 The KnowledgeFlow Education Platform is the only distance learning tool that allows educators to design, customize
                 and present cybersafety courses to diverse audiences. <br /><br />Try it today!</span>
                 <br /><br />
                 <span style="text-align:center;">
                   <button type="button" class="btn btn-default" style="color:white;background-color:#337AB7;" id="signin" >Sign In</button>
                   &nbsp;
                   <button type="button" class="btn btn-default" style="color:white;background-color:#337AB7;" href="./sign_up.php">Sign Up</button>
                 </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
		<!--Sign in Modal  -->
			<!-- <div class="modal fade" id="signinModal" role="dialog" style=" z-index:10050;"  >
					<div class="modal-dialog">
					   <!-- Modal content-->
					   <!-- <div class="modal-content">
						  <div class="modal-header">
							 <span data-dismiss="modal" class="close" style="color:whitesmoke;">&times;</span>
							 <h2 style="margin: 0 !important;">Sign In</h2>
						  </div>
						  <div class="modal-body" style="padding:20px 50px;">
							 <form role="form" class="modalForm" id="signInForm" >
								<div class="form-group">
								   <label for="usrname">Username</label>
                   <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Enter Username"  required oninvalid="this.setCustomValidity('Please enter username')"
                        oninput="this.setCustomValidity('')" \>
                   <span class="text-danger" style="display:none;"></span>
								</div>
								<div class="form-group">
								   <label for="email">Email</label>
                   <input type="email" class="form-control" id="email" name ="email" placeholder="Enter Email" required  >
                   <span class="text-danger" style="display:none;"></span>
								</div>
								<div class="form-group">
								   <label for="pass"> Password</label>
                   <input type="password" class="form-control" id="pass" name ="pass" placeholder="Enter password"    required >
                   <span class="text-danger" style="display:none;"></span>
								</div>
							
						  </div>
						  <div class="modal-footer"> -->
               <!-- <button type="submit" class="button btn-block signinbtn ">Sign In</button> -->
               <!-- <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                           <button type="submit" name="signin-submit" id="signin-submit" tabindex="4" class="form-control btn btn-register" >Sign In </button>
                        </div>
                     </div>
                </div>
							  <p class="forgetPwd">Forgot <a href="#" id="forgetPwd">password?</a></p>
              </div>
              </form>
					   </div>
          </div>
         
      </div> --> 
      
    <!--Sign up Modal  -->
			<!-- <div class="modal fade" id="signUpModal"  role="dialog" style=" z-index:10050;" method="POST" action="#">
					<div class="modal-dialog">
					<!-- Modal content-->
					<!-- <div class="modal-content">
						<div class="modal-header">
							<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
							<!-- <span data-dismiss="modal" class="close" style="color:whitesmoke;">&times;</span> -->
							<!-- <h2 style="margin: 0 !important;">Sign Up</h2>
						</div>
						<div class="modal-body" style="padding:20px 50px;">
							<form role="form" class="modalForm" id ="signUpForm" method="Post">
								<div class="form-group">
									<div class="row">
										<div class="form-group col-xs-6">
											<label for="signupfname">Fist Name</label>
											<input type="text" class="form-control" id="signupfname" name="signupfname" placeholder="Enter First Name" >
										</div>
										<div class="form-group col-xs-6">
											<label for="signuplname">Last Name</label>
											<input type="text" class="form-control" id="signuplname"name="signuplname" placeholder="Enter Last Name" >
										</div>
									</div>
									
								</div>
								<div class="form-group">
								<label for="signupusrname">Username</label>
								<input type="text" class="form-control" id="signupusrname" name="signupusrname" placeholder="Enter Username">
								</div>
								<div class="form-group">
								<label for="signupemail">Email</label>
								<input type="email" class="form-control" id="signupemail" name="signupemail" placeholder="Enter Email"   >
								</div>
								<div class="form-group">
									<div class="row">
										<div class="form-group col-xs-6">
											<label for="signuppass"> Password</label>
											<input type="password" class="form-control" id="signuppass" name="signuppass" placeholder="Enter password"  >
										</div>
										<div class="form-group col-xs-6">
											<label for="signupcpass">Confirm Password</label>
											<input type="password" class="form-control" id="signupcpass" name="signupcpass" placeholder="Re-enter password" >
										</div>
									</div>
								</div>
								<div class="form-check">
								<input type="checkbox" class="form-check-input" id="terms" >
								<label class="form-check-label" for="terms"> I accept and agree to the Terms of Service</label>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                      <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <button type="submit" name="signup-submit" id="signup-submit" tabindex="4" class="form-control btn btn-register">Sign Up </button>
                          </div>
                      </div>
                  </div>
						    </div>
							</form>
						</div>
						
					</div> -->
					<!-- </div> -->
      <!-- </div> -->
      
      
		<!-- Forget password Modal  -->
			<div class="modal fade" id="fpModal"  role="dialog" style=" z-index:10050;">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
							<span data-dismiss="modal" class="close" style="color:whitesmoke;">&times;</span>
							<h2 style="margin: 0 !important;">Forget Password</h2>
						</div>
						<div class="modal-body" style="padding:20px 50px;">
							<form role="form" class="modalForm">
								<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="fpemail" placeholder="Enter Email">
								</div>
							</form>
						</div>
						<div class="modal-footer">
                <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                           <button type="submit" name="fp-submit" id="fp-submit" tabindex="4" class="form-control btn btn-register">Reset Password </button>
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
