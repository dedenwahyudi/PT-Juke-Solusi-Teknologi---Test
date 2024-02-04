@section('title')
    <title>Create New Employee Data</title>
@endsection

@extends('administrator.main')

@section('container')   
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Create New Employee Data</h1>
        </div>

        <form action="{{ route('simpan_data_karyawan') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="jabatan_id">Jabatan</label>
                    <select class="form-control" id="jabatan_id" name="jabatan_id">
                        <option disabled value>Pilih Jabatan</option>
                        @foreach ($dataJabatan as $dt_jabatan)
                            <option value="{{ $dt_jabatan->id }}">{{ $dt_jabatan->jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="birthday_date">Birthday Date</label>
                    <input type="date" class="form-control" id="birthday_date" name="birthday_date">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
@endsection