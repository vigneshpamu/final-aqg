<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/header/admin_header.php');

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<body>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #E5F4E3;
        margin-top: 50px; /* Light green background */
    }

    h1 {
        text-align: center;
        font-size: 36px;
        color: #4CAF50; /* Green accent color */
        margin-bottom: 20px;
    }


</style>
<!--<header>-->
<!--    <h1>Admin Portal</h1>-->
<!--</header>-->
<div class="row">
    <div class="col-sm-12">
        <div class="view_error_message">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/view_errors_or_messages.php');; ?>
        </div>
        <h3 class="heading-name" style="padding: 0px 20px 0px 20px;">Generate Question Paper</h3>
        <div class="div-form">
            <form action="pdf_generate_new.php" method="POST" style="display: flex;flex-direction: column; gap: 10px;">
                <div class="form-group">
                    <label for="stream_id">Stream Name</label>
                    <select id="stream_id" name="stream_id" required>
                        <option value="">Select the stream</option>
                        <?php if ($streams = fetchData(array('table' => 'stream', 'condition' => ''))): ?>
                            <?php foreach ($streams as $stream): ?>
                                <option value="<?php echo $stream['id']; ?>"><?php echo $stream['stream_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="departments_id">Department Name</label>
                    <select id="departments_id" name="departments_id" required>
                        <option value="">Select the department</option>
                        <?php if ($departments = fetchData(array('table' => 'departments', 'condition' => ''))): ?>
                            <?php foreach ($departments as $department): ?>
                                <option value="<?php echo $department['id']; ?>"><?php echo $department['dept_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="degree_id">Degree Name</label>
                    <select id="degree_id" name="degree_id" required>
                        <option value="">Select the Degree</option>
                        <?php if ($degrees = fetchData(array('table' => 'degree', 'condition' => ''))): ?>
                            <?php foreach ($degrees as $degree): ?>
                                <option value="<?php echo $degree['id']; ?>"><?php echo $degree['degree_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="class_id">Class Name</label>
                    <select id="class_id" name="class_id" required>
                        <option value="">Select the Class</option>
                        <?php if ($classs = fetchData(array('table' => 'class', 'condition' => ''))): ?>
                            <?php foreach ($classs as $class): ?>
                                <option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="semester_id">Semester Name</label>
                    <select id="semester_id" name="semester_id" required>
                        <option value="">Select the Semester</option>
                        <?php if ($semesters = fetchData(array('table' => 'semester', 'condition' => ''))): ?>
                            <?php foreach ($semesters as $semester): ?>
                                <option value="<?php echo $semester['semester_name']; ?>"><?php echo $semester['semester_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject_id">Subject Name</label>
                    <select id="subject_id" name="subject_id" required>
                        <option value="">Select the Subject</option>
                        <?php if ($subjects = fetchData(array('table' => 'subjects', 'condition' => ''))): ?>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?php echo $subject['id']; ?>"><?php echo $subject['subject_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_code">Course Code</label>
                    <select id="course_code" name="course_code" required>
                        <option value="">Select the Course Code</option>
                        <?php if ($course_codes = fetchData(array(
                            'table' => 'question_paper_formate',
                            'condition' => ''
                        ))): ?>
                            <?php foreach ($course_codes as $course_code): ?>
                                <option value="<?php echo $course_code['id']; ?>"><?php echo $course_code['course_code']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <input type="submit" class="input-submit" value="Submit" id="submit" name="submit">
            </form>
        </div>

        <h3 class="heading-name">Question Paper Generated List</h3>
        <?php if ($units = fetchData(array('table' => 'question_paper_list', 'condition' => ''))): ?>
            <table id="table_structure">
                <tr>
                    <th>Sr.No.</th>
                    <th>Stream Name</th>
                    <th>Department Name</th>
                    <th>degree Name</th>
                    <th>Class Name</th>
                    <th>Semester Name</th>
                    <th>Subjects Name</th>
                    <th>PDF</th>
                    <th>Delete</th>
                </tr>

                <?php $count = 1;
                foreach ($units as $unit): ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <?php if ($streams = fetchData(array(
                            'table' => 'stream',
                            'condition' => 'WHERE id = ' . $unit['stream_id']
                        ))): ?>
                            <?php foreach ($streams as $stream): ?>
                                <td><?php echo $stream['stream_name']; ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($departments = fetchData(array(
                            'table' => 'departments',
                            'condition' => 'WHERE id = ' . $unit['departments_id']
                        ))): ?>
                            <?php foreach ($departments as $department): ?>
                                <td><?php echo $department['dept_name']; ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($degrees = fetchData(array(
                            'table' => 'degree',
                            'condition' => 'WHERE id = ' . $unit['degree_id']
                        ))): ?>
                            <?php foreach ($degrees as $degree): ?>
                                <td><?php echo $degree['degree_name']; ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($classs = fetchData(array(
                            'table' => 'class',
                            'condition' => 'WHERE id = ' . $unit['class_id']
                        ))): ?>
                            <?php foreach ($classs as $class): ?>
                                <td><?php echo $class['class_name']; ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($classs = fetchData(array(
                            'table' => 'semester',
                            'condition' => 'WHERE id = ' . $unit['semester_id']
                        ))): ?>
                            <?php foreach ($classs as $class): ?>
                                <td><?php echo $class['semester_name']; ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($subjects = fetchData(array(
                            'table' => 'subjects',
                            'condition' => 'WHERE id = ' . $unit['subject_id']
                        ))): ?>
                            <?php foreach ($subjects as $subject): ?>
                                <td><?php echo $subject['subject_name']; ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <td>PDF CODE HERE</td>
                        <td>
                            <a href="/admin/delete_row.php?id=<?php echo $unit['id'] . '&from=question_paper_list&calling_script=' . $_SERVER['PHP_SELF']; ?>">
                                <button style="background-color:red;" class="open-button">Delete</button>
                            </a></td>
                    </tr>

                    <?php $count++; endforeach; ?>
            </table>

        <?php endif; ?>
    </div>
</div>
</body>

<script>
    // $(ajax)function(a)({
    // url="ajax_index.php";
    // method="POST"
    // value = "a = "+a+"&b = "+b;
    // success:function(data)
    // {

    // }
    // })
</script>