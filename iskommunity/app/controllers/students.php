<?php
// MANAGE STUDENTS IN DASHBOARD

include(ROOT_PATH . '/app/controllers/users.php');

// SOME VARS
$student_currentpassword = '';
$student_newpassword = '';

// MANAGE STUDENT
if(isset($_GET['student_id'])){
    $student = selectOne($table1, ['stud_ID' => $_GET['student_id']]);
    $student_id = $student['stud_ID'];
    $student_username = $student['stud_Username'];
    $student_webmail = $student['stud_Webmail'];
}

if(isset($_POST['create-stud'])){
    $errors = validateCreateStudent($_POST);
    if(count($errors) === 0){
        unset($_POST['create-stud'], $_POST['confirmpassword']);
        $_POST['stud_Password'] = password_hash($_POST['stud_Password'], PASSWORD_DEFAULT);
        $_SESSION['message'] = 'Student added!';
        $stud_id = create($table1, $_POST);
        redirectToPrevPage();
    }
    else{
        // IF THERE ARE ERRORS
        $email = $_POST['stud_Webmail'];
        $username = $_POST['stud_Username'];
        $password = $_POST['stud_Password'];
        $confirmpassword = $_POST['confirmpassword'];
    }
}

if(isset($_POST['edit-stud-info'])){ 
    $errors = validateEditStudentInfo($_POST);
    
    if(count($errors) === 0){
        $id = $_POST['stud_ID'];
        unset($_POST['edit-stud-info'], $_POST['stud_ID']);
        $_SESSION['message'] = 'A student profile was updated!';
        $student_id = updateStudent($table1, $id, $_POST);
        redirectToPrevPage();
    }
    else{
        $student_username = $_POST['stud_Username'];
        $student_email = $_POST['stud_Webmail'];
    }
}

if(isset($_POST['edit-stud-pass'])){
    $errors = validateEditStudentPass($_POST);

    if(count($errors) === 0){
        $id = $_POST['stud_ID'];
        unset($_POST['edit-stud-pass'], $_POST['stud_OldPassword'], $_POST['confirmpassword'], $_POST['stud_ID']);
        $_POST['stud_Password'] = password_hash($_POST['stud_Password'], PASSWORD_DEFAULT);
        $_SESSION['message'] = 'A student profile was updated!';
        $stud_id = updateStudent($table1, $id, $_POST);
        redirectToPrevPage();
    }
    else{
        $student_currentpassword = $_POST['stud_OldPassword'];
        $student_newpassword = $_POST['stud_Password'];
        $confirmpassword = $_POST['confirmpassword'];
    }
}

if(isset($_POST['edit-stud-del'])){
    $errors = validateAdminDelete($_POST);

    if(count($errors) === 0){
        $admin_id = deleteStudent($table1, $_POST['stud_ID']);
        $_SESSION['message'] = 'A student profile was deleted!';
        redirectToPrevPage();
    }
    else{
        $password = $_POST['admin_Password'];
    }
}

// PAGINATION
$pages = pagination($start, $rows_per_page, $table1);

