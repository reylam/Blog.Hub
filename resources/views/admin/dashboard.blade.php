<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-[#111827] rounded-lg shadow-md w-full">
            <div class="flex gap-6">
                <div class="flex flex-col">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h2 class="text-2xl font-semibold text-white">Data Blog</h2>
                    </div>
                    <div class="flex items-center justify-center">
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
                                            <td class="px-6 py-4 text-gray-100">{{ $blog->created_at->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4 flex items-center align-middle justify-center">
                                                <form action="{{ route('blog.show', $blog->slug) }}">
                                                    <button class=" hover:underline mr-2 hover:text-blue-500"
                                                        type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="18" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A2 2 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class=" hover:underline flex items-center hover:text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="18" fill="currentColor" class="ml-1"
                                                            viewBox="0 0 16 16">
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
                </div>

                <div class="flex flex-col">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h2 class="text-2xl font-semibold text-white">Data Category</h2>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="relative overflow-x-auto w-full">
                            <table class="w-full text-sm text-left text-gray-400 bg-white">
                                <thead class="bg-gray-800">
                                    <tr class="text-center">
                                        <th class="px-6 py-4 text-gray-200">No</th>
                                        <th class="px-6 py-4 text-gray-200">Catagory Name</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr class="bg-[#111827] hover:bg-gray-700 text-center">
                                            <td class="px-6 py-4 font-medium text-gray-100">{{ $key + 1 }}</td>
                                            <td class="px-6 py-4 text-gray-100">{{ $category->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 border-b border-gray-700 mt-10 flex gap-3 items-center">
                <h2 class="text-2xl font-semibold text-white">Data User</h2>
                <button id="addBlog" class="transition duration-300 ease-in-out transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-database-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                        <path
                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                    </svg>
                </button>
                <button id="minimizeAddBlog" class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-database-dash" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1" />
                        <path
                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col bg-slate-800 px-5 py-7 my-10 rounded-md hidden transition-opacity duration-300 opacity-0"
                id="formUser">
                <form action="{{ route('admin.storeAccount') }}" class="gap-4 flex-col flex w-full" method="POST">
                    @csrf
                    <div class="flex flex-col gap-1">
                        <label for="username">Email</label>
                        <input type="email" name="email" class="bg-slate-900 rounded-md"
                            placeholder="budionosiregar@email.com">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="bg-slate-900 rounded-md"
                            placeholder="Budiono Siregar">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="bg-slate-900 rounded-md" placeholder="******">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="role">Role</label>
                        <select name="role_id" id="role" class="bg-slate-900 rounded-md text-gray-500">
                            <option value="" selected disabled class="bg-gray-700 text-gray-400">
                                Select Role User..
                            </option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" class="bg-gray-800 text-white">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-800 p-3 rounded-xl">Submit</button>
                </form>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div class="relative overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-gray-400 bg-white">
                        <thead class="bg-gray-800">
                            <tr class="text-center">
                                <th class="px-6 py-4 text-gray-200">No</th>
                                <th class="px-6 py-4 text-gray-200">Username</th>
                                <th class="px-6 py-4 text-gray-200">Email</th>
                                <th class="px-6 py-4 text-gray-200">Role</th>
                                <th class="px-6 py-4 text-gray-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr class="bg-[#111827] hover:bg-gray-700 text-center">
                                    <td class="px-6 py-4 font-medium text-gray-100">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $user->username }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-gray-100">{{ $user->roles[0]->name }}</td>
                                    <td class="px-6 py-4 flex items-center align-middle justify-center gap-4">
                                        <button onclick="toggleCollapse({{ $user->id }})"
                                            class="rounded-full hover:text-green-500 transition duration-300 shadow-md flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.deleteAccount', $user->username) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="rounded-full hover:text-red-500 transition duration-300 shadow-md flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr id="collapse-{{ $user->id }}"
                                    class="hidden transition-all ease-in-out duration-300 bg-[#111827e8] hover:bg-[#111827db] text-center">
                                    <form action="{{ route('admin.updateAccount', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td colspan="1"></td>
                                        <td colspan="1" class="px-6 py-4 text-gray-500">
                                            <input type="text"
                                                class="border-none focus:outline-none text-center focus:ring-0 bg-transparent"
                                                name="username" value="{{ $user->username }}">
                                        </td>
                                        <td colspan="1" class="px-6 py-4 text-gray-500">
                                            <input type="text"
                                                class="border-none focus:outline-none text-center focus:ring-0 bg-transparent"
                                                name="email" value="{{ $user->email }}">
                                        </td>
                                        <td colspan="1" class="px-6 py-4 text-gray-500">
                                            <select name="role_id" id="role"
                                                class="border-none focus:outline-none text-center focus:ring-0 bg-transparent">
                                                <option value="{{ $user->roles[0]->id }}" selected
                                                    class="bg-gray-700 text-gray-400">
                                                    {{ $user->roles[0]->name }}
                                                </option>
                                                @foreach ($roles->except([$user->roles[0]->id]) as $role)
                                                    <option value="{{ $role->id }}"
                                                        class="bg-gray-800 text-white">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button href="#" class="bg-blue-600 p-2 rounded-md"
                                                data-ripple-light="true" type="submit">
                                                Submit
                                            </button>
                                        </td>
                                    </form>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const addBlog = document.getElementById('addBlog');
        const minimize = document.getElementById('minimizeAddBlog');
        const formUser = document.getElementById('formUser');

        addBlog.addEventListener('click', function() {
            formUser.classList.remove('hidden');
            formUser.classList.add('opacity-0'); 

            setTimeout(() => {
                formUser.classList.remove('opacity-0'); 
                formUser.classList.add('opacity-100');
            }, 10); 

            addBlog.classList.add('hidden');
            setTimeout(() => {
                addBlog.classList.add('hidden');
                minimize.classList.remove('opacity-0', 'scale-90');
                minimize.classList.remove('hidden');
                minimize.classList.add('opacity-100', 'scale-100'); 
            }, 300);
        });


        minimize.addEventListener('click', function() {
            addBlog.classList.remove('hidden')
            minimize.classList.add('hidden')
            setTimeout(() => {
                formUser.classList.add('hidden');
            }, 300);
            formUser.classList.remove('opacity-100');
            formUser.classList.add('opacity-0');
        });

        function toggleCollapse(id) {
            const targetCollapse = document.getElementById('collapse-' + id);
            const isHidden = targetCollapse.classList.contains('hidden');

            const allCollapses = document.querySelectorAll('[id^="collapse-"]');
            allCollapses.forEach(collapse => {
                if (collapse !== targetCollapse && !collapse.classList.contains('hidden')) {
                    collapse.classList.add('hidden');
                    collapse.style.maxHeight = null;
                }
            });

            if (isHidden) {
                targetCollapse.classList.remove('hidden');
                targetCollapse.style.maxHeight = targetCollapse.scrollHeight + "px";
            } else {
                targetCollapse.style.maxHeight = null;
                setTimeout(() => {
                    targetCollapse.classList.add('hidden');
                }, 300);
            }
        }
    </script>
</x-app-layout>
