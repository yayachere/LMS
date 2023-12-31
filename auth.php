								<?php
								include('dbcon.php');
	
								if (isset($_POST['login'])){
								session_start();
								$user_id =$_POST['username'];
								$password = $_POST['password'];
								$password=md5($password);
								
								$query = "SELECT * FROM users_account WHERE user_id='$user_id' && password='$password' ";
								$result = mysqli_query($conn,$query)or die(mysqli_error());
								$num_row = mysqli_num_rows($result);
								$row=mysqli_fetch_array($result);
								$row_id=$row['user_id'];
								$status=$row['account_status'];
								$row_email=$row['email'];
							    $user_type =$row["account_type"];
							    

					if( $num_row > 0 ) {                                  
						
						if($user_type=="Admin"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
										
									header('location:admin/index.php');
									$_SESSION['id']=$row_id;
                            }else{
                            	header('location:Deactive.php');
                            }}}

						else if($user_type=="hrm"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:hrm/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}

						else if($user_type=="finance"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:finance/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}

						else if($user_type=="registerar"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:registerar/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}
                        
                        else if($user_type=="head"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:head/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}
                        
                        else if($user_type=="instructor"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:instructor/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}

				        else if($user_type=="library"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:library/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}

						else if($user_type=="student"){
							$in1 = mysqli_query($conn,"select * from users_account where user_id='$user_id'");
				            if (mysqli_num_rows($in1) > 0) {
				                $in1 = mysqli_fetch_array($in1);
				                $status = $in1['account_status'];
				                if ($status == 'Active') {
									header('location:student/index.php');
									$_SESSION['id']=$row_id;
								}else{
									header('location:Deactive.php');
									    }}}			
									
									
                                 
									
									
									}
									else{ 
								header('location:accessdenied.php');
								}}
								
								?>