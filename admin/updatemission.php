<?php 
include('../dbcon.php');
 $id=$_REQUEST['ID'];
 $status="On";
 $stat="Off";
 $querys = mysqli_query($conn,"SELECT * FROM mission where status='$status' ");
 $rows = mysqli_fetch_array($querys);
 $idnum= $rows['id'];
 mysqli_query($conn,"Update mission set status='$stat' where id='$idnum'")or die(mysqli_error());
 mysqli_query($conn,"Update mission set status='$status' where id='$id'")or die(mysqli_error());
 echo "<script>windows: location='managemission.php'</script>";
?>	