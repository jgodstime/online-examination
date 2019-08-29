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
         <link rel="stylesheet" href="css/animate.css">
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
                       <li><a href="admin_main.php">Home</a></li>
                        <li class="active"><a href="candidate_result.php">Summary</a></li>
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

<h3>Summary of Exam</h3>
       
       
<?php
    if(isset($_POST['search_btn'])){
       $login_id= $_POST['login_id'];
        if(!empty($login_id)){
            
            //getting the candidate data to display in the exam summary
 $query = "SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id'";
        $query_run = mysql_query($query);
            
if(mysql_num_rows($query_run)==NULL){
    echo '<br><p class="bg-danger animated bounceInLeft">Candidate not found</p>';
    }else{
        while($query_row = mysql_fetch_assoc($query_run)){
         $first_name = $query_row['first_name'];
         $other_name= $query_row['other_name'];
         $email= $query_row['email'];
         $phone= $query_row['phone'];
         $gender= $query_row['gender'];
        }  
                 
                 
//calculating the max question mark the candidate answer
 $query = "SELECT sum(mark) AS total_mark FROM `candidate_answer_tbl` WHERE login_id='$login_id'";
        $query_run = mysql_query($query);
                while($query_row = mysql_fetch_assoc($query_run)){
                 $question_total_mark = $query_row['total_mark'];
                }  
                 
                 
//Calculating the mark obtained by the candidate
 $query = "SELECT sum(your_mark) AS your_total_mark FROM `candidate_answer_tbl` WHERE login_id='$login_id'";
        $query_run = mysql_query($query);
        while($query_row = mysql_fetch_assoc($query_run)){
         $your_total_mark = $query_row['your_total_mark'];
    }
    
    //echoing the div that holds the summary
    echo '<div style="padding-left:30%; padding-right:30%;">
         <div class="list-group animated rollIn">
          <a href="#" class="list-group-item disabled">
             <h4>EXAM SUMMARY</h4>
          </a>
            <p  class="list-group-item">First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$first_name.'</p>
            <p  class="list-group-item">Other Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$other_name.'</p>
            <p  class="list-group-item">Other Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$email.'</p>
            <p  class="list-group-item">Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$phone.'</p>
            <p  class="list-group-item">Max.Mark:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$question_total_mark.'</p>
            <p  class="list-group-item">Obtained Mark:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$your_total_mark.'</p>
             <a href="answered_questions.php" class="list-group-item"> View answerd questoins</a>
            </div>
     </div>';

             } 
            
        }else{
            echo '<br><p class="bg-danger animated bounceInLeft">Select a candidate id.</p>';
        }
    }
?>
           
            
    </div>
</div>
              
    </div>
<div class="col-md-4">
    <div class="panel panel-default">
          <div class="panel-heading">Select candidate login id</div>
          <div class="panel-body">
            <form action="candidate_result.php" method="POST" class="form-inline">
                <div class="form-group">
                <?php
                $query="SELECT DISTINCT `login_id` FROM `candidate_answer_tbl`";
                    ($query_run = mysql_query($query));
                        echo '<select name="login_id" id="item1" value=""  class="form-control">';
                echo '<option></option>';
                         while($row1 = mysql_fetch_assoc($query_run)){
                                echo '<option>';
                                    echo $row1['login_id'];
                                echo '</option>';
                             }
                echo '</select>'; 
                ?>
                <br><br><input type="submit" name="search_btn" value="Search" class="btn btn-default" style="width: 120px;">
                                    </div>

                    </div>

                </form>
        </div>
</div>
      <!-- displaying the question answered base on login id-->
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
									//echo 'Record not found.';
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
 