<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/hod/header/hod_header.php');
?>
<?php
$count=0;
if(isset($_POST['submit']))
{
	$count = trim($_POST['count']);
	$total_submain_question = trim($_POST['total_submain_question']);
	$question_paper_formate_id = trim($_POST['question_paper_formate_id']);
	$submain_question_number = trim($_POST['submain_question_number']);
	for($i=1;$i<=$count;$i++)
	{
		
		$submain_question = trim($_POST['submain_question'.$i]);
		$total_sub_question = trim($_POST['total_sub_question'.$i]);
		$sql = "INSERT INTO total_sub_question(course_code, submain_question_number, submain_question, total_sub_question) VALUES ('$question_paper_formate_id', '$submain_question_number', '$submain_question', '$total_sub_question')";
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
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/view_errors_or_messages.php'); ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			
				<h3 class="heading-name">Add Sub Questions in A Paper</h3>
				<div class="div-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						
						<label for="total_submain_question">Total Sub Main Questions</label>
						<div id="change">
							<select onchange="getval(this.value);" id="total_submain_question" name="total_submain_question" required>
								<option value="">Select the Total Sub Main Question</option>
								<?php if($total_questions = fetchData(array('table'=>'total_submain_question','condition'=>''))): ?>
									<?php foreach($total_questions as $total_question): ?>
										<option value="<?php echo $total_question['total_sub_question']; ?>" <?php if(isset($_GET['num']) && $total_question['total_sub_question'] == $_GET['num']){echo "selected";} ?>><?php echo $total_question['total_sub_question']; ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
						</div>
						<?php if(isset($_GET['num']))
						{
							$count = $_GET['num'];
						}
						else{
							$count = 0;
						}	?>
						
						
						<label for="course_code">Course Code</label>
						<select id="question_paper_formate_id" name="question_paper_formate_id" required>
							<option value="">Select the Course Code</option>
							<?php if($question_paper_formates = fetchData(array('table'=>'question_paper_formate','condition'=>''))): ?>
								<?php foreach($question_paper_formates as $question_paper_formate): ?>
									<option value="<?php echo $question_paper_formate['course_code']; ?>"><?php echo $question_paper_formate['course_code']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						
						<label for="submain_question_number">SubMain Question Number</label>
						<select id="submain_question_number" name="submain_question_number" required>
							<option value="">Select the Course Code</option>
							<?php if($question_paper_formates = fetchData(array('table'=>'total_submain_question','condition'=>''))): ?>
								<?php foreach($question_paper_formates as $question_paper_formate): ?>
									<option value="<?php echo $question_paper_formate['main_question_number']; ?>"><?php echo $question_paper_formate['main_question_number']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<div id="show">
							<?php for($i=1;$i<=$count;$i++): ?>
								<div style="width: 45%; float:left">
									<label for="submain_question<?php echo $i; ?>">Sub Main Question : <?php echo $i; ?></label>
									<input type="text" class="input-text" id="submain_question<?php echo $i; ?>" name="submain_question<?php echo $i; ?>" placeholder="Enter sub main question of <?php echo $i; ?>">
								</div>
								
								<div style="width: 45%; float:right">
									<label for="total_sub_question">Total Sub Question Of Sub Main Question No. <?php echo $i; ?></label>
									<input type="number" class="input-text" id="total_sub_question<?php echo $i; ?>" name="total_sub_question<?php echo $i; ?>" min="0" value="" required>
								</div>
								
							<?php endfor; ?>
							<input style="display:none;" type="text" class="input-text" id="count" name="count" value="<?php echo $count; ?>">
						</div>
						<input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
					</form>
				</div>

		</div>
	</div>
</div>
<script>
	function getval(sel)
	{
		
		if(sel.value!="")
		{
			document.getElementById('show').style.display='block';
		}
		window.location = "http://localhost/hod/question_paper_formate/total_sub_question.php?num=" + sel;
	}
</script>
