<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Yudiz</title>
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h1>Admin Register</h1>
              </div>        
              <form class="pt-3" action="{{ route('admin.register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" 
                    id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" 
                    id="email" placeholder="Email">
                  </div>               
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" 
                    id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <input type="password" name="password_confirmation" class="form-control form-control-lg" 
                      id="confirm-password" placeholder="confirm-password">
                    </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="{{ route('adminlogin') }}" class="text-primary">Login</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
</body>
</html>
