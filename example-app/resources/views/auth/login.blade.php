<x-layout>
    <x-slot:heading>Login</x-slot:heading>

    <div class="max-w-md mx-auto">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">
                Welcome back
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Login to your account to continue.
            </p>
        </div>

        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-900"
                >
                    Email
                </label>

                <x-form-input
                    name="email"
                    id="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                />

                <x-form-error name="email" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-900"
                    >
                        Password
                    </label>

                    <a
                        href="/forget-password"
                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-500"
                    >
                        Forgot password?
                    </a>
                </div>

                <x-form-input
                    name="password"
                    id="password"
                    type="password"
                    required
                />

                <x-form-error name="password" />
            </div>

            <!-- Remember me -->
            <div class="flex items-center">
                <input
                    id="remember"
                    name="remember"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                >

                <label
                    for="remember"
                    class="ml-2 block text-sm text-gray-700"
                >
                    Remember me
                </label>
            </div>

            <!-- Login -->
            <button
                type="submit"
                class="w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500"
            >
                Login
            </button>
        </form>

        <!-- Sign up -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?

                <a
                    href="/register"
                    class="font-semibold text-indigo-600 hover:text-indigo-500"
                >
                    Sign up
                </a>
            </p>
        </div>
    </div>
</x-layout>