<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Edit Blog</h2>
                    <a href="{{ route('blog.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('blog.update', $blog) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-2">
                            <!-- Title Name -->
                            <div class="mb-4 w-3/4">
                                <label for="title" class="block text-gray-700 font-medium mb-1">
                                    Title:</label>
                                <input id="title" type="text" name="title" value="{{ $blog->title }}"
                                    placeholder="Category Name" autocomplete="title"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('title') border-red-500 @enderror">
                                @error('title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="w-1/4">
                                <label for="cat_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Select an Category</label>
                                <select id="cat_id" name="cat_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    ">
                                    <option selected>Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $blog->cat_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>



                        </div>

                         <div class="flex gap-2">
                         <!-- Short Description -->
                        <div class="mb-4 w-3/4">
                           <label for="short_description" class="block text-gray-700 font-medium mb-1">
                                Short Description:</label>
                            <textarea id="description" name="short_description" placeholder="Short Description"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out summernote @error('short_description') border-red-500 @enderror">{{ $blog->short_description }}</textarea>
                            @error('short_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--  Image  -->
                        <div class="mb-4 w-1/4">
                            <label for="FileUpload" class="block text-gray-700 font-medium mb-1">Image :</label>
                                <input type="file" name="FileUpload" class="dropify @error('FileUpload') border-red-500 @enderror"
                                 @if ($blog->image) data-default-file="{{ asset('uploads/'.$blog->image) }}" @else data-default-file="{{ asset('uploads/no-image.png') }}" @endif data-height="265" />
                                 @error('FileUpload')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                        </div>
                       </div>


                        <!-- Long Description -->
                        <div class="mb-4">
                            <label for="long_description" class="block text-gray-700 font-medium mb-1">
                                Long Description:</label>
                            <textarea id="long_description" name="long_description" placeholder="Long Description"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out summernote @error('long_description') border-red-500 @enderror">{{ $blog->long_description }}</textarea>
                            @error('long_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="add-new-btn">
                                Update Blog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
