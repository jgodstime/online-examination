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
                        <li class="active"><a href="jss1question.php">Set Questions</a></li>
                        <li><a href="edit.php">Edit Questions</a></li>
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
    
    if (isset($_POST['submit_btn'])){
        $question=$_POST['question'];
        $optionA=$_POST['optionA'];
        $optionB=$_POST['optionB'];
        $optionC=$_POST['optionC'];
        $optionD=$_POST['optionD'];
        $correct_answer=$_POST['correct_answer'];
        $mark=$_POST['mark'];
        $table='questions_tbl';
        if (!empty($question) && !empty( $optionA) && !empty( $optionB) && !empty( $optionC) && !empty( $optionD) && !empty($correct_answer) && !empty($mark)){
           echo save_jss1question($table,$question,$optionA,$optionB,$optionC,$optionD,$correct_answer,$mark); //calling the function that saves jss1question
            
        }else{
            echo '<br><p class="bg-danger animated bounceInLeft">All fields are required.</p>';
        }
        
        
        
    }
?>
        <h3>Set Questions</h3>
       <h5> N/B: Correct answer must be included in one of the option fields and the correct answer field.</h5>
        <?php
             $table='questions_tbl';
            echo nummber_of_questions($table);
        ?>
        <form action="question.php" method="POST" class="form-inline">
              <div class="form-group">
                
                <textarea class="form-control" cols="100px" placeholder="Enter Question" name="question"></textarea><br><br>
                  
                <label for="exampleInputName2">Option A:</label>
                <input type="text" name="optionA"class="form-control" id="exampleInputName2" placeholder="Enter Option A"><br><br>
                  
                <label for="exampleInputName2">Option B:</label>
                <input type="text" name="optionB"class="form-control" id="exampleInputName2" placeholder="Enter Option B"><br><br>
                  
                <label for="exampleInputName2">Option C:</label>
                <input type="text" name="optionC"class="form-control" id="exampleInputName2" placeholder="Enter Option C"><br><br> 
                
                <label for="exampleInputName2">Option D:</label>
                <input type="text" name="optionD"class="form-control" id="exampleInputName2" placeholder="Enter Option D"><br><br>
                  
                <label for="exampleInputName2">Correct Answer:</label>
                <input type="text" name="correct_answer"class="form-control" id="exampleInputName2" placeholder="Enter Correct Answer"><br><br>
                  
                <label for="exampleInputName2">Mark:</label>
                <input type="text" name="mark"class="form-control" id="exampleInputName2" placeholder="Enter Mark" value="<?php if(isset($mark)){echo $mark;}?>"><br><br>
                  
                 
                  <input type="submit" name="submit_btn" value="Submit" class="btn btn-default" style="width: 120px;">
                  

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
                      <a href="view.php" class="list-group-item">View Question</a>
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
 