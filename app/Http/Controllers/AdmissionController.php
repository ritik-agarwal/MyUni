<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmissionFormSubmitRequest;
use App\Models\Admission;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Notifications\SetPassword;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;


class AdmissionController extends Controller
{
    use Notifiable;
   
    public function index()
    {
        $admissions = Admission::latest()->with('course','college')->paginate(5);
        return view('admin.admission.index',compact(['admissions']));
    }

    public function create()
    {
        
    }

    public function routeNotificationForMail() {
        return request()->email;
    }

    public function store(AdmissionFormSubmitRequest $request)
    {
        $admissionStudent = new Admission();
        $admissionStudent->first_name = $request->first_name;
        $admissionStudent->last_name = $request->last_name;
        $admissionStudent->email = $request->email;
        $admissionStudent->course_id = $request->course_id;
        $admissionStudent->college_id = $request->college_id;
        $admissionStudent->save();
        $student = Admission::where('email', $request->email)->first();
        
        if ($student) {
            $this->notify(new SetPassword($student->id));
            return back()->with('success', 'An email was send to your email address');
        }
    }

    public function show(Admission $admission)
    {
        $courses = Course::all();
        return view('pages.admission.admissionform',compact(['courses']));
    }

    public function edit(Admission $admission)
    {
        
    }

    public function update(Request $request, Admission $admission)
    {
        
    }

    public function destroy(Admission $admission)
    {
        
    }
    
    public function showColleges(Request $request)
    {
        $colleges = CollegeCourse::where('course_id',$request->course)->with('college')->get();
        return view('pages.admission.related-fields',compact(['colleges']));
    }
}
