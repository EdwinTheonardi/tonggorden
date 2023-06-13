<?php
include "../config/connection.php";

$idstaff = mysqli_real_escape_string($conn,$_GET['id']);

$sql = "DELETE FROM users WHERE idstaff='$idstaff' ";
mysqli_query($conn,$sql);

?>


