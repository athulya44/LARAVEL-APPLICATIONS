@extends('productdetails.layout')
  
@section('content')
    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>filename:</strong>
                <img src="{{asset('/storage/images/').'/'.$forms->filename}}">
                {{$form->filename}}
            </div>
        </div>
    </div>
@endsection