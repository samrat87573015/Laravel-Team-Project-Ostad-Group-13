<style>
    .hidden {
        display: none;
    }
</style>
<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full md:w-3/4 lg:w-2/3">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Create Blog</h2>
                    <a href="{{ route('recipe-slider.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('recipe-slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 font-medium mb-1">Sliter Title:</label>
                                <input id="title" type="text" name="title" value="{{ old('title') }}"
                                    placeholder="Title..." autocomplete="title"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('title') border-red-500 @enderror">
                                @error('title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                       

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium mb-1">Description:</label>
                            <textarea id="description" name="description" placeholder="Short Description"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('description') border-red-500 @enderror"></textarea>
                            @error('shortdescription_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-2 justify-between">
                            <!-- Select Recipe -->
                            <div class="mb-4 w-9/12">
                                <label for="recipe_id" class="block text-gray-700 font-medium mb-1">Select
                                    Recipe:</label>
                                <select id="recipe_id" name="recipe_id"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('recipe') border-red-500 @enderror">
                                    <option selected>Select Recipe</option>
                                    @foreach ($recipes as $recipe)
                                        <option value="{{ $recipe->id }}">

                                            {{ $recipe->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('recipe_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Select type -->
                            <div class="mb-4 w-3/12">
                                <label for="type" class="block text-gray-700 font-medium mb-1">Select Type:</label>

                                <select id="type" name="type" class="block text-gray-700 font-medium mb-1">
                                    <option value="">-- Select --</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                        </div>

                        <div id="imageField" class="hidden mb-4">
                            <label for="uploadImg" class="block text-gray-700 font-medium mb-1">Image:</label>
                            <input type="file" name="uploadImg" id="uploadImg"
                                class="dropify @error('uploadImg') border-red-500 @enderror" data-default-file=""
                                data-height="180" />
                            @error('uploadImg')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Video Url Upload -->
                        <div id="videoField" class="hidden">
                            <label for="uploadVideo" class="block text-gray-700 font-medium mb-1">Upload Video:</label>
                            <textarea id="uploadVideo" name="uploadVideo" placeholder="Long Description"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('uploadVideo') border-red-500 @enderror"></textarea>
                            @error('uploadVideo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit"
                                class="add-new-btn px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Create Slider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    const typeSelector = document.getElementById('type');
    const imageField = document.getElementById('imageField');
    const videoField = document.getElementById('videoField');

    typeSelector.addEventListener('change', function() {
        const selectedValue = this.value;

        // Hide all fields initially
        imageField.classList.add('hidden');
        videoField.classList.add('hidden');

        // Show the appropriate field based on selection
        if (selectedValue === 'image') {
            imageField.classList.remove('hidden');
        } else if (selectedValue === 'video') {
            videoField.classList.remove('hidden');
        }
    });
</script>