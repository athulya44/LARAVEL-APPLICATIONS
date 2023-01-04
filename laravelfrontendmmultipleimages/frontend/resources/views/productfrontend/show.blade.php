
@extends('layouts.card')
@section('content')
<!DOCTYPE html>
<html>
    <head>
<body>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('frontendview') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                {{$product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                {{ $product->description }}
            </div>
        </div>
   
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>price:</strong>
              {{ $product->price }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>offerprice:</strong>
              {{ $product->offerprice}}
            </div>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>images</strong>

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

</body>
</head>
@endsection