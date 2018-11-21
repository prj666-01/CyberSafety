<?php
require ("Request.php");

class Course {

    public $id = 0;
    public $title = "";
    public $author = "";
    public $teachingLevel = "";
    public $description = "";
    public $dateCreated = 0;
    public $dateLastUpdated = 0;
    public $courseStatus = "";
    public $isApproved = 0;
    public $userId = 0;

    public function save() {
        $request = new Request();
        return $request->add('courses', $this);
    }
    public function getTitle($id) {
        $request = new Request();
        $newCourse = $request->getOne('courses', $id);
        return $newCourse['Course_Title'];
    }
}
?>
