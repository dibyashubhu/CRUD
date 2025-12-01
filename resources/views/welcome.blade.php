<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login & Signup with jQuery toggle</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>

	<style>
		.hidden {
			display: none;
		}

		.active-tab {
			border-bottom: 2px solid #2563eb;
			/* blue-600 */
			color: #2563eb;
			font-weight: 600;
		}
	</style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

	<div class="bg-white p-8 rounded shadow-md w-full max-w-3xl">

		<div class="flex space-x-6 mb-8 border-b">
			<button id="loginTab" class="pb-2 font-semibold text-gray-700 border-b-2 border-transparent active-tab">
				Login
			</button>
			<button id="signupTab" class="pb-2 font-semibold text-gray-700 border-b-2 border-transparent">
				Signup
			</button>
		</div>

		<!-- Login Form -->
		<form id="loginForm">
			<div id="loginerrorMessages" style="color: red; margin-top: 10px;"></div>
			<div class="mb-4">
				<label for="loginEmail" class="block mb-1 font-medium">Email</label>
				<input id="loginEmail" type="email" name="email" required
					class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
				<div class="text-red-600 text-sm error-text"></div>
			</div>
			<div class="mb-6">
				<label for="loginPassword" class="block mb-1 font-medium">Password</label>
				<input id="loginPassword" type="password" name="password" required
					class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
				<div class="text-red-600 text-sm error-text"></div>
			</div>
			<button type="submit" id="btnLogin"
				class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
				Login
			</button>
		
		</form>
		

		<!-- Signup Form -->
		<form id="signupForm" class="hidden">
			 <div id="signuperrorMessages" style="color: red; margin-bottom: 10px;"></div>
			<div class="mb-4">
				<label for="signupName" class="block mb-1 font-medium">Name</label>
				<input id="signupName" type="text" name="name" required
					class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-600" />
				<div class="text-red-600 text-sm error-text"></div>
			</div>

			<div class="mb-4">
				<label for="signupEmail" class="block mb-1 font-medium">Email</label>
				<input id="signupEmail" type="email" name="email" required
					class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-600" />
				<div class="text-red-600 text-sm error-text"></div>
			</div>
			<div class="mb-4">
				<label for="signupPassword" class="block mb-1 font-medium">Password</label>
				<input id="signupPassword" type="password" name="password" required
					class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-600" />
				<div class="text-red-600 text-sm error-text"></div>
			</div>
			<div class="mb-6">
				<label for="signupPasswordConfirm" class="block mb-1 font-medium">Confirm Password</label>
				<input id="signupPasswordConfirm" type="password" name="password_confirmation" required
					class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-600" />
				<div class="text-red-600 text-sm error-text"></div>
			</div>
			<button type="submit" id="btnSignup"
				class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
				Signup
			</button>
		</form>
		
	</div>

	<script>
		$(document).ready(function () {

			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			$('#loginTab').click(function () {
				// Show login form, hide signup
				$('#loginForm').show();
				$('#signupForm').hide();

				// Toggle active tab styles
				$('#loginTab').addClass('active-tab');
				$('#signupTab').removeClass('active-tab');
			});

			$('#signupTab').click(function () {
				// Show signup form, hide login
				$('#signupForm').show();
				$('#loginForm').hide();

				// Toggle active tab styles
				$('#signupTab').addClass('active-tab');
				$('#loginTab').removeClass('active-tab');
			});


			$(document)
				.off('click', '#btnLogin')
				.on('click', '#btnLogin', function (e) {
					e.preventDefault();

					console.log("test");



					const data = $("#loginForm").serializeArray();
					console.log("login data ",data)
					 let hasErrors = false;
                    let dataObj = {};

					$.each(data, function(_, field) {
					dataObj[field.name] = field.value.trim();
						});
     
					let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
					if (!dataObj.email) {
					 $('#loginEmail').next('.error-text').text('Email is required.');
					  hasErrors = true;
					} else if (!emailRegex.test(dataObj.email)) {
					  $('#loginEmail').next('.error-text').text('Invalid email format.');
                      hasErrors = true;
					}

					// Validate Password
					if (!dataObj.password) {
					  $('#loginPassword').next('.error-text').text('Password is required.');
					  hasErrors=true;
					}
					
                    if (hasErrors) return;

					console.log({data});
					$.ajax({
						url: '/login', // Your login URL in backend
						type: 'POST',
						data: data,
						success: function (response) {
							 if (response.success) {
                            alert(response.message);
                        // Redirect user after successful login
                        window.location.href = response.redirect_url;
                    }
						},
						error: function (xhr) {
							// Handle error response
							$('.error-text').text('');
							if (xhr.status === 422) {
								let errors = xhr.responseJSON.errors;
								if (errors.email) $('#loginEmail').next('.error-text').text(errors.email[0]);
								if (errors.password) $('#loginPassword').next('.error-text').text(errors.password[0]);
							} else {
								$('#loginPassword').next('.error-text').text("Invalid credentials.");
							}
						}
					});


					});



               $(document)
				.off('click', '#btnSignup')
				.on('click', '#btnSignup', function (e) {
					
					e.preventDefault();

					console.log("test signup");



					const data = $("#signupForm").serializeArray();
					console.log("signup data ",data)
					 let hasErrors = false;
                    let dataObj = {};
                    $('.error-text').text('');
					$.each(data, function(_, field) {
					dataObj[field.name] = field.value.trim();
					
					});
					console.log("stataa",dataObj);

					// Validate Name
					if (!dataObj.name) {
					 $('#signupName').next('.error-text').text('Name is required.');
					  hasErrors = true;
					}

					// Validate Email
					let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
					if (!dataObj.email) {
					  $('#signupEmail').next('.error-text').text('Email is required.');
					   hasErrors = true;
					} else if (!emailRegex.test(dataObj.email)) {
					  $('#signupEmail').next('.error-text').text('Invalid email format.');
					   hasErrors = true;
					}

					// Validate Password
					if (!dataObj.password) {
					  $('#signupPassword').next('.error-text').text('Password is required.');
					   hasErrors = true;
					} else if (dataObj.password.length < 6) {
					 $('#signupPassword').next('.error-text').text('Password must be at least 6 characters.');
					  hasErrors = true;
					}

					// Validate Confirm Password
					if (dataObj.password !== dataObj.password_confirmation) {
					 $('#signupPasswordConfirm').next('.error-text').text('Passwords do not match.');
					  hasErrors = true;
					}

					// Show errors or proceed
					// if (errors.length > 0) {
					// 	$('#signuperrorMessages').html(errors.join("<br>"));
					// 	} else {
					// 	$('#signuperrorMessages').html('');
					// 	}
                  if (hasErrors) return;
				
        
                 
					console.log({data});
					$.ajax({
						url: '/register', // Your login URL in backend
						type: 'POST',
						data: data,
						success: function (response) {
							 if (response.success) {
								alert(response.message);
								// Switch to login form
								$('#signupForm').hide();
								$('#loginForm').show();
								$('#signupForm')[0].reset();
                   			 }
							
						},
						error: function (xhr) {
							// Handle error response
							 $('.error-text').text('');
							if (xhr.status === 422) {
								// Validation error
								 let errors = xhr.responseJSON.errors;
								  $.each(errors, function(field, messages) {
								let input = $(`[name="${field}"]`);
								input.next('.error-text').text(messages[0]);
							});
							} else {
									alert('Something went wrong. Please try again.');
							    }
						}
						

					});


					});


				});
				

				

        

	</script>

</body>

</html>