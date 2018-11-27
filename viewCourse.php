<?php
 require("includes/header.php");
 session_start();
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
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background:white;"><a href="./module.php"><span style="color:blue; font-weight:bold;text-decoration:underline;">Module 1 - Title</span></a></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background:white;"><a href="./module.php"><span style="color:blue; font-weight:bold;text-decoration:underline;">Module 2 - Title</span></a></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background:white;"><a  href="./module.php"><span style="color:blue; font-weight:bold;text-decoration:underline;">Module 3 -Title</span></a></div>
      </div>
    </div>
  </div>
</div>
<br>

  <?php
     require("includes/footer.php");
    ?>
