<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/teacher/header/teacher_header.php');
?>
<?php
if(isset($_POST['submit']))
{
	$stream_id = trim($_POST['stream_id']);
	$departments_id = trim($_POST['departments_id']);
	$degree_id = trim($_POST['degree_id']);
	$class_id = trim($_POST['class_id']);
	$subject_id = trim($_POST['subject_id']);
	$unit_id = trim($_POST['unit_id']);
	$question = addslashes(trim($_POST['question']));
	$answer = addslashes(trim($_POST['answer']));
	$sql = "INSERT INTO four_marks_question (stream_id, department_id, degree_id, class_id, subject_id, unit_id, question, answer) VALUES ('$stream_id', '$departments_id', '$degree_id', '$class_id', '$subject_id', '$unit_id', '$question', '$answer')";
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
			
			
				<h3 class="heading-name">Add Four Marks Questions</h3>
				<div class="div-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<label for="stream_id">Stream Name</label>
						<select id="stream_id" name="stream_id" required>
							<option value="">Select the stream</option>
							<?php if($streams = fetchData(array('table'=>'stream','condition'=>''))): ?>
								<?php foreach($streams as $stream): ?>
									<option value="<?php echo $stream['id']; ?>"><?php echo $stream['stream_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>			  
						
						<label for="departments_id">Department Name</label>
						<select id="departments_id" name="departments_id" required>
							<option value="">Select the department</option>
							<?php if($departments = fetchData(array('table'=>'departments','condition'=>''))): ?>
								<?php foreach($departments as $department): ?>
									<option value="<?php echo $department['id']; ?>"><?php echo $department['dept_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						
						<label for="degree_id">Degree Name</label>
						<select id="degree_id" name="degree_id" required>
							<option value="">Select the Degree</option>
							<?php if($degrees = fetchData(array('table'=>'degree','condition'=>''))): ?>
								<?php foreach($degrees as $degree): ?>
									<option value="<?php echo $degree['id']; ?>"><?php echo $degree['degree_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						
						<label for="class_id">Class Name</label>
						<select id="class_id" name="class_id" required>
							<option value="">Select the Class</option>
							<?php if($classs = fetchData(array('table'=>'class','condition'=>''))): ?>
								<?php foreach($classs as $class): ?>
									<option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="subject_id">Subject Name</label>
						<select id="subject_id" name="subject_id" required>
							<option value="">Select the Subject</option>
							<?php if($subjects = fetchData(array('table'=>'subjects','condition'=>''))): ?>
								<?php foreach($subjects as $subject): ?>
									<option value="<?php echo $subject['id']; ?>"><?php echo $subject['subject_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="unit_id">Units Name</label>
						<select id="unit_id" name="unit_id" required>
							<option value="">Select the Unit</option>
							<?php if($units = fetchData(array('table'=>'units','condition'=>''))): ?>
								<?php foreach($units as $unit): ?>
									<option value="<?php echo $unit['id']; ?>"><?php echo $unit['unit_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="question">Question</label>
						<input type="text" class="input-text" id="question" name="question" placeholder="ex.(tell me about your self?)" required>
						
						
						<label for="answer">Answer</label>
						<textarea type="text" style="resize:none;" rows="6" class="input-text" id="answer" name="answer" placeholder="ex.(Write a paragraph.)" required></textarea>
						
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>

		</div>
	</div>
</div>

