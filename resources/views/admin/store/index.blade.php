@extends('layouts.dashboard')

@section('content')


@if(Session::has('message'))
<div class="alert alert-success   show" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="datass">
    <a href="/add-store" class="btn btn-success float-right mb-2">Add Store</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Type</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>{{ $store->type }}</td>
                    <td>{{ $store->company->name }}</td>
                <td><a href="/add-store/{{ $store->id }}">Edit</a> | <a onclick="return confirm('Are you sure you want to delete?')" href="/delete-store/{{ $store->id }}">Delete</a></td>
                </tr>
           @endforeach
        </tbody>
        <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Type</th>
                    <th>Company</th>
               </tr>
        </tfoot>
    </table>
</div>

@endsection
