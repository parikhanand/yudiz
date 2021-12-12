@extends('layouts.main')
@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>                
                <th>User Name</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Order Date</th>               
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)                           
                <tr>
                <td class="py-1">
                    {{$order->user->name}}
                </td>
                <td>
                    {{$order->product->name}}
                </td>
                <td>
                    {{$order->product->price}}
                </td>
                <td>
                    {{$order->quantity}}
                </td>
                <td>
                    {{date('Y-m-d', strtotime($order->created_at));}}                    
                </td>                
                </tr>    
                @endforeach
            </tbody>
          </table>
            <div class="d-flex justify-content-center">
                {!! $orders->links() !!}
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