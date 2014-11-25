<?php
$con = new mysqli("localhost", "root", "muffinman", "foosball");

$result = $con->query("SELECT USERNAME FROM USERS LIMIT 0,10");
    while ($row = $result->fetch_object()){
         $user_arr2[] = $row->USERNAME;
     }
     $result->close();
     echo json_encode($user_arr2);
?>