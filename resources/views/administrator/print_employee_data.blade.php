<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.statuc {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Print Employee Data</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Report Employee Data</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
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
                <th>Current Position Bank Account</th>
                <th>Bank Account Number</th>
                <th>Employee Position</th>
            </tr>
            @foreach ($print_employee_data as $print)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $print->first_name }}</td>
                    <td>{{ $print->last_name }}</td>
                    <td>{{ $print->date_of_birth }}</td>
                    <td>{{ $print->phone_number }}</td>
                    <td>{{ $print->email_address }}</td>
                    <td>{{ $print->province_address }}</td>
                    <td>{{ $print->city_address }}</td>
                    <td>{{ $print->street_address }}</td>
                    <td>{{ $print->zip_code }}</td>
                    <td>{{ $print->ktp_number }}</td>
                    <td>{{ $print->current_position_bank_account }}</td>
                    <td>{{ $print->bank_account_number }}</td>
                    <td>{{ $print->employee_position }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>