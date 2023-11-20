<?php include 'include/header.php'; ?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../assets/img/animals.jpg');">
			<div class="wrap-login100">

			<form action="../backend/crude.php" method="POST" id="add-staff" class="login100-form validate-form" enctype="multipart/form-data"> <!--dont edit-->	

				<input type="hidden" name="roles" value="add-schedule">	

					<span class="login100-form-logo">
						<i class="zmd">
						    <img id="image-preview" src="../../assets/img/logo.png" alt="" width="100%" height="auto">
						</i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Appointment Registration
					</span>
					<?php 
						if (isset($_GET['referral_no'])) {
							// Retrieve the referral number from the URL
							$referral_no = $_GET['referral_no'];
					?>
					<div class="form-container">
						<span class="login100-form-title" style="font-size:20px">
							Add Appointment
						</span>
					</div>
					<input type="hidden" name="referrals" value="<?php echo $referral_no?>">	

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate="staff">
						<?php
							include '../backend/connection.php';

							$sql = "SELECT * FROM `staff` WHERE `position` LIKE '%Doctor%'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								echo '<select class="select-style input100" name="staff" id="staff" required>';
								echo '<option value="" disabled selected style="color:black; background-color: #ffff00">Select Doctor</option>';

								// Output data of each row
								while ($row = $result->fetch_assoc()) {
									// Display the full name of the staff
									$fullName = $row['firstname'] . ' ' . $row['lastname'];
									echo '<option value="' . $row['staff_id'] . '" style="color:black">' . $fullName . '</option>';
								}

								echo '</select>';
								echo '<span class="focus-input100" data-placeholder="&#xf207;"></span>';
							}
						?>
						</div>
						<br> <!-- Move this line inside the PHP block -->
						<div class="wrap-input100 validate-input" data-validate="services">
						<?php

							$services_sql = "SELECT `services_title` FROM `services`";
							$result_of_services = $conn->query($services_sql);

							if ($result_of_services->num_rows > 0) {
								echo '<select class="select-style input100" name="services" id="services"  required>';
								echo '<option value="" disabled selected style="color:black; background-color: #ffff00">Select Service</option>';

								// Output data of each row
								while ($services = $result_of_services->fetch_assoc()) {
									// Display the full name of the staff
									echo '<option value="' . $services['services_title'] . '" style="color:black">' . $services['services_title'] . '</option>';
								}

								echo '</select>';
								echo '<span class="focus-input100" data-placeholder="&#xf207;"></span>';
							}
						?>
						</div>
					</div>

					<div class="form-container">
						<div class="wrap-input100 validate-input" data-validate="Start Date">
							<input class="input100" type="datetime-local" name="startdate" id="startdate" placeholder="Start Date"  required> 
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>	

						<div class="wrap-input100 validate-input" data-validate="status">
						<?php
							$options = array("Done", "Admitted", "Consultation");

							echo '<select class="select-style input100" name="status" id="status" required>';
							echo '<option value="" disabled selected style="color:black; background-color: #ffff00">Select Status</option>';

							foreach ($options as $option) {
								$selected = ($row['appointment_status'] == $option) ? "selected" : "";
								echo "<option value='$option' $selected style='color:black'>$option</option>";
							}

							echo '</select>';
							echo '<span class="focus-input100" data-placeholder="&#xf207;"></span>';
						?>
						</div>	
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" style="background-color: green">
							<i class="fas fa-check" style="color:white"></i> 
						</button>
						<a href="../login-form/add-appointment.php">
							<button type="button" class="login100-form-btn" style="background-color: green">
								<i class="fas fa-times" style="color:white"></i> 
							</button>
						</a>
					</div>
					
				</form>
				<?php 
					} else {
						echo "Referral Number not provided in the URL.";
					}
				?>
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

<?php include 'include/footer.php'; ?>
