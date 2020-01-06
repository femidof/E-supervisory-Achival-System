<?php
$db = new mysqli('localhost', 'root', '', 'eee');

function fetchAllUsers(){
    global $db;
    $data = $db->query("SELECT * FROM supervisors WHERE super_user = '".$_SESSION["superUid"]."' ");
    return $data;
}

function fetchUser($id){
    global $db;
    $data = $db->query("SELECT * FROM supervisors")->fetch_assoc();
    return $data;
}


function updateProfile($ID,$fullname,$department,$nationality,$stateoforigin){
    global $db;
    $query = $db->query("UPDATE supervisors SET super_fullname='$fullname',super_department='$department',super_nationality='$nationality',stateoforigin='$stateoforigin' WHERE super_id=$ID");
    return $query?1:0;
}

function fetchAllProjects(){
    global $db;
    $data = $db->query("SELECT c.*, p.* FROM request c, supervisors p WHERE c.super_id = p.super_id AND p.super_user = '".$_SESSION["superUid"]."' ");
    return $data;
}

function fetchAllSubmissions(){
    global $db;
    $data = $db->query("SELECT p.*, q.*, r.*, s.* FROM supervisors p, submission q, request r, users s WHERE  r.stud_id = s.idUsers AND q.submitted_by = s.uidUsers AND p.super_id = q.super_id AND p.super_user = '".$_SESSION["superUid"]."' ");
    return $data;
}

/*function fetchFullname(){
    global $db;
    $data = $db->query("SELECT p.*, q.* FROM request p, users q WHERE  p.stud_id = q.idUsers");
    return $data;
}*/

function reviewProject($id){
    global $db;
    $data = $db->query("SELECT * FROM submission WHERE id=$id")->fetch_assoc();
    return $data;
}

function submitReport($id,$report){
    global $db;
    $query = $db->query("UPDATE submission SET report = '$report' WHERE submission_id=$id");
    return $query?1:0;
}

function deleteSubmission($ID){
    global $db;
    $query = $db->query("DELETE FROM submission WHERE submission_id=$ID");
    return $query?1:0;
}

?>
