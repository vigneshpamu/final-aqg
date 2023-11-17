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
	$semester_id = trim($_POST['semester_id']);
	$subject_id = trim($_POST['subject_id']);
	$unit_name = trim($_POST['unit_name']);
	$sql = "INSERT INTO Units (stream_id, departments_id, degree_id, class_id, semester_id, subject_id, unit_name) VALUES ('$stream_id', '$departments_id', '$degree_id', '$class_id', '$semester_id', '$subject_id', '$unit_name')";
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
	$id = trim($_POST['id']);
	$stream_id = trim($_POST['stream_id']);
	$departments_id = trim($_POST['departments_id']);
	$degree_id = trim($_POST['degree_id']);
	$class_id = trim($_POST['class_id']);
	$semester_id = trim($_POST['semester_id']);
	$subject_id = trim($_POST['subject_id']);
	$unit_name = trim($_POST['unit_name']);
	$sql = "UPDATE units SET stream_id = '$stream_id', departments_id = '$departments_id', degree_id='$degree_id', class_id='$class_id', semester_id='$semester_id', subject_id='$subject_id', unit_name='$unit_name' WHERE id = '$id'";
	$stmt = $db->prepare($sql);
	if($stmt->execute())
	{
		$messages[] = "Changed successfully. Thank you";	
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
			
			
				<h3 class="heading-name">Add Units</h3>
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
						<label for="semester_id">Semester Name</label>
						<select id="semester_id" name="semester_id" required>
							<option value="">Select the Semester</option>
							<?php if($semesters = fetchData(array('table'=>'semester','condition'=>''))): ?>
								<?php foreach($semesters as $semester): ?>
									<option value="<?php echo $semester['id']; ?>"><?php echo $semester['semester_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="subject_id">Subject Name</label>
						<select id="subject_id" name="subject_id" required>
							<option value="">Select the Subject</option>
							<?php if($subjects = fetchData(array('table'=>'subjects','condition'=>''))): ?>
								<?php foreach($subjects as $class): ?>
									<option value="<?php echo $class['id']; ?>"><?php echo $class['subject_name']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<label for="unit_name">Units Name</label>
						<input type="text" class="input-text" id="unit_name" name="unit_name" placeholder="Your unit name (ex. Unit I, Unit II, etc.)" required>
						
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>
				
				<h3 class="heading-name">Units List</h3>
				<div class="div-form">
					<?php if($units = fetchData(array('table'=>'units', 'condition'=>''))): ?>
						<?php foreach($units as $unit): ?>
							<div class="form-popup" id="myForm<?php echo $unit['id'];?>">
								<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-container" method="POST">
								
									<h2 align="center">Edit Unit</h2>
									<input type="text" name="id" value="<?php echo $unit['id']; ?>" id="id" hidden>
									<label for="stream_id">Stream Name</label>
									<select id="stream_id" name="stream_id" required>
										<?php if($streams = fetchData(array('table'=>'stream','condition'=>'WHERE id = '.$unit['stream_id']))): ?>
											<?php foreach($streams as $stream): ?>
												<option value="<?php echo $stream['id']; ?>"><?php echo $stream['stream_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="departments_id">Department Name</label>
									<select id="departments_id" name="departments_id" required>
										<?php if($departments = fetchData(array('table'=>'departments','condition'=>'WHERE id = '.$unit['departments_id']))): ?>
											<?php foreach($departments as $department): ?>
												<option value="<?php echo $department['id']; ?>"><?php echo $department['dept_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="degree_id">Degree Name</label>
									<select id="degree_id" name="degree_id" required>
										<?php if($degrees = fetchData(array('table'=>'degree','condition'=>'WHERE id = '.$unit['degree_id']))): ?>
											<?php foreach($degrees as $degree): ?>
												<option value="<?php echo $degree['id']; ?>"><?php echo $degree['degree_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="class_id">Class Name</label>
									<select id="class_id" name="class_id" required>
										<?php if($classs = fetchData(array('table'=>'class','condition'=>'WHERE id = '.$unit['class_id']))): ?>
											<?php foreach($classs as $class): ?>
												<option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="semester_id">Semester Name</label>
									<select id="semester_id" name="semester_id" required>
										<?php if($semesters = fetchData(array('table'=>'semester','condition'=>'WHERE id = '.$unit['semester_id']))): ?>
											<?php foreach($semesters as $semester): ?>
												<option value="<?php echo $semester['id']; ?>"><?php echo $semester['semester_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="subject_id">Subject Name</label>
									<select id="subject_id" name="subject_id" required>
										<?php if($subjects = fetchData(array('table'=>'subjects','condition'=>'WHERE id = '.$unit['subject_id']))): ?>
											<?php foreach($subjects as $subject): ?>
												<option value="<?php echo $subject['id']; ?>"><?php echo $subject['subject_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="unit"><b>Unit Name</b></label>
									<input class="input-text" type="text" name="unit_name" value="<?php echo $unit['unit_name']; ?>" id="unit_name" required>

									<input type="submit" class="btn" value="Change" id="edit" name="edit">
									<button type="button" class="btn cancel" onclick="closeForm(<?php echo $unit['id'];?>)">Close</button>
							
								</form>
							</div>
						<?php endforeach; ?>
						<table id="table_structure">
							<tr>
								<th>Sr.No.</th>
								<th>Stream Name</th>
								<th>Department Name</th>
								<th>degree Name</th>
								<th>Class Name</th>
								<th>Semester Name</th>
								<th>Subjects Name</th>
								<th>Units Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php $count=1; foreach($units as $unit): ?>
								<tr>									
									<td><?php echo $count; ?></td>
									<?php if($streams = fetchData(array('table'=>'stream', 'condition'=>'WHERE id = '.$unit['stream_id']))): ?>
										<?php foreach($streams as $stream): ?>
											<td><?php echo $stream['stream_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($departments = fetchData(array('table'=>'departments', 'condition'=>'WHERE id = '.$unit['departments_id']))): ?>
										<?php foreach($departments as $department): ?>
											<td><?php echo $department['dept_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($degrees = fetchData(array('table'=>'degree', 'condition'=>'WHERE id = '.$unit['degree_id']))): ?>
										<?php foreach($degrees as $degree): ?>
											<td><?php echo $degree['degree_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($classs = fetchData(array('table'=>'class', 'condition'=>'WHERE id = '.$unit['class_id']))): ?>
										<?php foreach($classs as $class): ?>
											<td><?php echo $class['class_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($semester = fetchData(array('table'=>'semester', 'condition'=>'WHERE id = '.$unit['semester_id']))): ?>
										<?php foreach($semesters as $semester): ?>
											<td><?php echo $semester['semester_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($subjects = fetchData(array('table'=>'subjects', 'condition'=>'WHERE id = '.$unit['subject_id']))): ?>
										<?php foreach($subjects as $subject): ?>
											<td><?php echo $subject['subject_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<td><?php echo $unit['unit_name']; ?></td>
									<td><button class="open-button" onclick="openForm(<?php echo $unit['id']; ?>)">Edit</button></td>
									<td><a href="/admin/delete_row.php?id=<?php echo $unit['id'].'&from=units&calling_script='.$_SERVER['PHP_SELF']; ?>"><button style="background-color:red;" class="open-button">Delete</button></a></td>
								</tr>
								
							<?php $count++; endforeach; ?>
						</table>
						
					<?php endif; ?>
				</div>
				
		</div>
	</div>
</div>


<script>
function openForm(value) {
  document.getElementById("myForm"+value).style.display = "block";
  
}

function closeForm(value) {
  document.getElementById("myForm"+value).style.display = "none";
}
</script>