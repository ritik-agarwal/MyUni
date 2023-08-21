<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollegeCreateRequest;
use App\Http\Requests\CollegeUpdateRequest;
use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Models\Stream;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    use SaveFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::latest()->paginate(10);
        $addNew = true;
        return view('admin.college.index',compact(['colleges', 'addNew']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streams = Stream::all();
        $college = new College();
        $form = [
            'form_type' => 'Create College',
            'form_method' => 'POST',
            'form_button_title' => 'Save',
            'form_route' => route('college.store'),
        ];

        return view('admin.college.single', compact(['streams','college', 'form']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollegeCreateRequest $request)
    {
        $college = new College();
        $college->name = $request->name;
        $college->description = $request->description;
        $college->code = $request->code;
        $college->addresss = $request->addresss;
        $college->city = $request->city;
        $college->state = $request->state;
        $college->zip = $request->zip;
        $college->streams = $request->streams;
        $college->email = $request->email;
        $college->phone = $request->phone;
        $college->principal_name = $request->principal_name;
        if($request->hasFile('banner_image')){
           
            $college->banner_image = $this->saveImage('banner_image',$request,'banner_image');
            $college->save();
        }

        return redirect()->route('college.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(College $college)
    {
        $streams = Stream::all();
        $form =  [
            'form_type' => 'Edit College',
            'form_method' => 'PATCH',
            'form_button_title' => 'Update',
            'form_route' => route('college.update', $college->id),
        ];

        return view('admin.college.single',compact(['form','college','streams']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollegeUpdateRequest $request, College $college)
    {
        $college->fill($request->only([
            'name','description' , 'code','addresss','city','state','zip','email','phone','principal_name','streams'
        ]));

        if($request->hasFile('banner_image')){
            $college->banner_image = $this->saveImage('banner_image',$request,'banner_image');
        }

        $college->save();
        return redirect()->route('college.index')->with('success', __('College updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        $college->delete();
        return redirect()->route('college.index')->with('success', __('College Deleted'));
    }

    public function showCollege()
    {
        $colleges = College::all();
        $allStreams = Stream::all();
        $allCourses = Course::all();
        $streamIds = $colleges->pluck('streams')->flatten()->unique();
        $streams = Stream::whereIn('id', $streamIds)->pluck('name', 'id')->toArray();
        return view('pages.college.collegeList',compact(['colleges','streams','allStreams','allCourses']));
    }

    public function showCollegeDetail(Request $request)
    {
        $collegeCourses = CollegeCourse::where('college_id',$request->id)->with('course.category')->get();
        $college = College::find($request->id);
        // $streams = Stream::whereIn('id', $college->streams)->pluck('name');
        return view('pages.college.single',compact(['college','collegeCourses']));
    }
    public function filterCollege(Request $request)
    {
        $streamId = $request->input('stream');
        $courseId = $request->input('course');
        $streams = Stream::pluck('name','id')->toArray();
        $query = College::query();
        if($streamId)
        {
            $query->whereJsonContains('streams', $streamId);
        }
        if($courseId)
        {
            $query->whereHas('collegeCourse', function ($q) use ($courseId) {
                $q->where('course_id', $courseId);
            });
        }
        $colleges = $query->get();
        return view('pages.college.filter-college-list',compact(['colleges','streams']));
    }

    public function showCourseOption(Request $request)
    {
        $attributeName = 'course';
        $courses = Course::where('stream_id',$request->input('stream'))->get();
        return view("pages.filterDependentField",compact(['courses','attributeName']));
    }
}
