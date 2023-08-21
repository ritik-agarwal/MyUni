@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Entrance Exam'])
<main class="main-content mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">{{ __($form['form_type']) }}</h6>
                    <hr class="horizontal dark my-3">
                    <form method="POST" action="{{ $form['form_route'] }}" autocomplete="off" id="form" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method($form['form_method'])
                        <div class="form-group-wrapper p-3">
                            <x-form.input type="text" name="name" labelname="Exam Name" :value="$entrance_exam->name" required="true" attribute="name" placeholder="Enter Exam name" />

                            <x-form.textarea required attribute="description" label="{{ __(' Description') }}" name="description" required> {{$entrance_exam->description}}</x-form.textarea>
                            
                            <x-form.input type="text" name="code" labelname="Exam Code" :value="$entrance_exam->code" required="true" attribute="code" placeholder="Enter exam code" />
                            
                            <div class="form-wrapper">
                                <label>Admission year</label>
                                <input type="text" class="form-control" name="admission_year" id="admission_year" value="{{$entrance_exam->admission_year}}" required="true" attribute="admission_year"/>
                                @if($errors->has(convert_attr_name('admission_year')))
                                    <span id="admission_year-error" class="error d-block text-danger" for="input-admission_year">
                                        {{ $errors->first(convert_attr_name('admission_year')) }}
                                    </span>
                                @endif
                            </div>

                            <div>
                                <label>Courses</label>
                                <select class="form-control" id="courses" multiple="multiple" name="courses[]" attribute="courses">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ in_array($course->id, $entrance_exam->courses??[]) ? 'selected' : '' }} >
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has(convert_attr_name('courses')))
                                        <span id="courses-error" class="error d-block text-danger" for="input-courses">
                                            {{ $errors->first(convert_attr_name('courses')) }}
                                        </span>
                                @endif
                            </div>
                            
                            <x-form.input type="number" min=0 name="fee" labelname="Fee" :value="$entrance_exam->fee" required="true" attribute="fee" placeholder="Enter exam fee" />
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <x-form.input type="date"  name="reg_start_date" labelname="Registration Start Date" :value="$entrance_exam->reg_start_date" required="true" attribute="reg_start_date" />
                                </div>
                                <div class="col-md-3">
                                    <x-form.input type="date"  name="reg_last_date" labelname="Registration Last Date" :value="$entrance_exam->reg_start_date" required="false" attribute="reg_last_date" />
                                </div>
                                <div class="col-md-3">
                                    <x-form.input type="date"  name="exam_date" labelname="Exam Date" :value="$entrance_exam->exam_date" required="false" attribute="exam_date" />
                                </div>
                                <div class="col-md-3">
                                    <x-form.input type="date"  name="result_date" labelname="Result Announced Date" :value="$entrance_exam->result_date" required="false" attribute="result_date" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="{{ route('entrance-exam.index') }}" type="button" name="button" class="btn btn-light m-0">Back</a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">{{ __($form['form_button_title']) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#courses').select2({
            tags:false
        });     
    });
    let currentYear = new Date().getFullYear();
    $("#admission_year").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        autoclose:true ,
        startDate: new Date(currentYear,0,1),
        endDate: new Date(currentYear+1,0,1)
    });
    
</script>
@endpush