@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-3xl">

    <div class="bg-white shadow-md rounded-2xl p-6">
        {{-- <h6 class="text-xl font-bold mb-4">Welcome!
Use the form below to publish a new blog post on website. Please provide a clear title, engaging content, and a relevant category.</h6> --}}

        <form id="blogForm" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-4">

                <input type="text" name="title" placeholder="Blog Title"
                       class="border p-2 rounded-lg" required>

                <input type="text" name="name" placeholder="Author Name"
                       class="border p-2 rounded-lg" required>

                <input type="text" name="category" placeholder="Category Name"
                       class="border p-2 rounded-lg" required>

                <textarea name="description" placeholder="Short Description"
                          class="border p-2 rounded-lg"></textarea>

                <textarea name="content" placeholder="Content"
                          class="border p-2 rounded-lg h-40" required></textarea>

                <input type="file" name="image"
                       class="border p-2 rounded-lg">

                {{-- <select name="blog_category_id" class="border p-2 rounded-lg" required>
                    <option value="">Select Blog Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select> --}}
                

                  <select name="blog_category_id" required>
    <option value="">Select Category</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>


                <button
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    Create Blog
                </button>

            </div>
        </form>
    </div>

</div>

@endsection
