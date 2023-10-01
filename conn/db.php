<?php
$db=new mysqli("localhost","root","","timetable");
if($db->connect_error){
    echo "Please retry later";
}
