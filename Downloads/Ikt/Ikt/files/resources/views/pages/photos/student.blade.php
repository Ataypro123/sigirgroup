@extends('layout')

@section('title')
    {{$student->name}}
@endsection

@section('content')

    <div class="featured-courses page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$student->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container w-container">
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                    @if($student->studentContent->first()->role === 'Молодежный комитет')
                        @foreach($student->studentContent as $ssc)
                            <div class="featured-course-item w-col w-col-12 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-12">
                                            <a class="course-title-link with-summary">{{$ssc->name}}</a>
                                            <a class="course-title-link">Должность: {{$ssc->status}}</a>
                                            <a class="course-title-link">Курс: {{$ssc->course}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if($student->studentContent->first()->role === 'Отличники' || $student->studentContent->first()->role === 'Активист')
                        <div class="section-title-wrapper student-single">
                            <h4 class="section-title">Отличники</h4>
                        </div>
                        @foreach($student->studentContent->where('role', 'Отличники') as $ssc)
                        <div class="featured-course-item w-col w-col-12 w-dyn-item">
                            <div class="course-block-wrapper">
                                <div class="course-content-block flex-department-single">
                                    <div class="w-col-12">
                                        <a class="course-title-link with-summary">{{$ssc->name}}</a>
                                        <br>
                                        <div class="block-body-d-s">
                                            {!! htmlspecialchars_decode($ssc->body) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="section-title-wrapper student-single student-single-2">
                            <h4 class="section-title">Активисты</h4>
                        </div>
                        @foreach($student->studentContent->where('role', 'Активист') as $ssc)
                        <div class="featured-course-item w-col w-col-12 w-dyn-item">
                            <div class="course-block-wrapper">
                                <div class="course-content-block flex-department-single">
                                    <div class="w-col-3">
                                        <img src='{{asset("files/storage/app/{$ssc->image}")}}' class="img-department-single">
                                    </div>
                                    <div class="w-col-9">
                                        <a class="course-title-link with-summary">{{$ssc->name}}</a>
                                        <br>
                                        <div class="block-body-d-s">
                                            {!! htmlspecialchars_decode($ssc->body) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
