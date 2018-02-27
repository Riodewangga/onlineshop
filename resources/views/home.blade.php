@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<br>
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-md-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
@foreach($products->chunk(3) as $productChunk)
<div class="container">
    <div class="row">
        @foreach($productChunk as $product)
             <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                  <div class="caption">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->description }}</p>
                    <div class="clearfix"> 
                        <div class="pull-left price">${{ $product->price }}</div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button"><i class="fas fa-shopping-bag"></i> Add To Cart</a>
                    </div>
                  </div>
                </div>
              </div>
        @endforeach
    </div>
</div>
@endforeach
@endsection
