<?php include('../dbcon.php');?>
<?php
$idd=$_GET['ID'];
mysqli_query($conn,"Delete from appointment where id='$idd'") or die(mysqli_error());
header('location:appointment.php');
?>