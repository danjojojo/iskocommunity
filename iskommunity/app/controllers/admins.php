<?php
// MANAGE ADMINS

include(ROOT_PATH . '/app/controllers/users.php');


// SOME VARS
$admin_currentpassword = '';
$admin_newpassword = '';

// MANAGE ADMIN
if(isset($_GET['admin_id'])){
    $admin = selectOne($table3, ['admin_ID' => $_GET['admin_id']]);
    $admin_id = $admin['admin_ID'];
    $admin_username = $admin['admin_Username'];
    $admin_email = $admin['admin_Email'];
}

if(isset($_POST['create-admin'])){
    $errors = validateAdminRegister($_POST);

    if(count($errors) === 0){
        unset($_POST['create-admin'], $_POST['confirmpassword']);
        $_POST['admin_Password'] = password_hash($_POST['admin_Password'], PASSWORD_DEFAULT);
        $_SESSION['message'] = 'Admin added!';
        $admin_id = create($table3, $_POST);
        redirectToPrevPage();
    }
    else{
        $username = $_POST['admin_Username'];
        $email = $_POST['admin_Email'];
        $password = $_POST['admin_Password'];
        $confirmpassword = $_POST['confirmpassword'];
    }
}

if(isset($_POST['edit-admin-info'])){
    $errors = validateEditAdminInfo($_POST);

    if(count($errors) === 0){
        $id = $_POST['admin_ID'];
        if($_SESSION['id'] === $admin['admin_ID']){
            $_SESSION['username'] = $_POST['admin_Username'];
            $_SESSION['message'] = 'Your profile was updated!';
        }
        else{
            $_SESSION['message'] = 'An admin profile was updated!';
        }
        unset($_POST['edit-admin-info'], $_POST['admin_ID']);
        // $_SESSION['username'] = $_POST['admin_Username'];
        $admin_id = updateAdmin($table3, $id, $_POST);
        redirectToPrevPage();
    }
    else{
        $admin_username = $_POST['admin_Username'];
        $admin_email = $_POST['admin_Email'];
    }
}

if(isset($_POST['edit-admin-pass'])){
    $errors = validateAdminDelete($_POST);

    if(count($errors) === 0){
        $id = $_POST['admin_ID'];
        unset($_POST['edit-admin-pass'], $_POST['admin_OldPassword'], $_POST['confirmpassword'], $_POST['admin_ID']);
        $_POST['admin_Password'] = password_hash($_POST['admin_Password'], PASSWORD_DEFAULT);
        $_SESSION['message'] = 'An admin profile was updated!';
        $admin_id = updateAdmin($table3, $id, $_POST);
        redirectToPrevPage();
    }
    else{
        $admin_currentpassword = $_POST['admin_OldPassword'];
        $admin_newpassword = $_POST['admin_Password'];
        $admin_confirmpassword = $_POST['confirmpassword'];
    }
}

if(isset($_POST['edit-admin-del'])){
    $errors = validateEditAdminDelete($_POST);

    if(count($errors) === 0){
        $id = $_POST['admin_ID'];
        $admin_id = deleteAdmin($table3, $_POST['admin_ID']);
        if($_SESSION['id'] === $admin['admin_ID']){
            header('location: ' . BASE_URL . '/logout.php');
            exit();
        }
        else{
            $_SESSION['message'] = 'An admin profile was deleted!';
            redirectToPrevPage();
        }
    }
    else{
        $password = $_POST['admin_Password'];
    }
}

// PAGINATION FOR ADMIN
$pages = pagination($start, $rows_per_page, $table3);







