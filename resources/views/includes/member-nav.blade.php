<!-- Member Nav bar -->
  <nav class="navbar navbar-inverse member-nav">
    <div class="container">
      <div class="row">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('member-products')}}">LOGO</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="{{route('member-products')}}">All Products</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{route('member-get-cart')}}"> <span id="carItemCount"> {{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span>  <i class="fa fa-shopping-cart " aria-hidden="true"></i> Cart</a></li>
          <li><a href="{{route('update-profile')}}">Settings</a></li>
          <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  </nav>
