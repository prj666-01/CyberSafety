<?php
 require("includes/header.php");
 session_start();
?>
</head>
<body>
<?php
require("includes/nav.php");
 ?>
    <div class="container">
      <!-- ADD YOUR CODE HERE -->
        <div id="fullProfileUser">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="height:120px;">
                        <h2>Virtual Learning Portal</h2><h2>Taking the "e" out of eLearning</h2>
                        </div> 
                    </div> 
                    </div>
               </div>
           </div>
           <div class="container">
             <div class="row">
                <div class="col-sm-4 text-center">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <a href="certification_courses.php"><img src="includes/images/learning.png" alt="Icon made by Freepik from www.flaticon.com" style="width:150px;height:150px;"></a> 
                    <br>View Certificate Courses
                    </div>     
                </div> <!--Icons made by Freepik from www.flaticon.com -->
                </div>
                <div class="col-sm-4 text-center">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <a href="present_certificate_courses.php"><img src="includes/images/presentation.png" alt="Icon made by Freepik from www.flaticon.com" style="width:150px;height:150px;"></a>
                    <br>Present Certificate Courses
                    </div>     
                </div> <!--Icons made by Freepik from www.flaticon.com -->
                </div>
                <div class="col-sm-4 text-center">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <a href="course_builder.php"><img src="includes/images/thinking.png" alt="Icon made by Freepik from www.flaticon.com" style="width:150px;height:150px;"></a> 
                    <br>Create / Modify Courses
                    </div>     
                </div> <!--Icons made by Freepik from www.flaticon.com -->
                </div>
           </div>
  </div>
      <!-- YOUR CODE FINISHES HERE -->
    </div>
  <?php
     require("includes/footer.php");
    ?>
