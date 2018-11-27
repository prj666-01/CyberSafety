<?php
require('./Request.php');
// Check if the user submitted the username form
if (!empty($_POST['textModule'])) {
  $array = [
    "moduleTitle" => $_POST['modTitle'],
    "contentType" => $_POST['conType'],
    "content" => $_POST['content'],
    "quiz" => $_POST['quiz'],
    "courseID" => $_POST['courseID'],
    "sequenceID" => $_POST['sequenceID']
  ];
  //Instantiate new Request class
  $request = new Request();
  ($request->addModule($array)) ? $result = "Module added successfully." : $result = "Module couldn't be added successfully.";
  echo $result;
}
?>
<?php
 require("includes/header.php");
?>
</head>
<body>
<?php
require("includes/nav.php");
 ?>
<div class="container">
   <div class="row">
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-login">
            <div class="panel-heading">
               <div class="row">
                  <div style="margin:0px auto">
                     <h1>Text Module</h1>
                  </div>
               </div>
            </div>
            <div class="panel-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form id="textModule" name="textModule" method="POST" action="#">
                        <div class="form-group">
                           <input type="hidden" name="courseID" id="courseID"  class="form-control" value="1"/>
                           <!-- <input type="hidden" name="courseID" id="courseID"  class="form-control" value="?php echo $_SESSION["signedinuser"]["courseID"];?>"/> -->
                           <input type="hidden" name="sequenceID" id="sequenceID"  class="form-control" value="5"/>
                           <!-- <input type="hidden" name="courseID" id="courseID"  class="form-control" value="?php echo $_SESSION["signedinuser"]["sequenceID"];?>"/> -->
                           <input type="hidden" name="quiz" id="quiz"  class="form-control" value="0"/>
                           <input type="hidden" name="conType" id="conType"  class="form-control" value="text"/>
                        </div>
                        <div class="form-group">
                           <label for="modTitle">Module Title:</label>
                           <input type="text" name="modTitle" id="modTitle" tabindex="1" class="form-control" placeholder="Module Title" maxlength="25" required/>
                        </div>
                        <div class="form-group">
                           <label for="content">Enter free-form text for your module:</label>
                           <textarea name="content" id="content" tabindex="2" class="form-control" rows="20"></textarea>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-sm-6 col-sm-offset-3">
                                 <button type="submit" name="textModule" id="textModule" tabindex="5" class="form-control btn btn-register" value="Submit"> Submit </button>
                              </div>
                           </div>
                        </div>
                     </form>
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
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</body>
</html>