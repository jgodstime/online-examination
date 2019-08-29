<?php
require_once'connect.inc.php';

if(isset($_POST['user_answer']) && isset($_POST['question_number']) && isset($_POST['correct_answer']) && isset($_POST['mark']) && isset($_POST['login_id']) && isset($_POST['question'])){
     $user_answer = $_POST['user_answer'];
     $question_number = $_POST['question_number'];
     $question = $_POST['question'];
     $correct_answer = $_POST['correct_answer'];
     $mark = $_POST['mark'];
     $login_id = $_POST['login_id'];
    
    //using the user login id to query their bio data from candidate_tbl which latter goes to the candidate_answer_tbl
    $query = "SELECT * FROM `candidate_tbl` WHERE `login_id`='$login_id'";
        $query_run = mysql_query($query);
        while($query_row = mysql_fetch_assoc($query_run)){
         $first_name = $query_row['first_name'];
         $other_name= $query_row['other_name'];
         $email= $query_row['email'];
         $phone= $query_row['phone'];
         $gender= $query_row['gender'];
        
    }
    
    //checking if the users selected answer corresponds with the correct answer
    if($user_answer==$correct_answer){
        $query="INSERT INTO `candidate_answer_tbl` VALUES ('','$login_id','$first_name','$other_name','$email','$phone','$gender','$question','$user_answer','$correct_answer','$mark','$mark',Now())";
         $query_run=mysql_query($query);
           echo '<br><p class="bg-success">Answered.</p>';
    
    }else{
        
        $query="INSERT INTO `candidate_answer_tbl` VALUES ('','$login_id','$first_name','$other_name','$email','$phone','$gender','$question','$user_answer','$correct_answer','$mark','0',Now())";
         $query_run=mysql_query($query);
           echo '<br><p class="bg-success">Answered.</p>';
    }
  
}








