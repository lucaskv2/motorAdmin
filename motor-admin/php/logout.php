<?php
session_start();
session_destroy();
header("location:../PAGES/inicio.php");
?>