<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        //melihat data
        $student = Student::all();
        $data = [
            'message' => 'berhasil akses data',
            'data' => $student
        ];
        return response()->json($data,200);
    }

   public function store(Request $request){
    $input = [
        'nama' => $request->nama,
        'nim' => $request->nim,
        'email' => $request->email,
        'jurusan' => $request->jurusan,
    ];
    $student = Student::create($input);
    $data = [
        'message' => 'Data Berhasil ditambah',
        'data' => $student
    ];
    return response()->json($data, 200);
   }

   public function update(Request $request, $id) {
        $student = Student::find($id);
        if ($student) {
            $student->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jurusan' => $request->jurusan,
            ]);
            $data = [
                'message' => 'Data Berhasil diupdate',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }
    
    public function destroy($id) {
        $student = student::find($id);

        if ($student) {
            $student->delete();
            $data = [
                'message' => 'Student is deleted'
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found'
            ];
            return response()->json($data, 404);
        }
    }

}
