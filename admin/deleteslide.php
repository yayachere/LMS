<?php 
include('../dbcon.php');
 $id=$_GET['ID'];
	mysqli_query($conn,"delete from Slide where id='$id'")or die(mysqli_error());
	echo "<script>windows: location='manageslide.php'</script>";
								
							?>	