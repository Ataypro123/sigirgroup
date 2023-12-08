@extends('layout')

@section('title')
    {{$subMenu->name}}
@endsection

@section('content')

    <div class="page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$subMenu->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ КНУ имени Жусупа Баласагына</h2>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container w-container">
            <div class="w-row">
                <div class="about-us-col-left w-col w-col-12">
                    <div class="section-title-wrapper">
                        <h2 class="section-title">{{$subMenu->name}}</h2>
                        <div class="section-title-divider"></div>
                    </div>
                </div>
                @if($subMenu->image)
                <div class="about-us-column-right w-col w-col-12">
                    <div class="about-us-image-block" style="background-image: url('/files/storage/app/{{$subMenu->image}}');"></div>
                    <br>
                </div>
                @endif
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="container w-container">
                    {!! htmlspecialchars_decode($subMenu->body) !!}
                </div>
            </div>
        </div>
    </div>

@endsection
