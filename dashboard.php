<?php
session_start();

if(isset($_SESSION["Login"])){
	echo "ok";
}
else{
	header("Location: index.php");
}
?>