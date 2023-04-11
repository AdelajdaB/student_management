<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\Courses\UpdateCourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show created courses
        return view('courses.index', ['courses' => Course::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Create new course profile
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $course = Course::create($request->only('name', 'subscribe', 'time', 'info'));

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'subscribe' => 'nullable',
            'time' => 'nullable',
            'info' => 'nullable'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'subscribe' => $request->subscribe == 'on' ? 1 : 0,
            'time' => $request->time,
            'info' => $request->info
        ]);

        return redirect()->route('courses.dashboard')->with('success', 'Profili i kursit i krijuar me sukses');
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
    public function edit(Course $course)
    {
        //Edit Course Profile
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // $course->update($request->validated());

        $request->validate([
            'name' => 'required|string|max:255',
            'subscribe' => 'nullable',
            'time' => 'nullable',
            'info' => 'nullable'
        ]);

        $course->update([
            'name' => $request->name,
            'subscribe' => $request->subscribe == 'on' ? 1 : 0,
            'time' => $request->time,
            'info' => $request->info
        ]);
        return back()->with('success', 'Profili i kursit i modifikuar me sukses');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {

        $course->delete();

        return redirect()->route('courses.dashboard')->with('success', 'Profili i kursit i fshirë me sukses.');
        
    }
}
