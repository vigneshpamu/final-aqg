<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// Database connection and data retrieval functions go here (e.g., fetchData)

// Check if headers for the question paper are available
if ($headers = fetchData(array(
    'table' => 'question_paper_format',
    'condition' => "WHERE stream_id = '" . $_POST["stream_id"] . "' AND departments_id = '" . $_POST["departments_id"] . "' AND degree_id = '" . $_POST["degree_id"] . "' AND class_id = '" . $_POST["class_id"] . "' AND semester_id = '" . $_POST["semester_id"] . "' AND subject_id = '" . $_POST["subject_id"] . "'"
))) {
    // Initialize variables to store header and note
    $head = '';
    $note = '';

    // Loop through retrieved headers (assuming there's only one header)
    foreach ($headers as $header) {
        // Create the header HTML
        $head = '
            <div style="width:100%;height:82px;">
                <div style="width:15%;float:left;">
                    <img src="../assets/images/new_logo.jpg" style="width:100%;height:80px;">
                </div>
                <div style="width:85%;float:left;">
                    <h4 style="margin:0;padding-top:30px;">' . ucwords($header["institute_name"]) . '</h4>
                    <p style="margin:0;padding:0;padding-left:30px;">Jain Society, Sion West, Mumbai 400 022 INDIA.</p>
                </div>
            </div>
            <div style="width:100%;text-align:center;">
                <p style="margin:0;">' . ucwords($header["class_id"]) . ' ' . ucwords($header["degree_id"]) . ' (' . ucwords($header["departments_id"]) . ') EXAMINATION - 2019</p>
                <p style="margin:0;">' . ucwords($header["subject_id"]) . ' (' . ucwords($header["paper_name"]) . ')</p>
                <p style="margin:0;">' . ucwords($header["semester_id"]) . '</p>
            </div>		
            <div style="width:100%;">
                <div style="width:30%;float:left;" align="left">
                    <b>Time : ' . ucwords($header["time"]) . '</b>
                </div>
                <div style="width:40%;float:left;" align="center">
                    <b>Course Code : ' . ucwords($header["course_code"]) . ' </b>
                </div>
                <div style="width:30%;display:inline;">
                    <p style="margin:0;padding:0;text-align:right;"><b>Maximum Marks : ' . ucwords($header["maximum_marks"]) . '</b></p>
                </div>
            </div>
        ';

        // Create the note HTML
        $note = '
            <div style="width:100%;border-top:2px solid #000;">
                <b>Note : </b>
                <ul style="margin:0;padding:0 0 0 40px;">
                    <li>Attempt all the questions.</li>
                    <li>Do not use a scientific calculator.</li>
                    <li>Make the diagrams neat and clean if needed.</li>
                </ul>
            </div>
        ';
    }
}

// Fetch and append questions from various question types here (Fill in the Blank, One Mark, Four Marks, Five Marks, MCQ)
// You need to fetch and append questions from your database tables here.

// Fetch Fill in the Blank questions and append them to the question paper
$fillInTheBlankSection = '';
$fillInTheBlankQuestions = fetchData(array(
    'table' => 'fill_in_the_blank_based_question',
    'condition' => "WHERE subject_id = '" . $_POST["subject_id"] . "'"
));
if ($fillInTheBlankQuestions) {
    $fillInTheBlankSection .= '<h2>Fill in the Blank Questions</h2>';
    foreach ($fillInTheBlankQuestions as $question) {
        $fillInTheBlankSection .= '<p>' . $question['question'] . '</p>';
    }
}

// Fetch One Mark questions and append them to the question paper
$oneMarkSection = '';
$oneMarkQuestions = fetchData(array(
    'table' => 'one_marks_question',
    'condition' => "WHERE subject_id = '" . $_POST["subject_id"] . "'"
));
if ($oneMarkQuestions) {
    $oneMarkSection .= '<h2>One Mark Questions</h2>';
    foreach ($oneMarkQuestions as $question) {
        $oneMarkSection .= '<p>' . $question['question'] . '</p>';
    }
}

// Fetch Four Marks questions and append them to the question paper
$fourMarkSection = '';
$fourMarkQuestions = fetchData(array(
    'table' => 'four_marks_question',
    'condition' => "WHERE subject_id = '" . $_POST["subject_id"] . "'"
));
if ($fourMarkQuestions) {
    $fourMarkSection .= '<h2>Four Marks Questions</h2>';
    foreach ($fourMarkQuestions as $question) {
        $fourMarkSection .= '<p>' . $question['question'] . '</p>';
    }
}

// Fetch Five Marks questions and append them to the question paper
$fiveMarkSection = '';
$fiveMarkQuestions = fetchData(array(
    'table' => 'five_marks_question',
    'condition' => "WHERE subject_id = '" . $_POST["subject_id"] . "'"
));
if ($fiveMarkQuestions) {
    $fiveMarkSection .= '<h2>Five Marks Questions</h2>';
    foreach ($fiveMarkQuestions as $question) {
        $fiveMarkSection .= '<p>' . $question['question'] . '</p>';
    }
}

// Fetch MCQ questions and append them to the question paper
$mcqSection = '';
$mcqQuestions = fetchData(array(
    'table' => 'mcq_based_question',
    'condition' => "WHERE subject_id = '" . $_POST["subject_id"] . "'"
));
if ($mcqQuestions) {
    $mcqSection .= '<h2>MCQ (Multiple Choice Questions)</h2>';
    foreach ($mcqQuestions as $question) {
        $mcqSection .= '<p>' . $question['mcq_question'] . '</p>';
        $mcqSection .= '<ul>';
        $mcqSection .= '<li>A. ' . $question['answer_A'] . '</li>';
        $mcqSection .= '<li>B. ' . $question['answer_B'] . '</li>';
        $mcqSection .= '<li>C. ' . $question['answer_C'] . '</li>';
        $mcqSection .= '<li>D. ' . $question['answer_D'] . '</li>';
        $mcqSection .= '</ul>';
    }
}

// Load the updated HTML into Dompdf (with questions)
$dompdf->loadHtml($head . $note . $fillInTheBlankSection . $oneMarkSection . $fourMarkSection . $fiveMarkSection . $mcqSection);

// Render HTML as PDF
$dompdf->render();

// Output the generated PDF to the browser
$dompdf->stream();
?>
