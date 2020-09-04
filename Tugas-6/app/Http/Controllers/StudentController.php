<?php

namespace App\Http\Controllers;

use App\Http\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status'  => 'success',
            'message' => 'Success get all data',
            'data'  => Student::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'faculty' => 'required',
            'majors' => 'required',
        ]);
        $data = Student::create([
            'name'  => $request->name,
            'faculty'  => $request->faculty,
            'majors'  => $request->majors
        ]);
        return response()->json([
            'status'  => 'success',
            'message' => 'Success save data',
            'data'  => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return response()->json([
            'status'  => 'success',
            'message' => "Success get data with id : $student->id",
            'data'  => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'name'  => $request->name,
            'faculty'  => $request->faculty,
            'majors'  => $request->majors
        ]);
        return response()->json([
            'status'  => 'success',
            'message' => 'Success update data',
            'data'  => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $id = $student->id;
        $student->delete();
        return response()->json([
            'status'  => 'success',
            'message' => "Success delete data with id:$id"
        ]);
    }
}
