@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">

        @include('alerts')

        <div class="card">
            <div class="card-header">
                Customer List
            </div>
            <div class="card-block">
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @if (count($customers) === 0)
                            <tr>
                                <td colspan="5" align="center">No data available...</td>
                            </tr>
                        @else
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer->details['mobile'] }}</td>
                                <td>{{ $customer['status'] }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['customer' => $customer['id']]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('customers.destroy', ['customer' => $customer['id']]) }}" method="POST" style="display: inline-block">
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
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection