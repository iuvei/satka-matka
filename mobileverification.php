<!DOCTYPE html>
<html>
<head>
<title>How to Implement OTP SMS Mobile Verification in PHP with TextLocal</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<div class="container">
		<div class="error"></div>
		<form id="frm-mobile-verification">
			<div class="form-heading">Mobile Number Verification</div>

			<div class="form-row">
				<input type="number" id="mobile" class="form-input"
					placeholder="Enter the 10 digit mobile">
			</div>

			<input type="button" class="btnSubmit" value="Send OTP"
				onClick="sendOTP();">
		</form>
	</div>
	
<div class="error"></div>
<div class="success"></div>
<form id="frm-mobile-verification">
	<div class="form-row">
		<label>OTP is sent to Your Mobile Number</label>		
	</div>

	<div class="form-row">
		<input type="number"  id="mobileOtp" class="form-input" placeholder="Enter the OTP">		
	</div>

	<div class="row">
		<input id="verify" type="button" class="btnVerify" value="Verify" onClick="verifyOTP();">		
	</div>
</form>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="verification.js"></script>
</body>
</html>
