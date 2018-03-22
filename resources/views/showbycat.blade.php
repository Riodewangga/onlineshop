@extends('layouts.app')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<style type="text/css">
.back-to-top { background-color: #F7941D; cursor: pointer; color: #FFFFFF; border:2px solid #1497EC; position: fixed; right: 15px; bottom: 60px; display: inline-block; padding: 10px 15px; border-radius: 50% !important; }
</style>

@section('content')
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

<br>
<div class="container">
    <div class="row">
    @foreach ($product as $products)
        <div class="col-sm-4 col-md-4">
            <div class="thumbnail" style="border: 0px black solid; background-color: white;">
                <img src="{{ asset('storage/'.$products->imagePath) }}" alt="" class="img-responsive">
                <div class="caption">
                    <h4><b>{{ $products->title }}</b></h4>
                    <p>{{ str_limit($products->description, 25, '...') }}</p>
                    <label style="color: red;">Rp {{ number_format($products->price) }}</label>
                <hr>

                @if( $products->user_id == auth()->user()->id)
                <div class="col-md-2">
                        <p><a href="{{ route('edit', $products) }}" class="btn btn-default btn-primary pull-left" role="button"><i class="fa fa-edit"></i></a></p>
                    </div>
                    <div class="col-xs-4">
                    <form action="{{ route('destroy', $products) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-default btn-danger pull-left" onclick="return confirm('Yakin Mau Hapus ?')"><i class="fa fa-trash-alt"></i></button>
                    </form>
                    </div>
                @endif
                <div class="clearfix">
                    <a href="{{ route('product.opencart', $products) }}" class="btn btn-default btn-success pull-right" role="button"><i class="fas fa-shopping-cart"></i> Buka</a>
                </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>  


            <a href="#top" class="back-to-top">
                <i class="fa fa-angle-double-up"></i>
            </a>


        <script type="text/javascript">
              $('.back-to-top').hide();
              $(window).on('scroll', function(e){
                $this = $(this);
                if($this.scrollTop() > 0){
                  $('.back-to-top').fadeIn('slow');
                }else{
                  $('.back-to-top').fadeOut('fast');
                }
              });

              $('.back-to-top').on('click', function(){
                $('body').animate({scrollTop: 0}, 1000);
              });
        </script>

        </div>
        <center>{!! $product->appends(['search'=>$search])->links() !!}</center>
        </div>
@endsection