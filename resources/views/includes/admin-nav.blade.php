<!-- Admin Nav Bar -->
<header>
  <nav class="navbar navbar-inverse">
    <div class="container">
    <div class="row">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('get-products')}}">LOGO</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Products <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('products-add')}}">Add Prodcut</a></li>
              <li><a href="{{route('get-products')}}">View Products</a></li>
            </ul>
          </li>
          <li><a href="{{route('types-add')}}">Manage Types</a></li>
          <li><a href="{{route('members')}}">Members</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{route('update-profile')}}">Settings</a></li>
          <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  </nav>
</header>
