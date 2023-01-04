@extends('layouts.card')
@section('content')

<div class="col-lg-12 margin-tb">

<div class="nav-link scrollto">
    <h2>product listing </h2>



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
             <th>Price</th>
             <th>offerprice</th>
             <th>images</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($products as $product)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ $product->name }}</td>
             <td>{{ $product->description }}</td>
             <td>{{ $product->price}}</td>
             <td>{{ $product->offerprice}}</td>
             
             <td><img src="{{asset('/uploads/images').'/'.$product->product_img}}" width="200">{{$product->product_img}}</td>

              <td>
                 <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                     <a class="btn btn-info" href="{{route('frontendshow',$product->id) }}">Show</a>

                 </form>
             </td>
         </tr>

         @endforeach
     </table>
     {!! $products->links() !!}

 @endsection