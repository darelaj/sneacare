<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

    <title>Admin Page</title>
</head>

<body>
    <div class="min-h-screen bg-[#F5F5F5]">

        <div class="flex flex-col">
            <div class="w-1/3 inline-block">
                <aside id="default-sidebar"
                    class="inline-block fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                    aria-label="Sidebar">

                    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-white">
                        <div class="text-center mb-4">
                            <span class="p-2 pb-40 text-3xl font-bold mx-auto text-[#013cc6]">SNEACARE</span>
                            <span class="p-2 pb-40 text-xl font-semibold mx-auto text-[#013cc6]">Admin Page</span>
                        </div>
                        <ul class="space-y-2 font-medium">
                            <li>
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form> --}}
                                {{-- <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="flex
                                        items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100
                                        dark:hover:bg-gray-700 group">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 18 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                                    </a>
                                </form> --}}
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 18 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                                    </button>
                                </form>

                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            @yield('content')
        </div>
    </div>
</body>

</html>
