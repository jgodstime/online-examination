<?php
require_once'connect.inc.php';
require_once'core.inc.php';
?>
<!doctype html>
<html>
    <head>
        <title>Online Examination</title>
        <meta charset="utf-8"/>
         <link rel="stylesheet" href="css/animate.css">
		 <link href="css/bootstrap.css" rel="stylesheet">
		 <script src="jq/jquery-1.12.2.js"></script>
 		 <script src="js/bootstrap.js"></script>
    </head> 
 	<body>
        <div class="jumbotron">
              <h1>Online Examination!</h1>
                
              <p>Do your Best...Forget the Rest...</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        <div class="navbar navbar-default navbar-static-top">	
            <div class="container">
                <a href="index.php" class="navbar-brand">Online Examination</a>
                
                
                
                
            </div>
           
        </div>
        
<div class="container">
    
  <div class="row">
                
    <div class="col-md-8">
        <div class="panel panel-default">
            

	
            <div class="panel-body"><!--this panel gives me the boarder i have in my left div-->
<?php       
        
if (isset($_POST['user_name']) && isset($_POST['password'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $password_hash = md5($password);



        if(!empty($user_name) && !empty($password)){
        $query= "SELECT `id` FROM `admin_tbl` WHERE `user_name`='".mysql_real_escape_string($user_name)."' AND `password`='".mysql_real_escape_string($password_hash)."'"; 
            if ($query_run =mysql_query($query)){
             $query_num_rows = mysql_num_rows($query_run);
                if($query_num_rows==0){
                echo '<br><p class="bg-danger animated bounceInLeft">Invalid user name/password combination</p>';
            }else if ($query_num_rows==1) {
        $user_id = mysql_result($query_run, 0, 'id'); // collecting the user id to store in session in a session data
        $_SESSION['user_id']=$user_id; // setting session
        header('Location: admin_main.php');
            }
        }
    }else{
        echo '<br><p class="bg-danger animated bounceInLeft">You must provide user name and password</p>';
    }
}
?>
                <h3> Welcome Admin. Sign in </h3>
           
           
                
<!-- Small modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Click to login</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <form action="index.php" method="POST" class="form-inline">
              <div class="form-group"><br>
                <label for="exampleInputName2">User name:</label>
                <input type="text" name="user_name"class="form-control" id="exampleInputName2" placeholder="Enter username"><br><br>

                 <label for="exampleInputName2">Password:</label>
                 <input type="password" name="password"class="form-control" id="exampleInputName2" placeholder="Enter Password"><br><br> 
                  <input type="submit" name="save" value="Login" class="btn btn-default">


              </div>
            </form><br><br>
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
            Developed by John Godstime...+2348166848962.
          </div>
          <div class="panel-footer">
              <br><br><br>
             
              <p><strong>©2016 John Godstime - All rights reserved.</strong> </p>				  
          </div>
        </div>
<body/>
</html>
 