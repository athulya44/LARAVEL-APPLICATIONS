 <form action="{{ route('profile') }}" method="POST">
 <form action="{{ route('profile') }}" method="POST">
 @extends('layouts.index')
@section('content')
<div class="PY-5">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
        <h4> user profile</h4>
        <div class="underline mb-4">

        <form action" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <textarea class="form-control" style="height:150px" name="email" placeholder="Email"></textarea>
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>phonenumber:</strong>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Zip/Pincode</strong>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Address</strong>
                <textarea name="password" class="form-control" placeholder="password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection