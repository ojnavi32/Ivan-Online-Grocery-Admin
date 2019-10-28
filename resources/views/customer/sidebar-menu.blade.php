<li class="{{ 
    Request::is('customers') ? 'active' : '' ||
    Request::is('customers/create') ? 'active' : '' ||
    Request::is('customers/{customer}/edit') ? 'active' : ''
}}">
    <a href="{{ route('customers.index') }}">
        <i class="fa fa-users"></i>
        <span class="link-title">Customers</span>
    </a>
</li>