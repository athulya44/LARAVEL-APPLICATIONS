@extends('layouts.writer')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin users listing</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('adminusers.create') }}"> Create New user</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
       <style>
    table th,td{
            padding:50px;
            margin-top:50px; 
        }
        </style>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
         
            <th width="280px">Action</th>
        </tr>
        @foreach ($adminusers as $adminuser)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $adminuser->name }}</td>
            <td>{{ $adminuser->email }}</td>
            <td>{{ $adminuser->phone}}</td>
          
        
            <td>
                <form action="{{ route('adminusers.destroy',$adminuser->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('adminusers.show',$adminuser->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('adminusers.edit',$adminuser->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" href="{{url('adminusers/{adminuser')}}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
  
    {!! $adminusers->links() !!}
      
@endsection