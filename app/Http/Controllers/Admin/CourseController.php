<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\College;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Stream;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->with('stream' , 'category')->paginate(5);
        $addNew = true;
        return view('admin.course.index',compact(['courses', 'addNew']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streams = Stream::all();
        $categories = CourseCategory::all();
        $course = new Course();
        $form = [
            'form_type' => 'Create Course',
            'form_method' => 'POST',
            'form_button_title' => 'Save',
            'form_route' => route('courses.store'),
        ];

        return view('admin.course.single', compact(['course','streams','categories', 'form']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCreateRequest $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->code = $request->code;
        $course->stream_id = $request->stream_id;
        $course->category_id = $request->category_id;
        $course->save();
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $streams = Stream::all();
        $categories = CourseCategory::all();
        $form =  [
            'form_type' => 'Edit Course',
            'form_method' => 'PATCH',
            'form_button_title' => 'Update',
            'form_route' => route('courses.update', $course->id),
        ];

        return view('admin.course.single',compact(['form','course','streams','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->fill($request->only([
            'name', 'description','code','stream_id','category_id'
        ]));
        $course->save();
        return redirect()->route('courses.index')->with('success', __('Course Updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', __('Course Deleted'));
    }
    
    public function showCourse()
    {
        $courses = Course::with('stream','category')->get();
        $streams = Stream::all();
        $colleges = College::all();
        return view('pages.course.courseList',compact(['courses','streams','colleges']));
    }
    public function showCourseDetail(Request $request)
    {
        $course = Course::with('collegeCourse.college')->find($request->id);
        return view('pages.course.single',compact(['course']));
    }

    public function filterCourse(Request $request)
    {
        $streamId = $request->input('stream');
        $collegeId = $request->input('college');
        $maxFee = $request->input('fee');
        
        $query = Course::query();

        if ($streamId) {
            $query->where('stream_id', $streamId);
        }

        if ($collegeId) {
            $query->whereHas('collegeCourse', function ($q) use ($collegeId) {
                $q->where('college_id', $collegeId);
            });
        }

        if ($maxFee) {
            $query->whereHas('collegeCourse', function ($q) use ($maxFee) {
                $q->where('fee','<=', (int)$maxFee);
            });
        }
       
        $courses = $query->get();
        return view('pages.course.filter-course-list',compact(['courses']));
    }
    
}
