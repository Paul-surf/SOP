@extends('layouts.layout')


@section('content')
<div class="container m-auto">
    <div class="p-20 shadow-2xl m-auto w-50">
        <h1 class="relative text-3xl"><strong>Opret et nyt Projekt</strong></h1>
        <form action="/projects" method="POST">
        @csrf
            <label class="block" for="name">Dit navn:</label>
            <input type="text" name="name" id="name">
            <label class="block pt-5" for="type">Vælg Project type</label>
            <select class="block" name="type" id="type">
                <option value="projekt">Projekt</option>
                <option value="aflevering">Aflevering</option>
                <option value="lektier">Lektier</option>
                <option value="presentation">Præsentation</option>
            </select>
            <label class="block pt-5" for="opgave">Din opgave</label>
            <input type="text" name="opgave" id="opgave">
            <fieldset>
                <label>Extra Info</label>
                <input type="checkbox" name="extra[]" value="Gruppe">Gruppe<br />
                <input type="checkbox" name="extra[]" value="Solo">Solo<br />
                <input type="checkbox" name="extra[]" value="examine">Undersøgelse<br />
                <input type="checkbox" name="extra[]" value="Video">Video<br />
            </fieldset>
            <input type="submit" value="Opret Projekt">
        </form>
    </div>
</div>
@endsection