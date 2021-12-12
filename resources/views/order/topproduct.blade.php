@extends('layouts.main')
@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Top Ten Products</h4>        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>                
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                <td class="py-1">
                    <img src="{{asset('products').'/'.$product->product->image}}" alt="image"/>
                </td>
                <td>
                    {{$product->product->name}}
                </td>
                <td>
                    {{$product->product->quantity}}
                </td>
                <td>
                    {{$product->product->price}}
                </td>
                <td>
                    {{$product->product->status}}
                </td>            
                </tr>    
                @endforeach
            </tbody>
          </table>            
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
