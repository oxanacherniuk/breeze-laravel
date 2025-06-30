@extends('layouts.app')
@section('content')
<section class="catalog">
    <div class="catalog__sort">
        <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'country' ? '_desc' : '' }}=country" class="catalog__sort-item">Страна поставщика</a>
        <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'title' ? '_desc' : '' }}=title" class="catalog__sort-item">Название</a>
        <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'price' ? '_desc' : '' }}=price" class="catalog__sort-item">Цена</a>
    </div>
    <div class="catalog__filter">
        @foreach ($categories as $category)
            <a href="{{ $params->has('sort_by') ? '?sort_by=' . $params['sort_by'] . '&' : '?' }}filter={{ $category->id }}" class="catalog__filter-item">{{ $category->product_type }}</a>
        @endforeach
    </div>
    <div class="catalog__list">
        @foreach ($products as $product)
        <a href="/product/{{ $product->id }}">
            <div class="catalog__item">
                <img src="{{ Vite::asset('resources/media/images/') . $product->img }}" alt="{{ $product->img }}" class="catalog__item-img" width="400px">
                <div class="catalog__item-title">{{ $product->title }}</div>
                <div class="catalog__item-price">{{ $product->price }} Руб.</div>
            </div>
        </a>
        @endforeach
    </div>

</section>
@endsection
