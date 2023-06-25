<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD ADMIN</title>
	
	<link rel="icon" type="image/png" href="images/absradio.png"/>

</head>
<body>
	<?php
	// include_once "frontheader.php";

	?>

	<main>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>ADD ADMIN.<p style="font-size:10px ; ">(Must be Online to Add Admin)<span style="color:red; font-size: 16px;">*</span></p></h2>



					<form action="" method="post" class="form-control">
						<div class="mb-3">
							<label class="form-label">Firstname:</label>
							<input type="text" name="firstname" id="firstname" style="border-left:5px solid red ;" class="form-control" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; } ?>">
						</div>

						<div class="mb-3">
							<label class="form-label">Lastname:</label>
							<input type="text" name="lastname" id="lastname" style="border-left:5px solid red ;" class="form-control" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>">
						</div>


		<div class="mb-3">
		<label class="form-label">E-mail:</label>
		<input type="text" name="email" style="border-left: 5px solid red;" id="email" class="form-control input" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
	</div>


		<div class="mb-3">
		<label class="form-label">Password:</label>
		<input type="password" name="password" style="border-left: 5px solid red;" id="password" class="form-control input">
	</div>

	<div class="mb-3">
		<label class="form-label">Phone number:</label>
		<input type="tel" name="phone" style="border-left: 5px solid red;" id="phone" class="form-control input" placeholder="+234" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } ?>">
	</div>




	<div class="mb-3">
		<label class="form-label">Employer Id Number:</label>
		<input type="text" name="staff" style="border-left:5px solid red " id="staff" class="form-control input">
	</div>

	<div  class="mb-3">
		<label class="form-label">Role</label>
		<select class="form-select" name="role" id="role" style="border-left:5px solid red;">
			<option>Select Role</option>
			<?php

			include_once "abs/admin.php";

			//create object 

			$obj = new Admin();

			//make Reference 
			$role = $obj->getRole();

			if (count($role)>0) {
				foreach ($role as $key => $value) {
					// code...
				
				$role_id = $value['ROLE_ID'];
				$role_name = $value['ROLE_NAME'];

				echo "<option value='$role_id'>$role_name</option>";
			}
		}


			?>

		</select>
	</div>
		<div class="mb-3">
			
			<input type="checkbox" name="check" id="check1" value="check" > <label>Agree to <a>Terms and Condition</a></label>
			
		</div>	


	<div class="mb-3">

	<input type="submit" id="create" name="submit" value="ADD ADMIN" class="btn btn-warning mt-3 form-control"  style="background-color:#486db3; color:white;" disabled>
		</div>

					</form>
				</div>
			</div>
		</div>
	</main>

	<!-- J QUERY -->
<script type="text/javascript" src="jquery.min.js"></script>

	<!-- javascript -->
	<script type="text/javascript" language="Javascript">
		//$(selector).action()

	$("#check1").click(function(){
		if($(this).prop("checked")== true){
			$("#create").prop("disabled", false);
		}else{
			$("#create").prop("disabled", true);
		}
	})

			



		

	</script>




</body>
</html>