
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

                     <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                     <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                     @csrf
                     @method('DELETE')

                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </td>
         </tr>

         @endforeach
     </table>
     {!! $products->links() !!}

 @endsection