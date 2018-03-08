@extends('layouts.app')
    <style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview{
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }
    </style>
@section('content')
<br>
<br>
    <div class="container">
    	<div class="row">
    		<div class="col-md-9 col-md-offset-2">
				<div class="panel panel-default">
				<div class="panel-heading"><center><h4>Edit Data Novel</h4></center></div>
						<div class="panel-body">
							  <form class="form-horizontal" method="post" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								{{ method_field('PATCH') }}
							   	<div class="form-group">
							      <label class="col-md-3 control-label">Title</label>
							      <div class="col-md-8">
							        <input type="text" class="form-control" name="title" placeholder="Post title" value="{{ $product->title }}"> 
							      </div>
							  	</div>
							    

							    <div class="form-group">
							      <label class="col-md-3 control-label">Category</label>
							      <div class="col-md-8">
							        <select name="category_id" id="" class="form-control">
							          @foreach ($categories as $category)
							            <option value="{{ $category->id }}" 
							            	@if ($category->id === $product->category_id)
												selected
											@endif
							            	> 
							            	{{ $category->name }} 
							            </option>
							          @endforeach
							        </select>
							      </div>
							    </div>

							    <div class="form-group">
							      <label class="col-md-3 control-label">Price (Rp)</label>
							      <div class="col-md-8">
							        <input type="number" class="form-control" name="price" placeholder="Post price" value="{{ $product->price }}">  
							        @if ($errors->has('price'))
							          <span class="help-block">
							            <p>{{ $errors->first('price') }}</p>
							          </span>
							        @endif
							      </div>
							    </div>

							    <div class="form-group">
							      <label class="col-md-3 control-label">Image</label> 
							      <div class="col-md-8">
							        <div class="image-editor validate">
							          
							          <img src="{{ asset('storage/'.$product->imagePath) }}" alt="Product" width="260" height="260">
							          
							            <input type="range" class="cropit-image-zoom-input">
							            <input type="hidden" name="image-data" class="hidden-image-data" />
							            <input type="file" name="imagePath" class="cropit-image-input">
							        </div>
							      </div>
							    </div>

							 
							      <label class="col-md-3 control-label">Description</label>
							      <div class="col-md-8">
							        <textarea name="description" rows="5" class="form-control" placeholder="post Description">{{ $product->description }}</textarea> 
							    
							      </div>
							    


							    <div class="pull-right">
									<input type="submit" class="btn btn-success" value="save">
									<a href="{{ route('index')}}" class="btn btn-info">Kembali</a>
								</div>
							</form>
					</div>			 
				</div>
			</div>
		</div>
	</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="/js/cropit.js"></script>
    <script>
      $(function() {
        $('.image-editor').cropit();

        $('form').submit(function() {
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          // Print HTTP request params
          var formValue = $(this).serialize();
          $('#result-data').text(formValue);

          // Prevent the form from actually submitting
          return false;
        });
      });
    </script>
@endsection