<?php
require_once 'autoload.php';

$id = $_POST["id_user"];
$sql ="DELETE FROM klanten WHERE kla_id='$id' ";
ExecuteSQL($sql);
$_SESSION["user"] = [];
unset($_SESSION["user"] );
session_destroy();
session_start();
session_regenerate_id();
$_SESSION['msgs']['delete'] = "Your profile has been deleted!";
header("Location: ../../public/index.php");