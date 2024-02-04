@section('title')
    <title>Employee Data</title>
@endsection

@extends('administrator.main')

@section('container')   
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Employee Data</h1>
        </div>
        
        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ route('add_new_employee') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-fw fa-solid fa-plus"></i>
                        Add New
                    </a>
                    <a href="{{ route('print_employee_data') }}" target="_blank" class="btn btn-sm btn-success">
                        <i class="fas fa-fw fa-clipboard-list"></i>
                        Print
                    </a>
                </div>
                <div class="card-header py-3">
                    <form action="{{ route('employee_data.search') }}" method="GET" class="form-inline">
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="nomor_ktp" placeholder="Nomor KTP">
                        </div>
                        <div class="form-group mr-2">
                            <select class="form-control" id="employee_position" name="employee_position">
                                <option style="font-weight: bold;" disabled value>Choose Position</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Staff">Staff</option>
                                <option value="Director">Director</option>
                                <option value="Analyst">Analyst</option>
                                <option value="Coordinator">Coordinator</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Expert">Expert</option>
                                <option value="Department Head">Department Head</option>
                                <option value="Administrative Staff">Administrative Staff</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date of Birth</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Province Address</th>
                                    <th>City Address</th>
                                    <th>Street Address</th>
                                    <th>Zip Code</th>
                                    <th>KTP Number</th>
                                    <th>KTP Image</th>
                                    <th>Current Position</th>
                                    <th>Bank Account Number</th>
                                    <th>Employee Position</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee_data as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->date_of_birth }}</td>
                                        <td>{{ $employee->phone_number }}</td>
                                        <td>{{ $employee->email_address }}</td>
                                        <td>{{ $employee->province_address }}</td>
                                        <td>{{ $employee->city_address }}</td>
                                        <td>{{ $employee->street_address }}</td>
                                        <td>{{ $employee->zip_code }}</td>
                                        <td>{{ $employee->ktp_number }}</td>
                                        <td>
                                            @if($employee->ktp_image)
                                                <img src="{{ asset('ktp_images/' . $employee->ktp_image) }}" alt="KTP Image" style="max-width: 200px; height: auto;">
                                            @else
                                                <p>No KTP Image available</p>
                                            @endif
                                        </td>
                                        <td>{{ $employee->current_position_bank_account }}</td>
                                        <td>{{ $employee->bank_account_number }}</td>
                                        <td>{{ $employee->employee_position }}</td>
                                        <td>
                                            <a href="{{ url('edit_employee_data', $employee->id) }}" class="badge badge-primary px-2 py-1">Edit</a>
                                            <a href="{{ url('delete_employee_data', $employee->id) }}" class="badge badge-danger px-2 py-1">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    {{ $employee_data->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

{{-- https://realrashid.github.io/sweet-alert/ --}}