<header>

    <!-- TOP BAR -->
    <div class="topbar">

    @if(Auth::check())
        <div>{{Auth::user()?->name ?? ""}}</div>
        @else
        <div>NEP</div>
     @endif
        <div>{{Auth::user()?->phone_number ?? ""}}</div>
         
        <div class="top-links">
            <a href="{{route('get.logout')}}">Logout</a>
            <a href="#">Wish List</a>
            <a href="#">Shopping</a>
            <a href="{{route('get.show.cart')}}">Cart</a>
            <a href="#">Checkout</a>
        </div>
    </div>

    <!-- NAVBAR -->
    <div class="navbar">
      <img src="{{asset('img/siya-collection-logo.png')}}" alt="logo">

        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Latest <span class="hot">HOT</span></a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <div class="nav-right">
            <input type="text" placeholder="Search products">
           <a href="{{route('get.register')}}"> <button class="signin">Sign In</button></a>
        </div>
    </div>

</header>