<?php
$db = new mysqli('localhost', 'root', '', 'eee');

function fetchAllUsers(){
    global $db;
    $data = $db->query("SELECT * FROM users ");
    return $data;
}

function fetchUser($id){
    global $db;
    $data = $db->query("SELECT * FROM users")->fetch_assoc();
    return $data;
}

function createSuper($username,$email,$password,$fullname,$department,$nationality,$stateoforigin){
    global $db;
    $query = $db->query("INSERT INTO supervisors SET super_user='$username',super_email='$email',super_pass='$password',super_fullname='$fullname',super_department='$department',super_nationality='$nationality',stateoforigin='$stateoforigin'");
    return $query?1:0;
}

function deleteSuper($ID){
    global $db;
    $query = $db->query("DELETE FROM supervisors WHERE super_id=$ID");
    return $query?1:0;
}


function deleteRequest($ID){
    global $db;
    $query = $db->query("DELETE FROM request WHERE id=$ID");
    return $query?1:0;
}

function fetchRequest($id){
    global $db;
    $data = $db->query("SELECT * FROM request where id = '$id'")->fetch_assoc();
    return $data;
}

function respondToRequest($id,$status,$supervisor){
    global $db;
    $query = $db->query("UPDATE request SET  status = '$status', proj_supervisors = '$supervisor', super_id = '$supervisor'  WHERE id=$id");
    return $query?1:0;
}

function fetchAllSubmissions(){
    global $db;
    $data = $db->query("SELECT p.*, q.* FROM supervisors p, submission q WHERE  p.super_id = q.super_id ");
    return $data;
}

function reviewProject($id){
    global $db;
    $data = $db->query("SELECT * FROM submission WHERE submission_id=$id")->fetch_assoc();
    return $data;
}

function viewReport($id){
    global $db;
    $data = $db->query("SELECT report FROM submission where submission_id = '$id'")->fetch_assoc();
    return $data;
}

function submitProject($proj_name,$proj_dep){
    global $db;
    $query = $db->query("INSERT INTO project SET project_name='$proj_name',project_department='$proj_dep'");
    return $query?1:0;
}
?>
