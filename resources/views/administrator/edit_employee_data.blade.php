@section('title')
    <title>Edit Employee Data</title>
@endsection

@extends('administrator.main')

@section('container')   
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Edit Employee Data</h1>
        </div>

        <form action="{{ url('update_employee_data', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $employee->first_name }}">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $employee->last_name }}">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}">
                @error('date_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}">
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="text" class="form-control @error('email_address') is-invalid @enderror" id="email_address" name="email_address" value="{{ $employee->email_address }}">
                @error('email_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="province_address">Province Address</label>
                <select class="form-control @error('province_address') is-invalid @enderror" id="province_address" name="province_address" onchange="filterCity()">
                    <option style="font-weight: bold;" disabled value>Choose Province</option>
                    <option value="{{ $employee->province_address }}">{{ $employee->province_address }}</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Riau">Riau</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Banten">Banten</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Bali">Bali</option>
                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Papua Barat">Papua Barat</option>
                    <option value="Papua">Papua</option>
                </select>
                @error('province_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="city_address">City Address</label>
                <select class="form-control @error('city_address') is-invalid @enderror" id="city_address" name="city_address">
                    <option style="font-weight: bold;" disabled value>Choose City</option>
                    <option value="{{ $employee->city_address }}">{{ $employee->city_address }}</option>
                    <!-- Aceh -->
                    <option value="Banda Aceh">Banda Aceh</option>
                    <option value="Sabang">Sabang</option>
                    <option value="Lhokseumawe">Lhokseumawe</option>
                    <!-- Sumatera Utara -->
                    <option value="Medan">Medan</option>
                    <option value="Binjai">Binjai</option>
                    <option value="Pematang Siantar">Pematang Siantar</option>
                    <!-- Sumatera Barat -->
                    <option value="Padang">Padang</option>
                    <option value="Bukittinggi">Bukittinggi</option>
                    <option value="Padang Panjang">Padang Panjang</option>
                    <!-- Riau -->
                    <option value="Pekanbaru">Pekanbaru</option>
                    <option value="Dumai">Dumai</option>
                    <option value="Bengkalis">Bengkalis</option>
                    <!-- Kepulauan Riau -->
                    <option value="Tanjung Pinang">Tanjung Pinang</option>
                    <option value="Batam">Batam</option>
                    <option value="Bintan">Bintan</option>
                    <!-- Jambi -->
                    <option value="Jambi">Jambi</option>
                    <option value="Sungai Penuh">Sungai Penuh</option>
                    <option value="Muara Bungo">Muara Bungo</option>
                    <!-- Sumatera Selatan -->
                    <option value="Palembang">Palembang</option>
                    <option value="Prabumulih">Prabumulih</option>
                    <option value="Lubuklinggau">Lubuklinggau</option>
                    <!-- Bangka Belitung -->
                    <option value="Pangkal Pinang">Pangkal Pinang</option>
                    <!-- Bengkulu -->
                    <option value="Bengkulu">Bengkulu</option>
                    <!-- Lampung -->
                    <option value="Bandar Lampung">Bandar Lampung</option>
                    <option value="Metro">Metro</option>
                    <!-- Banten -->
                    <option value="Serang">Serang</option>
                    <option value="Tangerang">Tangerang</option>
                    <option value="Cilegon">Cilegon</option>
                    <!-- Jakarta -->
                    <option value="Jakarta Pusat">Jakarta Pusat</option>
                    <option value="Jakarta Barat">Jakarta Barat</option>
                    <option value="Jakarta Selatan">Jakarta Selatan</option>
                    <option value="Jakarta Timur">Jakarta Timur</option>
                    <option value="Jakarta Utara">Jakarta Utara</option>
                    <!-- Jawa Barat -->
                    <option value="Bandung">Bandung</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Cimahi">Cimahi</option>
                    <option value="Depok">Depok</option>
                    <option value="Sukabumi">Sukabumi</option>
                    <!-- Jawa Tengah -->
                    <option value="Semarang">Semarang</option>
                    <option value="Salatiga">Salatiga</option>
                    <option value="Surakarta">Surakarta</option>
                    <option value="Pekalongan">Pekalongan</option>
                    <!-- Yogyakarta -->
                    <option value="Yogyakarta">Yogyakarta</option>
                    <!-- Jawa Timur -->
                    <option value="Surabaya">Surabaya</option>
                    <option value="Malang">Malang</option>
                    <option value="Sidoarjo">Sidoarjo</option>
                    <option value="Mojokerto">Mojokerto</option>
                    <!-- Bali -->
                    <option value="Denpasar">Denpasar</option>
                    <!-- Nusa Tenggara Barat -->
                    <option value="Mataram">Mataram</option>
                    <option value="Bima">Bima</option>
                    <!-- Nusa Tenggara Timur -->
                    <option value="Kupang">Kupang</option>
                    <option value="Maumere">Maumere</option>
                    <!-- Kalimantan Barat -->
                    <option value="Pontianak">Pontianak</option>
                    <option value="Singkawang">Singkawang</option>
                    <!-- Kalimantan Tengah -->
                    <option value="Palangka Raya">Palangka Raya</option>
                    <!-- Kalimantan Selatan -->
                    <option value="Banjarmasin">Banjarmasin</option>
                    <option value="Banjarbaru">Banjarbaru</option>
                    <!-- Kalimantan Timur -->
                    <option value="Samarinda">Samarinda</option>
                    <option value="Balikpapan">Balikpapan</option>
                    <!-- Kalimantan Utara -->
                    <option value="Tanjung Selor">Tanjung Selor</option>
                    <!-- Sulawesi Utara -->
                    <option value="Manado">Manado</option>
                    <option value="Bitung">Bitung</option>
                    <!-- Gorontalo -->
                    <option value="Gorontalo">Gorontalo</option>
                    <!-- Sulawesi Tengah -->
                    <option value="Palu">Palu</option>
                    <option value="Donggala">Donggala</option>
                    <!-- Sulawesi Barat -->
                    <option value="Mamuju">Mamuju</option>
                    <!-- Sulawesi Selatan -->
                    <option value="Makassar">Makassar</option>
                    <option value="Makassar">Parepare</option>
                    <option value="Makassar">Palopo</option>
                    <!-- Sulawesi Tenggara -->
                    <option value="Kendari">Kendari</option>
                    <option value="Baubau">Baubau</option>
                    <!-- Maluku -->
                    <option value="Ambon">Ambon</option>
                    <option value="Tual">Tual</option>
                    <!-- Maluku Utara -->
                    <option value="Ternate">Ternate</option>
                    <option value="Tidore Kepulauan">Tidore Kepulauan</option>
                    <!-- Papua Barat -->
                    <option value="Manokwari">Manokwari</option>
                    <option value="Sorong">Sorong</option>
                    <!-- Papua -->
                    <option value="Jayapura">Jayapura</option>
                    <option value="Merauke">Merauke</option>
                </select>
                @error('city_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="street_address">Street Address</label>
                <textarea class="form-control @error('street_address') is-invalid @enderror" name="street_address" id="street_address" cols="20" rows="10">{{ $employee->street_address }}</textarea>
                @error('street_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="number" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ $employee->zip_code }}">
                @error('zip_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ktp_number">KTP Number</label>
                <input type="number" class="form-control @error('ktp_number') is-invalid @enderror" id="ktp_number" name="ktp_number" value="{{ $employee->ktp_number }}">
                @error('ktp_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                @if($employee->ktp_image)
                    <label>Current KTP Image</label>
                    <br>
                    <img src="{{ asset('ktp_images/' . $employee->ktp_image) }}" alt="Current KTP Image" style="max-width: 400px; height: auto;">
                @else
                    <p>No KTP Image available</p>
                @endif
            </div>
            <div class="form-group">
                <!-- Upload Foto KTP Baru -->
                <label for="ktp_image">Upload New KTP Image</label>
                <input type="file" name="ktp_image">
            </div>

            <div class="form-group">
                <label for="current_position_bank_account">Current Position Bank Account</label>
                <input type="text" class="form-control" id="current_position_bank_account" name="current_position_bank_account" value="{{ $employee->current_position_bank_account }}">
            </div>
            <div class="form-group">
                <label for="bank_account_number">Bank Account Number</label>
                <select class="form-control @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number">
                    <option style="font-weight: bold;" disabled value>Choose Bank</option>
                    <option value="{{ $employee->bank_account_number }}">{{ $employee->bank_account_number }}</option>
                    <option value="BCA (Bank Central Asia)">BCA (Bank Central Asia)</option>
                    <option value="BRI (Bank Rakyat Indonesia)">BRI (Bank Rakyat Indonesia)</option>
                    <option value="Mandiri (Bank Mandiri)">Mandiri (Bank Mandiri)</option>
                    <option value="BNI (Bank Negara Indonesia)">BNI (Bank Negara Indonesia)</option>
                    <option value="CIMB Niaga">CIMB Niaga</option>
                    <option value="Maybank">Maybank</option>
                    <option value="Danamon (Bank Danamon)">Danamon (Bank Danamon)</option>
                    <option value="BTN (Bank Tabungan Negara)">BTN (Bank Tabungan Negara)</option>
                    <option value="HSBC">HSBC</option>
                    <option value="OCBC NISP">OCBC NISP</option>
                </select>
                @error('bank_account_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee_position">Employee Position</label>
                <select class="form-control @error('employee_position') is-invalid @enderror" id="employee_position" name="employee_position">
                    <option style="font-weight: bold;" disabled value>Choose Position</option>
                    <option value="{{ $employee->employee_position }}">{{ $employee->employee_position }}</option>
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Staff">Staff</option>
                    <option value="Director">Director</option>
                    <option value="Analyst">Analyst</option>
                    <option value="Coordinator">Coordinator</option>
                    <option value="Secretary">Secretary</option>
                    <option value="Expert">Expert</option>
                    <option value="Department Head">Department Head</option>
                    <option value="Administrative Staf">Administrative Staff</option>
                </select>
                @error('employee_position')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </div>
        </form>

    </div>
@endsection

<script>
    function filterCity() {
      var provinsiSelect = document.getElementById("province_address");
      var kotaSelect = document.getElementById("city_address");

      var selectedProvinsi = provinsiSelect.value;

      kotaSelect.innerHTML = "";

        if (selectedProvinsi === "Aceh") {
            addOption("Banda Aceh");
            addOption("Sabang");
            addOption("Lhokseumawe");
        } else if (selectedProvinsi === "Sumatera Utara") {
            addOption("Medan");
            addOption("Binjai");
            addOption("Pematang Siantar");
        } else if (selectedProvinsi === "Sumatera Barat") {
            addOption("Padang");
            addOption("Bukittinggi");
            addOption("Padang Panjang");
        } else if (selectedProvinsi === "Riau") {
            addOption("Pekanbaru");
            addOption("Dumai");
            addOption("Bengkalis");
        } else if (selectedProvinsi === "Kepulauan Riau") {
            addOption("Tanjung Pinang");
            addOption("Batam");
            addOption("Bintan");
        } else if (selectedProvinsi === "Jambi") {
            addOption("Jambi");
            addOption("Sungai Penuh");
            addOption("Muara Bungo");
        } else if (selectedProvinsi === "Sumatera Selatan") {
            addOption("Palembang");
            addOption("Prabumulih");
            addOption("Lubuklinggau");
        } else if (selectedProvinsi === "Bangka Belitung") {
            addOption("Pangkal Pinang");
        } else if (selectedProvinsi === "Bengkulu") {
            addOption("Bengkulu");
        } else if (selectedProvinsi === "Lampung") {
            addOption("Bandar Lampung");
            addOption("Metro");
        } else if (selectedProvinsi === "Banten") {
            addOption("Serang");
            addOption("Tangerang");
            addOption("Cilegon");
        } else if (selectedProvinsi === "Jakarta") {
            addOption("Jakarta Pusat");
            addOption("Jakarta Barat");
            addOption("Jakarta Selatan");
            addOption("Jakarta Timur");
            addOption("Jakarta Utara");
        } else if (selectedProvinsi === "Jawa Barat") {
            addOption("Bandung");
            addOption("Bekasi");
            addOption("Bogor");
            addOption("Cimahi");
            addOption("Depok");
            addOption("Sukabumi");
        } else if (selectedProvinsi === "Jawa Tengah") {
            addOption("Semarang");
            addOption("Salatiga");
            addOption("Surakarta");
            addOption("Pekalongan");
        } else if (selectedProvinsi === "Yogyakarta") {
            addOption("Yogyakarta");
        } else if (selectedProvinsi === "Jawa Timur") {
            addOption("Surabaya");
            addOption("Malang");
            addOption("Sidoarjo");
            addOption("Mojokerto");
        } else if (selectedProvinsi === "Bali") {
            addOption("Denpasar");
        } else if (selectedProvinsi === "Nusa Tenggara Barat") {
            addOption("Mataram");
            addOption("Bima");
        } else if (selectedProvinsi === "Nusa Tenggara Timur") {
            addOption("Kupang");
            addOption("Maumere");
        } else if (selectedProvinsi === "Kalimantan Barat") {
            addOption("Pontianak");
            addOption("Singkawang");
        } else if (selectedProvinsi === "Kalimantan Tengah") {
            addOption("Palangka Raya");
        } else if (selectedProvinsi === "Kalimantan Selatan") {
            addOption("Banjarmasin");
            addOption("Banjarbaru");
        } else if (selectedProvinsi === "Kalimantan Timur") {
            addOption("Samarinda");
            addOption("Balikpapan");
        } else if (selectedProvinsi === "Kalimantan Utara") {
            addOption("Tanjung Selor");
        } else if (selectedProvinsi === "Sulawesi Utara") {
            addOption("Manado");
            addOption("Bitung");
        } else if (selectedProvinsi === "Gorontalo") {
            addOption("Gorontalo");
        } else if (selectedProvinsi === "Sulawesi Tengah") {
            addOption("Palu");
            addOption("Donggala");
        } else if (selectedProvinsi === "Sulawesi Barat") {
            addOption("Mamuju");
        } else if (selectedProvinsi === "Sulawesi Selatan") {
            addOption("Makassar");
            addOption("Parepare");
            addOption("Palopo");
        } else if (selectedProvinsi === "Sulawesi Tenggara") {
            addOption("Kendari");
            addOption("Baubau");
        } else if (selectedProvinsi === "Maluku") {
            addOption("Ambon");
            addOption("Tual");
        } else if (selectedProvinsi === "Maluku Utara") {
            addOption("Ternate");
            addOption("Tidore Kepulauan");
        } else if (selectedProvinsi === "Papua Barat") {
            addOption("Manokwari");
            addOption("Sorong");
        } else if (selectedProvinsi === "Papua") {
            addOption("Jayapura");
            addOption("Merauke");
        }

      function addOption(city) {
        var option = document.createElement("option");
        option.text = city;
        kotaSelect.add(option);
      }
    }
  </script>