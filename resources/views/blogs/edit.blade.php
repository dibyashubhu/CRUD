<div class="container mx-auto px-4 py-6 max-w-3xl">

    <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-xl font-bold mb-4">Edit Blog</h2>

        <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4">
                 Title:
                <input type="text" name="title" value="{{ $blog->title }}"
                       class="border p-2 rounded-lg" required>
                <br>
                Name:
                <input type="text" name="name" value="{{ $blog->name }}"
                       class="border p-2 rounded-lg" required>
                <br>
                Category:
                <input type="text" name="category" value="{{ $blog->category }}"
                       class="border p-2 rounded-lg" required>
                 <br>
                 Description:
                <textarea name="description"
                          class="border p-2 rounded-lg">{{ $blog->description }}</textarea>
                      <br>
                <textarea name="content"
                          class="border p-2 rounded-lg h-40" required>
                    {{ $blog->content }}
                </textarea>
               <br>
               IMage:
                <input type="file" name="image"
                       class="border p-2 rounded-lg">
               <br>
               category id:
                   <select name="blog_category_id" required>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $blog->blog_category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

                {{-- <select name="blog_category_id" class="border p-2 rounded-lg" required>
                     @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" 
                            {{ $blog->blog_category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach

                </select> --}}
               <br> <br>
                <button
                    class="w-full px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                    Update Blog
                </button>

            </div>
        </form>
    </div>

</div>
