@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
@endsection

@section('content')

    <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}'); height: 750px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div>

    @include('components.section',[$page])
@endsection
