<x-layout>
    <x-slot:heading>Jobs Page</x-slot:heading>
    <h1> This is the Jobs page</h1>

    @foreach($jobs as $job)
    <ul>
<li><a href="/job/{{ $job['id'] }}">
            <strong>{{$job['title']}}</strong> pays {{ $job['salary'] }} per year</li></a>
    @endforeach
    </ul>
</x-layout>