@extends('layouts.Middle')

@push('title')
Trash Employee
@endpush

@section('mainBody')


<div class="card">
    <div class="card-header p-3">
        <h6 class="m-0">Trash Employees</h6>
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
                    @foreach ($trash_emp as $item)
                    <tr>
                        <td scope="col">
                            <img src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->firstname }} {{ $item->lastname }} image">
                        </td>
                        <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                        <td scope="col">{{ $item->email }}</td>
                        <td scope="col">{{ $item->username }}</td>
                        <td scope="col">{{ $item->phone }}</td>
                        <td scope="col">{{ $item->city }}</td>
                        <td scope="col">
                            <a href="{{ route('trash_employee_restore', ['id'=>$item->employee_id]) }}" class="btn btn-outline-primary">Restore</a>
                            <a href="{{ route('trash_employee_delete', ['id'=>$item->employee_id]) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure this record is deleted?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection