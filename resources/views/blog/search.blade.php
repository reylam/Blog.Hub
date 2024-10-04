<x-app-layout>
    <div class="container mx-auto p-6 flex flex-col gap-3">
        <div class="flex gap-3">
            <a href="{{ route('dashboard') }}" class="text-2xl bg-blue-900 w-8 h-8 rounded-full flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                    <path
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg>
            </a>

            <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $name }}"</h1>
        </div>


        @if ($blogs->isEmpty())
            <p class="text-gray-500">No blogs found matching "{{ $name }}"</p>
        @else
            <main class="min-w-full flex flex-col gap-10 items-center justify-center mb-10">
                <div class="flex w-[1380px] flex-wrap gap-9">
                    @foreach ($blogs as $blog)
                        <div class="w-[435px] h-[800px] object-cover flex flex-col gap-5">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                class="w-[435px] h-[530px] rounded-2xl object-cover">
                            <div class="flex flex-col gap-4 px-4 flex-grow">
                                <p class="font-extrabold text-2xl"> {{ Str::limit($blog->title, 20, '...') }}</p>
                                <p class="font-medium text-gray-500 flex-grow">
                                    {{ Str::limit($blog->content, 90, '...') }}</p>
                                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                                <div class="flex gap-5 align-middle text-gray-400 justify-between">
                                    @auth
                                        @if (!$blog->bookmarks->contains('user_id', Auth::user()->id))
                                            <form action="{{ route('bookmark.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                                <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
                                            </svg>
                                        @endif
                                    @endauth
                                    <div class="flex gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path
                                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                        </svg>
                                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                        <p>{{ $blog->views }} Views</p>
                                    </div>
                                </div>
                                <form action="{{ route('blog.show', $blog->slug) }}">
                                    <button type="submit"
                                        class="w-full align-middle mt-3 transition-all ease-in duration-200 border-solid border-2 border-gray-600 p-3 rounded-3xl hover:bg-blue-600 hover:font-semibold hover:border-blue-600">Read
                                        More</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        @endif
    </div>
</x-app-layout>
