@extends('layouts.writer')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('adminusers.index') }}"> Back</a>
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
  
    <form action="{{ route('adminusers.update',$adminuser->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="card">
            <div class="card-body">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $adminuser->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <textarea class="form-control" style="height:150px" name="email" placeholder="Email">{{$adminuser->email }}</textarea>
                </div>
            </div> <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>phone</strong>
                    <input type="text" name="phone" value="{{ $adminuser->phone }}" class="form-control" placeholder="phone">
                </div>
            </div> <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>password:</strong>
                    <input type="password" name="password"  class="form-control" placeholder="password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
        </div>
    </form>
@endsection