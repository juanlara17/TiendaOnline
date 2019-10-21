@extends('layouts.layout')

@section('title', 'Esmeralda y Oro')

@section('content')
    <div class="text-center">
        <div class="page-header">
            <h2><i class="fa fa-shopping-cart"></i> DETALLE DEL PEDIDO</h2>
        </div>
        <hr>
        <div class="page">
            <div class="table-cart">
                <div class="table-responsive">
                    <h3>Datos del usuario</h3>
                    <table class="table table-striped table-hover table-bordered">
                        <tr><td>Nombre</td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                        <tr><td>Correo Electronico</td><td>{{ Auth::user()->email }}</td></tr>
                    </table>
                </div>
            </div>
            <div class="table-cart">
                <div class="table-responsive">
                    <h3>Datos del Pedido</h3>
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        @foreach($cart as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price,2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity,2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <hr>
                    <h3>
                        <span class="label-label-success">
                            Total: ${{ number_format($total,2) }}
                        </span>
                    </h3>
                    <hr>
                    <p>
                        <a href="{{ route('cart-show') }}" class="btn btn-primary">
                            <i class="fa fa-chevron-circle-left"></i> <span>Regresar</span>
                        </a>
                        <a href="{{ route('payment') }}" class="btn btn-warning">
                            Paypal <i class="fa fa-paypal"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@stop
