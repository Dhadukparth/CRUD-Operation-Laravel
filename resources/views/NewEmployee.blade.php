@extends('layouts.Middle')

@push('title')
    New Employee
@endpush

@section('mainBody')

    <div class="card">
        <div class="card-header">
            <h5>New Employee</h5>
        </div>
        <form action="{{ route('NewEmployee') }}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Your Firstname" required>
                                @error('firstname')
                                    <span class="fw-bold text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Your Lastname" required>
                                @error('lastname')
                                    <span class="fw-bold text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" required>
                        @error('email')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone Number" required>
                        @error('phone')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter Your City" required>
                        @error('city')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Username" required>
                        @error('username')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Profile</label>
                        <input type="file" class="form-control" name="image" id="profile" required>
                        @error('image')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
                        @error('password')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirmPassword" placeholder="Enter Your Confirm Password">
                        @error('confirm_password')
                            <span class="fw-bold text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
        </form>
    </div>

@endsection