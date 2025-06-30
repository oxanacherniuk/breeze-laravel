@extends('layouts.app')
@section('content')
<div class="product">
    @auth
    <div class="d-flex">
        <button class="product__add-to-cart btn btn-primary p-2 m-1">Добавить в корзину</button>

        <div class="toast error align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    В наличие столько нет
                </div>
                <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        <div class="toast success align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Товар добавлен в корзину
                </div>
                <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endauth

    <img src="{{ Vite::asset('resources/media/images/') }} . $product->img" alt="" width="400px" class="product__image">
    <div class="product__main-info">
        <div class="product__title">{{ $product->title }}</div>
        <div class="product__price">{{ $product->price }} руб.</div>
        <a href="/add-to-cart/{{ $product->id }}" class="product__add-to-cart">Добавить в корзину</a>
    </div>
    <div class="product__characteristic">
        <table>
            <tr>
                <td>Категория</td>
                <td>{{ $product->product_type }}</td>
            </tr>
            <tr>
                <td>Страна-производитель</td>
                <td>{{ $product->country }}</td>
            </tr>
            <tr>
                <td>Цвет</td>
                <td>{{ $product->color }}</td>
            </tr>
        </table>
    </div>
</div>
<script>
    const pid = {{ $product->id }}
    const button = document.querySelector('.product__add-to-cart')
    button.addEventListener('click', () => {
        let status = 0
        fetch(`/add-to-cart/${pid}`)
        .then(response => status = response.status)
        .then(() => {
            if(status > 300) {
                const errorToast = new bootstrap.Toast(document.querySelector('.toast.error'))
                errorToast.show()
            } else {
                const successToast = new bootstrap.Toast(document.querySelector('.toast.success'))
                successToast.show()
            }
        })
    })
</script>
@endsection
