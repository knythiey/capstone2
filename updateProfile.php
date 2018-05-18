<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();

		function getTitle(){
			echo "Update Profile Page";
		}

		require "lib/connect.php";
		$user_id = $_SESSION['user_id'];
		$user_details = "SELECT * FROM users u JOIN user_status us JOIN user_type ut WHERE u.id = '$user_id' && u.user_type = ut.id && u.user_status = us.id;";
		$result = mysqli_query($conn, $user_details);
		?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1>Update Profile Page</h1>
		<div class="container register-form">
			<form action="lib/validateUserUpdate.php" method="POST">
				<?php foreach ($result as $key) { ?>
				
					<div class="form-group">
						<label for="username">Username:* </label><small id="usernameAvail"> (min.5 max.32 characters)</small>
						<input type="text" class="form-control" name="createUsername" id="createUsername" placeholder="Enter New Username" value="<?php echo $key['username'] ?>" maxlength="32" required>
					</div>

					<div class="form-group">
						<label for="password">Password:* </label><small id="passwordLength"></small>
						<input type="password" class="form-control" name="createPassword" id="createPassword" placeholder="Enter New Password" required>
					</div>

					<div class="form-group">
						<label for="confirmPassword">Confirm Password:* </label><small id="passwordMatch"></small>
						<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm New Password" required>
					</div>

					<div class="form-group">
						<label for="email">Email:* </label><small id="emailAvail">Enter a valid Email Address</small>
						<input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Enter email" value="<?php echo $key['email'] ?>" required>
					</div>

					<div class="form-group">
						<label for="firstName">First Name:* </label><small id="validFirstname"></small>
						<input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" value="<?php echo $key['first_name'] ?>" required>
					</div>

					<div class="form-group">
						<label for="lastName">Last Name:* </label><small id="validLastname"></small>
						<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" value="<?php echo $key['last_name'] ?>" required>
					</div>

					<div class="form-group">
						<label for="gender">Gender:* </label>
						<input type="radio" name="gender" value="male" required class="radioGender"> Male
						<input type="radio" name="gender" value="female" class="radioGender"> Female
					</div>

					<?php if(isset($_SESSION['current_user']) && $_SESSION['user_type'] == "admin"){ ?>
							<div class="form-group">
								<label for="userType">User Type: (Admin Account Only)</label>
								<select name="userType" id="userType">
									<option value="1" required>admin</option>
									<option value="2">user</option>
								</select>
							</div>
					<?php } ?>

				<?php } ?>
				<button class="btn btn-primary" type="submit" id="registerbtn">Update User Profile</button>
			</form>
		</div><!--container-->
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>