@extends('layouts.layout')

@section('title', 'Esmeralda y Oro')

@section('content')

<div class="text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"> Carrito De Compras</i></h1>
    </div>

    <div class="table-cart">
        @if (count($cart) > 0)
            <p>
                <a href="{{ route('cart-trash') }}" class="btn btn-warning">Vaciar Lista  <i class="fa fa-trash"></i></a>
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col"><span>Imagen</span></th>
                        <th scope="col"><span>Producto</span></th>
                        <th scope="col"><span>Precio</span></th>
                        <th scope="col"><span>Cantidad</span></th>
                        <th scope="col"><span>Subtotal</span></th>
                        <th scope="col"><span>Eliminar</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <th scope="row"></th>
                            <td><img src="{{ $item->image }}" alt="image"></td>
                            <td>{{ $item->name }}</td>
                            <td>${{ number_format($item->price,2) }}</td>
                            <td>
                                <input
                                    type="number"
                                    min="1"
                                    max="1000"
                                    value="{{ $item->quantity }}"
                                    id="product_{{ $item->id }}"
                                >
                                <a
                                    id="product-item"
                                    href="#"
                                    class="btn btn-warning btn-update-item"
                                    {{--data-href="{{ route('cart-update', $item->slug) }}"--}}
                                    data-id="{{ $item->id }}"
                                >
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </td>
                            <td>${{ number_format($item->price * $item->quantity,2) }}</td>
                            <td>
                                <a href="{{ route('cart-delete', $item->slug) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <h3>
                    <span class="label label-succes">
                        Total: ${{ number_format($total,2) }}
                    </span>
                </h3>
            </div>
        @else
            <h3><span class="label label-warning">Su carrito actualmente esta vacio.</span></h3>
        @endif
        <hr>
        <p>
            <a href="{{ route('catalogo') }}" class="btn btn-primary">
                <i class="fa fa-chevron-circle-left"></i> <span>Seguir comprando</span>
            </a>
            <a href="{{ route('order-detail') }}" class="btn btn-primary">
                Finalizar pedido <i class="fa fa-chevron-circle-right"></i>
            </a>
        </p>
    </div>
</div>

<script>
    var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByTagName('tr'),
        text = 'textContent' in document ? 'textContent' : 'innerText';

    for (var i = 1, len = rows.length; i < len; i++){
        rows[i].children[0][text] = i + ' ' + rows[i].children[0][text];
    }

    document.getElementById("product-item").addEventListener('click',displayDate);
    function displayDate() {
        var id = $(this).data('id');
        var href = $(this).data('href');
        var quantity = document.getElementById("product_" + id).value;
        window.location.href = href + "/" + quantity;
    }
</script>
@endsection


