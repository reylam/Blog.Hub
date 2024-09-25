<nav x-data="{ open: false }" class="bg-none sticky top-0 z-10 bg-[#111827] opacity-80">
    <!-- Primary Navigation Menu -->
    <div class="w-full px-4 py-3 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
            <!-- Nav -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('dashboard') }}"
                        class="font-['Poppins'] text-white px-[40px] text-[14px] py-2 rounded">Home</a>
                    <a href="{{ route('blog.index') }}"
                        class="font-['Poppins'] text-white px-[40px] text-[14px] py-2 rounded">Blog</a>
                    @auth
                        <a href="{{ route('profile.bookmark') }}"
                            class="font-['Poppins'] text-white px-[40px] text-[14px] py-2 rounded">Bookmark</a>
                    @endauth
                </div>
            </div>
            @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center justify-around space-x-2 h-[50px] w-[150px] bg-[#D9D9D9] rounded-full font-semibold text-black">
                                @auth
                                    <div>{{ Auth::user()->name }}</div>
                                @endauth
                                <div class="">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                {{ Str::limit(Auth::user()->username, 5, '') }}
                                @if (Auth::user()->profile === null)
                                    <img src="{{ asset('storage/' . 'profiles/default.png') }}" alt="Profile Picture"
                                        class="w-10 h-10 rounded-full fill-black bg-black">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="Profile Picture"
                                        class="w-10 h-10 rounded-full fill-black bg-black">
                                @endif
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Auth::user()->roles[0]->name === 'admin')
                                <x-dropdown-link :href="route('admin.dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                @auth
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @endauth
            </div>
        @endauth
        @guest
            <div class="flex gap-7 items-center">

                <a href="{{ route('login') }}"
                    class="px-5 py-2 rounded-3xl bg-slate-500 transition-all ease-linear duration-200 hover:bg-slate-600 hover:font-semibold">Login</a>
                <a href="{{ route('register') }}" class="">Register</a>
            </div>
        @endguest
    </div>
</nav>
