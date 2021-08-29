@extends('layouts.layout')

@section('content')
<div class="center_all">
    <div class="wrapper project-details">
        <h1>Oprettet af {{ $project->name }}</h1>
        <p class="type">type - {{ $project->type }}</p>
        <p class="opgave">opgave - {{ $project->opgave }}</p>
        <p class="extra">Extra Info</p>
        <ul>
            @if($project->extra)
                @foreach($project->extra as $extra)
                <li>{{ $extra }}</li>
                @endforeach
            @else   
                <li>N/A</li>
            @endif
        </ul>
        <h1>Created at</h1>
        <h2>{{ $project->created_at->diffForHumans() }}</h2>
        <h1>Updated at</h1>
        <h2>{{ $project->updated_at->diffForHumans() }}</h2>
        <form action="/projects/{{ $project->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Finish Projects</button>
        </form>
        <a href="{{ route('list.projects') }}" class="back"><- back to all Projects</a>
    </div>
</div>
@endsection