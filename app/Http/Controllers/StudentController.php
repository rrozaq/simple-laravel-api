<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\SignupRequest;
use App\Student;
use Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        $message = [
            'msg' => 'All Students',
            'data' => $students
        ];

        return response()->json($message, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignupRequest $request)
    {
        $validated = $request->all();
        $validated['password'] = Hash::make($validated['password']);
        $student = Student::create($validated);

        $message = [
            'msg' => 'Greate! Signup Success',
            'data' => $student
        ];

        return response()->json($message, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where('nim', $id)->first();
        
        if($student == null){
            return response()->json(['msg' => 'Student not found'], 200);
        }
        return response()->json(['data' => $student], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $validated = $request->validated();
        
        Student::where('nim', $id)->update($validated);

        $message = [
            'msg' => 'Berhasil di update'
        ];
        return response()->json($message, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Student::where('nim', $id)->delete();

        $message = [
            'msg' => $id. ' Berhasil di hapus',
        ];

        return response()->json($message, 200);
    }
}
