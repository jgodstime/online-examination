<?php
//saving questions to questions_tbl
function save_jss1question($table,$question,$optionA,$optionB,$optionC,$optionD,$correct_answer,$mark){
    $query="INSERT INTO `$table` VALUES ('','$question','$optionA','$optionB','$optionC','$optionD','$correct_answer','$mark')";
    if ($query_run=mysql_query($query)){ 
        return  '<br><p class="bg-success animated bounceInLeft">Question successfully saved.</p>';
    }     
}

// displaying the number of question that exist in questions_tbl 
function nummber_of_questions($table){
    $query="SELECT * FROM `$table` ORDER BY `id` DESC LIMIT 1";
    $query_run=mysql_query($query);
        while($query_row=mysql_fetch_assoc($query_run)){
             $last_id = $query_row['id'];  
            return 'Number of Questions: '.$last_id;
        }
}

//function responsible for updating of questions
function update_tbl($question_number,$table,$question,$optionA,$optionB,$optionC,$optionD,$correct_answer,$mark){
    $query="UPDATE `$table` SET question='$question',optiona='$optionA',optionb='$optionB',optionc='$optionC',optiond='$optionD',correct_answer='$correct_answer', mark='$mark' WHERE id='$question_number'";
	$query_run = mysql_query($query);
      if ($query_run=mysql_query($query)){ 
        return  '<br><p class="bg-success animated bounceInLeft">Question Successfully Updated.</p>';
        $question='';
        $optionA='';
        $optionB='';
        $optionC='';
        $optionD='';
        $correct_answer='';
        $mark='';
    } 
}


function save_candidate($table,$login_id,$f_name,$o_name,$email,$phone,$gender){
    $query="INSERT INTO `$table` VALUES ('','$login_id','$f_name','$o_name','$email','$phone','$gender')";
    if ($query_run=mysql_query($query)){ 
        return  '<br><p class="bg-success animated bounceInLeft">Candidate successfully added.</p>'.'<p class="bg-success animated bounceInLeft">Your login Id is '.$login_id.'</p>';
    }  
}


?>

