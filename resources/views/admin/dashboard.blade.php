<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-[#111827] rounded-lg shadow-md w-full">
            <div class="px-6 py-4 border-b border-gray-700">
                <h2 class="text-2xl font-semibold text-white">Data Blog</h2>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div class="relative overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-gray-400 bg-white">
                        <thead class="bg-gray-800">
                            <tr class="text-center">
                                <th class="px-6 py-4 text-gray-200">No</th>
                                <th class="px-6 py-4 text-gray-200">Title</th>
                                <th class="px-6 py-4 text-gray-200">Category</th>
                                <th class="px-6 py-4 text-gray-200">Author</th>
                                <th class="px-6 py-4 text-gray-200">Views</th>
                                <th class="px-6 py-4 text-gray-200">Created At</th>
                                <th class="px-6 py-4 text-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $blog)
                                <tr class="bg-[#111827] hover:bg-gray-700 text-center">
                                    <td class="px-6 py-4 font-medium text-gray-100">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $blog->title }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $blog->category->name }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $blog->user->username }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $blog->views }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $blog->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 flex justify-items-center items-center align-middle">
                                        <a href="{{ route('blog.show', $blog->slug) }}"
                                            class=" hover:underline mr-2 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A2 2 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class=" hover:underline flex items-center hover:text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    fill="currentColor" class="ml-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="px-6 py-4 border-b border-gray-700 mt-10">
                <h2 class="text-2xl font-semibold text-white">Data User</h2>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div class="relative overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-gray-400 bg-white">
                        <thead class="bg-gray-800">
                            <tr class="text-center">
                                <th class="px-6 py-4 text-gray-200">No</th>
                                <th class="px-6 py-4 text-gray-200">Username</th>
                                <th class="px-6 py-4 text-gray-200">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr class="bg-[#111827] hover:bg-gray-700 text-center">
                                    <td class="px-6 py-4 font-medium text-gray-100">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $user->username }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $user->email }}</td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
