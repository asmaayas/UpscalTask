<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body style='padding-top:100px;'>
    

<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
        <form method='post' action="{{url('update/id/'.$i->id)}}" enctype="multipart/form-data">
            @csrf
        @method('put')
				<div class="modal-header">						
					<h4 class="modal-title">Edit Product</h4>
				
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control @error('product_name') is-invalid @enderror" name='product_name' value='{{$i->product_name}}' required>
						@error('product_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control @error('product_price') is-invalid @enderror"
                        name='product_price' value='{{$i->product_price}}'  required>
						@error('product_price')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
					</div>
					<div class="form-group">
						<label>Details</label>
						<textarea class="form-control @error('product_details') is-invalid @enderror"
                        name='product_details' required>{{$i->product_details}} </textarea>
						@error('product_details')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
					</div>
					<div class="form-group">
						<label>Quality</label>
						<input type="text" class="form-control @error('product_quality') is-invalid @enderror"
                        value='{{$i->product_quality}}'
                        name='product_quality' 
                        required>
						@error('product_quality')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
					</div>	
                    <div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control @error('product_img') is-invalid @enderror"
                        name='product_img' 
                        required>
						@error('product_img')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
					</div>				
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Edit">
				</div>
			</form>
         
        </div>
      </div>
	</div>
</div>
</body>