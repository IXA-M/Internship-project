<x-layout>
    <x-slot:heading>My Profile</x-slot:heading>

    <div class="mx-auto max-w-2xl">

        <div class="rounded-lg border border-gray-200 bg-white p-8 shadow-sm">

            <div class="flex flex-col items-center">

                {{-- Profile Picture --}}
                @if (auth()->user()->profile_picture)
                    <img
                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                        alt="{{ auth()->user()->name }}"
                        class="size-48 rounded-full object-cover ring-4 ring-gray-200"
                    >
                @else
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff&size=192"
                        alt="{{ auth()->user()->name }}"
                        class="size-48 rounded-full object-cover ring-4 ring-gray-200"
                    >
                @endif

                {{-- User Name --}}
                <h2 class="mt-5 text-2xl font-bold text-gray-900">
                    {{ auth()->user()->name }}
                </h2>

                <p class="mt-1 text-gray-500">
                    {{ auth()->user()->email }}
                </p>

            </div>


            {{-- Upload Form --}}
            <div class="mt-8 border-t border-gray-200 pt-6">

                <h3 class="text-lg font-semibold text-gray-900">
                    Change Profile Picture
                </h3>

                <form
                    method="POST"
                    action="/profile"
                    enctype="multipart/form-data"
                    class="mt-4"
                >
                    @csrf
                    @method('PUT')
                    <div>
                        <label
                            for="profile_picture"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Choose a new picture
                        </label>

                        <input
                            type="file"
                            name="profile_picture"
                            id="profile_picture"
                            accept="image/jpeg,image/png,image/gif,image/webp"
                            class="mt-2 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700"
                        >

                        @error('profile_picture')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <button
                            type="submit"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500"
                        >
                            Upload Picture
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</x-layout>