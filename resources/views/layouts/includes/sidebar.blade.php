<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
    </div>
    <ul id="menu" class="bg-blue dker">
        <li class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <i class="fa fa-home"></i>
                <span class="link-title">Dashboard</span>
            </a>
        </li>
        @include('category.sidebar-menu')
        @include('product.sidebar-menu')
        @include('customer.sidebar-menu')
    </ul>
</div>