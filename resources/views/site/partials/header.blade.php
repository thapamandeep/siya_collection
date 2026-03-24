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
            <a href="{{route('get.my.order')}}">My Order</a>
            <a href="{{route('get.show.cart')}}">Cart</a>
        <a href="javascript:void(0)" id="profileLink">My Profile</a>
        </div>
    </div>

    <!-- NAVBAR -->
    <div class="navbar">
      <img src="{{asset('img/siya-collection-logo.png')}}" alt="logo">

        <ul class="menu">
            <li><a href="{{route('get.front')}}">Home</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Latest <span class="hot">HOT</span></a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="{{route('get.about.us')}}">About Us</a></li>
            <li><a href="{{route('get.contact.us')}}">Contact Us</a></li>
        </ul>

        <div class="nav-right">
            <input type="text" placeholder="Search products">
           <a href="{{route('get.register')}}"> <button class="signin">Sign In</button></a>
        </div>
    </div>

</header>