<?php
$db = new mysqli('localhost', 'root', '', 'eee');

function fetchAllUsers(){
    global $db;
    $data = $db->query("SELECT * FROM users WHERE uidUsers = '".$_SESSION["userUid"]."' LIMIT 1");
    return $data;
}

function fetchUser($id){
    global $db;
    $data = $db->query("SELECT * FROM users WHERE idUsers=$id")->fetch_assoc();
    return $data;
}

function fetchUsername(){
    global $db;
    $data = $db->query("SELECT uidUsers FROM users WHERE uidUsers = '".$_SESSION["userUid"]."' LIMIT 1")->fetch_assoc();
    return $data;
}

function updateProfile($ID,$username,$firstname,$lastname,$middlename,$department,$course,$nationality,$stateoforigin){
    global $db;
    $query = $db->query("UPDATE users SET uidUsers='$username',firstname='$firstname',lastname='$lastname',middlename='$middlename',department='$department',course='$course',nationality='$nationality',stateoforigin='$stateoforigin' WHERE idUsers=$ID");
    return $query?1:0;
}

function fetchData(){
    global $db;
    $data = $db->query("SELECT idUsers FROM users WHERE uidUsers = '".$_SESSION["userUid"]."' ");
    return $data;
}


function createRequest($project_name,$project_department,$requested_by, $userId){
    global $db;
    $query = $db->query("INSERT INTO request SET project_name='$project_name',project_department='$project_department',requested_by='$requested_by',stud_id='$userId'");
    return $query?1:0;
}

function fetchValidProjects(){
    global $db;
    $data = $db->query("SELECT * FROM request");
    return $data;
}

function fetchAllRequests(){
    global $db;
    $data = $db->query("SELECT c.*, p.* FROM request c, supervisors p WHERE c.super_id = p.super_id AND requested_by = '".$_SESSION["userUid"]."' ");
    return $data;
}

function fetchDocument($id){
    global $db;
    $data = $db->query("SELECT * FROM request WHERE id=$id")->fetch_assoc();
    return $data;
}

function submitProject($project_name,$project_department,$submitted_by,$supervisor, $proj_id){
    global $db;
    $query = $db->query("INSERT INTO submission SET project_name='$project_name',project_department='$project_department',submitted_by='$submitted_by', super_id='$supervisor', id = '$proj_id'");
    return $query?1:0;
}
?>
