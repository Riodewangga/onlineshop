@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

		        <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$product->title}}</h2>

                            <a href="" class="btn btn-warning pull-right" style="position: relative; bottom: 50px;"><i class="fas fa-tag"></i> {{$product->category->name}}</a>
                	</div>
                	<div class="panel-body">
                        <div class="pull-left" style="margin-right: 2%;">
                    	   <img src="{{ asset('storage/'.$product->imagePath) }}" class="img-thumbnail" alt="Product" width="260" height="260" style="border-radius: 3%;">
                        </div>
                        <p>{{$product->description}}</p>
                        <p>Testter</p>

                        <div class="col-md-12">
                            <label style="color: red;"><h4>Rp {{ number_format($product->price) }}</h4></label>
                            <div class="pull-right">
                                <a href="{{ route('product.addToCart', $product) }}" class="btn btn-default btn-success" role="button"><i class="fas fa-shopping-cart"></i> Beli</a>
                                <a href="{{ route('index') }}" class="btn btn-default btn-primary"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection