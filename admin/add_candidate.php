<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
require_once'function.php';
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
              <h1>Online Examination</h1>
              
            <h3>Admin Panel</h3>
            
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
                        <li><a href="admin_main.php">Home</a></li>
                        <li class="active"><a href="add_student.php">Add Candidate</a></li>
                        <li><a href="view_candidate.php">View Candidate</a></li>
                        
                         
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
              $f_name= $_POST['f_name'];
               $o_name= $_POST['o_name'];
               $email= $_POST['email'];
               $phone= $_POST['phone'];
               $gender= $_POST['gender'];
              
              if(!empty($f_name) && !empty($o_name) && !empty($email) && !empty($phone) && !empty($gender)){
                  $ran1=rand(100,400);
                  $ran2=rand(1000,100);
                  $login_id = 'ONL'.$ran1.$ran2;
                  
                  $table='candidate_tbl';
                  echo save_candidate($table,$login_id,$f_name,$o_name,$email,$phone,$gender);
              }else{
                  echo '<br><p class="bg-danger animated bounceInLeft">All fields are required.</p>';
              }
          }
        
        
            
        ?>
        <h3>Add Student</h3>
        <form action="add_candidate.php" method="POST" class="form-inline">
          <div class="form-group"><br>
              <label for="exampleInputName2">First Name:</label>
                <input type="text" name="f_name"class="form-control" id="exampleInputName2" placeholder="Enter first name"><br><br>
                  
                <label for="exampleInputName2">Other Names:</label>
                <input type="text" name="o_name"class="form-control" id="exampleInputName2" placeholder="Enter other names"><br><br>
              
                <label for="exampleInputName2">Email:</label>
                <input type="email" name="email" class="form-control" id="exampleInputName2" placeholder="Enter email"><br><br>
              
              <label for="exampleInputName2">Phone:</label>
                <input type="text" name="phone"class="form-control" id="exampleInputName2" placeholder="Enter phone number"><br><br>
              
              <label for="exampleInputName2">Gender:</label>
              <select class="form-control" name="gender" style="width:180px;">
                  <option></option>
                  <option>Male</option>
                  <option>Female</option>
              </select><br><br>
                
             
              <input type="submit" name="submit_btn" value="Submit" class="btn btn-default">


          </div>
        </form>
    </div>
</div>
              
    </div>
      
       <div class="col-md-4">
                 
                 <div class="list-group">
                      <a href="#" class="list-group-item disabled">
                         <h4>Quick Link</h4>
                      </a>
                      <a href="add_candidate.php" class="list-group-item">Add Candidate</a>
                      <a href="view_candidate.php" class="list-group-item">View Candidate</a>
                     
                
              </div>
             
  </div><br>
</div>
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
 