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
                        <li><a href="answered_questions.php">View Answered Questions</a></li>
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
                

    <div class="panel panel-default">
        <div class="panel-body"><!--this panel gives me the boarder i have in my left div-->

<?php
//getting the candidate data to display in the exam summary
 $query = "SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id'";
        $query_run = mysql_query($query);
             if(mysql_num_rows($query_run)==NULL){
                  header('location:no_question.php');
            }else{
        while($query_row = mysql_fetch_assoc($query_run)){
         $first_name = $query_row['first_name'];
         $other_name= $query_row['other_name'];
         $email= $query_row['email'];
         $phone= $query_row['phone'];
         $gender= $query_row['gender'];
        
    }  } 
            
            
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
?>
            
    
            <h4>You have already sat for the exam, here is your score</h4>
<div style="padding-left:30%; padding-right:30%;">
         <div class="list-group animated bounceInDown">
          <a href="#" class="list-group-item disabled">
             <h4>EXAM SUMMARY</h4>
          </a>
            <p  class="list-group-item"><?php echo 'First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$first_name; ?></p>
            <p  class="list-group-item"><?php echo 'Other Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$other_name; ?></p>
            <p  class="list-group-item"><?php echo 'Other Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$email; ?></p>
            <p  class="list-group-item"><?php echo 'Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$phone; ?></p>
            <p  class="list-group-item"><?php echo 'Max.Mark:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$question_total_mark; ?></p>
            <p  class="list-group-item"><?php echo 'Obtained Mark:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$your_total_mark; ?></p>
             <a href="answered_questions.php" class="list-group-item"> View answerd questoins</a>
            </div>
     </div>

<?php

   

?>

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
 