@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin transparent">
      <div class="row">
        <div class="col-md-4 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <a href="{{ route('orderlist')}}" style="color: white">
              <div class="card-body">
                <p class="mb-4">Total Orders</p>
                <p class="fs-30 mb-2">{{isset($orderCount) ? $orderCount : 0}}</p>              
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <a href="{{ route('product.list')}}" style="color: white">
                <div class="card-body">
                    <p class="mb-4">Total Product</p>
                    <p class="fs-30 mb-2">{{isset($productCount) ? $productCount : 0 }}</p>              
                </div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <a href="{{ route('admin.selling.product') }}" style="color: white">
              <div class="card-body">
                <p class="mb-4">Top 10 Product</p>
                <p class="fs-30 mb-2">{{isset($topproductCount) ? $topproductCount : 0 }}</p>                
              </div>
            </a>
          </div>
        </div>
      </div>     
    </div>
</div>
@endsection