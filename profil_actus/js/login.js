const eye = document.querySelector('.fa-eye');
const eyeoff = document.querySelector('.fa-eye-slash');
const passwordField = document.querySelector('input[type=password]');

eye.addEventListener('click', () => {
    eye.style.display = "none";
    eyeoff.style.display = "block";
    passwordField.type = "password";
	});

eyeoff.addEventListener('click', () => {
    eyeoff.style.display = "none";
    eye.style.display = "block";
    passwordField.type = "text";
	});

var form = document.querySelector('#login');

//Ecouter la modification de l'email
form.mail.addEventListener('change', function() {
	validMail(this);
});

//Ecouter la modification du mot de passe
form.password.addEventListener('change', function() {
	validPassword(this);
});

//Ecouter la soumission du formulaire
form.addEventListener('submit', function(f) {
	f.preventDefault();
	if (validMail(form.mail) && validPassword(form.password)) {
		form.submit();
	}
});

// ****************************** Validation Email *******************************
const validMail = function(inpMail) {
	//Creation de l`expression reguliere
	var mailRegExp = /^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,3}$/g;

	var testMail = mailRegExp.test(inpMail.value);
	var msg1 = null;
	var validate = true;
	
	//Recuperation balise span
	var span = document.getElementById('mail_incomplete');
	
	//Test du input avec l`expression reguliere
	if (inpMail.value.length < 11) {
		msg1 = 'Your email should be at least 11 characters';
	}
	else if (!/@/.test(inpMail.value) || /[@]{2,}/.test(inpMail.value)) {
		msg1 = 'Your email should contain 1 \'@\'';
	}
	else if (!/gmail/.test(inpMail.value)) {
		msg1 = 'Your email miss \'gmail\'';
	}
	else if (!/\./.test(inpMail.value) || /[.]{2,}/.test(inpMail.value)) {
		msg1 = 'Your email should contain 1 \'.\'';
	}
	else if (!/fr/.test(inpMail.value) && !/com/.test(inpMail.value)) {
		msg1 = 'Your email miss \'fr\' or \'com\'';
		validate = false;
	};
	
	if (testMail && validate == true) {
		span.innerHTML = 'Valid Address';
		span.classList.remove('text-danger');
		span.classList.add('text-success'); 
		inpMail.style.border = '2px solid skyblue';
		return true;
	}
	else {
		span.innerHTML = msg1;
		span.classList.remove('text-success');
		span.classList.add('text-danger'); 	
		inpMail.focus();
		inpMail.style.border = '2px solid red';
		return false;
	}
};

// ****************************** Validation Password *******************************
const validPassword = function(inpPassword) {
	//expression reguliere : min6chrs 1maj 1chi
	var msg = null;
	var valid = false;
	if (inpPassword.value.length < 6) {
		msg = "Your password should be at least 6 characters";
	}
	else if (!/[A-Z]/.test(inpPassword.value)) {
		msg = "Your password should contain at least 1 uppercase character";
	}
	else if (!/[a-z]/.test(inpPassword.value)) {
		msg = "Your password should contain at least 1 lowercase character";
	}
	else if (!/[0-9]/.test(inpPassword.value)) {
		msg = "Your password should contain at least 1 number";
	}
	else {
		msg = "Password valid";
		valid = true;
	}
	
	//affichage
	//recuperation balise span
	var span = document.getElementById('pass_incomplete');
	
	//Test du password avec l`expression reguliere
	if (valid) {
		span.innerHTML = msg;
		span.classList.remove('text-danger');
		span.classList.add('text-success'); 
		inpPassword.style.border = '2px solid skyblue';
		return true;
	}
	else {
		span.innerHTML = msg;
		span.classList.remove('text-success');
		span.classList.add('text-danger'); 	
		inpPassword.focus();
		inpPassword.style.border = '2px solid red';
		return false;
	}
};