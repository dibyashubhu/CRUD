@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">

        <div class="bg-white shadow-md rounded-2xl p-6">

            <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>

            <p class="text-gray-700 mb-2">
                <strong>Author:</strong> {{ $blog->name }}
            </p>

            <p class="text-gray-700 mb-2">
                <strong>Category Name:</strong> {{ $blog->category }}
            </p>

            <p class="text-gray-700 mb-2">


            <p><strong>Category:</strong> {{ $blog->category->name ?? 'Uncategorized' }}</p>


            </p>




            @if($blog->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                        class="rounded-lg max-w-full h-auto" />
                </div>
            @endif
            @if($blog->description)
                <p class="text-gray-600 italic mb-6">
                    {{ $blog->description }}
                </p>
            @endif

            <div class="prose max-w-none mb-6">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <div class="flex space-x-4">
                @if (Auth::check())
                    <a href="{{ route('blogs.edit', $blog) }}"
                        class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        Edit
                    </a>

                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this blog?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                @else
                    <span></span>

                @endif


                <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Back
                </a>
            </div>

        </div>

    </div>
@endsection