<li class="{{ 
    Request::is('categories') ? 'active' : '' ||
    Request::is('categories/create') ? 'active' : '' ||
    Request::is('categories/{category}/edit') ? 'active' : ''
}}">
    <a href="{{ route('categories.index') }}">
        <i class="fa fa-bars"></i>
        <span class="link-title">Categories</span>
    </a>
</li>