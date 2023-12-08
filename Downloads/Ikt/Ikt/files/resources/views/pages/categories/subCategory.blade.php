@extends('layout')

@section('title')
    {{$category->name}} / {{$subCategory->name}}
@endsection

@section('content')

    <div class="page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$category->name}} / {{$subCategory->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">Кафедра ФИИТ, КНУ имени Жусупа Баласагына&nbsp;</h2>
            </div>
        </div>
    </div>

    <div class="section stats tint">
        <div class="container w-container">
            <div class="hero-overlay-row w-row">
                @foreach($category->subCategory as $cs)
                    <div class="last stats-column w-col w-col-4" style="margin-bottom: 15px">
                        <a class="hero-overlay-block w-inline-block {{ Request::is("ych-programmy/{$category->slug}/{$cs->id}") ? 'active-sub' : '' }}" href="{{route('pages.subCategory', [$category->slug, $cs->id])}}">
                            <div class="hero-overlay-block-title">{{$cs->name}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($subCategory->body || $subCategory->image)
        <div class="section tint">
            <div class="container w-container">
                <div class="w-row">
                    <div class="container w-container">
                        @if($subCategory->image)
                            <img src='{{asset("files/storage/app/{$subCategory->image}")}}' alt="{{$subCategory->name}}" class="img-fluid">
                            <br>
                        @endif
                        <p>{!! htmlspecialchars_decode($subCategory->body) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($subCategory->files->where('type', 0)->first())
        <div class="section">
            <div class="container w-container">
                <div class="section-title-wrapper">
                    <h2 class="section-title">Наши научные проекты</h2>
                    <div class="section-title-divider"></div>
                </div>
                <div class="featured-courses-list-wrapper w-dyn-list">
                    <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                        @foreach($subCategory->files->where('type', 0) as $key=>$sf)
                            <div class="featured-course-item w-col w-col-12 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-12">
                                            <a href='{{asset("files/storage/app/{$sf->file}")}}' target="_blank" class="course-title-link with-summary">
                                                <span>{{$key+1}}) </span>{{$sf->name}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($subCategory->files->where('type', 1)->first())
        <div class="section">
            <div class="container w-container">
                <div class="section-title-wrapper">
                    <h2 class="section-title">Дипломные работы</h2>
                    <div class="section-title-divider"></div>
                </div>
                <div class="featured-courses-list-wrapper w-dyn-list">
                    <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                        @foreach($subCategory->files->where('type', 1) as $value=>$sf)
                            <div class="featured-course-item w-col w-col-12 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-12">
                                            <a href='{{asset("files/storage/app/{$sf->file}")}}' target="_blank" class="course-title-link with-summary">
                                                <span>{{$value+1}}) </span>{{$sf->name}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($subCategory->files->where('type', 2)->first())
        <div class="section">
            <div class="container w-container">
                <div class="section-title-wrapper">
                    <h2 class="section-title">Публикации</h2>
                    <div class="section-title-divider"></div>
                </div>
                <div class="featured-courses-list-wrapper w-dyn-list">
                    <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                        @foreach($subCategory->files->where('type', 2) as $item=>$sf)
                            <div class="featured-course-item w-col w-col-12 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-12">
                                            <a href='{{$sf->url}}' target="_blank" class="course-title-link with-summary">
                                                <span>{{$item+1}}) </span>{{$sf->name}}
                                                <br>
                                                <span>{{$sf->url}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($subCategory->teamDepartment->first())
        <div class="section">
            <div class="container w-container">
                <div class="section-title-wrapper">
                    <h2 class="section-title">Сотрудники</h2>
                    <div class="section-title-divider"></div>
                </div>
                <div class="featured-courses-list-wrapper w-dyn-list">
                    <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                        @foreach($subCategory->teamDepartment as $td)
                            <div class="featured-course-item w-col w-col-12 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-4">
                                            <img src='{{asset("files/storage/app/{$td->image}")}}' class="img-department-single">
                                        </div>
                                        <div class="w-col-8">
                                            <a class="course-title-link with-summary">{{$td->name}}</a>
                                            <a class="pdf-d-s">{{$td->status}}</a>
                                            @if($td->pdf)
                                                <a href='{{url("files/storage/app/{$td->pdf}")}}' target="_blank" class="pdf-d-s">Резюме</a>
                                            @endif
                                            <br>
                                            <div class="block-body-d-s">
                                                {!! htmlspecialchars_decode($td->body) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($subCategory->terms->first())
        <div class="section">
            @foreach($subCategory->terms as $st)
                @if($st->disciplines->first())
                <div class="container w-container">
                    <div class="featured-courses-list-wrapper w-dyn-list">
                        <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                            <div class="featured-course-item w-col w-col-12 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-12">
                                            <section class="tablica">
                                                <div class="container">
                                                    <div class="tablica__wrapper">
                                                        <fieldset style="border:1px solid #ccc; border-radius: 4px; margin-bottom: 15px;">
                                                            <legend class="tablica__title">{{$st->name}}</legend>
                                                                <table class="table table__primary">
                                                                    <tbody>
                                                                    <tr style="background-color: white; color: black;">
                                                                        <th style="border-top: 0; width: 90px; ">Код</th>
                                                                        <th style="border-top: 0; ">Название</th>
                                                                        <th style="border-top: 0; width: 100px;">Тип Курса*</th>
                                                                        <th style="border-top: 0; width: 90px;">T</th>
                                                                        <th style="border-top: 0; width: 90px;">U</th>
                                                                        <th style="border-top: 0; width: 100px;">K</th>
                                                                        <th style="border-top: 0; width: 90px;"><span title="Europian Credit Transfer and Accumlation System">ECTS</span></th>
                                                                    </tr>
                                                                    @foreach($st->disciplines as $sd)
                                                                    <tr>
                                                                        <td>{{$sd->code}}</td>
                                                                        <td>
                                                                            <a href='{{url("files/storage/app/{$sd->file}")}}' target="_blank" class="matem">
                                                                                {{$sd->name}}
                                                                            </a>
                                                                        </td>
                                                                        <td>{{$sd->type}}</td>
                                                                        <td>{{$sd->t}}</td>
                                                                        <td>{{$sd->u}}</td>
                                                                        <td>{{$sd->k}}</td>
                                                                        <td>{{$sd->ects}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endif
            @endforeach
        </div>
    @endif
@endsection
