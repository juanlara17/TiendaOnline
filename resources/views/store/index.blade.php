@extends('layouts.layout')

@section('title', 'Esmeralda y Oro')

@section('slider')
    @include('../layouts.slider')
@endsection

@section('content')
    <div class="text-center" id="products">
        <ul class="grid effect-4" id="grid">
            {{ $item = 0 }}
            @foreach($products as $product)
                {{ $item = 1 + $item }}
                <li>
                    <div class="">
                        <h4>{{ $product->name }}</h4>
                        <img src="{{ asset('images/products/product'.$item.'.jpeg') }}" alt="" width="250">
                    </div>
                    <div class="product-info">
                        <p>{{ $product->extract }}</p>
                        <h4><span class="label label-success">Precio: {{ number_format($product->price,2) }}</span></h4>
                        <div class="button-product d-flex justify-content-around">
                            <a class="btn btn-warning" href="{{ route('cart-add', $product->slug) }}"><i class="fa fa-cart-plus"></i> La quiero</a>
                            <a class="btn btn-primary" href="{{ route('product-detail', $product->slug) }}"><i class="fa fa-chevron-circle-right"></i> Leer mas</a>
                        </div>
                    </div>
                </li>
                <hr>
            @endforeach
        </ul>
    </div>
@endsection


