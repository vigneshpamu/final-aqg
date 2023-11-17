<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/hod/header/hod_header.php');
?>
<?php

if(isset($_POST['submit']))
{	
	$stream_id = trim($_POST['stream_id']);
	$departments_id = trim($_POST['departments_id']);
	$degree_id = trim($_POST['degree_id']);
	$class_id = trim($_POST['class_id']);
	$semester_id = trim($_POST['semester_id']);
	$subject_id = trim($_POST['subject_id']);
	$institute_name = trim($_POST['institute_name']);
	$course_code = trim($_POST['course_code']);
	$paper_name = trim($_POST['paper_name']);
	$time = trim($_POST['time']);
	$maximum_marks = trim($_POST['maximum_marks']);
	
	if(empty($errors))
	{
		$sql = "INSERT INTO question_paper_formate(stream_id, departments_id, degree_id, class_id, semester_id, subject_id, institute_name, course_code, paper_name, time, maximum_marks) VALUES ('$stream_id', '$departments_id', '$degree_id', '$class_id', '$semester_id', '$subject_id', '$institute_name', '$course_code', '$paper_name', '$time', '$maximum_marks')";
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
}
	
if(isset($_POST['edit']))
{
	
}
?>

<div>
	<div class="view_error_message">
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/view_errors_or_messages.php'); ; ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			
			
				<h3 class="heading-name">Add Questions Paper Formate</h3>
				<div class="div-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
						<label for="stream_id">Stream Name</label>
						<select id="stream_id" name="stream_id" required>
							<option value="">Select the stream</option>
							<?php if($streams = fetchData(array('table'=>'stream','condition'=>''))): ?>
								<?php foreach($streams as $stream): ?>
									<option value="<?php echo $stream['stream_name']; ?>"><?php echo $stream['stream_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>			  
						
						<label for="departments_id">Department Name</label>
						<select id="departments_id" name="departments_id" required>
							<option value="">Select the department</option>
							<?php if($departments = fetchData(array('table'=>'departments','condition'=>''))): ?>
								<?php foreach($departments as $department): ?>
									<option value="<?php echo $department['dept_name']; ?>"><?php echo $department['dept_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						
						<label for="degree_id">Degree Name</label>
						<select id="degree_id" name="degree_id" required>
							<option value="">Select the Degree</option>
							<?php if($degrees = fetchData(array('table'=>'degree','condition'=>''))): ?>
								<?php foreach($degrees as $degree): ?>
									<option value="<?php echo $degree['degree_name']; ?>"><?php echo $degree['degree_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						
						<label for="class_id">Class Name</label>
						<select id="class_id" name="class_id" required>
							<option value="">Select the Class</option>
							<?php if($classs = fetchData(array('table'=>'class','condition'=>''))): ?>
								<?php foreach($classs as $class): ?>
									<option value="<?php echo $class['class_name']; ?>"><?php echo $class['class_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="semester_id">Semester Name</label>
						<select id="semester_id" name="semester_id" required>
							<option value="">Select the Class</option>
							<?php if($semesters = fetchData(array('table'=>'semester','condition'=>''))): ?>
								<?php foreach($semesters as $semester): ?>
									<option value="<?php echo $semester['semester_name']; ?>"><?php echo $semester['semester_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="subject_id">Subject Name</label>
						<select id="subject_id" name="subject_id" required>
							<option value="">Select the Subject</option>
							<?php if($subjects = fetchData(array('table'=>'subjects','condition'=>''))): ?>
								<?php foreach($subjects as $subject): ?>
									<option value="<?php echo $subject['subject_name']; ?>"><?php echo $subject['subject_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="institute_name">School/College/Institute Name</label>
						<input type="text" class="input-text" id="institute_name" name="institute_name" required>
						<label for="course_code">Course Code</label>
						<input type="text" class="input-text" id="course_code" name="course_code" required>
						<label for="paper_name">Paper Name (Optional)</label>
						<input type="text" class="input-text" id="paper_name" name="paper_name" placeholder="ex. Paper I Or Paper II.">
						<label for="time">Time (In Hours..)</label>
						<input type="text" class="input-text" id="time" name="time" required>
						<label for="maximum_marks">Maximum Marks</label>
						<input type="text" class="input-text" id="maximum_marks" name="maximum_marks" required>
						
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>

		</div>
	</div>
</div>

