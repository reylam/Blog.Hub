<x-app-layout>
    <div class="single-Blog">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-2/3 mb-8">
                    <div class="sn-container flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            @if ($blog->user->profile === null)
                                <img src="{{ asset('storage/' . 'profiles/default.png') }}" alt="Profile Picture"
                                     class="w-10 h-10 rounded-full fill-black bg-black">
                            @else
                                <img src="{{ asset('storage/' . $blog->user->profile) }}" alt="Profile Picture"
                                     class="w-10 h-10 rounded-full fill-black bg-black">
                            @endif
                            <p class="font-semibold">{{ $blog->user->username }}</p>
                        </div>
                        <div class="my-5">
                            <h2 class="sw-title text-xl font-bold">Blog Category</h2>
                            <div class="category">
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <a href="#" class="hover:text-blue-600">{{ $blog->category->name }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>
                        <div class="sn-img">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                 class="w-full max-h-[500px] rounded-md shadow-md" />
                        </div>
                        <div class="sn-content py-4">
                            <p class="mb-4">{{!! $blog->content !!}}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/3">
                    <div class="sidebar space-y-8 ms-5">
                        <div class="sidebar-widget">
                            <h2 class="sw-title text-xl font-bold mb-4">Related Blog</h2>
                            <div class="Blog-list space-y-4 my-3">
                                @foreach ($blogs as $relatedBlog)
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $relatedBlog->thumbnail) }}"
                                             class="w-20 h-16 rounded-md mr-4 object-cover" />
                                        <div class="nl-title">
                                            <a href="{{ route('blog.show', $relatedBlog->slug) }}"
                                               class="text-blue-600">{{ $relatedBlog->title }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h2 class="sw-title text-xl font-bold mb-4">Comments</h2>
                            <div class="comments-section space-y-4">
                                @foreach ($comments as $comment)
                                    <div class="comment-item flex flex-col gap-3 bg-slate-500 p-4 rounded-lg">
                                        <div class="flex items-center justify-between gap-5">
                                            <div class="flex gap-2 items-center">
                                                @if ($comment->user->profile === null)
                                                <img src="{{ asset('storage/' . 'profiles/default.png') }}" alt="Profile Picture"
                                                class="w-10 h-10 rounded-full fill-black bg-black">
                                                @else
                                                <img src="{{ asset('storage/' . $comment->user->profile) }}" alt="Profile Picture"
                                                class="w-10 h-10 rounded-full fill-black bg-black">
                                                @endif
                                                <p class="font-semibold">{{ $comment->user->username }}</p>
                                            </div>
                                            @auth
                                                @if (Auth::user()->roles[0]->name === 'admin' || $comment->user_id === Auth::user()->id)  
                                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
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
                                                @endif
                                            @endauth
                                            
                                        </div>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                            @auth
                                <form action="{{ route('comment.store') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="flex w-full gap-3">
                                        <input type="text" name="user_id" class="hidden" value="{{Auth::user()->id}}">
                                        <input name="content" class="w-full border-2 hover:border-[#FFD600] rounded-md p-2 bg-transparent" rows="4"
                                        placeholder="Leave a comment...">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}"> <!-- Pastikan ini mengacu pada blog yang sedang ditampilkan -->
                                        <button type="submit"
                                        class=" bg-blue-600 text-white py-2 px-4 rounded-md">Submit</button>
                                    </div>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
