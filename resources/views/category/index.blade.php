@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">

        @include('alerts')

        <div class="card">
            <div class="card-header">
                Category List
                <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Add Category</a>
            </div>
            <div class="card-block">
                <table id="category-list" class="table table-striped">
                    <thead>
                        <th>Parent</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if (count($categories) === 0)
                            <tr>
                                <td colspan="4" align="center">No data available...</td>
                            </tr>
                        @else
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->parent['name'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td>{{ $category['slug'] }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', ['category' => $category['id']]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', ['category' => $category['id']]) }}" method="POST" style="display: inline-block">
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection