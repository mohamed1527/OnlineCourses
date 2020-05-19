<?php
//require_once(__ROOT__ . "controller/Controller.php");
session_start();

session_destroy();
header("Location:index.php");
?>