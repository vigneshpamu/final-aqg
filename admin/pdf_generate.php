<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';


/* reference the Dompdf namespace */

use Dompdf\Dompdf;


/* instantiate and use the dompdf class */
$dompdf = new Dompdf(array('enable_remote' => true));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Check if the form is submitted

	// Retrieve selected values from the form
	$stream_id = isset($_POST['stream_id']) ? $_POST['stream_id'] : null;
	$departments_id = isset($_POST['departments_id']) ? $_POST['departments_id'] : null;
	$degree_id = isset($_POST['degree_id']) ? $_POST['degree_id'] : null;
	$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : null;
	$semester_name = isset($_POST['semester_id']) ? $_POST['semester_id'] : null;
	$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : null;
	$course_code = isset($_POST['course_code']) ? $_POST['course_code'] : null;

	// Concatenate the values into a string
	$outputString = "Stream Name: $stream_id<br>";
	$outputString .= "Department Name: $departments_id<br>";
	$outputString .= "Degree Name: $degree_id<br>";
	$outputString .= "Class Name: $class_id<br>";
	$outputString .= "Semester Name: $semester_name<br>";
	$outputString .= "Subject Name: $subject_id<br>";
	$outputString .= "Course Code: $course_code<br>";

	// Print the string in HTML format
//	echo $class_id;

}


/* Connect to your database */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "automatic_test_paper_generator";

$conn = new mysqli($servername, $username, $password, $dbname);

/* Check the connection */
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//Stream Name: Science
//Department Name: IT
//Degree Name: Bachelor of Science in Information and Technology (BScIT)
//Class Name: First Year (FY)
//Semester Name: Semester 1
//Subject Name: Imperative Programming
//Course Code: BSCIT-01

//Stream Name: 2
//Department Name: 1
//Degree Name: 1
//Class Name: 1
//Semester Name: Semester 1
//Subject Name: 4
//Course Code: 1


/* Your SQL query */
$sql = "SELECT * FROM four_marks_question WHERE stream_id = $stream_id AND department_id = $departments_id AND degree_id = $degree_id AND class_id = $class_id AND subject_id = $subject_id";
$result = $conn->query($sql);

/* Fetch data from the result */

$allDiv = '';
$num = 1;

if ($result->num_rows > 0) {
	for ($bigIndex = 0; $bigIndex < 25; $bigIndex += 5) {

		$start = $bigIndex * 5;
		$end = $start + 5;

		$ind = $start * 0;

		$data = '<div style="width:100%; margin-bottom: 14px; ">
                    <b>' . ($num) . '. Attempt Any Three Questions</b>
                    <div style="margin:0;">';

		for ($index = $start; $index < $end; $index++) {
			$row = $result->fetch_assoc();

			// Check if $row is an array before accessing its elements
			if (is_array($row)) {
				$alphabet = chr(ord('a') + $ind);
				$data .= "<p style='margin:3px;'>{$alphabet}) {$row['question']}</p>";
			} else {
				// Break the inner loop if $row is not an array (no more rows)
				break;
			}

			$ind++;
		}

		$data .= "</div></div>";

		// Append each set of HTML to $allDiv
		$allDiv .= $data;
		$num++;
	}
} else {
	$allDiv = "<li>No results found</li>";
}

// Output or use $allDiv as needed
//echo $allDiv;


$img = '<img src="https://i.ibb.co/pXhGsP7/Untitled-design-1.jpg" style="width: 100%; height: 100px;" />';

$classNameQ = "SELECT * FROM class WHERE id = $class_id";
$classNameR = $conn->query($classNameQ);
$className = $classNameR->fetch_assoc();
$degreeNameQ = "SELECT * FROM degree WHERE id = $degree_id";
$degreeNameR = $conn->query($degreeNameQ);
$degreeName = $degreeNameR->fetch_assoc();
$examYear = "2019";
$subjectNameQ = "SELECT * FROM subjects WHERE id = $subject_id";
$subjectNameR = $conn->query($subjectNameQ);
$subjectName = $subjectNameR->fetch_assoc();

//echo $semester_id;

$html1 = '
<div>
<div style="width: 100%; height:100px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center;gap: 15px;">
    <div style="width: 13%; float: left;">
        ' . $img . '
    </div>
    <div style="width: 85%; float: left; font-size: 16px;margin-left: 0px;" >
        <h4 style="margin: 0;">SIES COLLEGE OF ARTS SCIENCE AND COMMERCE</h4>
        <p style="margin: 0; padding: 0; padding-left: 30px;">Jain Society, Sion West, Mumbai 400 022 INDIA.</p>
    </div>
</div>
<div style="width: 100%; text-align: center; text-transform: uppercase;">
    <p style="margin: 0;">' . $className['class_name'] . ' ' . $degreeName['degree_name'] . ', 2023</p>
    <p style="margin: 0;">' . $subjectName['subject_name'] . '</p>
    <p style="margin: 0;">' . $semester_name . '</p>
</div>
<div style="width: 100%;margin: 15px 0px 10px 0px;">
    <div style="width: 30%; float: left;" align="left">
        <b>Time : 2 Hours.</b>
    </div>
    <div style="width: 40%; float: left;" align="center">
        <b>Course Code : SIESUS101 </b>
    </div>
    <div style="width: 30%; display: inline;">
        <p style="margin: 0; padding: 0; text-align: right;"><b>Maximum Marks : 60</b></p>
    </div>
</div>
<div style="width: 100%; border-top: 2px solid #000;margin-bottom: 10px;">
<div style="margin-top: 10px;">
    <b>Note : </b>
    <ul style="margin: 10px; padding: 0 0 0 40px;">
        <li>Attempt all the question.</li>
        <li>Do not use a scientific calculator.</li>
        <li>Make the diagram neat and clean if needed.</li>
    </ul>
    </div>
</div>
' . $allDiv . '
';

/* Close the database connection */
$conn->close();
//echo $html;
//echo $html1;
$dompdf->loadHtml($html1);


/* Render the HTML as PDF */
$dompdf->render();


/* Output the generated PDF to Browser */
$dompdf->stream();
?>