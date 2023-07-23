<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @if (Auth::user()->role == 'admin')
    <li class="nav-item nav-category"></li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">User Manage</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
          <span class="menu-title">Items</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Category List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Product List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auction.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Auction</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auction.notification') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Notification</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Live Auction</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.show') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Bid History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.showhistory') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">All Bid History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.bidproduct') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Bid Win Product</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('order') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Order History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('allorder') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">All Order History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sms.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">SMS</span>
        </a>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
          </a>
        </div>
      </li> --}}



  @elseif (Auth::user()->role == 'seller')
    <li class="nav-item nav-category"></li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
          <span class="menu-title">Items</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Category List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Product List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auction.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Auction</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Live Auction</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.show') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Bid History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.showhistory') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">All Bid History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.bidproduct') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Bid Win Product</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('order') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Order History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('allorder') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">All Order History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sms.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">SMS</span>
        </a>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
          </a>
        </div>
      </li> --}}
  </ul>
  @else
  <li class="nav-item nav-category"></li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auction.notification') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Notification</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bid.index') }}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Live Auction</span>
        </a>
      </li>    
  @endif




    
</nav>