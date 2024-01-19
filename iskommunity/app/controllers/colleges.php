<?php

include(ROOT_PATH . '/app/controllers/users.php');

$college_code = '';
$college_name = '';

if(isset($_GET['college_id'])){
    $college = selectOne($table4, ['college_Code' => $_GET['college_id']]);
    $college_id = $college['college_ID'];
    $college_code = $college['college_Code'];
    $college_name = $college['college_Name'];
}

if(isset($_POST['add-college'])){
    $errors = validateCollege($_POST);
    
    if(count($errors) === 0){
         unset($_POST['add-college']);
         $_SESSION['message'] = 'College added!';
         $college_rec = create($table4, $_POST);
         redirectToPrevPage();
    }
    else{
        $college_code = $_POST['college_Code'];
        $college_name = $_POST['college_Name'];
    }
} 

if(isset($_POST['edit-college-info'])){ 
    $errors = validateEditCollegeInfo($_POST);
    
    
    if(count($errors) === 0){
        $id = $_POST['college_ID'];
        unset($_POST['edit-college-info'], $_POST['college_ID']);
        $_SESSION['message'] = 'A college profile was updated!';
        $college_rec = updateCollege($table4, $id, $_POST);
        redirectToPrevPage();
    }
    else{
        $college_code = $_POST['college_Code'];
        $college_name = $_POST['college_Name'];
    }
}

if(isset($_POST['edit-college-del'])){
    $errors = validateAdminDelete($_POST);

    if(count($errors) === 0){
        $college_rec = deleteCollege($table4, $_POST['college_ID']);
        $_SESSION['message'] = 'A college profile was deleted!';
        redirectToPrevPage();
    } 
    else{
        $password = $_POST['admin_Password'];
    }
}

// PAGINATION
$pages = pagination($start, $rows_per_page, $table4);

