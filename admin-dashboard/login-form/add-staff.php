<?php include 'include/header.php'?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../assets/img/animals.jpg');">
			<div class="wrap-login100">

			<form action="../backend/crude.php" method="POST" id="add-staff" class="login100-form validate-form" enctype="multipart/form-data"> <!--dont edit-->	

				<input type="hidden" name="roles" value="add-staff">	

					<span class="login100-form-logo">
						<i class="zmd">
						    <img id="image-preview" src="../../assets/img/logo.png" alt="" width="100%" height="auto">
						</i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register Staff
					</span>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate = "Last Name">
							<input class="input100" required type="text" name="lname" id="lname" placeholder="Last Name"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "First Name">
							<input class="input100" required type="text" name="fname" id="fname" placeholder="First Name"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Middle Initial">
							<input class="input100" required type="text" name="mname" id="mname" placeholder="Middle Initial"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
					</div>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate = "Email">
							<input class="input100" type="email" name="email" placeholder="Email">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Password">
							<input class="input100" type="password" name="password" id="password" placeholder="Password">
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
						</div>
					</div>
					
					<div class="form-container">
						<div class="wrap-input100 validate-input">
							<select class="select-style input100" name="gender" id="gender" required>
								<option value="" disabled selected style="color:black">Select Gender</option>
								<option value="Male" style="color:black">Male</option>
								<option value="Female" style="color:black">Female</option>
								<option value="Other" style="color:black">Other</option>
							</select>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						
						<div class="wrap-input100 validate-input">
							<select class="select-style input100" id="position" name="position" onchange="showTextBox()" required>
								<option value="" disabled selected style="color: black">Select Position</option>
								<option value="Staff" style="color: black">Staff</option>
								<option value="Doctor 1" style="color: black">Doctor 1</option>
								<option value="Doctor 2" style="color: black">Doctor 2</option>
								<option value="Doctor 2" style="color: black">Doctor 3</option>
								<option value="Cashier" style="color: black">Cashier</option>
								<option value="Other" style="color: black">Other</option>
							</select>

							</select>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" style="background-color: green">
							<i class="fas fa-check" style="color:white"></i> 
						</button>
						<a href="../staff.php">
							<button type="button" class="login100-form-btn" style="background-color: green">
								<i class="fas fa-times" style="color:white"></i> 
							</button>
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<script>
		const fileInput = document.getElementById('edit-icon');
		const imagePreview = document.getElementById('image-preview');

		fileInput.addEventListener('change', function(event) {
			const selectedFile = event.target.files[0]; 

			if (selectedFile) {
				const reader = new FileReader();
				reader.onload = function() {
					imagePreview.src = reader.result;
				};
				reader.readAsDataURL(selectedFile);
			} else {
				imagePreview.src = '../../assets/img/logo.png';
			}
		});

	</script>

<?php include 'include/footer.php' ?>