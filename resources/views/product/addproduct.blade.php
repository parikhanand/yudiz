@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Product</h4>          
          <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Product Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Produt Quantity</label>
              <input type="text" name="quantity" class="form-control" id="exampleInputEmail3" placeholder="quantity">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Product Price</label>
              <input type="text" name="price" class="form-control" id="exampleInputPassword4" placeholder="Price">
            </div>
            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>          
            <div class="form-group">
              <label for="exampleSelectGender">Status</label>
                <select name="status" class="form-control" id="exampleSelectGender">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>        
</div>
@endsection
@section('script')
    <script src="{{asset('js/file-upload.js')}}"></script>
@endsection