<?php
require_once("connection.php");
$arr = mysqli_fetch_array(mysqli_query($conn,"SELECT Count(*) FROM mesages WHERE status ='0'")) or die;
$msNumber = 0+ $arr["Count(*)"];