@extends('productdetails.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" name="name" value="{{$product->name }}" class="form-control" placeholder="name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="name">
            </div>
        </div>
   
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>price:</strong>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="price">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>offerprice:</strong>
                <input type="text" name="offerprice" value="{{ $product->offerprice}}" class="form-control" placeholder="offer">
            </div>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>images</strong>
                <input type="file" name="images[]"multiple width="200px">
            </div>

            <div>
          
                @if ($images)
                @foreach ($images  as $images )
                <img src="{{asset('/uploads/images').'/'. $images->images}}" width="300px">
                @endforeach
                
                @else
                @endif
</div>
        </div>
    </div>
@endsection