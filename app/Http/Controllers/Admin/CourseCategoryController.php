<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCategoryCreaterequest;
use App\Http\Requests\CourseCategoryUpdaterequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseCategories = CourseCategory::latest()->paginate(5);
        $addNew = true;
        return view('admin.courseCategory.index',compact(['courseCategories', 'addNew']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courseCategory = new CourseCategory();
        $form = [
            'form_type' => 'Create Course Category',
            'form_method' => 'POST',
            'form_button_title' => 'Save',
            'form_route' => route('course-category.store'),
        ];

        return view('admin.courseCategory.single',compact(['form','courseCategory']) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoryCreaterequest $request)
    {
        $courseCategory = new CourseCategory();
        $courseCategory->name = $request->name;
        $courseCategory->code = $request->code;
        $courseCategory->save();
        return redirect()->route('course-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $courseCategory)
    {
        $form =  [
            'form_type' => 'Edit Category',
            'form_method' => 'PATCH',
            'form_button_title' => 'Update',
            'form_route' => route('course-category.update', $courseCategory->id),
        ];

        return view('admin.courseCategory.single',compact(['form','courseCategory']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoryUpdaterequest $request, CourseCategory $courseCategory)
    {
        $courseCategory->fill($request->only([
            'name', 'code'
        ]));
        $courseCategory->save();
        return redirect()->route('course-category.index')->with('success', __('Course Category Updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $courseCategory)
    {
        $courseCategory->delete();
        return redirect()->route('course-category.index')->with('success', __('Course Category Deleted'));
    }
}
