@extends('layouts.layout')

@section('content')
<div class="center_all">
    <div class="content">
        <div class="title">
        Oprettede Projekter
    </div>
    <table class="w-full">
        <thead class="bg-black">
            <tr>
                <th class="text-left px-4 py-2">ID</th>
                <th class="text-left px-4 py-2">Name</th>
                <th class="text-left px-4 py-2">Type</th>
                <th class="text-left px-4 py-2">Opgave</th>
                <th class="text-left px-4 py-2">Extra</th>
                <th class="text-left px-4 py-2">Oprettet</th>
                <th class="text-left px-4 py-2">Opdatered</th>
                <th colspan="2" class="text-left px-4 py-2">Options</th>
            </tr>
        </thead>
        <tr class="border-b border-t border-gray-800">
                    <td class="text-left px-4 py-2">{{ $project->id }}</td>
                    <td project-field="name" class="text-left px-4 py-2"><a href="/projects/{{ $project->id}}">{{ $project->name }}</a></td>
                    <td class="text-left px-4 py-2">{{ $project->type }}</td>
                    <td project-field="opgave" class="text-left px-4 py-2">{{ $project->opgave }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center">
                        @if($project->extra)
                            @foreach($project->extra as $extra)
                                <p class="bg-gray-900 rounded-md shadow-md text-center mr-2 px-2">{{ $extra }}</p>
                            @endforeach
                        @else
                            N/A
                        @endif
                        </div>  
                    </td>
                    <td><i class="fa fa-pencil" id="edit-project" project-id="{{ $project->id }}"></i></td>
                    <td>
                        <form class="flex items-center justify-center m-0" action="/projects/{{ $project->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button><i class="fas fa-check"></i></button>
                        </form>
                    </td>
</tr>
    </table>
    <div class="wrapper project-details">
        <!-- <h1 class="... font-bold h-7">Oprettet af {{ $project->name }}</h1> -->
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