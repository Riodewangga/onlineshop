@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
          <div class="panel-body">
            @foreach($products as $product)
                    <li class="list-group-item">
                      <span class="badge">{{ $product['qty'] }}</span>
                      <strong>{{ $product['item']['title'] }} - </strong>
                      <span class="label label-success">Rp {{ $product['price'] }}</span>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Kurangi 1</a></li>
                          <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Kurangi Semua</a></li>
                        </ul>
                      </div>
                    </li>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="color: black;">
         <strong>Total: Rp {{ $totalPrice }}</strong>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
          <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
          <a href="{{ route('index') }}" type="button" class="btn btn-primary">Back</a>
        </div>
      </div>     
    @else
      <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
         <h2>No Items in Cart!</h2>
        </div>
      </div>
    @endif
@endsection
