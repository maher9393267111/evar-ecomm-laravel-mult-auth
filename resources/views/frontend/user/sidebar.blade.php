<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a  class="{{\Request::is('user/dashboard') ? 'active' : ''}} nav-link"  href="{{route('user.dashboard')}}"  ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="{{\Request::is('user/order') ? 'active' : ''}} nav-link" href="{{route('user.order')}}"   ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>
    <li class="nav-item">
        <a class="{{\Request::is('user/track') ? 'active' : ''}} nav-link"   href="{{route('user.trackorder')}}"  ><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
    </li>
    <li class="nav-item">
        <a  class="{{\Request::is('user/address') ? 'active' : ''}} nav-link"  href="{{route('user.address')}}"  ><i class="fi-rs-marker mr-10"></i>My Address</a>
    </li>
    <li class="nav-item">
        <a  class="{{\Request::is('user/detail') ? 'active' : ''}} nav-link"  href="{{route('user.account')}}" ><i class="fi-rs-user mr-10"></i>Account details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.logout')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
    </li>
</ul>