<?php
ob_start(); // using the header function to redirect the user to the index page when they are login currectly
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
	$http_referer = $_SERVER['HTTP_REFERER']; /// a server variable that tells us the page we come from 
}


function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}	
}

function getuserfield($field){
	$query = "SELECT `$field` FROM `candidate_tbl` WHERE `id`='".$_SESSION['user_id']."'";
	if ($query_run = mysql_query($query)){
		if ($query_result=mysql_result($query_run, 0, $field)){
			return $query_result;
		}
	}
	
}
?>