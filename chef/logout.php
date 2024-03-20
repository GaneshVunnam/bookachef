<?php
session_start();
// session_unset();
// session_destroy();

unset($_SESSION['cid']);
unset($_SESSION['chefname']);
unset($_SESSION['chefemail']);
unset($_SESSION['usertype']);
unset($_SESSION['chef_logged_in']);

header('location:index.php');
?>