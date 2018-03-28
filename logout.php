<?php
session_start();
session_destroy();
unset($_SESSION['kplname']);
$_SESSION['message'] = "You are LoGGED OUT";
header("location: keep_track.php");
?>