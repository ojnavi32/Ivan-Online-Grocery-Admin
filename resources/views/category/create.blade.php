@extends('layouts.dashboard')

@section('breadcrumb')
<i class="fa fa-bars"></i>
Add Category
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Add a New Category
            </div>
            <div class="card-block">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <select name="parent_id" class="form-control">
                        <option hidden>Select Parent</option>
                        <option value="0">None</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent['id'] }}">{{ $parent['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Category name...">
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Category slug...">
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