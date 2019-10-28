@extends('layouts.dashboard')

@section('styles')
<style>
.sub-category {
    padding-left: 1em;
}
</style>
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Add a New Product
            </div>
            <div class="card-block">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id[]" multiple="multiple" class="form-control select2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @if ($category->children)
                                @foreach ($category->children as $child)
                                    <option class="sub-category" value="{{ $child->id }}">{{ $child->name }}</option>
                                @endforeach                            
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection