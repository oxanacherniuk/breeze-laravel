<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        <section class="about">
            <div class="container">
                <h3 class="about__title">Мир цветов - огромный выбор цветов и подарков на каждый день</h3>
                <p class="about__text-block">В нашем интернет-магазине можно круглосуточно заказать доставку дизайнерских букетов из живых цветов в Ульяновске, по любому адресу - на дом или в офис получателя</p>
                <p class="about__text-block">В регулярно обновляемом каталоге компании представлено более 100 цветочных композиций. Компания "Мир цветов" полностью гарантирует безупречное качество доставляемых букетов: наличие только свежих цветов в составе, полное соответствие изображению в каталоге, высокое мастерство исполнения.</p>
            </div>
        </section>
        <section class="slider">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        @foreach ($products as $product)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="{{ $loop->index == 0 ? 'active' : '' }}" aria-current="{{ $loop->index == 0 ? 'true' : 'false' }}" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->iteration }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($products as $product)
                            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                <img src="{{ Vite::asset('resources/media/images/') . $product->img }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $product->title }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </section>
        @endsection
    </body>
</html>
