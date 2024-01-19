<?php
// LOGIN AND REGISTRATION

include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/validateUser.php');

// GLOBAL VARS
$errors = array();
$email = '';
$username = '';
$password = '';
$confirmpassword = '';
$usernameemail = '';
$term = '';


// TABLES
$table1 = 'student';
$table2 = 'organization';
$table3 = 'admin';
$table4 = 'college';

// PAGINATION 
$start = 0;
$rows_per_page = 6;
if(isset($_GET['page-nr'])){
    // page-nr = PAGE NUMBER
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
    // PAGE 1, start = 0
    // PAGE 2, start = 4
    // PAGE 3, start = 8
    // and so on..
}

// $student_users = selectAll($table1);

function loginStudent($stud){
    $_SESSION['id'] = $stud['stud_ID'];
    $_SESSION['username'] = $stud['stud_Username'];
    $_SESSION['message'] = 'You are now logged in!';
    $_SESSION['type'] = 'student';
    header('location: ' . BASE_URL . '/index.php');
    exit();
}

function loginOrg($org){
    $_SESSION['id'] = $org['org_Code'];
    $_SESSION['username'] = $org['org_Username'];
    $_SESSION['message'] = 'You are now logged in!';
    $_SESSION['type'] = 'org';
    header('location: ' . BASE_URL . '/index.php');
    exit();
}

function loginAdmin($admin){
    $_SESSION['id'] = $admin['admin_ID'];
    $_SESSION['username'] = $admin['admin_Username'];
    $_SESSION['message'] = 'You are now logged in!';
    $_SESSION['type'] = 'admin';
    header('location: ' . BASE_URL . '/index.php');
    exit();
}


// LOGIN REGISTRATION
if(isset($_POST['register'])){
    // First, CHECK FOR ERRORS
    $errors = validateRegister($_POST);

    // IF THERE ARE NO ERRORS
    if(count($errors) === 0){
        unset($_POST['register'], $_POST['confirmpassword']);
        $_POST['stud_Password'] = password_hash($_POST['stud_Password'], PASSWORD_DEFAULT);
        $stud_id = create($table1, $_POST);
        $stud = selectOne($table1, ['stud_ID' => $stud_id]);
        loginStudent($stud);
    }
    else{
        // IF THERE ARE ERRORS
        $email = $_POST['stud_Webmail'];
        $username = $_POST['stud_Username'];
        $password = $_POST['stud_Password'];
        $confirmpassword = $_POST['confirmpassword'];
    }
}

if(isset($_POST['login'])){
    // CHECK FOR ERRORS
    $errors = validateLogin($_POST);

    if(count($errors) === 0){
        $stud_record = selectOneUsingOr($table1, ['stud_Webmail' => $_POST['username'], 'stud_Username' => $_POST['username'] ]);
        $org_record = selectOneUsingOr($table2, ['org_Email' => $_POST['username'], 'org_Username' => $_POST['username']]);
        $admin_record = selectOneUsingOr($table3, ['admin_Email' => $_POST['username'], 'admin_Username' => $_POST['username'] ]);

        if($stud_record && password_verify($_POST['password'], $stud_record['stud_Password'])){
            loginStudent($stud_record);
        }
        else if($org_record && password_verify($_POST['password'], $org_record['org_Password'])){
            loginOrg($org_record);
        }
        else if($admin_record && password_verify($_POST['password'], $admin_record['admin_Password'])){
            loginAdmin($admin_record);
        }
        else{
            array_push($errors, 'Invalid credentials!');
        }
        $usernameemail = $_POST['username'];
        $password = $_POST['password'];
    }
}


// REDIRECTS
function redirectToIndex(){
    header("Location: index.php?page-nr=1&s=" .$_SESSION['s']);
    exit();
}

function redirectToIndexWithTerm($term){
    header("location: index.php?term=" . urlencode($term));
    exit();
}

function redirectToPrevPage(){
    header('location: ' .  $_SESSION['prev-page']);
    exit();
}

// SEARCH ADMIN
if(isset($_POST['search-btn']) && $_POST['term'] !== '') {
    $term = $_POST['term'];
    redirectToIndexWithTerm($term);
    $term = isset($_GET['term']) ? $_GET['term'] : '';
} else if (isset($_POST['search-btn']) && empty($_POST['term'])) {
    // dd('search term is empty!');
    $term = $_POST['term'];
    redirectToIndex();
}


// DEFAULT SORT OF RECORDS  
if(!isset($_SESSION['sort'])){
    $_SESSION['sort'] = 'recent';
    $_SESSION['sort_message'] = 'recently added';
}


if(isset($_GET['s'])){
    $selectedSort = $_GET['s'];

    switch($selectedSort){
        case 'o':
            $_SESSION['s'] =  $selectedSort;
            $_SESSION['sort_message'] = 'oldest added';
            break;
        case 'r':
            $_SESSION['s'] =  $selectedSort;
            $_SESSION['sort_message'] = 'recently added';
            break;
        case 'az':
            $_SESSION['s'] =  $selectedSort;
            $_SESSION['sort_message'] = 'A-Z';
            break;
        case 'za':
            $_SESSION['s'] =  $selectedSort;
            $_SESSION['sort_message'] = 'Z-A';
            break;
        case 'caz':
            $_SESSION['s'] =  $selectedSort;
            $_SESSION['sort_message'] = 'affiliated college Z-A';
            break;
        case 'cza':
            $_SESSION['s'] =  $selectedSort;
            $_SESSION['sort_message'] = 'affiliated college Z-A';
            break;
    }
}
