<?php 

	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/db.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/functions.php');

	if(isset($_GET['id']) && is_numeric($_GET['id'])) # && $_SESSION['role'] === 'admin')
	{
		$table = $_GET['from'];
		$callingScript = $_GET['calling_script'];

		$allowedTables = array(
			'stream',
			'departments',
			'degree',
			'class',
			'semester',
			'subjects',
			'units',
			'fill_in_the_blank_based_question',
			'five_marks_question',
			'four_marks_question',
			'mcq_based_question',
			'one_marks_question'
			);

		if(in_array($table, $allowedTables))
		{

			if($table === 'stream')
			{
				$res = deleteRow($_GET['id'], $table);
			}
			else if($table  == 'departments'){
				$res = deleteRow($_GET['id'], $table);
			}
			else
			{
				$res = deleteRow($_GET['id'], $table);
			}

			if($res)
			{
				header("Location: $callingScript?messages=Deleted successfully");
			}
			else
			{
				header("Location: $callingScript?errors=Failed to delete");
			}
		}
		
	}
	else{
		echo "Seems like you've landed here by mistake... Please click the back button...";
	}
 ?>