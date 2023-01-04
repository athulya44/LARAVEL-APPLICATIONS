@extends('layouts.index')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin logged in users listing</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('adminlist.create') }}"> Create New user</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
       
        </style>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
    </tr>

        @foreach ($admins as $admin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
           
        </tr>
        @endforeach
    </table>
    
  
    {!! $admins->links() !!}
      
@endsection