@extends('layouts.master')

@section('content')

<div class="container px-2 py-6 ">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Blogs</h1>
        <a href="{{ route('blogs.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            + Add New Blog
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">

        @foreach($blogs as $blog)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">

            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}"
                     class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                    No Image
                </div>
            @endif

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
                </div>
            </div>

        </div>
        @endforeach

    </div>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>

</div>

@endsection
