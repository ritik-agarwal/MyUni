<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntranceExamCreateRequest;
use App\Http\Requests\EntranceExamUpdateRequest;
use App\Models\Course;
use App\Models\EntranceExams;
use Illuminate\Http\Request;

class EntranceExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = EntranceExams::latest()->paginate(10);
        $addNew = true;
        return view('admin.exams.index',compact(['exams','addNew']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entrance_exam = new EntranceExams();
        $assignExam = EntranceExams::pluck('courses')->flatten()->unique();
        $courses = Course::whereNotIn('id', $assignExam)->get();
        $form = [
            'form_type' => 'Entrance Exams',
            'form_method' => 'POST',
            'form_button_title' => 'Save',
            'form_route' => route('entrance-exam.store'),
        ];
        return view('admin.exams.single', compact(['entrance_exam','courses','form']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntranceExamCreateRequest $request)
    {
        $exam = new EntranceExams();
        $exam->admission_year = $request->admission_year;
        $exam->name = $request->name;
        $exam->description =$request->description;
        $exam->code = $request->code;
        $exam->courses = $request->courses;
        $exam->exam_date = $request->exam_date;
        $exam->reg_start_date = $request->reg_start_date;
        $exam->reg_last_date = $request->reg_last_date;
        $exam->fee = $request->fee;
        $exam->result_date = $request->result_date;
        $exam->save();

        return redirect()->route('entrance-exam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EntranceExams $entrance_exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntranceExams $entrance_exam)
    {
        $assignExam = EntranceExams::whereNotIn('id',[$entrance_exam->id])->pluck('courses')->flatten()->unique();
        $courses = Course::whereNotIn('id', $assignExam)->get();
        $form =  [
            'form_type' => 'Edit exam details',
            'form_method' => 'PATCH',
            'form_button_title' => 'Update',
            'form_route' => route('entrance-exam.update', $entrance_exam),
        ];
        return view('admin.exams.single', compact(['entrance_exam','courses', 'form']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntranceExamUpdateRequest $request, EntranceExams $entrance_exam)
    {
        $entrance_exam->fill($request->only([
            'name','description' , 'code','fee','reg_last_date','reg_start_date','exam_date','courses','courses','admission_year','result_date'
        ]));
        $entrance_exam->save();
        return redirect()->route('entrance-exam.index')->with('success', __('Exam updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntranceExams $entrance_exam)
    {
        $entrance_exam->delete();
        return redirect()->route('entrance-exam.index')->with(
            'success',
            __('Exam delete Successfully')
        );
    }

    public function showExams()
    {
        $exams = EntranceExams::all();
        return view('pages.entranceExam.examList',compact(['exams']));
    }

    public function showExamDetail(Request $request)
    {
        $exam = EntranceExams::where('id',$request->id)->first();
        $courses = Course::whereIn('name', [$exam->courses])->with('stream','category')->get();
        return view('pages.entranceExam.single',compact(['exam','courses']));
    }
}
