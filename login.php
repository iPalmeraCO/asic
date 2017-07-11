<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
		<div class="container">
			<form form class="form-horizontal" action="login.php" method="post">
				<div class="alert alert-success" role="alert">
					<?php 
						include("authenticate.php");
						$result = "Submit Form!";
						if(isset($_POST['submit'])){
							$result = authenticate($_POST['userGroup'], $_POST['userLogin'], $_POST['userPassword']);
						}
						echo $result;
					?>
				</div>
				<div class="form-group">
					<label for="userGroup">Group</label>
					<select class="form-control" id="userGroup" name="userGroup" required>
					  <option value="Domain Users">Domain Users</option>
					</select>
				</div>
				<div class="form-group">
					<label for="userLogin">User</label>
					<input type="text" class="form-control" id="userLogin" name="userLogin" placeholder="Login" value="Intranet" required>
				</div>
				<div class="form-group">
					<label for="userPassword">Password</label>
					<input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="1NtR4N3t451c" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
				</div>
			</form>
		</div>
	<body>
<html>
