<div>
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post Title</label>
    <input type="text" id="title" name="title"
        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Post something..." value="{{ old('title', $post->title ?? '') }}" required>
    @error('title')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Post Category
        Type</label>
    <select id="category" name="category"
        class="{{ $errors->first('category') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900  placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 ' }} sm:text-sm rounded-lg block w-full p-2.5">
        <option disabled selected>-- Select Post Category Type --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ $category->id == old('category', $post->post_category_id ?? '') ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
    @error('category')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Detail
        Description</label>
    <textarea id="description" rows="8" name="description"
        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Your message...">{{ old('description', $post->description ?? '') }}</textarea>
    @error('description')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
    <input name="image"
        class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        aria-describedby="file_input_help" id="file_input" type="file">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPEG, JPG or GIF
    </p>
    @error('image')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $action }}
    post</button>
