<?php

/*******************************
Configuration for the page
*******************************/


// Include Request class
require("Course.php");

require_once("includes/functions.php");

// Title of the Page
$pageTitle = "Add Course";

// Is this page restricted?
$pageSecured = true;
// Check if there is a POST variable and if it is not empty
if (isset($_POST) && !empty($_POST)) {
	$newCourseTitle = $_POST["courseTitle"];
	$newCourseDescription = $_POST["courseDescription"];
	$newCourseTeachingLevel = $_POST["courseTeachingLevel"];

	$newCourse = new Course();
	$newCourse->title = $newCourseTitle;
	$newCourse->description = $newCourseDescription;
	$newCourse->teachingLevel = $newCourseTeachingLevel;

	//Save course to database
	$createdCourse = $newCourse->save();

	$newCourse->id = $createdCourse["Course_Id"];
	//Redirect user to addModule.php
	header( 'Location: '  . URL . 'addModule.php?courseId=' . $newCourse->id);
}


// This adds the Header to this page.
require_once('header.html');
 ?>

 <section id="main" class="wrapper">
	 <div class="inner">
		 <header class="align-center">
			 <h2>Add Course</h2>
			 <p>You can start adding your course.</p>
		 </header>
		<!-- Three -->
		<div>
		<form method="post" action="addCourse.php" class="">
			<div class="row uniform">
				<div class="field half first">
					<input type="text" name="courseTitle" id="demo-name" value="" placeholder="Course Title" />
				</div>
				<div class="field half">
					<div class="select-wrapper">
						<select name="courseTeachingLevel" id="demo-category">
							<option value="">- Teaching Level -</option>
							<option value="Grade 1">Grade 1</option>
							<option value="Grade 2">Grade 2</option>
							<option value="Grade 3">Grade 3</option>
							<option value="Grade 4">Grade 4</option>
							<option value="Grade 5">Grade 5</option>
						</select>
					</div>
				</div>

				<div class="12u$">
					<textarea name="courseDescription" id="demo-message" placeholder="Course Description" rows="6"></textarea>
				</div>

				<div class="12u$">
					<ul class="actions">
						<li><input type="submit" value="Submit" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>

<?php
// This adds the Footer to this page.
require_once('footer.html');
?>
