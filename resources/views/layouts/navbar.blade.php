<header class="bg-gray-900 text-white">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="/" class="text-2xl font-bold">Blog</a>

            <!-- Mobile Menu Button -->
            <button id="menuBtn" class="lg:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex space-x-8">
                <li><a href="{{url('blogs')}}" class="hover:text-gray-300">Home</a></li>
                <li><a href="/about" class="hover:text-gray-300">About</a></li>
                <li><a href="{{url('blogs/create')}}" class="hover:text-gray-300">Create</a></li>
                <li><a href="{{url('contact')}}" class="hover:text-gray-300">Contact</a></li>
            </ul>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden flex flex-col space-y-2 pb-4">
            <a href="{{url('blogs')}}" class="block py-2 hover:text-gray-300">Home</a>
            <a href="/about" class="block py-2 hover:text-gray-300">About</a>
            <a href="/services" class="block py-2 hover:text-gray-300">Create</a>
            <a href="{{url('contact')}}" class="block py-2 hover:text-gray-300">Contact</a>
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
