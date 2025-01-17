@extends('../layouts.layout')

@section('title', 'Esmeralda y Oro')

@section('slider')
    @include('../layouts.slider')
@endsection

@section('content')
    <div class="text-center" id="products">
        <ul class="grid effect-1" id="grid">
            <li><img src="{{ asset('images/products/product1.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product2.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product3.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product4.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product5.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product6.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product7.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product8.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product9.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product10.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product11.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product12.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product13.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product15.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product16.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product17.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product18.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product19.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product20.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product21.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product22.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product23.jpeg') }}" alt=""></li>
            <li><img src="{{ asset('images/products/product24.jpeg') }}" alt=""></li>
        </ul>
    </div>
@endsection

