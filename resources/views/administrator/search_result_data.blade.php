@section('title')
    <title>Employee Data</title>
@endsection

@extends('administrator.main')

@section('container')   
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Search Result Data</h1>
        </div>

        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="card shadow mb-4">
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
                        @if($results->count() > 0)
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
                                @foreach ($results as $search)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $search->first_name }}</td>
                                        <td>{{ $search->last_name }}</td>
                                        <td>{{ $search->date_of_birth }}</td>
                                        <td>{{ $search->phone_number }}</td>
                                        <td>{{ $search->email_address }}</td>
                                        <td>{{ $search->province_address }}</td>
                                        <td>{{ $search->city_address }}</td>
                                        <td>{{ $search->street_address }}</td>
                                        <td>{{ $search->zip_code }}</td>
                                        <td>{{ $search->ktp_number }}</td>
                                        <td>
                                            @if($search->ktp_image)
                                                <img src="{{ asset('ktp_images/' . $search->ktp_image) }}" alt="KTP Image" style="max-width: 200px; height: auto;">
                                            @else
                                                <p>No KTP Image available</p>
                                            @endif
                                        </td>
                                        <td>{{ $search->current_position_bank_account }}</td>
                                        <td>{{ $search->bank_account_number }}</td>
                                        <td>{{ $search->employee_position }}</td>
                                        <td>
                                            <a href="{{ url('edit_employee_data', $search->id) }}" class="badge badge-primary px-2 py-1">Edit</a>
                                            <a href="{{ url('delete_employee_data', $search->id) }}" class="badge badge-danger px-2 py-1">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>Tidak ada hasil yang ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

{{-- https://realrashid.github.io/sweet-alert/ --}}