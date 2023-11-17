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
	$mcq_question = addslashes(trim($_POST['mcq_question']));
	$answer_A = trim($_POST['answer_A']);
	$answer_B = trim($_POST['answer_B']);
	$answer_C = trim($_POST['answer_C']);
	$answer_D = trim($_POST['answer_D']);
	$correct_answer = trim($_POST['correct_answer']);
	$sql = "INSERT INTO mcq_based_question (stream_id, department_id, degree_id, class_id, subject_id, unit_id, mcq_question, answer_A, answer_B, answer_C, answer_D, correct_answer) VALUES ('$stream_id', '$departments_id', '$degree_id', '$class_id', '$subject_id', '$unit_id', '$mcq_question', '$answer_A', '$answer_B', '$answer_C', '$answer_D', '$correct_answer')";
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
			
			
				<h3 class="heading-name">Add MCQ Questions</h3>
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
						<label for="mcq_question">MCQ Question</label>
						<input type="text" class="input-text" id="mcq_question" name="mcq_question" placeholder="ex. how many number use in binary ?." required>
						
						<label for="answer_A">Option A</label>
						<input type="text" class="input-text" id="answer_A" name="answer_A" placeholder="only enter the answer (ex. 4.)" required>
						<label for="answer_B">Option B</label>
						<input type="text" class="input-text" id="answer_B" name="answer_B" placeholder="only enter the answer (ex. 1.)" required>
						<label for="answer_C">Option C</label>
						<input type="text" class="input-text" id="answer_C" name="answer_C" placeholder="only enter the answer (ex. 2.)" required>
						<label for="answer_D">Option D</label>
						<input type="text" class="input-text" id="answer_D" name="answer_D" placeholder="only enter the answer (ex. 3.)" required>
						<label for="correct_answer">Coreect Answer</label>
						<input type="text" class="input-text" id="correct_answer" name="correct_answer" placeholder="only enter the answer (ex. 2.)" required>
						
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>

		</div>
	</div>
</div>

