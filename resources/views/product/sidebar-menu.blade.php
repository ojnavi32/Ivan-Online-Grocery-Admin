<li class="{{ Request::is('products') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}">
        <i class="fa fa-bars"></i>
        <span class="link-title">&nbsp;Products</span>
    </a>
</li>