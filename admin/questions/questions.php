<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header/admin_header.php');
?>
<?php
if(isset($_POST['submit']))
{
	$stream_name = trim($_POST['stream_name']);
	$sql = "INSERT INTO # (stream_name) VALUES ('$stream_name')";
	$stmt = $db->prepare($sql);
	
	if($stmt->execute())
	{
		$messages[] = "Saved successfully. Thank you";	
	}
	else
	{
		$errors[] = "Failed to add. Please try again later";
	}
}	

if(isset($_POST['edit']))
{
	$id = trim(strtolower($_POST['id']));
	$name = trim(strtolower($_POST['title1']));
	$link = trim(strtolower($_POST['link1']));
	$icon = trim(strtolower($_POST['icon1']));
	$page = trim(strtolower($_POST['page1']));
	$message = trim(strtolower($_POST['message1']));
	$type = trim(strtolower($_POST['type1']));
	$sql = "UPDATE add_button SET name = '$name', link = '$link', icon = '$icon', page = '$page', message = '$message', type = '$type' WHERE id = '$id'";
	$stmt = $db->prepare($sql);

	if($stmt->execute())
	{
		$messages[] = "Saved successfully. Thank you";	
	}
	else
	{
		$errors[] = "Failed to change. Please try again later";
	}
}
?>

<div>
	<div class="view_error_message">
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/view_errors_or_messages.php'); ; ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h2 align="center">Small Question</h2><br>
			<a href="/admin/questions/small_question/mcq_based_question.php"><button class="input-submit" id="mcq" name="mcq">MCQ Based Question</button></a>
			<a href="/admin/questions/small_question/fill_in_the_blank_based_question.php"><button class="input-submit" id="fill_in_the_blanks" name="fill_in_the_blanks">Fill in the Blank Type Question</button></a>
			<a href="/admin/questions/small_question/one_marks_question.php"><button class="input-submit" id="one_marks_question" name="one_marks_question">One Marks Question</button></a>
			
			
			<!--
			<h2 align="center">Medium Type Question</h2><br>
			<button class="input-submit" id="two_marks_question" name="two_marks_question">Two Marks Question</button>
			<button class="input-submit" id="three_marks_question" name="three_marks_question">Three Marks Question</button>
			-->
			
			
			<h2 align="center">Big Question</h2><br>
			<a href="/admin/questions/big_question/four_marks_question.php"><button class="input-submit" id="four_marks_question" name="four_marks_question">Four Marks Question</button>
			<a href="/admin/questions/big_question/five_marks_question.php"><button class="input-submit" id="five_marks_question" name="four_marks_question">Five Marks Question</button>
		</div>
	</div>
</div>

