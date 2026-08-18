<x-layout>
    <x-slot:heading>Reset Password</x-slot:heading>

    <div class="max-w-md mx-auto">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">
                Reset your password
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Enter your new password below.
            </p>
        </div>

        <form method="POST" action="/reset-password" class="space-y-6">
            @csrf
            @method('PUT')

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
                    value="{{ $email }}"
                    readonly
                    required
                />

                <x-form-error name="email" />
            </div>

            <!-- New Password -->
            <div>
                <label
                    for="password"
                    class="block text-sm font-medium text-gray-900"
                >
                    New Password
                </label>

                <x-form-input
                    name="password"
                    id="password"
                    type="password"
                    required
                />

                <x-form-error name="password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label
                    for="password_confirmation"
                    class="block text-sm font-medium text-gray-900"
                >
                    Confirm Password
                </label>

                <x-form-input
                    name="password_confirmation"
                    id="password_confirmation"
                    type="password"
                    required
                />

                <x-form-error name="password_confirmation" />
            </div>

            <!-- Reset Password -->
            <button
                type="submit"
                class="w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500"
            >
                Reset Password
            </button>
        </form>

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

