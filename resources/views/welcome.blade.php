<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <style>
    .form-bg {
      background-color: rgba(114, 115, 126, 0.938);
      /* backdrop-filter: blur(8px); */
      height: 100%;
      overflow: hidden;
    }
    .form-scroll {
      overflow-y: auto;
      max-height: 100%;
      padding-right: 8px;
    }
    .cursor-pointer {
      cursor: pointer;
    }
  </style>
</head>
<body
  class="min-h-screen flex items-center justify-center bg-cover bg-center"
  style="background-image: url('https://imgs.search.brave.com/6vauSkCcKJ2aHdg9R-OR0-E4SQ_p5nelxPIeBvzSTUw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cHJlbWl1bS1waG90/by9zdW5zZXQtaGlt/YWxheWEtbXQtYW1h/ZGFibGFtLWV2ZXJl/c3QtYmFzZS1jYW1w/LXRyZWtraW5nLXNv/bHVraHVtYnUtbmVw/YWxfNzIzMTIzLTM2/Ny5qcGc_c2VtdD1h/aXNfaHlicmlkJnc9/NzQwJnE9ODA');"
>

  {{-- @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<script>
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}',  // Shows first error message
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
             width:'250px',
             height:'200px'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            width:'250px',
            height:'200px'
        });
    @endif
</script> --}}




  <div
    class="grid grid-cols-2 gap-0 w-full max-w-4xl h-[580px] rounded-xl shadow-lg overflow-hidden"
  >
    <!-- Left side -->
    <div class="form-bg p-8  flex flex-col justify-center h-full">
      <div id="register-form" class="form-scroll">
          <p class="mt-2 text-center text-white text-sm">
          Want to continue without Login?
          <span class="underline cursor-pointer font-semibold"
            >  <a href="/blogs">Continue</a>  </span
          >
        </p>
        <p class=" text-2xl text-center font-bold text-white"> OR</p>
        <p class=" text-center text-white  mb-2">Create your Account </p>
        <form action="{{ url('/register') }}" method="POST" class="space-y-3">
           @csrf
            @error('name')
    <p class="text-red-800 text-sm mb-0">{{ $message }}</p>
@enderror
          <input
            type="text"
            placeholder="Name"
            name="name"
            class="w-full p-1 rounded  bg-opacity-10  focus:outline-none"
             value="{{ old('name') }}" class="border @error('name') border-red-500 @enderror"
             
          />
          @error('email')
    <p class="text-red-800 text-sm">{{ $message }}</p>
@enderror
          <input
            type="email"
            placeholder="Email"
            name="email"
            {{-- class="w-full p-2 rounded bg-white bg-opacity-30 placeholder-white text-white focus:outline-none" --}}
            class="w-full p-1 rounded  bg-opacity-10  focus:outline-none"
           value="{{ old('email') }}" class="border @error('email') border-red-500 @enderror"
          />
          @error('password')
    <p class="text-red-800 text-sm">{{ $message }}</p>
@enderror
          <input
            type="password"
            placeholder="Password"
            name="password"
            {{-- class="w-full p-2 rounded bg-white bg-opacity-30 placeholder-white text-white focus:outline-none" --}}
            class="w-full p-1 rounded  bg-opacity-10  focus:outline-none"
           value="{{ old('password') }}" class="border @error('password') border-red-500 @enderror"
          />
            @error('password_confirmation')
    <p class="text-red-800 text-sm">{{ $message }}</p>
@enderror
           <input
            type="password"
            placeholder="Confirm Password"
            name="password_confirmation"
            {{-- class="w-full p-2 rounded bg-white bg-opacity-30 placeholder-white text-white focus:outline-none" --}}
            class="w-full p-1 rounded  bg-opacity-10  focus:outline-none"
           value="{{ old('password_confirmation') }}" class="border @error('password_confirmation') border-red-500 @enderror"
          />
           
          <button
            type="submit"
            class="w-full bg-green-600 text-white hover:bg-green-700 py-2 rounded font-semibold"
          >
            Sign Up
          </button>
        </form>
        <p class="mt-4 text-center text-white text-sm">
          Already have an account?
          <span id="show-login" class="underline cursor-pointer font-semibold"
            >Login</span
          >
        </p>
      
      </div>

      <div id="login-form" class="hidden form-scroll">
        <h2 class="text-3xl text-white font-bold mb-4">Welcome Back!</h2>
        <form action="{{ url('/login') }}" method="POST"  class="space-y-3">
          @csrf
          <input
            type="email"
            placeholder="Email"
            name="email"
            {{-- class="w-full p-2 rounded bg-white bg-opacity-30 placeholder-white text-white focus:outline-none" --}}
            class="w-full p-2 rounded  bg-opacity-10  focus:outline-none"
          />
          
          <input
            type="password"
            placeholder="Password"
            name="password"
            {{-- class="w-full p-2 rounded bg-white bg-opacity-30 placeholder-white text-white focus:outline-none" --}}
            class="w-full p-2 rounded  bg-opacity-10  focus:outline-none"
          />
          <button
            type="submit"
            class="w-full bg-blue-600 text-white hover:bg-blue-700 py-2 rounded font-semibold"
          >
            Login
          </button>
        </form>
        <p class="mt-4 text-center text-white text-sm">
          Don't have an account?
          <span id="show-register" class="underline cursor-pointer font-semibold"
            >Register</span
          >
        </p>
        
      </div>
    </div>  

    <!-- Right side -->
    <div class="h-full">
      <img
        src="https://imgs.search.brave.com/Y-lu0KZ4Bv1-RWHZRaj9SwGvRnvKkLW_x23zGHKJ4K0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzA4LzEyLzI5LzA4/LzM2MF9GXzgxMjI5/MDg3N19tVzJreVJB/c3RhcnZUbHpzNTlp/QjlZUDRENXlhcThL/YS5qcGc"
        alt="Welcome Image"
        class="object-cover h-full w-full"
      />
    </div>
  </div>

  <script>
    const registerForm = document.getElementById('register-form');
    const loginForm = document.getElementById('login-form');
    const showLogin = document.getElementById('show-login');
    const showRegister = document.getElementById('show-register');

    showLogin.addEventListener('click', () => {
      registerForm.classList.add('hidden');
      loginForm.classList.remove('hidden');
    });  

    showRegister.addEventListener('click', () => {
      loginForm.classList.add('hidden');
      registerForm.classList.remove('hidden');
    });
  </script>



@if(session('showLogin'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    let registerForm = document.getElementById('register-form');
    let loginForm = document.getElementById('login-form');

    if(registerForm && loginForm){
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
    }
});
</script>
@endif

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('form');
  const nameInput = form.name;
  const emailInput = form.email;
  const passwordInput = form.password;
  const confirmInput = form.password_confirmation;

  function validateName() {
    clearError(nameInput);
    const val = nameInput.value.trim();
    if (!val) return showError(nameInput, 'Nameyyyy is required');
    if (!/^[a-zA-Z\s]+$/.test(val)) return showError(nameInput, 'Name can only contain letters and spaces');
    return true;
  }

  function validateEmail() {
    clearError(emailInput);
    const val = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!val) return showError(emailInput, 'Email is required');
    if (!emailPattern.test(val)) return showError(emailInput, 'Email is invalid');
    return true;
  }

  function validatePassword() {
    clearError(passwordInput);
    const val = passwordInput.value;
    if (!val) return showError(passwordInput, 'Password is required');
    if (val.length < 8) return showError(passwordInput, 'Password must be at least 8 characters');
    return true;
  }

  function validateConfirm() {
    clearError(confirmInput);
    const val = confirmInput.value;
    if (val !== passwordInput.value) return showError(confirmInput, 'Passwords do not match');
    return true;
  }

  function showError(input, message) {
    if (input.nextElementSibling && input.nextElementSibling.classList.contains('error-msg')) {
      input.nextElementSibling.innerText = message;
    } else {
      const error = document.createElement('p');
      error.classList.add('text-red-800', 'text-sm', 'error-msg', 'mt-1');
      error.innerText = message;
      input.classList.add('border-red-500');
      input.insertAdjacentElement('afterend', error);
    }
    input.classList.add('border-red-500');
    return false;
  }

  function clearError(input) {
    if (input.nextElementSibling && input.nextElementSibling.classList.contains('error-msg')) {
      input.nextElementSibling.remove();
    }
    input.classList.remove('border-red-500');
  }

  // Add event listeners for live validation (input + blur)
  nameInput.addEventListener('input', validateName);
  nameInput.addEventListener('blur', validateName);

  emailInput.addEventListener('input', validateEmail);
  emailInput.addEventListener('blur', validateEmail);

  passwordInput.addEventListener('input', () => {
    validatePassword();
    validateConfirm();
  });
  passwordInput.addEventListener('blur', () => {
    validatePassword();
    validateConfirm();
  });

  confirmInput.addEventListener('input', validateConfirm);
  confirmInput.addEventListener('blur', validateConfirm);

  form.addEventListener('submit', (e) => {
    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isPasswordValid = validatePassword();
    const isConfirmValid = validateConfirm();

    if (!(isNameValid && isEmailValid && isPasswordValid && isConfirmValid)) {
      e.preventDefault();
    }
  });
});

</script>


</body>
</html>

