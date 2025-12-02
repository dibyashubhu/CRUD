<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


     @vite(['resources/css/app.css', 'resources/js/app.js'])

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

     
</head>

<script src="{{ asset('js/blog-validation.js') }}"></script>
<body>

    {{-- Header --}}
    @include('layouts.navbar')

    <main class="max-w-6xl mx-auto px-3 mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
