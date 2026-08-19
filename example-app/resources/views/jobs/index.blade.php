<x-layout>
    <x-slot:heading>Jobs Page</x-slot:heading>

    <h1>This is the Jobs page</h1>

    <div class="space-y-4">
        @if(session()->has('success'))
    <div class="mb-4 rounded-md bg-green-100 px-4 py-3 text-green-800">
        {{ session('success') }}
    </div>
@endif
<a href="/jobs/create" class="mb-6 inline-block rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-500">Create Job</a>
        @foreach($jobs as $job)

            <div class="block px-4 py-6 border border-gray-200">

                <a href="/jobs/show/{{ $job->id }}">
                    <div class="font-bold text-blue-500">
                        {{ $job->employer->name }}
                    </div>

                    <strong>{{ $job->title }}</strong>
                    pays {{ $job->salary }} per year
                </a>

                @can('edit-job', $job)
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
                @endcan

            </div>

        @endforeach

    </div>

    <div>
        {{ $jobs->links() }}
    </div>

</x-layout>