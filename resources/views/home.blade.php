@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<div style="position: fixed; top: 250px;">
    <div class="col-xl">
        <a href="https://web.facebook.com/rismaco.risma" target="_blank">
            <i class="fab fa-facebook-f fa-3x btn-primary" style="width: 50px; padding: 4px; height: 45px; margin-bottom: -1px;"></i>
        </a>
    </div>
     <div class="col-xl">
        <a href="https://www.instagram.com/dewangga.rio/" target="_blank">
            <i class="fab fa-instagram fa-3x btn-success" style="width: 50px; padding: 4px; height: 45px; margin-bottom: -1px;"></i>
        </a>
    </div>
    <div class="col-xl">
        <a href="https://plus.google.com/u/0/103457497257577748536" target="_blank">
            <i class="fab fa-google-plus fa-3x btn-danger" style="width: 50px; padding: 4px; height: 45px; margin-bottom: -1px;"></i>
        </a>
    </div>
</div>

<div class="container">
    <div class="row">
    @foreach ($product as $products)
        <div class="col-sm-3 col-md-3">
            <div class="panel">
                <a href="#" style="text-decoration: none; color: black;">
                    <img src="{{ asset('storage/'.$products->imagePath) }}" alt="Product" width="260" height="200">
                    <div class="panel-body">
                    <div class="caption">
                        <p><b>{{ $products->title }}</b></p>       
                </a>
                    <label style="color: black;">Rp {{ number_format($products->price) }}</label>
                    <div class="row">
                    <div class="col-sm-4">
                        <a href="" class="btn btn-success btn-xs-4"><i class="fas fa-tag"></i> {{ $products->category->name }}</a>
                    </div>
                    </div>
                    <hr>
                    <div class="col-md-3">
                        <p><a href="{{ route('edit', $products) }}" class="btn btn-deafult btn-primary pull-left" role="button"><i class="fa fa-edit"></i></a></p>
                    </div>
                    <form action="{{ route('destroy', $products) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-deafult btn-deafult pull-left" onclick="return confirm('Yakin Mau Hapus ?')"><i class="fa fa-trash"></i></button>
                    </form>

                    <p><a href="{{ route('product.addToCart', $products) }}" class="btn btn-deafult btn-danger pull-right" role="button"><i class="fas fa-shopping-cart"></i> Add To Cart</a></p>
            </div>
        </div>
    </div>
</div>
@endforeach
        </div>
        <center>{!! $product->appends(['search'=>$search])->links() !!}</center>
        </div>
@endsection