<header class="bg-gray-900 text-white">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="/blogs" class="text-1xl font-bold">
                @if(Auth::check())
                    <span>Welcome!{{ Auth::user()->name }}</span>
                @else
                    <span>Guest</span>
                @endif</a>

            <!-- Mobile Menu Button -->
            <button id="menuBtn" class="lg:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex space-x-8">
                <li><a href="{{url('blogs')}}" class="hover:text-gray-300">Home</a></li>
                <li><a href="/about" class="hover:text-gray-300">About</a></li>
                @if (Auth::check())
                    <li><a href="{{url('blogs/create')}}" class="hover:text-gray-300">Create</a></li>
                @endif
                <li><a href="{{url('contact')}}" class="hover:text-gray-300">Contact</a></li>

            </ul>
            <!-- Login & Sign Up Buttons -->
            <div class="flex items-center space-x-4">

                {{-- <a href="{{ url('logout') }}" --}} @if(Auth::check()) <a href="{{ url('logout') }}"
                    class="px-2 py-1 border bg-red-500 rounded-md hover:bg-green-600 transition">
                    <span>Logout</span></a>
                @else
                    <a href="{{ url('/') }}" class="px-2 py-1 border bg-red-500 rounded-md hover:bg-green-600 transition">
                        <span>Login</span></a>
                @endif

                {{-- </a> --}}


            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden flex flex-col space-y-2 pb-4">
            <a href="{{url('blogs')}}" class="block py-2 hover:text-gray-300">Home</a>
            <a href="/about" class="block py-2 hover:text-gray-300">About</a>
            @if (Auth::check())
                <li><a href="{{url('blogs/create')}}" class="hover:text-gray-300">Create</a></li>
            @endif
            <a href="{{url('contact')}}" class="block py-2 hover:text-gray-300">Contact</a>

            <!-- Login & Sign Up Buttons -->
            <div class="flex items-center space-x-4">

                <a href="{{ url('logout') }}"
                    class="px-4 py-2 border border-red-300 rounded-md hover:bg-gray-700 transition">
                    @if(Auth::check())
                        <span>Logout</span>
                    @else
                        <span>Login</span>
                    @endif
                </a>


            </div>
        </div>
    </nav>
</header>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>