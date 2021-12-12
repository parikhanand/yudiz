@extends('layouts.main')
@section('content')
<div class="row">
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>    
      <strong>{{ $message }}</strong>
  </div>
@endif
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Products</h4>        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                @auth('user')
                <th>Action</th>
                @endauth
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                <td class="py-1">
                    <img src="{{asset('products').'/'.$product->image}}" alt="image"/>
                </td>
                <td>
                    {{$product->name}}
                </td>
                <td>
                    {{$product->quantity}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->status}}
                </td>
                @auth('user')
                <td>
                    <a href="{{ route('product.addtocart',['id'=>$product->id]) }}">Add To Cart</a>
                </td>
                @endauth
                </tr>    
                @endforeach
            </tbody>
          </table>
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
@endsection