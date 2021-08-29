@extends('layouts.layout')

@section('content')
<div class="center_all">
    <div class="content absolute bottom-1/3 shadow-2xl p-5">
        <img class="mx-auto" src="{{ asset('/img/icon.png') }}" alt="pfp">
        <h1 class="title"><strong>SOP Project</strong></h1>
        <p class="mssg">{!! session('mssg') !!}</p>
        <p class="msg">{!! session('msg') !!}</p>
        <div class="... pt-6 hover:underline w-40 m-auto">
            <a class="border-solid border-4 border-light-gray-500" href="/projects/create"><strong>Start Project</strong></a>
            <!-- <div class="mx-3">|</div>
            <a href="/projects">Active Projects</a> -->
        </div>
    </div>
</div>
@endsection