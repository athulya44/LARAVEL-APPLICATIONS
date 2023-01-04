@extends('layout')
 
 @section('content')
    
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>multiple image  listing</h2>
         
     <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('create') }}">  upload images</a>
             </div>
         </div>
     </div>
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <table class="table table-bordered">
         <tr>
             <th>id</th>
              <th>filename</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($form as $forms)
         <tr>
             <td>{{ ++$i }}</td>
             @php 
             $images = json_decode($forms->filename);
             @endphp
             <td>
             
                @foreach($images  as $row)
                <img src="{{asset('/storage/images/').'/'.$row}}" width="50" >{{$row}}
                @endforeach 
        
            </td>
             <td>     
              
    
         @endforeach
     </table>
     {!! $form->links() !!}
       
 @endsection