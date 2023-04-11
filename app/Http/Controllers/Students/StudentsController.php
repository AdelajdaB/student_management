<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Students\StoreStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show created Students
        $crs = Course::all();
        return view('students.index', ['students' => Student::latest()->paginate(10)])->with('crs', $crs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Create new student profile
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {

        $student = Student::create($request->only('nid', 'emer' , 'mbiemer', 'fjalekalimi'));

        return redirect()->route('students.dashboard')->with('success', 'Profili i studentit i krijuar me sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //Edit Student Profile
        $crs = Course::all();
        return view('students.edit', compact('student'))->with('crs', $crs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student, Course $course)
    {
        $student->update($request->validated());

        $course->update([
            'subscribe' => $request->subscribe == 'on' ? 1 : 0,
        ]);

        return back()->with('success', 'Profili i studentit i modifikuar me sukses');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {

        $student->delete();

        return redirect()->route('students.dashboard')->with('success', 'Profili i studentit i fshirë me sukses');
        
    }
}
