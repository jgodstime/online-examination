<?php
//error_reporting(E_ALL);
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

        
<h3>Answer the questions at once.</h3>
<?php
         
    //increamenting the session value to get 1 to infinity..as long as this page keeps refreshing the session id will keep incrementing by 1
 $_SESSION['id']= $_SESSION['id']+1;

    //storing the session increamented value in a variable
$increament =$_SESSION['id'];

            
//getting the questions from the question tbl
$query = "SELECT * FROM `questions_tbl` WHERE `id`='$increament'";
$query_run = mysql_query($query);

if(mysql_num_rows($query_run)==NULL){
      header('location:result1.php');
    }else{
        while ($query_row = mysql_fetch_assoc($query_run)){
         $question_number = $query_row['id'];
         $question = $query_row['question'];
         $optiona = $query_row['optiona'];
         $optionb= $query_row['optionb'];
         $optionc= $query_row['optionc'];
         $optiond= $query_row['optiond'];
         $correct_answer= $query_row['correct_answer'];
         $mark= $query_row['mark'];
    }
}
   

?>
    <span id="feedback"></span>
<form  method="post" class="animated bounceInLeft">
    
    <span class="badge" style="font-size:20px;" id="seconds"></span><span class="badge" style="font-size:20px;">&nbsp;Seconds Remaining. </span><br><br>
    
<textarea class="form-control text-center" name="question" disabled><?php if(isset($question)){echo $question;}?></textarea><br>
<div class="radio">
  <strong>Option A:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" class="aa" name="options" id="optiona" value="<?php if(isset($optiona)){echo $optiona;}?>"/><?php if(isset($optiona)){echo $optiona;}?><br><br>
 <strong>Option B:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" class="aa" name="options" id="optionb" value="<?php if(isset($optionb)){echo $optionb;}?>"/><?php if(isset($optionb)){echo $optionb;}?><br><br>
  <strong>Option C:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" class="aa" name="options" id="optionc" value="<?php if(isset($optionc)){echo $optionc;}?>"/><?php if(isset($optionc)){echo $optionc;}?><br><br>
  <strong>Option D:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" class="aa" name="options" id="optiond" value="<?php if(isset($optiond)){echo $optiond;}?>"/><?php if(isset($optiond)){echo $optiond;}?><br><br>
</div>
</form>
           

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
<script type="text/javascript">
    
var seconds=10;
setInterval(
function(){
if(seconds<=1){
window.location='display_questions.php';
}
else{
document.getElementById('seconds').innerHTML=--seconds;
}},
1000);    
    
    
    
    
    //checking if any of the radio button is clicked
$('input:radio[name="options"]').change(function() {
    //collecting the current value of a radio button that is clicked
    var user_answer = $('input[name="options"]:checked').val();
    
    //collecting the variables stored in php to jquery
    var question_number= '<?php echo($question_number) ?>';
    var correct_answer = '<?php echo($correct_answer) ?>';
     var question = '<?php echo($question) ?>';
    var mark = '<?php echo($mark) ?>';
    var login_id = '<?php echo($login_id) ?>';
    
    $.post('process.php', {user_answer: user_answer, question_number:question_number,question:question, correct_answer: correct_answer, mark: mark, login_id: login_id}, function(data) {
        $('#feedback').html(data);
        window.location='display_questions.php'; 
    });
    
   
  
	
});        

</script>
<body/>
</html>
 