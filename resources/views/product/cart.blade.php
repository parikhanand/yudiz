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
        <h4 class="card-title">Cart</h4>             
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>                
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>                
                <th>Action</th>
              </tr>
            </thead>
            <tbody>                
                <tr>                
                <td>
                    {{$product->name}}
                </td>
                <td>
                    {{$cart['quantity']}}
                </td>
                <td>
                    {{$product->price}}
                </td>                
                <td>
                    <a href="{{ route('product.addorder')}}">Check Out</a>                    
                </td>
                </tr>                
            </tbody>
          </table>           
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
