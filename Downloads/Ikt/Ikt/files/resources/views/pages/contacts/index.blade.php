@extends('layout')

@section('title')
    Контакты
@endsection

@section('content')

    <div class="page-header">
        <div class="color page-header-overlay pricing">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">Контакты</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container w-container">
            <div class="contact-us-row w-row">
                <div class="contact-us-column-left w-col w-col-4">
                    <div class="contact-us-block">
                        <div class="section-title-wrapper">
                            <h2 class="section-title">Контактная информация</h2>
                            <div class="section-title-divider"></div>
                        </div>
                        <p>720033<br>г. Бишкек <br> ул. Фрунзе - 547</p><a class="contact-info-block w-inline-block" href="#">
                            <div class="contact-info-icon"></div>
                            <div class="contact-info-text">+996(312) 32-31-04</div>
                        </a><a class="contact-info-block w-inline-block" href="#">
                            <div class="contact-info-icon"></div>
                            <div class="contact-info-text">fiitknu@mail.ru</div>
                        </a>
                    </div>
                </div>
                <div class="contact-us-column-right w-col w-col-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4916.814390511281!2d74.58632655939628!3d42.88222891119185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x389ec81bf79c52b1%3A0xbe5200874d51edf6!2z0JrRi9GA0LPRi9C30YHQutC40Lkg0J3QsNGG0LjQvtC90LDQu9GM0L3Ri9C5INGD0L3QuNCy0LXRgNGB0LjRgtC10YIg0LjQvNC10L3QuCDQltGD0YHRg9C_0LAg0JHQsNC70LDRgdCw0LPRi9C90LA!5e0!3m2!1sru!2skg!4v1592048932283!5m2!1sru!2skg" width="600" height="320" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
