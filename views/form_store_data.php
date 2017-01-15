<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Add phone number</title>
	<link rel = "stylesheet" href = "/css/style.css">
</head>
<body>
<div class="container">
	<form id="action-form" action = "index.php?action=store" method="post">
		<div id="form-name">
			<span>Add your phone number</span>
		</div>
		<div id="option-name">
			Option 1. Add your phone<br> number
		</div>
		<div class="form-group">
			<label for = "phone">
				Enter your PHONE:<br>
				<input type = "text" id="phone" name="phone">
			</label>
		</div>
		<div class="form-group">
			<label for = "email">
				Enter your e-mail <sup>*</sup>:<br>
				<input type = "text" id="email" name="email" required>
			</label>
		</div>
		<p>
			Your will be able to retrieve your phone<br> number later on using your e-mail.
		</p>
		<input type = "submit" value="Submit">
	</form>
</div>
</body>
</html>