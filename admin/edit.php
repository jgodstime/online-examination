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
                        <li><a href="question.php">Set Questions</a></li>
                        <li class="active"><a href="edit.php">Edit Questions</a></li>
                        <li><a href="view.php">View Questions</a></li>
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
if(isset($_POST['search_btn'])){
        $question_number = $_POST['question_number'];
        $question=$_POST['question'];
        $optionA=$_POST['optionA'];
        $optionB=$_POST['optionB'];
        $optionC=$_POST['optionC'];
        $optionD=$_POST['optionD'];
        $correct_answer=$_POST['correct_answer'];
        $mark=$_POST['mark'];
    if (!empty($question_number)){
        $query="SELECT * FROM `questions_tbl` WHERE `id`='$question_number'";
        $query_run=mysql_query($query);
        if(mysql_num_rows($query_run)==NULL){
          echo '<p class="bg-danger animated bounceInLeft">Question with this question number not found.</p>';
        }else{
            while($query_row=mysql_fetch_assoc($query_run)){
                 $question = $query_row['question']; 
                 $optionA = $query_row['optiona']; 
                 $optionB = $query_row['optionb'];
                 $optionC = $query_row['optionc'];
                 $optionD = $query_row['optiond'];
                 $correct_answer = $query_row['correct_answer'];
                 $mark = $query_row['mark'];

            }
         echo '<p class="bg-success animated bounceInLeft">Question Found! Edit and make update.</p>';
             }


    }else{
        echo '<p class="bg-danger animated bounceInLeft">Question Number field is required.</p>';
    }

}else if(isset($_POST['update_btn'])){
     $question_number = $_POST['question_number'];
        $question=$_POST['question'];
        $optionA=$_POST['optionA'];
        $optionB=$_POST['optionB'];
        $optionC=$_POST['optionC'];
        $optionD=$_POST['optionD'];
        $correct_answer=$_POST['correct_answer'];
        $mark=$_POST['mark'];
    if (!empty($question) && !empty($optionA) && !empty($optionB) && !empty($optionC) && !empty($optionD) && !empty($correct_answer) && !empty($mark) && !empty($question_number)){
             $table='questions_tbl';
        echo update_tbl($question_number,$table,$question,$optionA,$optionB,$optionC,$optionD,$correct_answer,$mark); 
       
        }else{
            echo '<br><p class="bg-danger animated bounceInLeft">All fields are required.</p>';
        }
}
        ?>
        <h3>Edit Questions</h3>
       <h5> N/B: Correct answer must be included in one of the option fields and the correct answer field.</h5>
        <?php
        //echo the function that displays number of question
            echo nummber_of_questions();
        ?>
        <form action="edit.php" method="POST" class="form-inline">
              <div class="form-group">
                
                <textarea class="form-control" cols="100px" placeholder="Waiting for the search..." name="question"> <?php if(isset($question)){echo $question;}?></textarea><br><br>
                  
                <label for="exampleInputName2">Option A:</label>
                <input type="text" name="optionA"class="form-control" id="exampleInputName2" placeholder="Waiting for the search..." value="<?php if(isset($optionA)){echo $optionA;}?>"><br><br>
                  
                <label for="exampleInputName2">Option B:</label>
                <input type="text" name="optionB"class="form-control" id="exampleInputName2" placeholder="Waiting for the search..." value="<?php if(isset($optionB)){echo $optionB;}?>"><br><br>
                  
                <label for="exampleInputName2">Option C:</label>
                <input type="text" name="optionC"class="form-control" id="exampleInputName2" placeholder="Waiting for the search..." value="<?php if(isset($optionC)){echo $optionC;}?>"><br><br> 
                
                <label for="exampleInputName2">Option D:</label>
                <input type="text" name="optionD"class="form-control" id="exampleInputName2" placeholder="Waiting for the search..." value="<?php if(isset($optionD)){echo $optionD;}?>"><br><br>
                  
                <label for="exampleInputName2">Correct Answer:</label>
                <input type="text" name="correct_answer"class="form-control" id="exampleInputName2" placeholder="Waiting for the search..." value="<?php if(isset($correct_answer)){echo $correct_answer;}?>"><br><br>
                  
                <label for="exampleInputName2">Mark:</label>
                <input type="text" name="mark"class="form-control" id="exampleInputName2" placeholder="Waiting for the search..." value="<?php if(isset($mark)){echo $mark;}?>"><br><br>
                  
                 
                  <input type="submit" name="update_btn" value="Update" class="btn btn-default" style="width: 120px;">
                  

              </div>
            
    </div>
</div>
              
    </div>
             <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">Search With Question Number</div>
                  <div class="panel-body">
               
                    <label for="exampleInputName2">Enter Question #:</label>
                <input type="text" name="question_number"class="form-control" id="exampleInputName2" placeholder="Enter #" value="<?php if(isset($question_number)){echo $question_number;}?>"><br>
                      <input type="submit" name="search_btn" value="Search" class="btn btn-default" style="width: 120px;">
                      </form>
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
 