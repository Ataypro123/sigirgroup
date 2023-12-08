@extends('layout')

@section('title')
    {{$category->name}}
@endsection

@section('content')

    <div class="page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$category->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">Кафедра ФИИТ, КНУ имени Жусупа Баласагына&nbsp;</h2>
            </div>
        </div>
    </div>

    <div class="section stats tint">
        <div class="container w-container">
            <div class="hero-overlay-row w-row">
                @foreach($category->subCategory as $cs)
                    <div class="last stats-column w-col w-col-4" style="margin-bottom: 15px">
                        <a class="hero-overlay-block w-inline-block" href="{{route('pages.subCategory', [$category->slug, $cs->id])}}">
                            <div class="hero-overlay-block-title">{{$cs->name}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
