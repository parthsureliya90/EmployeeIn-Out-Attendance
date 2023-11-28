@extends('layouts.app')

@section('content_auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add New Employee
                        <span class=" text-end float-end">
                            <a href="{{ route('employee') }}" class="btn btn-sm btn-primary">List Employees</a>
                        </span>
                    </div>

                    <div class="card-body">
                        @include('msg')
                        <form class="row g-3" method="POST" action="{{ route('emp_store') }}">
                            @csrf
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="phonno" class="form-label">Phone No.</label>
                                <input type="text" class="form-control" id="phonno" name="phonno"
                                    value="{{ old('phonno') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="salary" class="form-label">Salary.</label>
                                <input type="text" class="form-control" id="salary" name="salary"
                                    value="{{ old('salary') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Post</label>
                                <select name="post" id="post" class="form-control">
                                    <option>Select Post</option>
                                    <option value="ADMIN" {{ old('post') == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                                    <option value="STORE MANAGER" {{ old('post') == 'STORE MANAGER' ? 'selected' : '' }}>
                                        STORE
                                        MANAGER</option>
                                    <option value="SALES MANAGER" {{ old('post') == 'SALES MANAGER' ? 'selected' : '' }}>
                                        SALES
                                        MANAGER</option>
                                    <option value="PEON" {{ old('post') == 'PEON' ? 'selected' : '' }}>PEON</option>
                                    <option value="MARKETING MANAGER"
                                        {{ old('post') == 'MARKETING MANAGER' ? 'selected' : '' }}>
                                        MARKETING MANAGER</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection