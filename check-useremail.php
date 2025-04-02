<?php
    include ('connect.php');
    $email = $_POST['email_id'];
    $event = $_POST['event'];
	
    $sql = "SELECT * FROM `gcp_datadog_registration` where email_id ='".$email."' AND event='".$event."' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    	echo 'false';
    } else {
    	echo 'true';
    }
?>