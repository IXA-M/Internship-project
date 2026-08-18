<x-layout>
    <x-slot:heading>Forgot Password</x-slot:heading>

    <div class="max-w-md mx-auto">

        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">
                Forgot your password?
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Enter your email address and we'll help you reset your password.
            </p>
        </div>

        <form method="POST" action="/forget-password" class="space-y-6">
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

            <!-- Continue -->
            <button
                type="submit"
                class="w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500"
            >
                Continue
            </button>
        </form>

        <!-- Back to Login -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Remember your password?

                <a
                    href="/login"
                    class="font-semibold text-indigo-600 hover:text-indigo-500"
                >
                    Back to Login
                </a>
            </p>
        </div>

    </div>
</x-layout>