@extends('layouts.Middle')

@push('title')
Edit Employee
@endpush

@section('mainBody')

<div class="card">
    <div class="card-header">
        <h5 class="py-2 m-0">Edit Employee</h5>
    </div>
    <form action="{{ route('editEmployee_save', ['id'=>$edit_employee->employee_id]) }}" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="modal-body">
                <div class="row">
                    <div class="col my-4 mb-5 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('uploads/' . $edit_employee->image) }}" alt="{{ $edit_employee->firstname }} {{ $edit_employee->lastname }} image" class="shadow rounded-circle p-3" style="width: 200px; height: 200px;">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Profile</label>
                        <input type="file" class="form-control" name="image" id="profile">
                        @error('image')
                        <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @csrf
                    <div class="row">
                        <input type="hidden" name="employee_id" value="{{ $edit_employee->employee_id }}">
                        <div class="col">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Your Firstname" required value="{{ $edit_employee->firstname }}">
                                @error('firstname')
                                <span class="fw-bold text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Your Lastname" required value="{{ $edit_employee->lastname }}">
                                @error('lastname')
                                <span class="fw-bold text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" required value="{{ $edit_employee->email }}">
                        @error('email')
                        <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone Number" required value="{{ $edit_employee->phone }}">
                        @error('phone')
                        <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter Your City" required value="{{ $edit_employee->city }}">
                        @error('city')
                        <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Username" required value="{{ $edit_employee->username }}">
                        @error('username')
                        <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary w-25">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection