<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
?>
<!doctype html>
<html>
    <head>
        <title>Online Examination</title>
		
        <meta charset="utf-8"/>
		 <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ibc.css" rel="stylesheet">
		 <script src="jq/jquery-1.12.2.js"></script>
 		 <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/animate.css">
    </head> 
 	<body>
        <div class="jumbotron">
              <h1>Online Examination</h1>
              
            <h3>Admin Panel</h3>
            
            </div>
        <div class="navbar navbar-default navbar-static-top animated bounceInLeft">	
            <div class="container">
                <a href="index.php" class="navbar-brand">Online Examination</a>

                
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="admin_main.php">Home</a></li>
                        <li><a href="add_candidate.php">Manage Candidate</a></li>
                        <li><a href="candidate_result.php">Candidate result</a></li>
                         
                    </ul>
                </div>
            </div>
           
        </div>
<div style="text-align:center;">
<?php
	if (loggedin()){ // checking if the session is set and not empty
		$user_name = getuserfield('user_name'); // calling the function that displays the first name of user from the table
		 $id = getuserfield('id');
		echo 'You\'re logged in, '.$user_name.'.<a href="logout.php" style="color: Red;">Click to log out</a><br>';


	}else{
		header('location: index.php');// if session is empty redirect the user to the login form
	}
?>
</div>
        
<div class="container">
    
  <div class="row">
                
    <div class="col-md-8">
<div class="panel panel-default">
            

    <div class="panel-body"><!--this panel gives me the boarder i have in my left div-->
        
        <?php
        
            if (isset($_POST['submit_btn'])){
               
                header('location:question.php');
            }
            
        ?>
        <h3>Set Questions</h3>
        <form action="admin_main.php" method="POST" class="form-inline">
          <div class="form-group"><br>
            
              <input type="submit" name="submit_btn" value="Click to add Question" class="btn btn-default animated bounceInUp">


          </div>
        </form>
    </div>
</div>
              
    </div>
      
      
     <div class="col-md-4">
                 <div class="list-group">
                      <a href="#" class="list-group-item disabled">
                         <h4>Useful Link...Goto...</h4>
                          
                      </a>
                      <a href="question.php" class="list-group-item">Set Question</a>
                      <a href="edit.php" class="list-group-item">Edit Question</a>
                      <a href="#" class="list-group-item">View Question</a>
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
 