@extends('products.layout')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
            <th>id</th>
             <th>Name</th>
             <th>Description</th>
             <th>price</th>
             <th>Offerprice</th>
             <th>Images</th>
             <th width="280px">Action</th>
</tr>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($product as $products)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $products->name }}</td>
             <td>{{ $products->description }}</td>
             <td>{{ $products->price}}</td>
             <td>{{ $products->offerprice }}</td>
           
             
    
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