@extends('layouts.Middle')

@push('title')
Home
@endpush

@section('mainBody')

    @if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong class="text-capitalize">{{ session()->get('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


<div class="card">
    <div class="card-header p-3">
        <h6 class="m-0">Employees</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table pt-3 table-hover table-responsive" id="records">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emp as $item)
                        <tr class="align-middle">
                            <td scope="col" class="text-center">
                                <img src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->firstname }} {{ $item->lastname }} image" style="width: 50px; height: 50px; border-radius: 50%;">
                            </td>
                            <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                            <td scope="col">{{ $item->email }}</td>
                            <td scope="col">{{ $item->username }}</td>
                            <td scope="col">{{ $item->phone }}</td>
                            <td scope="col">{{ $item->city }}</td>
                            <td scope="col">
                                <a href="{{ route('editEmployee_form', ['id'=>$item->employee_id]) }}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{ route('trashEmployee', ['id'=>$item->employee_id]) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure this record is deleted?')">Trash</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection