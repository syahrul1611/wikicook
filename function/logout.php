<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['masuk']);
header("Location:../index.php");
exit;
