<?php include('../dbcon.php');?>
<?php
$idd=$_GET['ID'];
mysqli_query($conn,"Delete from Feedback where id='$idd'") or die(mysqli_error());
header('location:feedback.php');
?>