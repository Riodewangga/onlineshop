@extends('layouts.app')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<style type="text/css">
.back-to-top { background-color: #F7941D; cursor: pointer; color: #FFFFFF; border:2px solid #1497EC; position: fixed; right: 15px; bottom: 60px; display: inline-block; padding: 10px 15px; border-radius: 50% !important; }
</style>

@section('content')
<div style="position: fixed; top: 250px; left: -1.1%;">
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
	<center>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 60%;">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner" role="listbox">
		    <div class="carousel-item active">
		      <img class="d-block img-fluid" src="{{ asset('storage/slide/slide-1.jpg') }}" alt="First slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block img-fluid" src="{{ asset('storage/slide/slide-2.jpg') }}" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block img-fluid" src="{{ asset('storage/slide/slide-3.jpg') }}" alt="Third slide">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</center>
	<hr>
    <div class="row">
    @foreach ($product as $products)
        <div class="col-sm-4 col-md-4">
            <div class="thumbnail" style="background-color: white;">
                <img src="{{ asset('storage/'.$products->imagePath) }}" alt="" class="img-responsive">
                <div class="caption">
                    <h4><b>{{ $products->title }}</b></h4>
                    <p>{{ str_limit($products->description, 25, '...') }}</p>
                    <label style="color: red;">Rp {{ number_format($products->price) }}</label>
                    <span><a href="{{ route('product.show-by-category', $products->category->id) }}" class="label label-warning"><i class="fas fa-tag"></i> {{ $products->category->name }}</a></span>
                <hr style="border: 1px silver solid;">

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
                    <a href="{{ route('product.opencart', $products->slug) }}" class="btn btn-default btn-success pull-right" role="button"><i class="fas fa-shopping-cart"></i> Buka</a>
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