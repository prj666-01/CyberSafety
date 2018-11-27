<html>
<?php
 require("./includes/header.php");
?>

<style>
.panel-body .btn:not(.btn-block) { width:100%;margin-bottom:10px; }
#adminContainer {text-align:center;}
.panel {width:100%;}
</style>
<body>
<?php
require("./includes/nav.php");
 ?>
  <div id="adminContainer" class="container">
   <div class="row">
       <div class="col-md-12">
           <div class="panel panel-primary">
               <div class="panel-heading">
                   <h3 class="panel-title">
                       <span></span>Admin Tools</h3>
               </div>
               <div class="panel-body">
                   <div class="row">
                       <div class="col-xs-6 col-sm-6">
                         <a href="viewApprovedCourses.php" class="btn btn-primary btn-lg"  role="button">
                             View all approved courses
                         </a>
                         <a href="viewUnapprovedCourses.php" class="btn btn-primary btn-lg"  role="button">
                           View all unapproved courses
                         </a>
                         <a href="viewAllCourses.php" class="btn btn-primary btn-lg" role="button">
                           View all courses
                         </a>
                         <hr>
                         <a href="createNewCourse.php"  disabled class="btn btn-primary btn-lg"  role="button">
                           Create a new course
                         </a>
                         <a href="editCourse.php" disabled  class="btn btn-primary btn-lg"  role="button">
                             Edit any course
                         </a>
                         <hr>
                         <a href="deleteCourse.php" disabled class="btn btn-danger btn-lg"  role="button">
                             Delete any available course
                         </a>
                         <hr>
                         <a href="addNewUser.php" disabled class="btn btn-warning btn-lg"  role="button">
                           Add new user account
                         </a>
                         <hr>
                         <a href="emailAdmins.php" disabled class="btn btn-info btn-lg"  role="button">
                            Email admins
                         </a>
                       </div>

                       <div class="col-xs-6 col-sm-6">
                         <a href="viewCoursesByUser.php" disabled class="btn btn-primary btn-lg"  role="button">
                            View all courses by user
                         </a>
                         <a href="viewAllUsers.php" class="btn btn-primary btn-lg"  role="button">
                            View all users
                         </a>
                         <a href="viewAllAdmins.php"  class="btn btn-primary btn-lg"  role="button">
                            View all admins
                         </a>
                         <hr>
                         <a href="cloneCourse.php"  disabled class="btn btn-primary btn-lg"  role="button">
                            Clone a course
                         </a>
                       <a href="rearrangeCourse.php" disabled class="btn btn-primary btn-lg"  role="button">
                            Rearrange any course
                       </a>
                       <hr>
                         <a href="approveCourse.php" disabled class="btn btn-success btn-lg" role="button">
                            Approve courses
                         </a>
                         <hr>
                         <a href="addNewAdmin.php"  disabled class="btn btn-warning btn-lg" role="button">
                            Add a new admin account
                         </a>
                         <hr>
                         <a href="emailUsers.php" disabled class="btn btn-info btn-lg"  role="button">
                            Email users
                         </a>
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
  </div>
  <?php
     require("./includes/footer.php");
    ?>
