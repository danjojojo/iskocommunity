<?php 

// LOGIN AND REGISTER

function validateRegister($stud){
    $table = 'student';
    $errors = array();
    
    if(empty($stud['stud_Email'])){
        array_push($errors, 'Webmail is required!');
    }

    if(empty($stud['stud_Username'])){
        array_push($errors, 'Username is required!');
    }

    if(empty($stud['stud_Password'])){
        array_push($errors, 'Password is required!');
    }

    if($stud['stud_Password'] !== $stud['confirmpassword']){
        array_push($errors, 'Passwords do not match!');
    }

    $existingStudent = selectOne($table, ['stud_Webmail' => $stud['stud_Webmail']]);
    if($existingStudent){
        array_push($errors, 'Webmail is already used!');
    }
    return $errors;
}

function validateLogin($user){
    $errors = array();
    if(empty($user['username'])){
        array_push($errors, 'Username or email is required!');
    }

    if(empty($user['password'])){
        array_push($errors, 'Password is required!');
    }

    return $errors;
}

// DASHBOARD CREATE AND EDIT ADMIN

function validateAdminRegister($admin){
    $table = 'admin';
    $errors = array();
    
    if(empty($admin['admin_Email'])){
        array_push($errors, 'Email is required!');
    }

    if(empty($admin['admin_Username'])){
        array_push($errors, 'Username is required!');
    }

    if(empty($admin['admin_Password'])){
        array_push($errors, 'Password is required!');
    }

    if($admin['admin_Password'] !== $admin['confirmpassword']){
        array_push($errors, 'Passwords do not match!');
    }

    $existingAdmin = selectOne($table, ['admin_Email' => $admin['admin_Email']]);
    if($existingAdmin){
        array_push($errors, 'Email is already used!');
    }
    return $errors;
}

function validateAdminDelete($admin){
    $table = 'admin';
    $errors = array();

    if(empty($admin['admin_Password'])){
        array_push($errors, 'Password is required!');
    }

    $adminCurrentRecord = selectOne($table, ['admin_ID' => $_SESSION['id']]);

    if(!password_verify($admin['admin_Password'], $adminCurrentRecord['admin_Password']) && !empty($admin['admin_Password']) ){
        array_push($errors, 'Incorrect password!');
    }

    return $errors;
}

function validateEditAdminInfo($admin){
    $table = 'admin';
    $errors = array();

    if(empty($admin['admin_Email'])){
        array_push($errors, 'Email is required!');
    }

    if(empty($admin['admin_Username'])){
        array_push($errors, 'Username is required!');
    }

    $stillTheSameAdminEmail = selectOne($table, ['admin_Email' => $admin['admin_Email'], 'admin_ID' => $admin['admin_ID']]);
    $existingAdminEmail = selectOne($table, ['admin_Email' => $admin['admin_Email']]);
    
    $stillTheSameAdminUsername = selectOne($table, ['admin_Username' => $admin['admin_Username'], 'admin_ID' => $admin['admin_ID']]);
    $existingAdminUsername = selectOne($table, ['admin_Username' => $admin['admin_Username']]);

    if($stillTheSameAdminUsername && !$existingAdminUsername){
        return $errors;
    }
    if(!$stillTheSameAdminUsername && $existingAdminUsername){
        array_push($errors, 'Username is already used!');
    }

    if($stillTheSameAdminEmail && !$existingAdminEmail){
        return $errors;
    }
    if(!$stillTheSameAdminEmail && $existingAdminEmail){
        array_push($errors, 'Email is already used!');
    }

    return $errors;
}

function validateEditAdminPass($admin){
    $table = 'admin';
    $errors = array();
    $allowNewPassword = 0;

    if(empty($admin['admin_OldPassword'])){
        array_push($errors, 'Current password is required!');
    }
    
    $adminCurrentRecord = selectOne($table, ['admin_ID' => $admin['admin_ID']]);

    if(password_verify($admin['admin_OldPassword'], $adminCurrentRecord['admin_Password'])){
        $allowNewPassword = 1;
    }
    else if(!password_verify($admin['admin_OldPassword'], $adminCurrentRecord['admin_Password']) && !empty($admin['admin_OldPassword'])){
        array_push($errors, 'Incorrect current password!');
    }


    if($allowNewPassword == 1 && empty($admin['admin_Password']) && !empty($admin['admin_OldPassword'])){
        array_push($errors, 'New password is required!');
    }

    if($allowNewPassword == 1 && $admin['admin_Password'] !== $admin['confirmpassword'] && !empty($admin['admin_Password'])){
        array_push($errors, 'Passwords do not match!');
    }

    return $errors;
}

function validateEditAdminDelete($admin){
    $table = 'admin';
    $errors = array();

    if(empty($admin['admin_Password'])){
        array_push($errors, 'Password is required!');
    }

    $adminCurrentRecord = selectOne($table, ['admin_ID' => $admin['admin_ID']]);

    if(!password_verify($admin['admin_Password'], $adminCurrentRecord['admin_Password']) && !empty($admin['admin_Password']) ){
        array_push($errors, 'Incorrect password!');
    }

    return $errors;
}

// DASHBOARD CREATE AND EDIT STUDENT
// For validating student account creation, validateRegister() is used
function validateCreateStudent($stud){
    $table = 'student';
    $errors = array();
    
    if(empty($stud['stud_Webmail'])){
        array_push($errors, 'Webmail is required!');
    }

    if(empty($stud['stud_Username'])){
        array_push($errors, 'Username is required!');
    }

    if(empty($stud['stud_Password'])){
        array_push($errors, 'Password is required!');
    }

    if($stud['stud_Password'] !== $stud['confirmpassword']){
        array_push($errors, 'Passwords do not match!');
    }

    $existingStudent = selectOne($table, ['stud_Webmail' => $stud['stud_Webmail']]);
    if($existingStudent){
        array_push($errors, 'Webmail is already used!');
    }
    return $errors;
}

function validateEditStudentInfo($student){
    $table = 'student';
    $errors = array();
    

    if(empty($student['stud_Webmail'])){
        array_push($errors, 'Webmail is required!');
    }

    if(empty($student['stud_Username'])){
        array_push($errors, 'Username is required!');
    }

    $stillTheSameStudEmail = selectOne($table, ['stud_Webmail' => $student['stud_Webmail'], 'stud_ID' => $student['stud_ID']]);
    $existingStudEmail = selectOne($table, ['stud_Webmail' => $student['stud_Webmail']]);
    
    $stillTheSameStudUsername = selectOne($table, ['stud_Username' => $student['stud_Username'], 'stud_ID' => $student['stud_ID']]);
    $existingStudUsername = selectOne($table, ['stud_Username' => $student['stud_Username']]);

    if($stillTheSameStudUsername && !$existingStudUsername){
        return $errors;
    }
    if(!$stillTheSameStudUsername && $existingStudUsername){
        array_push($errors, 'Username is already used!');
    }

    if($stillTheSameStudEmail && !$existingStudEmail){
        return $errors;
    }
    if(!$stillTheSameStudEmail && $existingStudEmail){
        array_push($errors, 'Webmail is already used!');
    }

    return $errors;
}

function validateEditStudentPass($student){
    $table = 'student';
    $errors = array();
    $allowNewPassword = 0;

    if(empty($student['stud_OldPassword'])){
        array_push($errors, 'Current password is required!');
    }
    
    $adminCurrentRecord = selectOne($table, ['stud_ID' => $student['stud_ID']]);

    if(password_verify($student['stud_OldPassword'], $adminCurrentRecord['stud_Password'])){
        $allowNewPassword = 1;
    }
    else if(!password_verify($student['stud_OldPassword'], $adminCurrentRecord['stud_Password']) && !empty($student['stud_OldPassword'])){
        array_push($errors, 'Incorrect current password!');
    }


    if($allowNewPassword == 1 && empty($student['stud_Password']) && !empty($student['stud_OldPassword'])){
        array_push($errors, 'New password is required!');
    }

    if($allowNewPassword == 1 && $student['stud_Password'] !== $student['confirmpassword'] && !empty($student['stud_Password'])){
        array_push($errors, 'Passwords do not match!');
    }

    return $errors;
}

function validateEditStudentDelete($student){
    $table = 'student';
    $errors = array();

    if(empty($student['stud_Password'])){
        array_push($errors, 'Password is required!');
    }

    $studentCurrentRecord = selectOne($table, ['stud_ID' => $student['stud_ID']]);

    if(!password_verify($student['stud_Password'], $studentCurrentRecord['stud_Password']) && !empty($student['stud_Password']) ){
        array_push($errors, 'Incorrect password!');
    }

    return $errors;
}

// DASHBOARD CREATE AND EDIT COLLEGE
function validateCollege($college){
    $table = 'college';
    $errors = array();
    
    if(empty($college['college_Code'])){
        array_push($errors, 'College abbreviation is required!');
    }

    if(empty($college['college_Name'])){
        array_push($errors, 'Name of college is required!');
    }

    if(strlen($college['college_Code']) > 10){
        array_push($errors, 'College abbreviation should be not longer than 10 characters!');
    }

    $existingCollegeName = selectOne($table, ['college_Name' => $college['college_Name']]);
    $existingCollegeCode = selectOne($table, ['college_Code' => $college['college_Code']]);

    if($existingCollegeName){
        array_push($errors, 'College already exists!');
    }

    if($existingCollegeCode){
        array_push($errors, 'Abbreviation is used!');
    }
    return $errors;
}

function validateEditCollegeInfo($college){
    $table = 'college';
    $errors = array();

    if(empty($college['college_Code'])){
        array_push($errors, 'College abbreviation is required!');
    }

    if(empty($college['college_Name'])){
        array_push($errors, 'Name of college is required!');
    }

    if(strlen($college['college_Code']) > 10){
        array_push($errors, 'College abbreviation should be not longer than 10 characters!');
    }

    $stillTheSameCollegeCode = selectOne($table, ['college_Code' => $college['college_Code'], 'college_ID' => $college['college_ID']]);
    $existingCollegeCode = selectOne($table, ['college_Code' => $college['college_Code']]);
    
    $stillTheSameCollegeName = selectOne($table, ['college_Name' => $college['college_Name'], 'college_ID' => $college['college_ID']]);
    $existingCollegeName = selectOne($table, ['college_Name' => $college['college_Name']]);

    if($stillTheSameCollegeName && !$existingCollegeName){
        return $errors;
    }
    if(!$stillTheSameCollegeName && $existingCollegeName){
        array_push($errors, 'Name of college is already used!');
    }

    if($stillTheSameCollegeCode && !$existingCollegeCode){
        return $errors;
    }
    if(!$stillTheSameCollegeCode && $existingCollegeCode){
        array_push($errors, 'College abbreviation  is already used!');
    }

    return $errors;
}

// For deleting college, validateAdminDelete() is used

function validateOrg($org){
    $table = 'organization';
    $errors = array();

    if($org['college_Code'] === 'default'){
        array_push($errors, 'Please select college affiliation!');
    }

    if(empty($org['org_Name'])){
        array_push($errors, 'Name is required!');
    }
    
    if(empty($org['org_Code'])){
        array_push($errors, 'Abbreviation is required!');
    }

    if(strlen($org['org_Code']) > 10){
        array_push($errors, 'Abbreviation should be not longer than 10 characters!');
    }

    if(empty($org['org_Username'])){
        array_push($errors, 'Username is required!');
    }
    
    if(empty($org['org_Email'])){
        array_push($errors, 'Email is required!');
    }

    if($org['org_Interest']  === 'default'){
        array_push($errors, 'Interest is required!');
    }
    
    if(empty($org['org_Password'])){
        array_push($errors, 'Password is required!');
    }

    if($org['org_Password'] !== $org['confirmpassword']){
        array_push($errors, 'Passwords do not match!');
    }

    $existingOrg = selectOne($table, ['org_Email' => $org['org_Email']]);
    if($existingOrg){
        array_push($errors, 'Email is already used!');
    }

    $existingOrgCode = selectOne($table, ['org_Code' => $org['org_Code']]);
    if($existingOrgCode){
        array_push($errors, 'Abbreviation is already used!');
    }

    $existingOrgUsername = selectOne($table, ['org_Username' => $org['org_Username']]);
    if($existingOrgUsername){
        array_push($errors, 'Username is already used!');
    }

    return $errors;
}

function validateEditOrgInfo($org){
    $table = 'organization';
    $errors = array();

    $org_code = $org['org_Code'];

    if($org['college_Code'] === 'default'){
        array_push($errors, 'Please select college affiliation!');
    }

    if(empty($org['org_Name'])){
        array_push($errors, 'Name is required!');
    }
    
    if(empty($org['org_Code'])){
        array_push($errors, 'Abbreviation is required!');
    }

    if(strlen($org['org_Code']) > 10){
        array_push($errors, 'Abbreviation should be not longer than 10 characters!');
    }

    if(empty($org['org_Username'])){
        array_push($errors, 'Username is required!');
    }
    
    if(empty($org['org_Email'])){
        array_push($errors, 'Email is required!');
    }

    if($org['org_Interest']  === 'default'){
        array_push($errors, 'Interest is required!');
    }

    
    $stillTheSameOrgUsername = selectOne($table, ['org_Username' => $org['org_Username'], 'org_Code' => $_GET['org_code']]);
    $existingOrgUsername = selectOne($table, ['org_Username' => $org['org_Username']]);
    
    $existingOrgCode = selectOne($table, ['org_Code' => $org['org_Code']]);

    $stillTheSameOrgEmail = selectOne($table, ['org_Email' => $org['org_Email'], 'org_Code' => $_GET['org_code']]);
    $existingOrgEmail = selectOne($table, ['org_Email' => $org['org_Email']]);
    
    if($_GET['org_code'] === $org['org_Code']){
        return $errors;
    }
    if($_GET['org_code'] !== $org['org_Code']){
        if($existingOrgCode){
            array_push($errors, 'Org abbreviation is already used!');
        }
    }

    if($stillTheSameOrgUsername && !$existingOrgUsername){
        return $errors;
    }
    if(!$stillTheSameOrgUsername && $existingOrgUsername){
        array_push($errors, 'Username is already used!');
    }

    if($stillTheSameOrgEmail && !$existingOrgEmail){
        return $errors;
    }
    if(!$stillTheSameOrgEmail && $existingOrgEmail){
        array_push($errors, 'Email is already used!');
    }

    return $errors;
}