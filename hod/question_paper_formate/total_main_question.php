<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/hod/header/hod_header.php');
?>
<?php
if(isset($_POST['submit']))
{
	$question_paper_formate_id = trim($_POST['question_paper_formate_id']);
	$total_main_question = trim($_POST['total_main_question']);
	$sql = "INSERT INTO total_main_question (question_paper_formate_id, total_question) VALUES ('$question_paper_formate_id', '$total_main_question')";
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
	
}
?>

<div>
	<div class="view_error_message">
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/view_errors_or_messages.php'); ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			
			
				<h3 class="heading-name">Add Total Questions in A Paper</h3>
				<div class="div-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<label for="course_code">Course Code</label>
						<select id="question_paper_formate_id" name="question_paper_formate_id" required>
							<option value="">Select the Course Code</option>
							<?php if($question_paper_formates = fetchData(array('table'=>'question_paper_formate','condition'=>''))): ?>
								<?php foreach($question_paper_formates as $question_paper_formate): ?>
									<option value="<?php echo $question_paper_formate['id']; ?>"><?php echo $question_paper_formate['course_code']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="total_main_question">Total Main Question</label>
						<input type="text" class="input-text" id="total_main_question" name="total_main_question" required>
						
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>

		</div>
	</div>
</div>

