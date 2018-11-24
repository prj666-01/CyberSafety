<?php
  $txt = ' <div style = " background: #fff; border-radius: 2px;height: 70%;  width: 50%;   box-sizing: border-box;  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);  margin: 100px auto;">';
  $txt .= '<nav style="margin: 0; padding: 0;overflow: hidden;background-color: #333;">
  <div class="container-fluid">
     <h2 class="text-center" style="color:#f5f5f5;"> KnowledgeFLow </h2>
  </div>
  </nav><div style="padding: 20px;">';
  $txt .= '<p style="text-align: left;  font-size: 14px;">Hi Manali,</p> ';
  $txt .= ' <p style="text-align: left; font-size: 14px;">
           Thank You for Signing in up.
        </p>';
  $txt .= '<p style="text-align: left; font-size: 14px;">In order to complete your sign up process please verify your account by clicking on the button below.
  </p>';

  //Email Link
  $txt .='<div><a href="" target="_blank"><button class="btn btn-default btn-success center-block">Verify Account</button></a></div>';
  $txt .= ' </div>  </div>';
  echo $txt;
 require("includes/header.php");
?>
</head>
<body>
<?php
require("includes/nav.php");
 ?>
    <div class="container">
      <!-- ADD YOUR CODE HERE -->

      

      <!-- YOUR CODE FINISHES HERE -->
    </div>
  <?php
     require("includes/footer.php");
    ?>
