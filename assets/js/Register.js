
			window.onload = function () {
					let Password = document.forms["RegisterForm"]["password"];
					let retypePassword = document.getElementById("retype-password");
					Password.onchange = ConfirmPassword;
					retypePassword.onkeyup = ConfirmPassword;
					function ConfirmPassword() {
						retypePassword.setCustomValidity("");
						if (Password.value != retypePassword.value) {
							retypePassword.setCustomValidity("Passwords do not match.");
						}
					}
				}