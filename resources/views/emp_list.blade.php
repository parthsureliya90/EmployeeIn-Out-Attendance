@extends('layouts.app')

@section('content_auth')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Employees List
                        <span class=" text-end float-end">
                            <a href="{{ route('emp_create') }}" class="btn btn-sm btn-primary">Add New Employee</a>
                        </span>
                    </div>

                    <div class="card-body">
                        @include('msg')
                        <div class="table-responsive">
                            <x-table :columns="['No.', 'Name', 'Email', 'Phone', 'Post', 'Salary', 'Actions']" type='datatable'>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $data->firstItem() + $key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phonno }}</td>
                                        <td>{{ $item->post }}</td>

                                        <td>{{ number_format($item->salary, 2) }}</td>
                                        <td>

                                            <a href="{{ route('emp_edit', ['id' => $item->id]) }}" target="_blank"
                                                class="btn btn-outline-primary btn-sm">Edit</a>
                                            <a href="{{ route('emp_destroy', ['id' => $item->id]) }}"
                                                onclick="return confirm('Are you sure to remove this employee? All the data related to this Employee will be removed !')"
                                                class="btn btn-outline-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </x-table>

                            <div class="text-right float-right">
                                @if ($data->lastPage() > 1)
                                    <ul class="pagination">
                                        <li class="page-item   {{ $data->currentPage() == 1 ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $data->url(1) }}">Previous</a>
                                        </li>
                                        @for ($i = 1; $i <= $data->lastPage(); $i++)
                                            <li
                                                class="page-item{{ $data->currentPage() == $i ? ' active disabled' : '' }}">
                                                <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li
                                            class="page-item{{ $data->currentPage() == $data->lastPage() ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $data->url($data->currentPage() + 1) }}">Next</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
