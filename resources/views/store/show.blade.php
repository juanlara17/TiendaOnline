@extends ('layout')

@section('content')
    <div class="text-center">
        <div class="page-header">
            <h1><i class="fa fa-shopping-cart"> Detalle del Producto</i></h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="product-block">
                    <img src="{{ $product->image }}" width="300" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-block">
                    <h3>{{ $product->name }}</h3>
                    <hr>
                    <div class="product-info">
                        <p>{{ $product->description }}</p>
                        <p>
                            <span class="label label-success">
                                Precio: ${{ number_format($product->price,2) }}</span>
                        </p>
                        <p>
                            <a class="btn btn-warning btn-block" href="{{ route('cart-add', $product->slug) }}">
                                <i class="fa fa-cart-plus"></i> La quiero</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <p><a class="btn btn-primary" href="{{ route('catalogo') }}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
        </p>
    </div>
@endsection


