@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Order Tracker</div>

                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="progress">
                        <progressbar :now="progress" type="success" striped animated></progressbar>
                    </div>

                    <alert v-model="showAlert" placement="top-right" duration="5000" type="success" width="400px" dismissable>
                        <span class="icon-ok-circled alert-icon-float-left"></span>
                        <strong>Well Done!</strong>
                        <p>You successfully read this important alert message.</p>
                    </alert>

                    <div class="order-status">
                        <strong>Order Status:</strong> {{ $order->status->name }}
                    </div>

                    <hr>

                    <div class="order-details">
                        <strong>Order ID:</strong> {{ $order->id }} <br>
                        <strong>Size:</strong> {{ $order->size }} <br>
                        <strong>Toppings:</strong> {{ $order->toppings }} <br>

                        @if ($order->instructions != '')
                            <strong>Instructions:</strong> {{ $order->instructions }}
                        @endif

                    </div>

                    <a class="btn btn-primary" href="{{ route('user.orders') }}">Back to Orders</a>

                </div> <!-- end panel-body -->
            </div> <!-- end panel -->
        </div>
    </div>
</div>
@endsection
