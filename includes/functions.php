<?php

function fetchData($parameters)
{
    global $db;
    $tables = array(
        'stream',
        'departments',
        'degree',
        'class',
        'semester',
        'subjects',
        'units',
        'fill_in_the_blank_based_question',
        'five_marks_question',
        'four_marks_question',
        'mcq_based_question',
        'one_marks_question',
        'question_paper_formate',
        'total_main_question',
        'total_submain_question',
        'total_sub_question'
    );

    $table = isset($parameters['table']) ? $parameters['table'] : "";
    $condition = isset($parameters['condition']) ? $parameters['condition'] : "";

    if (!empty($table) && in_array($table, $tables)) {
        $sql = "SELECT * FROM $table $condition";
        //echo $sql;
        $result_set = $db->query($sql);

        if ($result_set->rowCount()) {
            return $result_set->fetchAll(PDO::FETCH_ASSOC);
        } else {

            return false;
        }
    } else {

        return false;
    }

}

function deleteRow($rowId = '', $table = '')
{
    $allowedTables = array(
        'stream',
        'departments',
        'degree',
        'class',
        'semester',
        'subjects',
        'units',
        'fill_in_the_blank_based_question',
        'five_marks_question',
        'four_marks_question',
        'mcq_based_question',
        'one_marks_question'
    );

    // checks if the row id is numeric and the table is in the allowed tables list
    if (!empty($rowId) && is_numeric($rowId) && !empty($table) && in_array($table, $allowedTables)) {
        global $db;

        $sql = "DELETE FROM $table WHERE id=:id LIMIT 1";

        //echo $sql;
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $rowId, PDO::PARAM_INT);


        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                return true;
            } else {
                return $stmt->ErrorInfo();
            }

        } else {
            return false;
        }
    } else {
        return false;
    }
}

function generateVerificationCode()
{
    return md5(uniqid(rand(), true));
}

?>