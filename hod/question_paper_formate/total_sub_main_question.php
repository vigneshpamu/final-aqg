<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/hod/header/hod_header.php');
?>
<?php
$count=0;
if(isset($_POST['submit']))
{
	$count = trim($_POST['count']);	
	$total_question = trim($_POST['total_question']);
	$course_code = trim($_POST['question_paper_formate_id']);
	$cc=0;
	for($i=1;$i<=$count;$i++)
	{
		$main_question = trim($_POST['main_question'.$i]);
		$main_question_number = trim($i);
		$total_sub_question = trim($_POST['total_sub_question'.$i]);
		$marks = trim($_POST['marks'.$i]);
		$sql = "INSERT INTO total_submain_question(course_code, total_question, main_question_number, main_question, total_marks, total_sub_question) VALUES ('$course_code', '$total_question', '$main_question_number', '$main_question', '$marks', '$total_sub_question')";
		$stmt = $db->prepare($sql);
		if($stmt->execute())
		{
			$cc++;
		}
		else
		{
			$cc--;
		}
	
	}
	if($cc>0)
	{
		
		$messages[] = "Saved successfully. Thank you";
	}
	else{
		$errors[] = "Failed to Add ! Please Try Again Later.";
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
			
				<h3 class="heading-name">Add Sub Main Questions in A Paper</h3>
				<div class="div-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					
						<label for="total_question_id">Total Questions</label>
						<div id="change">
							<select onchange="getval(this.value);" id="total_question" name="total_question" required>
								<option value="">Select the Total Question</option>
								<?php if($total_questions = fetchData(array('table'=>'total_main_question','condition'=>''))): ?>
									<?php foreach($total_questions as $total_question): ?>
										<option value="<?php echo $total_question['total_question']; ?>" <?php if(isset($_GET['num']) && $total_question['total_question'] == $_GET['num']){echo "selected";} ?>><?php echo $total_question['total_question']; ?></option>
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
						
						
						<div id="show">
							<label for="course_code">Course Code</label>
							<select id="question_paper_formate_id" name="question_paper_formate_id" required>
								<option value="">Select the Course Code</option>
								<?php if($question_paper_formates = fetchData(array('table'=>'question_paper_formate','condition'=>''))): ?>
									<?php foreach($question_paper_formates as $question_paper_formate): ?>
										<option value="<?php echo $question_paper_formate['course_code']; ?>"><?php echo $question_paper_formate['course_code']; ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
						
							<?php for($i=1;$i<=$count;$i++): ?>
								<div style="width: 30%; float:left">									
									<label for="main_question<?php echo $i; ?>">Main Question : <?php echo $i; ?></label>
									<input type="text" class="input-text" id="main_question<?php echo $i; ?>" name="main_question<?php echo $i; ?>" value="" Placeholder="Enter the question No. <?php echo $i; ?>.">
								</div>
								
								<div style="width: 65%; float:right">
									<div style="width: 45%; float:left">
										<label for="marks<?php echo $i; ?>">Total Marks In Question : <?php echo $i; ?></label>
										<input type="number" class="input-text" id="marks<?php echo $i; ?>" name="marks<?php echo $i; ?>" value="" min="0" Placeholder="Enter the total marks in question No. <?php echo $i; ?>.">
									</div>
									<div style="width: 45%; float:right">			
										<label for="total_sub_question">Total Sub Main Question Of Main Question No. <?php echo $i; ?></label>
										<input type="number" class="input-text" id="total_sub_question<?php echo $i; ?>" name="total_sub_question<?php echo $i; ?>" min="0" placeholder="Enter the total number of question no. <?php echo $i; ?>." required>
									</div>
						
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
		window.location = "http://localhost/hod/question_paper_formate/total_sub_main_question.php?num=" + sel;
	}
</script>
