<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
?>
<!doctype html>
<!doctype html>
<html>
    <head>
        <title>Online Examination </title>
		
        <meta charset="utf-8"/>
         <link rel="stylesheet" href="css/animate.css">
		 <link href="css/bootstrap.css" rel="stylesheet">
		 <script src="jq/jquery-1.12.2.js"></script>
 		 <script src="js/bootstrap.js"></script>
    </head> 
 	<body>
        <div class="jumbotron">
              <h1 class="animated bounceInUp">Online Examination!</h1>
            
              <p class="animated bounceInDown">Do your Best...Forget the Rest...</p>
              <a class="btn btn-default btn-lg" href="#" role="button">Learn more</a>
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
        
<div class="container">
    
  <div class="row">
                
    <div class="col-md-8">
<div class="panel panel-default">
<div class="panel-body" ><!--this panel gives me the boarder i have in my left div-->
<?php       
        
if (isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $login_id = $_POST['login_id'];


        if(!empty($email) && !empty($login_id)){
        $query= "SELECT `id` FROM `candidate_tbl` WHERE `email`='".mysql_real_escape_string($email)."' AND `login_id`='".mysql_real_escape_string($login_id)."'"; 
            if ($query_run =mysql_query($query)){
             $query_num_rows = mysql_num_rows($query_run);
                if($query_num_rows==0){
                echo '<br><p class="bg-danger animated bounceInLeft">Invalid Login id/Email combination</p>';
            }else if ($query_num_rows==1) {
        $user_id = mysql_result($query_run, 0, 'id'); // collecting the user id to store in session in a session data
        $_SESSION['user_id']=$user_id; // setting session
        header('Location: check_exam.php');
            }
        }
    }else{
        echo '<br><p class="bg-danger animated bounceInLeft">You must provide Login id and Email</p>';
    }
}
?>
            <h3> ...Welcome... </h3>
                <h3>Click on the button below to Sign in and start your exam. </h3>
                
           
                
<!-- Small modal  that displays my form-->
<button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Click to sign in</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <form action="index.php" method="POST" class="form-inline">
              <div class="form-group"><br>
                <label for="exampleInputName2">Login id:</label>
                <input type="password" name="login_id"class="form-control" id="exampleInputName2" placeholder="Enter login id"><br><br>

                 <label for="exampleInputName2">Email:</label>
                 <input type="email" name="email"class="form-control" id="exampleInputName2" placeholder="Enter email"><br><br> 
                  <input type="submit" name="login_btn" value="Login" class="btn btn-default"><br><br>

              </div>
            </form> 
    </div>
  </div>
</div>        
                
                
</div>
</div>
              
    </div>
             
  </div><br>
</div>
        <div class="panel panel-default">
          <div class="panel-body">
           <p class="animated rollIn">Developed by John Godstime...+2348166848962.</p>
          </div>
          <div class="panel-footer">
              <br><br><br>
             
              <p><strong>©2016 John Godstime - All rights reserved.</strong> </p>				  
          </div>
        </div>
<body/>
</html>
 