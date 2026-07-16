<?php
$conn=mysqli_connect('localhost','root','root','tokoonlines');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
