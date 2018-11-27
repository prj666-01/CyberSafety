<?php
    $isLoggedIn = false;
    // session_start();
    if(!empty($_SESSION["signedinuser"]["username"])) {
        $isLoggedIn = true;
    }
?>

<noscript>
  <div class="container text-center">
    <h2>Canada's trusted source for cybersafety education</h2>
    <h2>Cybersafety Foundation</h2>
    <h3>Your current browser configuration is not compatible with our site (JavaScript disabled)</h3>
    <h3>Please enable JavaScript to view all the features on our site.</h3>
  </div>
</noscript>

<div id="panel" style="display:none;">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="./index.php">Home</a></li>
          <li><a href="./project.html" target="_parent">Project structure</a></li>
          <li><a href="./contact_us.php">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
              if($isLoggedIn) {
                  echo '
                  <li>
                    <a href="basicProfile.php">
                      <span class="fa fa-user" style="font-size:18px">
                      </span> Basic Profile
                    </a>
                  </li>
                  <li>
                    <a href="fullProfile.php">
                      <span class="fa fa-user" style="font-size:18px">
                      </span> Full Profile
                    </a>
                  </li>
                  <li>
                    <a href="signOut.php">
                      <span class="fa fa-sign-out" style="font-size:18px">
                      </span> Signout
                    </a>
                  </li>
                  <li>
                    <a href="adminIndex.php">
                      <span class="fa fa-unlock" style="font-size:18px">
                      </span> Admin Tools
                    </a>
                  </li>';
              } else {
                  echo '
                  <li>
                    <a href="signUp.php">
                      <span class="fa fa-user" style="font-size:18px" id="nav-signup">
                      </span> Sign Up
                    </a>
                  </li>
                  <li>
                    <a href="signIn.php">
                      <span class="fa fa-sign-in" style="font-size:18px" id="nav-signin">
                      </span> Sign In
                    </a>
                  </li>';
              }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</div>
