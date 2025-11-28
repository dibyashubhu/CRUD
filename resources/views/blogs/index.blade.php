{{-- @extends('layouts.master')

@section('content')

<div class="container px-2 py-6 ">
    @if(session('success'))
<div class="bg-green-500 text-white px-4 py-2 rounded mb-3">
    {{ session('success') }}
</div>
@endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Blogs</h1>

        @if (Auth::check())
            <a href="{{ route('blogs.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            + Add New Blog
        </a>
        @else
        @endif
        
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">


        @foreach($blogs as $blog)
        <div  class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
            <a href="{{ route('blogs.show', $blog) }}">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}"
                     class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                    No Image
                </div>
            @endif
            </a>
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $blog->title }}</h2>
                <p class="text-sm text-gray-500 mt-1">By: {{ $blog->name }}</p>
                <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                    {{ $blog->description ?? 'No description provided.' }}
                </p>

                <p class="px-2 py-1 text-xs bg-blue-100 text-blue-600 inline-block mt-3 rounded">
                    {{ $blog->categoryRelation->name ?? $blog->category }}
                </p>

                <div class="flex justify-between mt-4">
                    @if (Auth::check())
                     <a href="{{ route('blogs.edit', $blog) }}"
                       class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Are you sure?')"
                                class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                    @else
                   
                        
                    @endif
                    
                </div>
            </div>

        </div>
        @endforeach

    </div>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>
      
</div>

@endsection --}}



@extends('layouts.master')

@section('content')

<div class="container px-4 py-6 max-w-6xl mx-auto">
  @if(session('success'))
<script>
    Swal.fire({
          toast: true,                   // enables toast mode (small popup)
        position: 'top-end', 
        icon: 'success',
        // title: 'Success',
        text: '{{ session('success') }}',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        width:'300px',
        height:'100px',
    });
</script>
@endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Blogs</h1>

        @if (Auth::check())
            <a href="{{ route('blogs.create') }}"
               class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Add New Blog
            </a>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($blogs as $blog)
        <div class="bg-white rounded-2xl  shadow-md hover:shadow-xl transition overflow-hidden flex">

            {{-- Left side: image --}}
            <a href="{{ route('blogs.show', $blog) }}" class="flex-shrink-0 w-48 h-48 overflow-hidden rounded-l-2xl">
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" 
                         alt="{{ $blog->title }}"
                         class="w-full h-full object-cover object-center transition-transform hover:scale-105">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                        No Image
                    </div>
                @endif
            </a>

            {{-- Right side: content --}}
            <div class="p-6 flex flex-col justify-between flex-grow">
                <div>
                    <h2 class="text-xl font-semibold hover:text-blue-600 transition">
                        <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">By: {{ $blog->name }}</p>
                    <p class="text-gray-700 mt-3 line-clamp-3">
                        {{ $blog->description ?? 'No description provided.' }}
                    </p>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">
                        {{ $blog->categoryRelation->name ?? $blog->category }}
                    </span>

                    @if (Auth::check())
                    <div class="flex space-x-4">
                        <a href="{{ route('blogs.edit', $blog) }}" 
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>

@endsection
