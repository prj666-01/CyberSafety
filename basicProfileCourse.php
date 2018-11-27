<?php
 require("includes/header.php");
 require('./Request.php');
 session_start();
 $request = new Request;
 $allCourses = $request->getAll('courses');

?>
</head>
<body>
<?php
require("includes/nav.php");
 ?>
    <div class="container" id="vieCourse-container">
     
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
                <div class="col-sm-4 text-center"> </div>
                <div class="col-sm-4 text-center">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <button id="viewCourses" ><img src="includes/images/learning.png" alt="Icon made by Freepik from www.flaticon.com" style="width:150px;height:150px;"></a></button>
                    <br>View Public Courses
                    </div>     
                </div> <!--Icons made by Freepik from www.flaticon.com -->
                </div>
            </div>
            </div>
    </div>
    <div class="container" id="allCourses" style=" display: none;">
        <div class="text-center"> <h1>View Public Courses</h1> </div>
        <div class="table-responsive">
            <table class="table table-bordered">
        <thead>
            <tr>
            <th>Course Title</th>
            <th>Date Created</th>
            <th>Course Status</th>
            </tr>
        </thead>
        <?php
            foreach($allCourses as $course) {
        ?>
        <tbody>
            <tr>
            <td><?php print_r($course['courseTitle']) ?></td>
            <td><?php print_r($course['dateCreated']) ?></td>
            <td> <div> <button type="button" class="btn btn-primary" id="beginCourse" onclick="window.location.href= './viewCourse.php';"><?php
            
            
                if ($course['courseStatus'] == 1){ echo "Begin Course" ;}
                else if ($course['courseStatus'] == 2){ echo "Resume Course";}
                else if ($course['courseStatus'] == 3){ echo "Retake Course";} 
        
            ?></button></div></td>
            </tr>
        </tbody>
        <?php
        // Ends the foreach
            }
        ?>
        </table>
    </div>
  </div>
 
  <script type="text/javascript">
  $(document).ready(function() {
    $(document).on("click", "#viewCourses", function (){
         $("#vieCourse-container").hide();
         $("#allCourses").show();
     });
 
    });
     </script>
  <?php
     require("includes/footer.php");
    ?>
