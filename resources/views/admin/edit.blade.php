@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Order Status</div>

                <div class="panel-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form class="form-horizontal" id="update-order-status-form" method="post" action="{{ route('admin.orders.update', $order) }}">

                        {{ csrf_field() }}
                        {!! method_field('patch') !!}

                        <fieldset>

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Order ID</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $order->id }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Customer</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $order->customer->name }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Size</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $order->size }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Toppings</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $order->toppings }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group m-b-lg">
                                <label class="control-label col-lg-3">Instructions</label>
                                <div class="col-lg-8">
                                     <div class="line-up-form">{{ $order->instructions }}</div>
                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->

                            <div class="form-group">
                                <label for="status_id" class="control-label col-lg-3">Status</label>
                                <div class="controls col-lg-8">

                                    <select name="status_id" id="status_id" class="dropdown-style input-field input-normal">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id}}" {{ (old("status", $currentStatus) == $status->id ? "selected":"") }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>

                                </div> <!-- /controls -->
                            </div> <!-- /form-group -->



                            <div class="form-group">
                                <div class="col-lg-3"></div>
                                <div class="controls col-lg-8">
                                    <div class="form-actions">
                                        <button type="submit" id="update-order" class="btn btn-success">Update Status</button>
                                    </div> <!-- /form-actions -->
                                </div>
                            </div>

                        </fieldset>

                    </form>





                    {{-- <a class="btn btn-primary" href="{{ route('admin.orders') }}">Back to Admin Dashboard</a> --}}

                </div> <!-- end panel-body -->
            </div> <!-- end panel -->
        </div>
    </div>
</div>
@endsection
