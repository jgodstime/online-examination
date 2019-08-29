<?php
require_once'connect.inc.php';
require_once'core.inc.php';
require_once'function.php';
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
                         <!--
                       <li><a href="admin_main.php">Home</a></li>
                        <li><a href="question.php">Set Questions</a></li>
                        <li><a href="edit.php">Edit Questions</a></li>
                        <li class="active"><a href="view.php">View Questions</a></li>
                        -->
                        <li><a href="result1.php">Back to summary</a></li>
                    </ul>
                   
                    
                </div>
            </div>
           
        </div>
<div style="text-align:center;">
<?php
	if (loggedin()){ // checking if the session is set and not empty
		$user_name = getuserfield('email'); // calling the function that displays the first name of user from the table
        $login_id = getuserfield('login_id');
		echo 'You\'re logged in, '.$user_name.'.<a href="logout.php" style="color: Red;">Click to log out</a><br>';
	}else{
		header('location: index.php');// if session is empty redirect the user to the login form
	}
?>
    
</div>
        
<div class="container">
    
  <div class="row">
                <h2 class="text-center">Answered Questions</h2>
   <table class="table table-hover table-bordered table-responsive">
						
					  <tr>
							<th class="success">QUESTION</th>
							<th class="success">CORRECT ANSWER</th>
							<th class="success">YOUR ANSWER</th>
							<th class="success">MARK</th>
							<th class="success">YOUR MARK</th>
							<th class="success">TIME</th>
					  </tr>
					
					<?php

							$query="SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id' ORDER BY `id` ASC";
							if ($query_run = mysql_query($query)){
	
								if(mysql_num_rows($query_run)==NULL){
									echo 'No question found,'.'<a href="">Click to add question.</a>';
								}else{
									
								
								while ($query_row = mysql_fetch_assoc($query_run)){
									
									$question = $query_row['question'];
									$correct_answer = $query_row['correct_answer'];
                                    $your_answer = $query_row['your_answer'];
									$mark= $query_row['mark'];
									$your_mark= $query_row['your_mark'];
									$time= $query_row['time'];
											
					?>
						
						
						<tr>
							<td> <?php echo $question; ?> </td>
							<td> <?php echo $correct_answer; ?> </td>
							<td> <?php echo $your_answer; ?> </td>
							<td> <?php echo $mark; ?> </td>
							<td> <?php echo $your_mark; ?> </td>
							<td> <?php echo $time; ?> </td>
							
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
 