<?php

namespace App\Http\Controllers;

use App\Models\M_employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee_data = M_employee::paginate(10);
        return view('administrator.employee_data', compact('employee_data'));
    }

    public function create()
    {
        $employee_data = M_employee::all();
        return view('administrator.add_new_employee', compact('employee_data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits:12',
            'email_address' => 'required|email',
            'province_address' => 'required',
            'city_address' => 'required',
            'street_address' => 'required',
            'zip_code' => 'required|numeric',
            'ktp_number' => 'required|numeric|digits:16',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_position_bank_account' => 'required',
            'bank_account_number' => 'required',
            'employee_position' => 'required'
        ]);

        if ($request->hasFile('ktp_image')) {
            $image = $request->file('ktp_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ktp_images'), $imageName);

            $validatedData['ktp_image'] = $imageName;
        }

        M_employee::create($validatedData);

        return redirect('employee')->with('toast_success', 'Data Input Successfully!');
    }

    public function edit($id)
    {
        $employee = M_employee::findOrFail($id);
        return view('administrator.edit_employee_data', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits:12',
            'email_address' => 'required|email',
            'province_address' => 'required',
            'city_address' => 'required',
            'street_address' => 'required',
            'zip_code' => 'required|numeric',
            'ktp_number' => 'required|numeric|digits:16',
            'current_position_bank_account' => 'required',
            'bank_account_number' => 'required',
            'employee_position' => 'required'
        ]);

        $employee = M_employee::findorfail($id);
        $employee->update($validatedData);

        return redirect('employee')->with('toast_success', 'Data Edited Successfully!');
    }

    public function destroy($id)
    {
        $employee = M_employee::findorfail($id);
        $employee->delete();

        return back()->with('info', 'Data Successfully Deleted!');
    }

    public function print_employee_data()
    {
        $print_employee_data = M_employee::all();
        return view('administrator.print_employee_data', compact('print_employee_data'));
    }

    public function search(Request $request)
    {
        $query = M_employee::query();

        if ($request->has('first_name')) {
            $query->where('first_name', 'like', '%' . $request->input('first_name') . '%');
        }

        if ($request->has('ktp_number')) {
            $query->where('ktp_number', $request->input('ktp_number'));
        }

        if ($request->has('employee_position')) {
            $query->where('employee_position', $request->input('employee_position'));
        }

        $results = $query->get();

        return view('administrator.search_result_data', compact('results'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits:12',
            'email_address' => 'required|email',
            'province_address' => 'required',
            'city_address' => 'required',
            'street_address' => 'required',
            'zip_code' => 'required|numeric',
            'ktp_number' => 'required|numeric|digits:16',
            'current_position_bank_account' => 'required',
            'bank_account_number' => 'required',
            'employee_position' => 'required'
        ]);

        $employee = M_employee::findOrFail($id);

        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'phone_number' => $request->input('phone_number'),
            'email_address' => $request->input('email_address'),
            'province_address' => $request->input('province_address'),
            'city_address' => $request->input('city_address'),
            'street_address' => $request->input('street_address'),
            'zip_code' => $request->input('zip_code'),
            'ktp_number' => $request->input('ktp_number'),
            'current_position_bank_account' => $request->input('current_position_bank_account'),
            'bank_account_number' => $request->input('bank_account_number'),
            'employee_position' => $request->input('employee_position')
        ]);

        if ($request->hasFile('ktp_image')) {
            $ktpImage = $request->file('ktp_image');
            $newKtpImageName = 'ktp_' . time() . '.' . $ktpImage->getClientOriginalExtension();
            $ktpImage->move(public_path('ktp_images'), $newKtpImageName);

            $employee->update(['ktp_image' => $newKtpImageName]);
        }

        return redirect()->route('employee')->with('success', 'Employee data updated successfully');
    }

    public function show($id)
    {
        //
    }
}
