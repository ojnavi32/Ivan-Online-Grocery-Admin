@extends('layouts.dashboard')

@section('breadcrumb')
<i class="fa fa-list"></i>
Products
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('alerts')
        <div class="card">
            <div class="card-header">
                Product List
                <a href="{{ route('products.create') }}" class="btn btn-success float-right">Add Product</a>
            </div>
            <div class="card-block">
            <table id="category-list" class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Active</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if (count($products) === 0)
                            <tr>
                                <td colspan="6" align="center">No data available...</td>
                            </tr>
                        @else
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ ($product->active) ? 'active' : 'not-active' }}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['product' => $product['id']]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', ['product' => $product['id']]) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection