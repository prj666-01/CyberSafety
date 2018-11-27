<?php
 require("includes/header.php");
?>
<link href="includes/css/moduleStyle.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
require("includes/nav.php");
 ?>
<div class="container">
                           
<div class="content">
                
                <div id='outer' class="well">
                    <div class="header">
                       Module Title - 1
                    </div>
                    <!-- Nav Bar for Different Concepts - unlock the first concept and rest of them are unclock. Concepts will be unclok when user finish previous concept and give a quiz -->
                    <div class="nav" id="moduleNav">
                        <ul>
                        <li style="background:  #f0ead6;">
                            <a href="#section-1">           
                                    <h4> Introduction </h4> 
                            </a>
                        </li>
                        <li style="background:  #efdfbb;">
                            <a href="#section-2" style="margin-top: 20px;">
                                    <h4> Part2 </h4>
                            </a>
                        </li>
                        <li style="background:  #e3dac9;">
                            <a href="#section-3">
                                    <h4> Part3</h4>
                            </a>
                        </li>
                        </ul>
                    </div>
                    <div class="content">
                    <div id="section-1" class="tab-content" style="background: #f0ead6;">
                        <div class="bodyText">
                            <h2>Section 1</h2>
                            <p>Section  1</p>
                        </div>
                        <button type="button" class="btn btn-primary"  id ="sectionBtn1"> Next </button>

                    </div>
                        <div id="section-2" class="tab-content" style="background:  #efdfbb; display:none;">
                        <div class="bodyText">
                            <h2>Section 2</h2>
                            <p>Section  2</p>
                        </div>
                        <button type="button" class="btn btn-primary"  id ="sectionBtn2" > Next </button>

                        </div>
                        <div id="section-3" class="tab-content" style="background:#e3dac9; display:none;" >
                        <div class="bodyText">
                            <h2>Section 3</h2>
                            <p>section 3</p>
                        </div>
                        <button type="button" class="btn btn-primary"  id ="sectionBtn3" onclick="window.location.href= './viewCourse.php';"> Finish </button>

                        </div>
                        
                            
                        </div>
                    </div>
            </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on("click", "#sectionBtn1", function (){
         $("#section-1").hide();
         $("#section-2").show();
     });
     $(document).on("click", "#sectionBtn2", function (){
         $("#section-2").hide();
         $("#section-3").show();
     });
    
 
    });
     </script> 
  <?php
     require("includes/footer.php");
    ?>

