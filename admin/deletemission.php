<?php 
include('../dbcon.php');
 $id=$_GET['ID'];
	mysqli_query($conn,"delete from mission where id='$id'")or die(mysqli_error($conn));
	echo "<script>windows: location='managemission.php'</script>";
								
		