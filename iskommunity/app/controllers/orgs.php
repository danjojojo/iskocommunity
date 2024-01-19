<?php

include(ROOT_PATH . '/app/controllers/users.php');

$org = '';
$college_code = '';
$org_code = '';
$org_name = '';
$org_username = '';
$org_email = '';
$org_interest = '';
$org_password = '';
$confirmpassword = '';
$org_currentpassword = '';
$org_newpassword = '';

$colleges = selectAll('college');

if(isset($_GET['org_code'])){
    $org = selectOne($table2, ['org_Code' => $_GET['org_code']]);
    $college_code = $org['college_Code'];
    $org_code = $org['org_Code'];
    $org_name = $org['org_Name'];
    $org_username = $org['org_Username'];
    $org_email = $org['org_Email'];
    $org_interest = $org['org_Interest'];
    $org_createdAt = $org['created_At'];
}

if(isset($_POST['add-org'])){
    $errors = validateOrg($_POST);
    if(count($errors) === 0){
        unset($_POST['add-org'], $_POST['confirmpassword']);
        $_POST['org_Password'] = password_hash($_POST['org_Password'], PASSWORD_DEFAULT);
        $_SESSION['message'] = 'Organization added!';
        $org_id = create($table2, $_POST);
        redirectToPrevPage();
    }
    else{
        $college_code = $_POST['college_Code'];
        $org_code = $_POST['org_Code'];
        $org_name = $_POST['org_Name'];
        $org_username = $_POST['org_Username'];
        $org_email = $_POST['org_Email'];
        $org_interest = $_POST['org_Interest'];
        $org_password = $_POST['org_Password'];
        $confirmpassword = $_POST['confirmpassword'];
    }
}


if(isset($_POST['edit-org-info'])){
    $errors = validateEditOrgInfo($_POST);
    if(count($errors) === 0){
        unset($_POST['edit-org-info']);
        $org_id = updateOrg($table2, $org_createdAt, $_POST);
        $_SESSION['message'] = 'An org profile was updated!';
        redirectToPrevPage();
    }
    else{
        $college_code = $_POST['college_Code'];
        $org_code = $_POST['org_Code'];
        $org_name = $_POST['org_Name'];
        $org_username = $_POST['org_Username'];
        $org_email = $_POST['org_Email'];
        $org_interest = $_POST['org_Interest'];
    }
}
$pages = pagination($start, $rows_per_page, $table2);


