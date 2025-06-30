@extends('layouts.app')
@section('content')
<div class="cart">
    <table class="cart__table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Итого</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
            <tr class="cart__raw">
                <td>{{$item->title}}</td>
                <td class="cart__qty">
                    <button class="btn {{ $item->qty == $item->limit ? 'disabled' : '' }}" id="increase" cartid="{{ $item->id }}">+</button>
                    <span class="cart__qty-value">
                        {{$item->qty}}
                    </span>
                    <button class="btn" id="decrease" cartid="{{ $item->id }}">-</button>
                </td>
                <td>{{$item->price}}</td>
                <td>{{$item->price * $item->qty}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    const cartRaws = document.querySelectorAll('.cart__raw')

    cartRaws.forEach(raw => {
        const increase = raw.querySelector('#increase');
        const decrease = raw.querySelector('#decrease');
        const pid = Number(increase.attributes.cartid.value);

        increase.addEventListener('click', () => {
            fetch(`/changeqty/incr/${pid}`)
            .finally(() => windows.location.reload())
        })
        decrease.addEventListener('click', () => {
            fetch(`/changeqty/decr/${pid}`)
            .finally(() => windows.location.reload())
        })
    });
</script>
@endsection


