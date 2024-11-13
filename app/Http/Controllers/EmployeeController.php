<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        // Melihat data
        $employees = Employee::all();
        $data = [
            'message' => 'Berhasil mengakses data karyawan',
            'data' => $employees
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $input = [
            'nama' => $request->nama,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'status' => $request->status,
            'hired_on' => $request->hired_on,
        ];
        
        $employee = Employee::create($input);
        
        $data = [
            'message' => 'Data karyawan berhasil ditambahkan',
            'data' => $employee
        ];
        
        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {
        $employee = Employee::find($id);
        
        if ($employee) {
            $employee->update([
                'nama' => $request->nama,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'status' => $request->status,
                'hired_on' => $request->hired_on,
            ]);
            
            $data = [
                'message' => 'Data karyawan berhasil diupdate',
                'data' => $employee
            ];
            
            return response()->json($data, 200);
        } else {
            return response()->json(['message' => 'Data karyawan tidak ditemukan'], 404);
        }
    }

    public function destroy($id) {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->delete();
            $data = [
                'message' => 'Data karyawan berhasil dihapus'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data karyawan tidak ditemukan'
            ];
            return response()->json($data, 404);
        }
    }
}
