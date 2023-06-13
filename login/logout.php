<?php

session_start();
unset($_SESSION["login"]);

header("Location: ../user/index.php");
exit;

?>