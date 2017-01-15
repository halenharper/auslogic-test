<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Retrieve my data</title>
	<link rel = "stylesheet" href = "/css/style.css">
</head>
<body>
<div class="container">
	<form id="action-form" action = "index.php?action=mail" method="post">
		<div id="form-name">
			<span>Retrieve your phone number</span>
		</div>
		<div id="option-name">
			Option 2. Retrieve your phone<br> number
		</div>
		<div class="form-group">
			<label for = "email">
				Enter your e-mail <sup>*</sup>:
				<input type = "text" id="email" name="email" required>
			</label>
		</div>
		<p>
			The phone number will be e-mailed<br> to you.
		</p>
		<input type = "submit" value="Submit">
	</form>
</div>
</body>
</html>