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
                Edit Product
            </div>
            <div class="card-block">
            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id[]" multiple="multiple" class="form-control select2">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}"
                                {{ in_array($category->id, $categoryIds) ? 'selected' : '' }}
                            >{{ $category->name }}</option>

                            @if ($category->children)
                                @foreach ($category->children as $child)
                                    <option 
                                        class="sub-category" 
                                        value="{{ $child->id }}"
                                        {{ in_array($child->id, $categoryIds) ? 'selected' : '' }}
                                    >{{ $child->name }}</option>
                                @endforeach                            
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="stock" value="{{ $product->stock }}">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                    <input type="hidden" name="image-old" value="{{ $product->image }}">
                    @if ($product->image)
                        <img src="{{ $product->image }}" class="img-thumbnail">
                    @endif
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