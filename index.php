<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Microsoft | X RoundTable Conference</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css'>
		<link rel="stylesheet" type="text/css" href="css/my-style.css">
        <style>
            .error{
            color:red;
            }
        </style>
    </head>
    <body>
        <?php 
            if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') 
            {
            	include 'connect.php';
            	
            	$first_name 	= trim(mysqli_real_escape_string($conn,$_POST['first_name']));
            	$last_name  	= trim(mysqli_real_escape_string($conn,$_POST['last_name']));
            	$company_name	= trim(mysqli_real_escape_string($conn,$_POST['company_name']));
            	$designation 	= trim(mysqli_real_escape_string($conn,$_POST['designation']));
            	$email_id 		= trim(mysqli_real_escape_string($conn,$_POST['email_id']));
            	$mobile_number 	= trim(mysqli_real_escape_string($conn,$_POST['mobile_number']));
				$industry 		= trim(mysqli_real_escape_string($conn,$_POST['industry']));
				$city 			= trim(mysqli_real_escape_string($conn,$_POST['city']));
				
            	$tncs1  		= trim(stripslashes($_POST['tncs1']));
            	//$tncs2 		 	= trim(stripslashes($_POST['tncs2']));
				$full_name 		= ucfirst($first_name)." ".ucfirst($last_name);
            
            	$utm_source	 	= isset($_POST['utm_source']) ? trim(stripslashes($_POST['utm_source'])) :'';
            	$utm_medium	 	= isset($_POST['utm_medium']) ? trim(stripslashes($_POST['utm_medium'])) :'';
            	$utm_campaign	= isset($_POST['utm_campaign']) ? trim(stripslashes($_POST['utm_campaign'])) :'';
            
            	
            	$ip_address = $_SERVER['REMOTE_ADDR'];  	
            	$timezone = new DateTimeZone("Asia/Kolkata");	
            	$date 	  = new DateTime();	
            	$date->setTimezone($timezone);		
            	$register_date 	=	$date->format('Y:m:d');	
            	$register_time 	=	$date->format('H:i:s');
            	
				$event = "gcp_datadog_bangalore";
				
            	if($first_name != '' && $last_name != '' && $designation != '' && $email_id != '' && $mobile_number !="" && $company_name!='' )
            	{
            		$check_login = $conn->query("INSERT INTO `gcp_datadog_registration`(`first_name`, `last_name`, `designation`, `email_id`, `mobile_number`, `industry`, `city`, `company_name`, `event`,`term_condition1`,`ip_address` ,`register_date`, `register_time`, `utm_source`, `utm_medium`, `utm_campaign`)VALUES('".$first_name."','".$last_name."','".$designation."','".$email_id."','".$mobile_number."','".$industry."','".$city."','".$company_name."','".$event."','".$tncs1."','".$ip_address."','".$register_date."','".$register_time."','".$utm_source."','".$utm_medium."','".$utm_campaign."')" );
            		if(empty($check_login))
            		{
            			?>
					<script type="text/javascript">alert("Sorry!something went wrong");window.location="index.php";</script>	
						<?php
					}else{						
						echo '<script>window.location = "thanks.php";</script>';	
					}
            }else {  ?>
        <script type="text/javascript">alert("Please fill up all the form fields!");
            window.location="index.php";
        </script>
        <?php
            }
            } ?>
       <header class="header-con">
			<div class="container">
				<div class="col-12"><img src="images/header.jpg" class="img-fluid" alt=""/> </div>
			</div>
		</header>
        <section>
            <div class="container">
				<div class="row" style="padding: 0 12px;">
					<div class="col-12 form-con mb-5 pt-5 pb-5">		
						<!--<h4 class="text-center">Registration has been closed</h4>-->
						
					 <form name="addForm" id="addForm" method="post" >
					<input type="hidden" name="utm_source" value="<?php echo @$_GET['utm_source']; ?>">
					<input type="hidden" name="utm_medium" value="<?php echo @$_GET['utm_medium']; ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo @$_GET['utm_campaign']; ?>">
					<input type="hidden" name="event" id="event" value="gcp_datadog_bangalore">
					<div class="row row-cols-lg-2 row-cols-1">
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>First Name</label>
								<input type="text" class="form-control" id="" name="first_name">
							</div>
						</div>


						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>Last Name</label>
								<input type="text" class="form-control" id="" name="last_name">
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>Company Name</label>
								<input type="text" class="form-control" id="" name="company_name">
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>Designation</label>
								<input type="text" class="form-control" id="" name="designation">
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>Official Email Id</label>
								<input type="email" class="form-control" id="email_id" name="email_id">
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>Contact No.</label>
								<input type="number" class="form-control" id="" name="mobile_number">
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>Industry</label>
								<select class="form-select" name="industry" id="industry">
							    <option value="">-Select-</option>
								    <option value="Aerospace">Aerospace</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Automotive">Automotive</option>
                                    <option value="Computers & Electronics">Computers & Electronics</option>
                                    <option value="Consumer Goods">Consumer Goods</option>
                                    <option value="Education">Education</option>
                                    <option value="Financial Services">Financial Services</option>
                                    <option value="Gaming">Gaming</option>
                                    <option value="Government">Government</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Hospitality">Hospitality</option>
                                    <option value="Life Sciences">Life Sciences</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Marketing & Advertising">Marketing & Advertising</option>
                                    <option value="Media & Entertainment">Media & Entertainment</option>
                                    <option value="Mining">Mining</option>
                                    <option value="Non-Profit Organization">Non-Profit Organization</option>
                                    <option value="Oil & Gas">Oil & Gas</option>
                                    <option value="Other">Other</option>
                                    <option value="Power & Utilities">Power & Utilities</option>
                                    <option value="Professional Services">Professional Services</option>
                                    <option value="Real Estate & Construction">Real Estate & Construction</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Software & Internet">Software & Internet</option>
                                    <option value="Telecommunications">Telecommunications</option>
                                    <option value="Transportation & Logistics">Transportation & Logistics</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Wholesale & Distribution">Wholesale & Distribution</option>

							  </select>
							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label">
								<span class="text-danger">*</span>City</label>
								<input type="text" class="form-control" id="city" name="city">
							</div>
						</div>
						<div class="col mb-3 w-100">
							<label class="error_div">
								<input type="checkbox" name="tncs1" id="tncs1" value="Yes"> 
								<span>  I agree to the Terms of Service and Privacy Policy (<a href="https://id8nxt.com/wp-content/uploads/2023/11/Privacy_Policy_ID8NXT.pdf" target="_blank" style="color: #ff9900; position: relative; z-index: 9;">https://id8nxt.com/privacy-policy</a>) of id8nxt.</span>
							</label>
						</div>
						<div class="col mt-3">
							<div class="mb-3">
								<input type="submit" name="submit" class="btn-default w-100 text-uppercase" value="Submit">
							</div>
						</div>									
					</div>	
						</form>
					</div>
				</div>				
            </div>
        </section>
		<footer class="bg-dark pt-5 pb-3">
			<div class="container">
				<div class="row">
					<div class="col-12 text-white text-center">
						<p>Copyright © 2025 ID8NXT All Rights Reserved.</p>
					</div>
				</div>
			</div>	
		</footer>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>	
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

				jQuery.validator.addMethod("validate_email", function(value, element) {

				if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
					return true;
				} else {
					return false;
				}
				}, "Please enter a valid Email.");

            	$("#addForm").validate({
                   rules:
                   {
                      'first_name': {
                        required: true
                      },
                      'last_name': { 
                        required: true,
                      },
            		  'designation': { 
                        required: true,
                      }, 
					 'email_id': {
                        required: true,
						email:true,
						validate_email:true,
						 remote: {
							url: "check-useremail.php",
							type: "post",
							data: {
									email: function() {
										return $("#email_id" ).val();
									},
									event: function() {
										return $("#event" ).val();
									}
								}
							}
                      },
                      'mobile_number': { 
                        required: true,
                      },
            		  'city': { 
                        required: true,
                      },
					 'company_name': { 
                        required: true,
                      },
					  'industry': { 
                        required: true,
                      },
					  'tncs1': { 
                        required: true,
                      },
					/*'tncs2': { 
                        required: true,
                      },*/
                      
                   }, 
				   messages:{
					email_id : {
						require :'Email Id is required',
						email: "Email Id is not Valid",
						validate_email : "Email ID is not Valid",
						remote: "Email already Registered",
					}
				   },
                   errorElement: 'p',
                   errorPlacement: function (error, element) 
            	  {
            			if(element.is( ":radio" ) || element.is( ":checkbox" )){
						error.insertAfter(element.parents('.error_div'));
					}
					else {
						error.insertAfter(element);
					}
                   }
                });
            });
        </script>		
    </body>
</html>
