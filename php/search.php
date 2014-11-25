<?php
require('config.php');

$result = $mysqli->query("SELECT USERNAME FROM USERS LIMIT 0,10");
    while ($row = $result->fetch_object()){
         $user_array[] = $row->USERNAME;
     }
     $result->close();
     echo json_encode($user_array);
?>