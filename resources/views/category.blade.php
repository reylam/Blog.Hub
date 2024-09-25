<x-app-layout>
    <div class="flex flex-col gap-6">

        <div class="text-center p-5">
            <p class="font-extrabold text-2xl my-3">{{ $category->name }}</p>
            <p class="font-medium text-gray-500 my-3">
                Find the perfect <b>{{ $category->name }} Category </b> that matches your preferences.
            </p>
        </div>
        <main class="min-w-full flex justify-center">
            <div class="flex w-[1380px] flex-wrap gap-9">
                <div class="flex w-[1380px] flex-wrap gap-9">
                    @foreach ($category->blogs as $blog)
                        <div class="w-[435px] object-cover flex flex-col gap-5">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="w-full h-[530px] rounded-2xl">
                            <div class="flex flex-col gap-4 px-4 ">
                                <p class="font-extrabold text-2xl"> {{ Str::limit($blog->title, 20, '...') }}</p>
                                <p class="font-medium text-gray-500 flex-grow">
                                    {{ Str::limit($blog->content, 90, '...') }}</p>
                                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                                <div class="flex gap-5 align-middle text-gray-400 justify-between">

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
            </div>
        </main>
    </div>
</x-app-layout>
