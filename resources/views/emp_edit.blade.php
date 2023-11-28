@extends('layouts.app')

@section('content_auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit <strong> {{ $data->name }}</strong>
                        <span class=" text-end float-end">
                            <a href="{{ route('employee') }}" class="btn btn-sm btn-primary">List Employees</a>
                            <a href="{{ route('emp_create') }}" class="btn btn-sm btn-success">Add Employees</a>
                        </span>
                    </div>

                    <div class="card-body">
                        @include('msg')
                        <form class="row g-3" method="POST" action="{{ route('emp_update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $data->name }}">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $data->email }}">
                            </div>
                            <div class="col-md-4">
                                <label for="phonno" class="form-label">Phone No.</label>
                                <input type="text" class="form-control" id="phonno" name="phonno"
                                    value="{{ $data->phonno }}">
                            </div>
                            <div class="col-md-6">
                                <label for="salary" class="form-label">Salary.</label>
                                <input type="text" class="form-control" id="salary" name="salary"
                                    value="{{ $data->salary }}">
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Post</label>
                                <select name="post" id="post" class="form-control">
                                    <option>Select Post</option>
                                    <option value="ADMIN" {{ $data->post == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                                    <option value="STORE MANAGER" {{ $data->post == 'STORE MANAGER' ? 'selected' : '' }}>
                                        STORE
                                        MANAGER</option>
                                    <option value="SALES MANAGER" {{ $data->post == 'SALES MANAGER' ? 'selected' : '' }}>
                                        SALES
                                        MANAGER</option>
                                    <option value="PEON" {{ $data->post == 'PEON' ? 'selected' : '' }}>PEON</option>
                                    <option value="MARKETING MANAGER"
                                        {{ $data->post == 'MARKETING MANAGER' ? 'selected' : '' }}>
                                        MARKETING MANAGER</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
