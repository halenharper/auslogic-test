<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Retrieve my data</title>
</head>
<body>
<div class="container">
	<form id="store-form" action = "index.php?action=mail" method="post">
		<h4>Option 2. Retrieve your phone number</h4>
		<div class="form-group">
			<label for = "email">
				Enter your e-mail <sup>*</sup>:
				<input type = "text" id="email" name="email" required>
			</label>
		</div>
		<p>
			The phone number will be e-mailed to you.
		</p>
		<input type = "submit" value="Submit">
	</form>
</div>
</body>
</html>