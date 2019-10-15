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
    <a href="/add-company" class="btn btn-success float-right mb-2">Add Company</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Nbr Regi No</th>
                <th>Contact person</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->nbr_regi_no }}</td>
                    <td>{{ $company->contact_person }}</td>
                    <td>{{ $company->mobile }}</td>
                    <td>{{ $company->city }}</td>
                    <td>{{ $company->address }}</td>
                <td><a href="/add-company/{{ $company->id }}">Edit</a> | <a onclick="return ConfirmDelete()" href="/delete-company/{{ $company->id }}">Delete</a></td>
                </tr>
           @endforeach
        </tbody>
        <!--tfoot>
                <tr>
                    <th>Name</th>
                    <th>Nbr Regi No</th>
                    <th>Contact person</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Action</th>
               </tr-->
        </tfoot>
    </table>
</div>

@endsection
