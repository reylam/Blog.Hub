<x-app-layout>
    <div class="min-w-full flex justify-center bg-[#111827] text-white py-10">
        <div class="flex w-[1380px] py-6 flex-col gap-8 bg-[#1f2937] rounded-lg p-8 shadow-lg">
            <p class="font-bold text-3xl text-center text-[#FFD600]">
                Edit Your Blog
            </p>
            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blog.update', $blog->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex flex-col gap-6">
                    <div>
                        <label class="font-semibold text-lg" for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter your blog title..."
                            value="{{ old('title', $blog->title) }}"
                            class="border-2 border-[#ffd50070] rounded-md w-full py-2 px-3 bg-[#2d3748] text-white placeholder-gray-400 focus:ring-[#FFD600] focus:border-[#FFD600]"
                            required>
                    </div>
                    <div>
                        <label class="font-semibold text-lg" for="content">Content</label>
                        <textarea id="content" name="content" rows="8" class="hidden" placeholder="Write your blog content here..."
                            required></textarea>

                        <trix-editor input="content"
                            class="border-2 border-[#ffd50070] rounded-md w-full py-2 px-3 bg-[#2d3748] text-white placeholder-gray-400 focus:ring-[#FFD600] focus:border-[#FFD600]">hi</trix-editor>
                    </div>
                    <div>
                        <label for="category" class="font-semibold text-lg">Category:</label>
                        <select name="category_id" id="category"
                            class="border-2 border-[#ffd50070] rounded-md w-full py-2 px-3 bg-[#2d3748] text-white placeholder-gray-400 focus:ring-[#FFD600] focus:border-[#FFD600]">
                            <option value="" disabled class="bg-gray-700 text-gray-400">Select a category
                            </option>
                            <option value="{{ old('category_id', $blog->category->id) }}" selected>
                                {{ old('name', $blog->category->name) }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="bg-gray-800 text-white">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-96 border-2 border-[#ffd50070] border-dashed rounded-lg cursor-pointer bg-[#2d3748] hover:bg-[#3a434c]">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-image">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" name="thumbnail" class="hidden"
                                onchange="displayFile(this)" />
                            <img id="image-preview"
                                class="hidden w-full h-full object-cover border-2 border-[#ffd50070] rounded-md" />
                        </label>
                        <p id="file-name" class="mt-2 text-sm text-gray-400">No file chosen</p>
                    </div>
                    <div class="">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-[#FFD600] text-black font-bold py-4 rounded-xl text-lg hover:bg-[#dbe921] transition duration-300">
                            Submit Blog
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function displayFile(input) {
            const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
            document.getElementById('file-name').textContent = fileName;

            const file = input.files[0];
            const preview = document.getElementById('image-preview');
            const uploadImage = document.getElementById('upload-image')

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    uploadImage.classList.add('hidden')
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
