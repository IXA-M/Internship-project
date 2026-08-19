<x-layout>
    <x-slot:heading>Job Details</x-slot:heading>

    <div class="space-y-4 px-4 py-6 border border-gray-200">

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

            @can('edit-job', $job)
                <a href="/jobs/{{ $job->id }}/edit">
                    <x-form-button type="button">
                        Edit
                    </x-form-button>
                </a>
            @endcan

           

            @can('edit-job', $job)
                <form
                    method="POST"
                    action="/jobs/{{ $job->id }}"
                >
                    @csrf
                    @method('DELETE')

                    <x-form-button
                        type="submit"
                        class="bg-red-600 hover:bg-red-500"
                    >
                        Delete
                    </x-form-button>
                </form>
            @endcan

        </div>

    </div>
</x-layout>