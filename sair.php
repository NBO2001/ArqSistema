<?php
session_start();
unset ($_SESSION['msg']);
header("Location:index.php");
 ?>
