<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header/admin_header.php');
?>
<?php
if(isset($_POST['submit']))
{
	$stream_id = trim($_POST['stream_id']);
	$departments_id = trim($_POST['departments_id']);
	$degree_name = trim($_POST['degree_name']);
	$sql = "INSERT INTO degree (stream_id, departments_id, degree_name) VALUES ('$stream_id', '$departments_id', '$degree_name')";
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
	$degree_name = trim($_POST['degree_name']);
	$sql = "UPDATE degree SET stream_id = '$stream_id', departments_id = '$departments_id', degree_name='$degree_name' WHERE id = '$id'";
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
			
			
				<h3 class="heading-name">Add Degree</h3>
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
						
						<label for="degree_name">Degree Name</label>
						<input type="text" class="input-text" id="degree_name" name="degree_name" placeholder="Your Department name (ex. Computer science, Information Technology, etc.)" required>
						
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>
				
				<h3 class="heading-name">Degree List</h3>
				<div class="div-form">
					<?php if($degrees = fetchData(array('table'=>'degree', 'condition'=>''))): ?>
						<?php foreach($degrees as $degree): ?>
							<div class="form-popup" id="myForm<?php echo $degree['id'];?>">
								<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-container" method="POST">
								
									<h2 align="center">Edit Degree</h2>
									<input type="text" name="id" value="<?php echo $degree['id']; ?>" id="id" hidden>
									<label for="stream_id">Stream Name</label>
									<select id="stream_id" name="stream_id" required>
										<?php if($streams = fetchData(array('table'=>'stream','condition'=>'WHERE id = '.$degree['stream_id']))): ?>
											<?php foreach($streams as $stream): ?>
												<option value="<?php echo $stream['id']; ?>"><?php echo $stream['stream_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="departments_id">Department Name</label>
									<select id="departments_id" name="departments_id" required>
										<?php if($departments = fetchData(array('table'=>'departments','condition'=>'WHERE id = '.$degree['departments_id']))): ?>
											<?php foreach($departments as $department): ?>
												<option value="<?php echo $department['id']; ?>"><?php echo $department['dept_name']; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
									<label for="degree"><b>Degree Name</b></label>
									<input class="input-text" type="text" name="degree_name" value="<?php echo $degree['degree_name']; ?>" id="degree_name" required>

									<input type="submit" class="btn" value="Change" id="edit" name="edit">
									<button type="button" class="btn cancel" onclick="closeForm(<?php echo $degree['id'];?>)">Close</button>
							
								</form>
							</div>
						<?php endforeach; ?>
						<table id="table_structure">
							<tr>
								<th>Sr.No.</th>
								<th>Stream Name</th>
								<th>Department Name</th>
								<th>degree Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php $count=1; foreach($degrees as $degree): ?>
								<tr>									
									<td><?php echo $count; ?></td>
									<?php if($streams = fetchData(array('table'=>'stream', 'condition'=>'WHERE id = '.$degree['stream_id']))): ?>
										<?php foreach($streams as $stream): ?>
											<td><?php echo $stream['stream_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($departments = fetchData(array('table'=>'departments', 'condition'=>'WHERE id = '.$degree['departments_id']))): ?>
										<?php foreach($departments as $department): ?>
											<td><?php echo $department['dept_name']; ?></td>
										<?php endforeach; ?>
									<?php endif; ?>
									<td><?php echo $degree['degree_name']; ?></td>
									<td><button class="open-button" onclick="openForm(<?php echo $degree['id']; ?>)">Edit</button></td>
									<td><a href="/admin/delete_row.php?id=<?php echo $degree['id'].'&from=degree&calling_script='.$_SERVER['PHP_SELF']; ?>"><button style="background-color:red;" class="open-button">Delete</button></a></td>
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