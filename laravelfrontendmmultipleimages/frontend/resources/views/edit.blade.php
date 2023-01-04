@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('update',$form->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>filename:</strong>
                    <input type="file" name="filename[]" class="form-control" placeholder="image">
                    <img src="{{asset('/uploads/images/').'/'.$form->images}}" width="300px">
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection