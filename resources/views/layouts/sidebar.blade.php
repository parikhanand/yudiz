<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if(Auth::guard('admin')->check())
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orderlist') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Manage Products</span>
            <i class="menu-arrow"></i>
            </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('product') }}">Add Product</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('product.list') }}">List Product</a></li>            
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.selling.product') }}">Top Product</a></li>            
                    </ul>
                </div>
        </li>     
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.cartlist') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Cart</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.product') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Products</span>
            </a>
        </li>
        @endif
    </ul>
</nav>