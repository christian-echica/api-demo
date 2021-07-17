<?php 

require_once('Task.php');

try {
	$task = new Task(1,"Title here", "Description here", "01/01/2019 12:00", "N");
	header('Content-type: application/json;charset=UTF-8');
	echo json_encode($task->returnTaskAsArray());
}
catch(TaskException $ex) {
	echo "Error: " .$ex->getMessage();
}

//To make testing validation 
//Note: Errors declared in Task.php 
// Change ID 1 to 0 --> should prompt you for Task ID Error
// Change completion status from N to empty --> should say Task Completed must be Y or N
// Change the Incorrect Date --> should say Task deadline date time error
// Change the title to empty --> should say Task Title error -> need to double check
