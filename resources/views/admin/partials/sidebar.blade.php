<div class="sidebar">
    <div class="logo">
        <h2>Siya Collection</h2>
    </div>

    <ul class="menu">

        <!-- Dashboard -->
        <li>
            <input type="checkbox" id="dashboard-toggle" class="toggle-input">
            <label for="dashboard-toggle" class="toggle-label">Dashboard</label>
            <ul class="submenu">
                <li><a href="#">Overview</a></li>
                <li><a href="#">Stats</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </li>

        <!-- ----------heroes -->
           
          <li>
            <input type="checkbox" id="products-toggle" class="toggle-input">
            <label for="products-toggle" class="toggle-label">Heroes Section</label>
            <ul class="submenu">
                <li><a href="{{route('get.hero.form')}}">Add Heroes</a></li>
                <li><a href="{{route('get.hero.table')}}">Table</a></li>
               
            </ul>
        </li>    

        <!-- Products -->
        <li>
            <input type="checkbox" id="products-toggle" class="toggle-input">
            <label for="products-toggle" class="toggle-label">Products</label>
            <ul class="submenu">
                <li><a href="{{route('get.product.form')}}">Add Product</a></li>
                <li><a href="#">Table</a></li>
               
            </ul>
        </li>        

        <!-- Category -->
        <li>
            <input type="checkbox" id="category-toggle" class="toggle-input">
            <label for="category-toggle" class="toggle-label">Category</label>
            <ul class="submenu">
                <li><a href="{{ route('get.category.form') }}">Add Category</a></li>
                <li><a href="{{route('get.category.table')}}">Table</a></li>
            </ul>
        </li>

        <!-- Orders -->
        <li>
            <input type="checkbox" id="orders-toggle" class="toggle-input">
            <label for="orders-toggle" class="toggle-label">Orders</label>
            <ul class="submenu">
                <li><a href="#">All Orders</a></li>
                <li><a href="#">Pending Orders</a></li>
                <li><a href="#">Completed Orders</a></li>
            </ul>
        </li>

        <!-- Cart -->
        <li>
            <input type="checkbox" id="cart-toggle" class="toggle-input">
            <label for="cart-toggle" class="toggle-label">Cart</label>
            <ul class="submenu">
                <li><a href="#">My Cart</a></li>
                <li><a href="#">Checkout</a></li>
            </ul>
        </li>

        <!-- Profile -->
        <li>
            <input type="checkbox" id="profile-toggle" class="toggle-input">
            <label for="profile-toggle" class="toggle-label">Profile</label>
            <ul class="submenu">
                <li><a href="#">View Profile</a></li>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </li>

        <!-- Logout -->
        <li>
            <a href="#" class="logout">Logout</a>
        </li>
    </ul>
</div>