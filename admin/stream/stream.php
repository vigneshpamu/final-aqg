<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header/admin_header.php');
?>

<?php
if(isset($_POST['submit']))
{
	$stream_name = trim($_POST['stream_name']);
	if($stream_name=="")
	{
		$errors[] = "Please Enter Stream Name! ";
	}
	else{
		$sql = "INSERT INTO stream (stream_name) VALUES ('$stream_name')";
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
	$id = trim($_POST['stream_id']);
	$stream_name = trim($_POST['stream_name']);
	$sql = "UPDATE stream SET stream_name = '$stream_name' WHERE id = '$id'";
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
<!DOCTYPE html>
<div>
	<div class="view_error_message">
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/view_errors_or_messages.php'); ; ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			
			
				<h3 class="heading-name">Add Stream</h3>
				<div class="div-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<label for="stream_name">Stream Name</label>
						<input type="text" class="input-text" id="stream_name" name="stream_name" placeholder="Your stream name (ex. arts, science, commerce, etc.)">

						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>
				
				<hr>
				
				<h3 class="heading-name">Stream List</h3>
				<div class="div-form">
					<?php if($streams = fetchData(array('table'=>'stream', 'condition'=>''))): ?>
						<?php $count=1; foreach($streams as $stream): ?>
							<div class="form-popup" id="myForm<?php echo $stream['id'];?>">
								<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-container" method="POST">
								
									<h2 align="center">Edit Stream</h2>
									<input type="text" name="stream_id" value="<?php echo $stream['id']; ?>" id="stream_id" hidden>
									<label for="stream"><b>Stream</b></label>
									<input class="input-text" type="text" name="stream_name" value="<?php echo $stream['stream_name']; ?>" id="stream_name" required>

									<input type="submit" class="btn" value="Change" id="edit" name="edit">
									<button type="button" class="btn cancel" onclick="closeForm(<?php echo $stream['id'];?>)">Close</button>
							
								</form>
							</div>
						<?php endforeach; ?>
						<table id="table_structure">
							<tr>
								<th>Sr.No.</th>
								<th>Stream Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php $count=1; foreach($streams as $stream): ?>
								<tr>									
									<td><?php echo $count; ?></td>
									<td><?php echo $stream['stream_name']; ?></td>
									<td><button class="open-button" onclick="openForm(<?php echo $stream['id']; ?>)">Edit</button></td>
									<td><a href="/admin/delete_row.php?id=<?php echo $stream['id'].'&from=stream&calling_script='.$_SERVER['PHP_SELF']; ?>"><button style="background-color:red;" class="open-button">Delete</button></a></td>
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
