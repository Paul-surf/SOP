@extends('layouts.layout')

@section('content')
<div class="center_all">
    <div class="content absolute bottom-1/3 shadow-2xl p-5">
        <!-- <img class="mx-auto" src="{{ asset('/img/icon.png') }}" alt="pfp"> -->
        <div class="fas fa-address-card fa-10x"></div>
        <h1 class="title"><strong>Digital Registrering</strong></h1>
        <p class="mssg">{!! session('mssg') !!}</p>
        <p class="msg">{!! session('msg') !!}</p>
        <div class="... flex flex-row items-center justify-center pt-6 m-30">
            <a class="hover:underline" href="/projects/create"><strong>Start Projekt</strong></a>
            <div class="mx-3">|</div>
            <a href="/projects" class="hover:underline">Aktive Projekter</a>
        </div>
    </div>
</div>
@endsection