<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<body class="h-full">

<div class="min-h-full">

    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex h-16 items-center justify-between">

                <!-- Left side -->
                <div class="flex items-center">

                    <div class="shrink-0">
                        <img
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company"
                            class="size-8"
                        />
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">

                            <x-nav-link
                                href="/"
                                :active="request()->is('/')"
                            >
                                Home
                            </x-nav-link>

                            <x-nav-link
                                href="/jobs"
                                :active="request()->is('jobs')"
                            >
                                Jobs
                            </x-nav-link>

                            <x-nav-link
                                href="/contact"
                                :active="request()->is('contact')"
                            >
                                Contact
                            </x-nav-link>

                        </div>
                    </div>
                </div>

                <!-- Right side -->
                <div class="flex items-center gap-4">

                    @guest

                        <div class="flex items-center space-x-3">

                            <a
                                href="/login"
                                class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                            >
                                Login
                            </a>

                            <a
                                href="/register"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-500"
                            >
                                Register
                            </a>

                        </div>

                    @endguest


                    @auth

                        <!-- Profile Picture -->
                        <a href="/profile" class="block">
                            @if (auth()->user()->profile_picture)
                                <img
                                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                    alt="{{ auth()->user()->name }}"
                                    class="size-10 rounded-full object-cover ring-2 ring-gray-600 hover:ring-indigo-500"
                                >
                            @else
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
                                    alt="{{ auth()->user()->name }}"
                                    class="size-10 rounded-full object-cover ring-2 ring-gray-600 hover:ring-indigo-500"
                                >
                            @endif
                        </a>

                        <!-- Logout -->
                        <form method="POST" action="/logout">
                            @csrf

                            <button
                                type="submit"
                                class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                            >
                                Logout
                            </button>
                        </form>

                    @endauth

                </div>

            </div>
        </div>

        <!-- Mobile menu -->
        <el-disclosure
            id="mobile-menu"
            hidden
            class="block md:hidden"
        >
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">

                <a
                    href="/"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                >
                    Home
                </a>

                <a
                    href="/jobs"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                >
                    Jobs
                </a>

                <a
                    href="/contact"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                >
                    Contact
                </a>

                @guest

                    <a
                        href="/login"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                    >
                        Login
                    </a>

                    <a
                        href="/register"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                    >
                        Register
                    </a>

                @endguest

                @auth

                    <!-- Mobile Profile -->
                    <a
                        href="/profile"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                    >
                        @if (auth()->user()->profile_picture)
                            <img
                                src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                alt="{{ auth()->user()->name }}"
                                class="size-8 rounded-full object-cover"
                            >
                        @else
                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
                                alt="{{ auth()->user()->name }}"
                                class="size-8 rounded-full object-cover"
                            >
                        @endif

                        Profile
                    </a>

                    <!-- Mobile Logout -->
                    <form method="POST" action="/logout">
                        @csrf

                        <button
                            type="submit"
                            class="block w-full rounded-md px-3 py-2 text-left text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                        >
                            Logout
                        </button>
                    </form>

                @endauth

            </div>
        </el-disclosure>

    </nav>


    <header class="relative bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                {{ $heading }}
            </h1>
        </div>
    </header>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

</div>

</body>
</html>