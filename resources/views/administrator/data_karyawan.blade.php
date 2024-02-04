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
                    <a href="{{ route('tambah_data_karyawan') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-fw fa-solid fa-plus"></i>
                        Add New
                    </a>
                    <a href="{{ route('cetak_karyawan') }}" target="_blank" class="btn btn-sm btn-success">
                        <i class="fas fa-fw fa-clipboard-list"></i>
                        Print
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Jabatan</th>
                                    <th>Address</th>
                                    <th>Birthday Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKaryawan as $dt_karyawan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt_karyawan->name }}</td>
                                        <td>{{ $dt_karyawan->jabatan->jabatan }}</td>
                                        <td>{{ $dt_karyawan->address }}</td>
                                        <td>{{ date('d-m-Y', strtotime($dt_karyawan->birthday_date)) }}</td>
                                        <td>
                                            <a href="{{ url('edit_data_karyawan', $dt_karyawan->id) }}" class="badge badge-primary px-2 py-1">Edit</a>
                                            <a href="{{ url('delete_data_karyawan', $dt_karyawan->id) }}" class="badge badge-danger px-2 py-1">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    {{ $dataKaryawan->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

{{-- https://realrashid.github.io/sweet-alert/ --}}