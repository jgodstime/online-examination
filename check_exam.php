<?php
require_once'connect.inc.php';
require_once'core.inc.php';
require_once'function.php';

if (loggedin()){ // checking if the session is set and not empty
		$user_name = getuserfield('email'); // calling the function that displays the first name of user from the table
        $login_id = getuserfield('login_id');
		
    
//checking if the user has answered the question if yes display his or her summary    
$query = "SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id'";
        $query_run = mysql_query($query);
             if(mysql_num_rows($query_run)==NULL){
                  header('location:display_questions.php');
            }else{
                 header('location:result2.php');
             }   
    
	}else{
		header('location: index.php');// if session is empty redirect the user to the login form
	}




?>