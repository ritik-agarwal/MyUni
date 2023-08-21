@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Entrance Exams'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Entrance Exams</h6>
                        @if($addNew)
                        <div class="justify-content-end  d-flex">
                            <a href="{{route('entrance-exam.create')}}" class="btn btn-sm btn-success ">Add Exam</a>
                        </div>
                    @endif
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Admission Year</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Exam Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Code & Courses</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fee</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Important Dates</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $entranceExam)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$entranceExam->admission_year}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$entranceExam->name}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$entranceExam->code}}</p>
                                            <p class="text-xs text-secondary mb-0">{{$entranceExam->courses}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$entranceExam->fee}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">Registration Start Date : {{$entranceExam->reg_start_date}}</p>
                                            <p class="text-xs font-weight-bold mb-0">Registration Last Date : {{$entranceExam->reg_last_date}}</p>
                                            <p class="text-xs font-weight-bold mb-0">Exam Date : {{$entranceExam->exam_date ?? "Not Announced"}}</p>
                                            <p class="text-xs font-weight-bold mb-0">Result Date : {{$entranceExam->result_date ?? "Not Announced"}}</p>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a href="{{ route('entrance-exam.edit', $entranceExam) }}" type="button" name="button"
                                                class="btn btn-info mx-2">Edit</a>   
                                                <x-form.button-delete route="{{ route('entrance-exam.destroy', $entranceExam) }}" class="btn btn-danger mx-2" />   
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
