@extends('layouts.profile')
@section('content')
<div class="PY-5">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
        <h4> user profile</h4>
        <div class="underline mb-4">

        <form action="{{url('profile') }}" method="POST">
    @csrf
  
    <div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
                <strong>Username:</strong>
                <input type="text" name="username"  value="{{ $writer->name}}"class="form-control" placeholder="Name">
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="text" name="pincode"  value="{{ $writer->email}}"class="form-control" placeholder="password">
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection