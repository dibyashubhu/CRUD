



@extends('layouts.master')
@section('content')

<div class="container px-4 py-6 max-w-7xl mx-auto">
  @if(session('success'))
  <script>
    Swal.fire({
      toast: true,
      position: 'top-end', 
      icon: 'success',
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

  {{-- Grid with 3 columns --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($blogs as $blog)
      <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition flex flex-col">

        {{-- Image --}}
        <a href="{{ route('blogs.show', $blog) }}" class="block rounded-t-2xl overflow-hidden h-48">
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

        {{-- Content --}}
        <div class="p-6 flex flex-col flex-grow">

          {{-- Title --}}
          <h2 class="text-xl font-semibold hover:text-blue-600 transition mb-2">
            <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
          </h2>

          {{-- Author --}}
          <p class="text-sm text-gray-500 mb-4">By: {{ $blog->name }}</p>

          {{-- Description truncated to 2 lines --}}
          <p class="text-gray-700 line-clamp-2 mb-4 flex-grow">
            {{ $blog->description ?? 'No description provided.' }}
          </p>

          {{-- Read More link --}}
          <a href="{{ route('blogs.show', $blog) }}" class="text-blue-600 hover:underline text-sm font-medium mt-auto">
            Read more &rarr;
          </a>

        </div>
      </div>
    @endforeach
  </div>

  {{-- Pagination --}}
  <div class="mt-8">
    {{ $blogs->links() }}
  </div>
</div>






@endsection
