<?php
session_start();
$_SESSION =  array();
session_destroy();
header("Location: http://localhost/Bash/index.php")
?>