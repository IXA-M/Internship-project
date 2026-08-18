<x-layout>
    <x-slot:heading>Edit Job</x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PUT')

        <div class="space-y-6">

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-900">
                    Job Title
                </label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ $job->title }}"
                    class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-1 outline-gray-300"
                >

                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Salary -->
            <div>
                <label for="salary" class="block text-sm font-medium text-gray-900">
                    Salary
                </label>

                <input
                    id="salary"
                    type="text"
                    name="salary"
                    value="{{ $job->salary }}"
                    class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline-1 outline-gray-300"
                >

                @error('salary')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Employer -->
            <div>
                <label for="employer_id" class="block text-sm font-medium text-gray-900">
                    Employer
                </label>

                <select
                    id="employer_id"
                    name="employer_id"
                    class="mt-2 block w-full rounded-md bg-white py-1.5 px-3 text-gray-900 outline-1 outline-gray-300"
                >
                    @foreach($employers as $employer)
                        <option
                            value="{{ $employer->id }}"
                            {{ $job->employer_id == $employer->id ? 'selected' : '' }}
                        >
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>

                @error('employer_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="mt-6 flex gap-4">

            <button
                type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500"
            >
                Update Job
            </button>

            <a
                href="/jobs"
                class="rounded-md bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-900"
            >
                Cancel
            </a>

        </div>
    </form>

    {{-- <!-- Delete -->
    <form
        method="POST"
        action="/jobs/{{ $job->id }}"
        class="mt-4"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500"
        >
            Delete Job
        </button> --}}
    </form>

</x-layout>