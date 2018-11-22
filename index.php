<?php
 require("includes/header.php");
 $isLoggedIn = false;
 session_start();
 if(!empty($_SESSION['username'])) {
     $isLoggedIn = true;
 }
  if($isLoggedIn) {
  ?>
     <script type="text/javascript">
      $('document').ready(function(){
        $('#welcometag').hide();
        $('#infoTag').show();
      });
     </script>
  <?php
 }
 else
 {
   ?>
    <script type="text/javascript">
      $('document').ready(function(){
        $('#welcometag').show();
        $('#infoTag').hide();
       });
     </script>
    <?php
 }
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
        <div class="col-sm-12 text-center" id="welcometag">
          <div class="panel panel-primary" >
            <div class="panel-heading" style="height:120px;" >
               <h2>Virtual Learning Portal</h2><h2>Taking the "e" out of eLearning</h2>
            </div>
            <div class="panel-body">
              <p><span style="font-size:14px;word-spacing:10px;text-align:justify; font-weight:bold;">
                 The KnowledgeFlow Education Platform is the only distance learning tool that allows educators to design, customize
                 and present cybersafety courses to diverse audiences. <br /><br />Try it today!</span>
                 <br /><br />
                 <span style="text-align:center;">
                   <button type="button" class="btn btn-default" style="color:white;background-color:#337AB7;" onclick="window.location.href='./signIn.php'">Sign In</button>
                   &nbsp;
                   <button type="button" class="btn btn-default" style="color:white;background-color:#337AB7;" onclick="window.location.href='./signUp.php'">Sign Up</button>
                 </span>
              </p>
            </div>
          </div>
        </div>
        <div class="container" id="infoTag">
          <div class="row">
            <div class="col-sm-12 text-center">
              <div class="panel panel-primary">
                <div class="panel-body" style="font-size:18px;word-spacing:2px;font-weight:bold;">
                  <p>
                    Thank you for signing up to access the Cybersafety Education Platform.<br>
                  </p>
                </div>
              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-body" style="font-size:14px;word-spacing:2px;font-weight:bold; text-align:left">
                  <p style="font-size:14px;word-spacing:2px;font-weight:bold;text-align:left">
                    <span style="color:#336699;text-decoration:underline;">Interested in becoming a Cybersafety Educator</span><br>
                    Once you complete the requirements below, you will be granted full access to view, present, and create courses.
                  </p>
                </div>
              </div> 
            </div>
            <div class="col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-body" style="font-size:14px;word-spacing:2px;font-weight:bold; text-align:left">
                  <p style="font-size:14px;word-spacing:2px;font-weight:bold;text-align:left">
                    <span style="color:#336699;text-decoration:underline;">Just curious in Cybersafety</span><br>
                    Once you complete the requirements below, you will have access to view public courses.
                  </p>
                </div>
              </div> 
            </div>
          </div>
   
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-body" style="font-size:14px;word-spacing:2px;font-weight:bold; text-align:left">
                      <ul>
                        <li>Interested in becoming a Cybersafety Educator
                          <ol>
                          <li>Complete and submit the <a href="fullProfile.php">full profile section</a>.</li>
                          <li>The system administrator will review your profile information.</li>
                          <li>You will be either granted full access or additional information maybe requested.</li>
                          <li>View &amp; complete the <a href="basiCerti.php">basic Certificate Course</a>.</li>
                          </ol>
                      </li></ul>
                </div>
              </div> 
            </div>
            <div class="col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-body" style="font-size:14px;word-spacing:2px;font-weight:bold; text-align:left">
                      <ul>
                        <li>How to get access to the public Cybersafety Educational courses
                          <ol>
                          <li>Complete and submit the <a href="basicProfile.php">basic profile section</a>.</li>
                          <li>The system administrator will review your profile information.</li>
                          <li>You will be either granted access to view public courses or additional information maybe requested.</li>
                          <li>View &amp; complete the <a href="basiCerti.php">basic Certificate Course</a>.</li>
                          </ol>
                      </li></ul>
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
