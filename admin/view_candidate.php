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
                        <li><a href="add_candidate.php">Add Candidate</a></li>
                        <li class="active"><a href="view_candidate.php">View Candidate</a></li>
                        
                         
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
                <h2 class="text-center">List of Exam Candidate</h2>
   <table class="table table-hover table-bordered table-responsive">
						
					  <tr>
							<th>ID</th>
							<th>LOGIN ID</th>
							<th>FIRST NAME</th>
							<th>OTHER NAME</th>
							<th>EMAIL</th>
							<th>PHONE</th>
							<th>GENDER</th>
				
					  </tr>
					
					<?php

							$query="SELECT * FROM `candidate_tbl` ORDER BY `id` ASC";
							if ($query_run = mysql_query($query)){
	
								if(mysql_num_rows($query_run)==NULL){
									echo 'No Candidate Found,'.'<a href="add_candidate.php">Click to add Candidate.</a>';
								}else{
									
								
								while ($query_row = mysql_fetch_assoc($query_run)){
									
									$id = $query_row['id'];
									$login_id= $query_row['login_id'];
									$first_name= $query_row['first_name'];
									$other_name= $query_row['other_name'];
									$email= $query_row['email'];
									$phone= $query_row['phone'];
									$gender= $query_row['gender'];
											
					?>
						
						
						<tr>
							<td> <?php echo $id; ?> </td>
							<td> <?php echo $login_id; ?> </td>
							<td> <?php echo $first_name; ?> </td>
							<td> <?php echo $other_name; ?> </td>
							<td> <?php echo $email; ?> </td>
							<td> <?php echo $phone; ?> </td>
							<td> <?php echo $gender; ?> </td>
						</tr>
						
						<?php
						}
								}

							}	

						?>
					
					</table>
            
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
 