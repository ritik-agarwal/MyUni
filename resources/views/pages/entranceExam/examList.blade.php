@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Entrance Exams</h6>
                    <h1 class="display-4">Checkout Our Entrance Exams</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($exams as $exam)
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('show.examDetail',$exam->id)}}">
                        <img class="img-fluid" src="{{asset('img/img/courses-4.jpg')}}" alt="">
                        <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{$exam->name}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                <span class="text-white">Admission year : {{$exam->admission_year}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> 
            @endforeach   
        </div>
    </div>
</div>
@endsection