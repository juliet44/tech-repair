<?php
	session_start();
	unset($_SESSION['juliet']);
	header("location:login.php");

?>