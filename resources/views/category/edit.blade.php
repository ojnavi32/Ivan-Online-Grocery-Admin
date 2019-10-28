@extends('layouts.dashboard')

@section('breadcrumb')
<i class="fa fa-bars"></i>
Edit Category
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Edit Category {{ $category['name'] }}
            </div>
            <div class="card-block">
            <form action="{{ route('categories.update', ['category' => $category['id']]) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <select name="parent_id" class="form-control">
                        <option hidden>Select Parent</option>
                        <option value="0"
                            @if ($category['parent_id'] === 0)
                                selected="selected"
                            @endif
                        >None</option> 
                        @foreach ($parents as $parent)
                            <option value="{{ $parent['id'] }}"
                                @if ($category['parent_id'] === $parent['id'])
                                    selected="selected"
                                @endif
                            >{{ $parent['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Category name..." value="{{ $category['name'] }}">
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Category slug..." value="{{ $category['slug'] }}">
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