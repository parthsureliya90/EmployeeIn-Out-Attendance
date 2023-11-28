@extends('layouts.app')

@section('content_auth')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        @include('msg')



                        <div class="text-center">
                            <div class="btn-group" role="group" aria-label="Default button group">
                                {{-- <a href="{{ route('attendance', ['status' => 'ALL']) }}"
                                    class="btn btn-outline-primary {{ $status == 'ALL' ? 'active' : '' }}">ALL</a> --}}
                                <a href="{{ route('attendance', ['status' => 'NotEntered']) }}"
                                    class="btn btn-outline-primary {{ $status == 'NotEntered' ? 'active' : '' }}">Not
                                    Entered</a>
                                <a href="{{ route('attendance', ['status' => 'Working']) }}"
                                    class="btn btn-outline-primary {{ $status == 'Working' ? 'active' : '' }}">Working</a>
                                <a href="{{ route('attendance', ['status' => 'Exited']) }}"
                                    class="btn btn-outline-primary {{ $status == 'Exited' ? 'active' : '' }}">Exited</a>
                            </div>
                        </div>
                        <br>
                        <div class="alert alert-info">
                            <strong>Showing data for date : {{ date('d-m-Y') }}</strong>
                        </div>
                        <div class="table-responsive">
                            <x-table :columns="[
                                'No.',
                                'Name',
                                'Email',
                                'Phone',
                                'Post',
                                'In',
                                'Out',
                                'Salary',
                                'Working Hours',
                                'Earnings',
                                'Bonus Hours',
                                'Bonus Pay',
                            ]" type='datatable'>

                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phonno }}</td>
                                        <td>{{ $item->post }}</td>
                                        <td>{{ date('h:i:s A', strtotime($item->entry_time)) }}</td>
                                        <td>{{ date('h:i:s A', strtotime($item->exit_time)) }}</td>
                                        <td>&#x20B9; {{ number_format($item->salary, 2) }}</td>
                                        <td> {{ $item->total_woking_hours }}</td>
                                        <td> {{ number_format($item->dailyPay, 2) }} (
                                            {{ $item->total_woking_hours . ' hours x ' . number_format($item->hourly_pay, 2) }}
                                            )</td>
                                        <td> {{ $item->bounus_woking_hours }}</td>
                                        <td>&#x20B9; {{ number_format($item->bonus_pay, 2) }}</td>
                                        <td>

                                            @if ($status == 'NotEntered')
                                                <a href="{{ route('attendance_log_store', ['id' => $item->id, 'status' => 'IN']) }}"
                                                    class="btn btn-success btn-sm">IN</a>
                                            @endif

                                            @if ($status == 'Working')
                                                <a href="{{ route('attendance_log_store', ['id' => $item->id, 'status' => 'OUT']) }}"
                                                    class="btn btn-danger btn-sm">OUT</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
