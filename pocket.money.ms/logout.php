<?php
session_start();
session_destroy();
unset($_SERVER['userId']);
header("location:index.php");
exit();
?>