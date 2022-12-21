function Validation() {
		let name = document.getElementById('fname').value;
		let lastname = document.getElementById('lname').value;
		let email = document.getElementById('email').value;
		let phone = document.getElementById('number').value;
		let password = document.getElementById('password').value;;
		var retype = document.getElementById('retype-password').value;
		var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  //Javascript reGex for Email Validation.
		var regPhone = /^\d{10}$/;                                        // Javascript reGex for Phone Number validation.
		var numbers = /[0-9]/g;
		var regName = /\d+$/g;                                    // Javascript reGex for Name validation

		if (name == "") {
	        document.getElementById('fname_warning').innerHTML = 'Please enter your name.';
			document.getElementById('fname').focus();
				return false;
			} else if(regName.test(name)){
				document.getElementById('fname_warning').innerHTML = 'Please enter your name correctly';
                return false;
				}
				else{ 
					document.getElementById('fname_warning').innerHTML = '';
					}
				
		if (lastname =="") {
			document.getElementById('lname_Warning').innerHTML = 'Please enter your Last Name ';
			document.getElementById('lname').focus();
				return false;
			} else if(regName.test(lastname)){
				document.getElementById('lname_Warning').innerHTML = 'Please enter your Last Name correctly ';
                return false;
			}
				else {
					document.getElementById('lname_Warning').innerHTML = '';
				}
				
		if (email == "") {
					document.getElementById('email_warning').innerHTML = 'Your email is empty';
					document.getElementById('email').focus();
					return false;
				}else if(!regEmail.test(email)){
					document.getElementById('email_warning').innerHTML = 'Your email is not valid';
					document.getElementById('email').focus();
                    return false;
				}else{ document.getElementById('email_warning').innerHTML = ''; }

		if (phone == "" || !regPhone.test(phone)) {
					document.getElementById('number_warning').innerHTML = 'Please enter a valid phone number';
					document.getElementById('number').focus();
					return false;
				}else{ document.getElementById('number_warning').innerHTML = ''; }

				
		if (password == "") {
					document.getElementById('password_warning').innerHTML = 'Your password is required';
					document.getElementById('password').focus();
					return false;
				} 
				
		if (password.length <= 6 ) {
					document.getElementById('password_warning').innerHTML = 'Password should be at least 6 characters long';
					document.getElementById('password').focus();
					return false;
				} else  if (!password.match(numbers)) {
					document.getElementById('password_warning').innerHTML = 'Password should also contain a number';
				} else {
					document.getElementById('password_warning').innerHTML = '';
				}
						
		if (password != retype) {
					document.getElementById('passwordcheck_warning').innerHTML = 'Passwords do not match';
					document.getElementById('retype-password').focus();
					return false;

				} else{
			document.getElementById('passwordcheck_warning').innerHTML = '';

			}

			return true;
		}
function action(){
    if(Validation()== true){
        document.getElementById("RegisterForm").action = "index.html";
        document.getElementById("RegisterForm").submit();
    }else{document.getElementById("RegisterForm").action = ""; }
}