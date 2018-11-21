<?php

/*******************************
Configuration for the page
*******************************/

// This defines the base URL for the project.
define('URL', 'http://myvmlab.senecacollege.ca:6255/CyberSafety/');
// Include Request class
require("Course.php");
// Title of the Page
$pageTitle = "Add Modules";
// Is this page restricted?
$pageSecured = true;

// Get current course ID from the URL
$currentCourseId = $_GET["courseId"];
//Instanciate a new Course object
$currentCourse = new Course();
// Get title of the currentCourse
$currentCourseTitle = $currentCourse->getTitle($currentCourseId);

// This adds the Header to this page.
require_once('header.html');
 ?>

 <section id="main" class="wrapper">
	 <div class="inner">
		 <header class="align-center">
			 <h2>Add Modules to "<?php echo $currentCourseTitle?>"</h2>
			 <p>Add modules to your course.</p>
		 </header>
		<!-- Three -->
		<div>

	</div>
</section>

<?php
// This adds the Footer to this page.
require_once('footer.html');
?>
