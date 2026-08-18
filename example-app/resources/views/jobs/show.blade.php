<x-layout>
    <x-slot:heading>Job Details</x-slot:heading>

    <div class="space-y-4cblock px-4 py-6 border border-gray-200">

        <div>
            <h2 class="text-xl font-bold">
                {{ $job->employer->name }}
            </h2>
                
            
        </div>

        <div>
            <strong>{{ $job->title }}</strong>
            pays {{ $job->salary }} per year
        </div>
        <div class="mt-4 flex gap-3">

                    <a
                        href="/jobs/{{ $job->id }}/edit"
                        class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white"
                    >
                        Edit
                    </a>

                    <form
                        method="POST"
                        action="/jobs/{{ $job->id }}"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white cursor-pointer "
                        >
                            Delete
                        </button>
                    </form>

                </div>

    </div>
</x-layout>