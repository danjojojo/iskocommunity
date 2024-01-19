<?php
// DATABASE FUNCTIONS ARE WRITTEN HERE

session_start();
require('connect.php');


// Call this only when debugging!
function dd($value){
    echo "<pre>", print_r($value, true) ,"</pre>";
    die();
}

function executeQuery($sql, $data){
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = []){ 
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{
        $i = 0;
        foreach($conditions as $key => $value){
            if($i === 0){
                $sql = $sql. " WHERE $key =?";
            }
            else{
                $sql = $sql. " AND $key =?";
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectAllWithLimit($table, $start, $end){ 
    global $conn;
    $sql = "SELECT * FROM $table LIMIT ?,?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $start, $end);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectAllWithOrderLimit($table, $orderBy, $sort, $start, $end){ 
    global $conn;
    $sql = "SELECT * FROM $table ORDER BY $orderBy $sort LIMIT ?,?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $start, $end);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectOne($table, $conditions){
    global $conn;
    $sql = "SELECT * FROM $table";
    $i = 0;
    foreach($conditions as $key => $value){
        if($i === 0){
            $sql = $sql. " WHERE $key=?";
        }
        else{
            $sql = $sql. " AND $key=?";
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $record = $stmt->get_result()->fetch_assoc();
    return $record;
}

function selectOneUsingOr($table, $conditions){
    global $conn;
    $sql = "SELECT * FROM $table";
    $i = 0;
    foreach($conditions as $key => $value){
        if($i === 0){
            $sql = $sql. " WHERE $key=?";
        }
        else{
            $sql = $sql. " OR $key=?";
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $record = $stmt->get_result()->fetch_assoc();
    return $record;
}

function create($table, $data){
    global $conn;
    $sql = "INSERT INTO $table SET ";
    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            $sql = $sql . " $key=?";
        }
        else{
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}
// **********************************************************
// UPDATE
function updateStudent($table, $id, $data){
    global $conn;
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            $sql = $sql. " $key =?";
        }
        else{
            $sql = $sql. ", $key =?";
        }
        $i++;
    }
    $sql = $sql . " WHERE stud_ID = ?";
    $data['stud_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function updateAdmin($table, $id, $data){
    global $conn;
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            $sql = $sql. " $key =?";
        }
        else{
            $sql = $sql. ", $key =?";
        }
        $i++;
    }
    $sql = $sql . " WHERE admin_ID = ?";
    $data['admin_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function updateCollege($table, $id, $data){
    global $conn;
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            $sql = $sql. " $key =?";
        }
        else{
            $sql = $sql. ", $key =?";
        }
        $i++;
    }
    $sql = $sql . " WHERE college_ID = ?";
    $data['college_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}


function updateOrg($table, $id, $data){
    global $conn;
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach($data as $key => $value){
        if($i === 0){
            $sql = $sql. " $key = ? ";
        }
        else{
            $sql = $sql. ", $key = ? ";
        }
        $i++;
    }
    $sql = $sql . " WHERE created_At = ?";
    $data['created_At'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}
// **********************************************************
// DELETE
function deleteStudent($table, $id){
    global $conn;
    $sql = "DELETE FROM $table";
    $sql = $sql . " WHERE stud_ID = ?";
    $stmt = executeQuery($sql, ['stud_ID' => $id]);
    return $stmt->affected_rows;
}

function deleteAdmin($table, $id){
    global $conn;
    $sql = "DELETE FROM $table";
    $sql = $sql . " WHERE admin_ID = ?";
    $stmt = executeQuery($sql, ['admin_ID' => $id]);
    return $stmt->affected_rows;
}

function deleteCollege($table, $id){
    global $conn;
    $sql = "DELETE FROM $table";
    $sql = $sql . " WHERE college_ID = ?";
    $stmt = executeQuery($sql, ['college_ID' => $id]);
    return $stmt->affected_rows;
}

// **********************************************************
// SEARCH ADMIN
function searchAdmin($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM admin WHERE (admin_Username LIKE ?) OR (admin_Email LIKE ?) ";
    $stmt = executeQuery($sql, ['admin_Username' => $match, 'admin_Email' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchAdminRecent($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM admin WHERE (admin_Username LIKE ?) OR (admin_Email LIKE ?) ORDER BY created_At DESC";
    $stmt = executeQuery($sql, ['admin_Username' => $match, 'admin_Email' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchAdminAZ($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM admin WHERE (admin_Username LIKE ?) OR (admin_Email LIKE ?) ORDER BY admin_Username ASC";
    $stmt = executeQuery($sql, ['admin_Username' => $match, 'admin_Email' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchAdminZA($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM admin WHERE (admin_Username LIKE ?) OR (admin_Email LIKE ?) ORDER BY admin_Username DESC";
    $stmt = executeQuery($sql, ['admin_Username' => $match, 'admin_Email' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

// **********************************************************
// SEARCH STUDENT
function searchStudent($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM student WHERE (stud_Username LIKE ?) OR (stud_Webmail LIKE ?) ";
    $stmt = executeQuery($sql, ['stud_Username' => $match, 'stud_Webmail' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchStudentRecent($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM student WHERE (stud_Username LIKE ?) OR (stud_Webmail LIKE ?) ORDER BY created_At DESC";
    $stmt = executeQuery($sql, ['stud_Username' => $match, 'stud_Webmail' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchStudentAZ($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM student WHERE (stud_Username LIKE ?) OR (stud_Webmail LIKE ?) ORDER BY stud_Username ASC";
    $stmt = executeQuery($sql, ['stud_Username' => $match, 'stud_Webmail' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchStudentZA($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM student WHERE (stud_Username LIKE ?) OR (stud_Webmail LIKE ?) ORDER BY stud_Username DESC";
    $stmt = executeQuery($sql, ['stud_Username' => $match, 'stud_Webmail' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


// **********************************************************
// SEARCH COLLEGE
function searchCollege($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM college WHERE college_Name LIKE ? OR college_Code LIKE ?";
    $stmt = executeQuery($sql, ['college_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchCollegeRecent($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM college WHERE college_Name LIKE ? OR college_Code LIKE ? ORDER BY created_At DESC";
    $stmt = executeQuery($sql, ['college_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchCollegeAZ($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM college WHERE college_Name LIKE ? OR college_Code LIKE ? ORDER BY college_Name ASC";
    $stmt = executeQuery($sql, ['college_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchCollegeZA($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM college WHERE college_Name LIKE ?  OR college_Code LIKE ? ORDER BY college_Name DESC";
    $stmt = executeQuery($sql, ['college_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

// **********************************************************
// SEARCH ORG
function searchOrg($term, $orderBy, $sort){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM organization WHERE (org_Username LIKE ?) OR (org_Email LIKE ?) OR (org_Code LIKE ?) OR (org_Name LIKE ?) OR (college_Code LIKE ?) ORDER BY $orderBy $sort";
    $stmt = executeQuery($sql, ['org_Username' => $match, 'org_Email' => $match, 'org_Code' => $match, 'org_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchOrgRecent($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM organization WHERE (org_Username LIKE ?) OR (org_Email LIKE ?) OR (org_Code LIKE ?) OR (org_Name LIKE ?) OR (college_Code LIKE ?) ORDER BY created_At DESC";
    $stmt = executeQuery($sql, ['org_Username' => $match, 'org_Email' => $match, 'org_Code' => $match, 'org_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchOrgAZ($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM organization WHERE (org_Username LIKE ?) OR (org_Email LIKE ?) OR (org_Code LIKE ?) OR (org_Name LIKE ?) OR (college_Code LIKE ?) ORDER BY org_Name ASC";
    $stmt = executeQuery($sql, ['org_Username' => $match, 'org_Email' => $match, 'org_Code' => $match, 'org_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchOrgZA($term){
    $match = '%'.$term.'%';
    global $conn;
    $sql = "SELECT * FROM organization WHERE (org_Username LIKE ?) OR (org_Email LIKE ?) OR (org_Code LIKE ?) OR (org_Name LIKE ?) OR (college_Code LIKE ?) ORDER BY org_Name DESC";
    $stmt = executeQuery($sql, ['org_Username' => $match, 'org_Email' => $match, 'org_Code' => $match, 'org_Name' => $match, 'college_Code' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

// **********************************************************

function pagination($start, $rows_per_page, $table){
    $records = selectAll($table);
    $nr_of_rows = count($records);
    $pages = ceil($nr_of_rows / $rows_per_page);
    return $pages;
}
