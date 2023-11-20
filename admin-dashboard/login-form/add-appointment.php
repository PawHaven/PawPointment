<?php include 'include/header.php'?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../assets/img/animals.jpg');">
			<div class="wrap-login100">

			<form action="../backend/crude.php" method="POST" id="add-staff" class="login100-form validate-form" enctype="multipart/form-data"> <!--dont edit-->	

				<input type="hidden" name="roles" value="add-walk-in-pet">	

					<span class="login100-form-logo">
						<i class="zmd">
						    <img id="image-preview" src="../../assets/img/logo.png" alt="" width="100%" height="auto">
						</i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Add Customer & Animal Information
					</span>

					<div class="form-container">
						<span class="login100-form-title" style="font-size:20px">
							Customer Information
						</span>
					</div>

					<div class="form-container">

						<div class="wrap-input100 validate-input" data-validate = "Last Name">
							<input required class="input100" type="text" name="lname" id="lname" placeholder="Last Name"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" data-validate = "First Name">
							<input required class="input100" type="text" name="fname" id="fname" placeholder="First Name"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" data-validate = "Middle Initial">
							<input required class="input100" type="text" name="mname" id="mname" placeholder="Middle Initial"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
					</div>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate = "Address">
							<input required class="input100" type="text" name="address" id="address" placeholder="House Address"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" data-validate = "Contact">
							<input required class="input100" type="tel" name="contact" id="contact" placeholder="Enter Contact Number">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
					</div>

					<div class="form-container">
						<span class="login100-form-title" style="font-size:20px">
							Animal Information
						</span>
					</div>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate="Animal Name">
							<input required class="input100" type="text" name="animal" id="animal" placeholder="Animal Name"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" style="width:20%; margin-left:5%" data-validate="Age">
							<input required class="input100" type="number" name="age" id="age" placeholder="Age" oninput="updateUnits()"> 
							<select class="input100" name="age_unit" id="age_unit">
							<option value="months" style="color: black">Months</option>
    						<option value="years" style="color: black">Years</option>
							</select>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" style="width:20%; margin-left:5%" data-validate="Quantity">
							<input required class="input100" type="number" name="quantity" id="quantity" placeholder="Quantity"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
					</div>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate="Breed">
							<input required class="input100" type="text" name="breed" id="breed" placeholder="Breed"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" data-validate="Species">
							<input required class="input100" type="text" name="species" id="species" placeholder="Species"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>				
					</div>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate="Gender">
							<select class="select-style input100" name="Animal-gender" id="Animal-gender" required>
								<option value="" disabled selected style="color:black">Select Sex</option>
								<option value="Male" style="color:black">Male</option>
								<option value="Female" style="color:black">Female</option>
								<option value="Other" style="color:black">Other</option>
							</select>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<br>
						<div class="wrap-input100 validate-input" data-validate="Birthdate">
							<input class="input100" type="date" name="birthdate" id="birthdate" placeholder="Birthdate"> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>					
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" style="background-color: green">
							<i class="fas fa-check" style="color:white"></i> 
						</button>
						<a href="../walk-in.php">
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
		function updateUnits() {
		var ageInput = document.getElementById('age');
		var unitSelect = document.getElementById('age_unit');
		
		// Check if age is greater than 11
		if (parseInt(ageInput.value) > 11) {
			// If greater than 11, set the unit to "Months"
			unitSelect.value = 'years';
		} else {
			// Otherwise, set the unit to "Years"
			unitSelect.value = 'months';
		}
		}
	</script>

<?php include 'include/footer.php' ?>