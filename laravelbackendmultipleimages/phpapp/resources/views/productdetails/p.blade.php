
@extends('productdetails.layout')
 
 @section('content')
    
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>product listing </h2>
         
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('products.create') }}">  create product</a>
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
             <th>Name</th>
             <th>Description</th>
             <th>price</th>
             <th>Offerprice</th>
             <th>Images</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($product as $products)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $products->name }}</td>
             <td>{{ $products->description }}</td>
             <td>{{ $products->price}}</td>
             <td>{{ $products->offerprice }}</td>
             <td><img src="{{asset('/uploads/images/').'/'.$products->images}}" width="200" multiple>{{$products->images}}</td>
             
             
              <td>
                 <form action="{{ route('products.destroy',$products->id) }}" method="POST">
    
                     <a class="btn btn-info" href="{{ route('products.show',$products->id) }}">Show</a>
     
                     <a class="btn btn-primary" href="{{ route('products.edit',$products->id) }}">Edit</a>
    
                     @csrf
                     @method('DELETE')
       
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </td>
         </tr>

         @endforeach
     </table>
     {!! $product->links() !!}
       
 @endsection