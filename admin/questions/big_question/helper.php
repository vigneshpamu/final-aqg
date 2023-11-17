<?php
$conn = mysqli_connect("localhost", 'root', "");
$db = mysqli_select_db($conn, 'automatic_test_paper_generator');

if (isset($_POST['classId'])) {
    $classId = $_POST['classId'];

    $query = "SELECT * FROM subjects";
    $query_run = mysqli_query($conn, $query);

    $out = '';

    // Now you can build the HTML options
    $out = '<option value="">Select the Subject</option>';
    $index = 0;

    foreach ($query_run as $row) {
        // Check the conditions based on classId and index
        if ($classId == '1' && $index >= 0 && $index <= 9) {
            $out .= '<option value="' . $row['id'] . '">' . $row['subject_name'] . '</option>';
        } elseif ($classId == '2' && $index >= 10 && $index <= 19) {
            $out .= '<option value="' . $row['id'] . '">' . $row['subject_name'] . '</option>';
        } elseif ($classId == '3' && $index >= 20 && $index <= 29) {
            $out .= '<option value="' . $row['id'] . '">' . $row['subject_name'] . '</option>';
        }

        // Increment the index variable
        $index++;
    }

    // Send the response back to the AJAX call
    echo $out;
} else if (isset($_POST['deptId'])) {
    $deptId = $_POST['deptId'];

    $query = "SELECT * FROM departments WHERE stream_id = $deptId";
    $query_run = mysqli_query($conn, $query);

    $out = '';

    // Now you can build the HTML options
    $out = '<option value="">Select the Department</option>';
    $index = 0;

    foreach ($query_run as $row) {
        $out .= '<option value="' . $row['id'] . '">' . $row['dept_name'] . '</option>';
    }

    // Send the response back to the AJAX call
    echo $out;
} else if (isset($_POST['degreeId'])) {
    $degreeId = $_POST['degreeId'];

    $query = "SELECT * FROM degree WHERE departments_id = $degreeId";
    $query_run = mysqli_query($conn, $query);

    $out = '';

    // Now you can build the HTML options
    $out = '<option value="">Select the Degree</option>';
    $index = 0;

    foreach ($query_run as $row) {
        $out .= '<option value="' . $row['id'] . '">' . $row['degree_name'] . '</option>';
    }

    // Send the response back to the AJAX call
    echo $out;
}
?>
