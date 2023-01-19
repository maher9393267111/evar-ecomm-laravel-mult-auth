<nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="index.html"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>



                <li class="menu-item has-submenu">
                    <a class="menu-link" > <i class="icon material-icons md-image"></i>
                        <span class="text">Banner Managment</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('banner.index')}}">All Banners</a>
                        <a href="{{route('banner.create')}}">Add Banner</a>
        
                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href=""> <i class="icon material-icons md-comment"></i>
                        <span class="text">Category Managment</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('category.index')}}">All Category</a>
                        <a href="{{route('category.create')}}">Add Category</a>
        
                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href=""> <i class="icon material-icons md-stars"></i>
                        <span class="text">Brand Managment</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('brand.index')}}">All Brand</a>
                        <a href="{{route('brand.create')}}">Add Brand</a>
        
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href=""> <i class="icon material-icons md-add_box"></i>
                        <span class="text">Product Managment</span>
                    </a>
                    <div class="submenu">
                    <a href="{{route('product.index')}}">All Product</a>
                        <a href="{{route('product.create')}}">Add Product</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href=""> <i class="icon material-icons md-local_shipping"></i>
                        <span class="text">Shipping Managment</span>
                    </a>
                    <div class="submenu">
                    <a href="{{route('shipping.index')}}">All Shipping</a>
                        <a href="{{route('shipping.create')}}">Add Shipping</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href=""> <i class="icon material-icons md-check_circle"></i>
                        <span class="text">Coupon Managment</span>
                    </a>
                    <div class="submenu">
                    <a href="{{route('coupon.index')}}">All Coupon</a>
                        <a href="{{route('coupon.create')}}">Add Coupon</a>
                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                        <a href="page-products-list.html">Product List</a>
                        <a href="page-products-grid.html">Product grid</a>
                        <a href="page-products-grid-2.html">Product grid 2</a>
                        <a href="page-categories.html">Categories</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-orders-1.html"> <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">Orders</span>
                    </a>
                    <div class="submenu">
                        <a href="page-orders-1.html">Order list 1</a>
                        <a href="page-orders-2.html">Order list 2</a>
                        <a href="page-orders-detail.html">Order detail</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-store"></i>
                        <span class="text">Sellers</span>
                    </a>
                    <div class="submenu">
                        <a href="page-sellers-cards.html">Sellers cards</a>
                        <a href="page-sellers-list.html">Sellers list</a>
                        <a href="page-seller-detail.html">Seller profile</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-form-product-1.html"> <i class="icon material-icons md-add_box"></i>
                        <span class="text">Add product</span>
                    </a>
                    <div class="submenu">
                        <a href="page-form-product-1.html">Add product 1</a>
                        <a href="page-form-product-2.html">Add product 2</a>
                        <a href="page-form-product-3.html">Add product 3</a>
                        <a href="page-form-product-4.html">Add product 4</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-transactions-1.html"> <i class="icon material-icons md-monetization_on"></i>
                        <span class="text">Transactions</span>
                    </a>
                    <div class="submenu">
                        <a href="page-transactions-1.html">Transaction 1</a>
                        <a href="page-transactions-2.html">Transaction 2</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link"> <i class="icon material-icons md-person"></i>
                        <span class="text">User Managment</span>
                    </a>
                    <div class="submenu">
                    <a href="{{route('user.index')}}">All Users</a>
                        <a href="{{route('user.create')}}">Add User</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-reviews.html"> <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-brands.html"> <i class="icon material-icons md-stars"></i>
                        <span class="text">Brands</span> </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" disabled href="#"> <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Statistics</span>
                    </a>
                </li>
            </ul>
            <hr>
            <ul class="menu-aside">
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a href="page-settings-1.html">Setting sample 1</a>
                        <a href="page-settings-2.html">Setting sample 2</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-blank.html"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Starter page </span>
                    </a>
                </li>
            </ul>
            <br>
            <br>
        </nav>