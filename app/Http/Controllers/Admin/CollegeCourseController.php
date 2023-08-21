<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollegeCourseCreateRequest;
use App\Http\Requests\CollegeCourseUpdateRequest;
use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class CollegeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collegeCourses = CollegeCourse::latest()->with('course','college')->paginate(10);
        $addNew = true;
        return view('admin.collegeCourse.index',compact(['collegeCourses', 'addNew']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collegeCourse = new CollegeCourse();
        $courses = Course::all();
        $form = [
            'form_type' => 'Assign course to college',
            'form_method' => 'POST',
            'form_button_title' => 'Save',
            'form_route' => route('college-course.store'),
        ];
        return view('admin.collegeCourse.single', compact(['courses','collegeCourse', 'form']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollegeCourseCreateRequest $request)
    {
        $collegeCourse = new CollegeCourse();
        $collegeCourse->fee = $request->fee;
        $collegeCourse->code = $request->code;
        $collegeCourse->college_id = $request->college_id;
        $collegeCourse->course_id = $request->course_id;
        $collegeCourse->save();
        return redirect()->route('college-course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CollegeCourse $collegeCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollegeCourse $collegeCourse)
    {
        $courses = Course::all();
        $form =  [
            'form_type' => 'Edit college course',
            'form_method' => 'PATCH',
            'form_button_title' => 'Update',
            'form_route' => route('college-course.update', $collegeCourse->id),
        ];
        return view('admin.collegeCourse.single', compact(['courses','collegeCourse','form']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollegeCourseUpdateRequest $request, CollegeCourse $collegeCourse)
    {
        $collegeCourse->fill($request->only([
            'course_id','college_id' , 'code','fee'
        ]));
        $collegeCourse->save();
        return redirect()->route('college-course.index')->with('success', __('Updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollegeCourse $collegeCourse)
    {
        $collegeCourse->delete();
        return redirect()->route('college-course.index')->with('success', __('Deleted'));
    }

    public function showColleges(Request $request)
    {
        $selectedCourse = Course::find($request->course);
        $colleges = College::where('streams', 'LIKE', '%"'.$selectedCourse->stream_id.'"%')->get();
        return view('admin.collegeCourse.related-college',compact(['colleges']));
    }
}
