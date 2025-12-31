<?php
session_start();
session_unset();
session_destroy();
header('Location: ../user-validation/index.php');
exit;
?>