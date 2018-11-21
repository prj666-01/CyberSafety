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
        <div class="col-sm-12 text-center">
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
                   <button type="button" class="btn btn-default" style="color:white;background-color:#337AB7;" onclick="window.location.href='./sign_in.php'">Sign In</button>
                   &nbsp;
                   <button type="button" class="btn btn-default" style="color:white;background-color:#337AB7;" onclick="window.location.href='./sign_up.php'">Sign Up</button>
                 </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
     require("includes/footer.php");
    ?>
