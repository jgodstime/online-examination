<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
?>
<!doctype html>
<html>
    <head>
        <title>Online Examination </title>
		
        <meta charset="utf-8"/>
         <link rel="stylesheet" href="css/animate.css">
		 <link href="css/bootstrap.css" rel="stylesheet">
 		 <script src="js/bootstrap.js"></script>
    </head> 
 	<body>
        <div class="jumbotron">
              <h1>Online Examination!</h1>
            
              <p>Do your Best...Forget the Rest...</p>
           
            </div>
        <div class="navbar navbar-default navbar-static-top">	
            <div class="container">
                <a href="index.php" class="navbar-brand">Online Examination</a>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!--
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                         <li><a href="#">Become A Members</a></li>
                        -->
                    </ul>
                </div>
            </div>
           
        </div>
<div style="text-align:center;">
<?php
session_destroy();
?> 
</div>
<div class="container">
    
<div class="row">
                

    <div class="panel panel-default">
        <div class="panel-body"><!--this panel gives me the boarder i have in my left div-->

            <h2>Sorry! you did not attempt any question, and you are logged out.</h2>
            <h4><a href="index.php">Click to login</a></h4>
        </div>
    </div>
     
  </div><br>
</div>
        <div class="panel panel-default">
          <div class="panel-body">
           Developed by John Godstime...+2348166848962.
          </div>
          <div class="panel-footer">
              <br><br><br>
             
              <p><strong>©2016 John Godstime - All rights reserved.</strong> </p>				  
          </div>
        </div>
        
        
<script type="text/javascript" src="js/jquery.js"></script>
<body/>
</html>
 