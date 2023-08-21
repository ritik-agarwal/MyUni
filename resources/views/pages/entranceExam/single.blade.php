@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div>
            <div>
                <div class="mb-5">
                    <div class="section-title position-relative mb-5">
                        <a href="{{route('show.examsList')}}" type="button" class="btn btn-danger mr-3">Back</a>
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">
                            Entrance Exam Detail</h6>
                    <h1 class="display-4">
                        {{$exam->name}}
                    </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <img class="img-fluid rounded w-100 mb-4" src="{{asset('img/img/page-header.jpg')}}" alt="Image">
                            <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                            
                            <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.
                                Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam
                                consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit
                                gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea
                                sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero.</p>
                        </div>
                        <div class="col-lg-4 mt-5 mt-lg-0">
                            <div class="bg-primary mb-5 py-3">
                                <h3 class="text-white py-3 px-4 m-0">Exam Details</h3>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Admission Year</h6>
                                    <h6 class="text-white my-3">{{$exam->admission_year}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Exam Code</h6>
                                    <h6 class="text-white my-3">{{$exam->code}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Registration Start Date</h6>
                                    <h6 class="text-white my-3">{{$exam->reg_start_date}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Registration Last Date</h6>
                                    <h6 class="text-white my-3">{{$exam->reg_last_date}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Exam Date</h6>
                                    <h6 class="text-white my-3">{{$exam->exam_date}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Result Date</h6>
                                    <h6 class="text-white my-3">{{$exam->result_date}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Fees</h6>
                                    <h6 class="text-white my-3">{{$exam->fee}}</h6>
                                </div>
                                <div class="py-3 px-4">
                                    <a class="btn btn-block btn-secondary py-3 px-5" href="{{route('show.admissionform')}}">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white py-3 px-4 m-0">Courses Applicable</h3>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Code
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stream
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($courses as $course)
                                        <tr>
                                            <td class="align-middle text-center text-sm ">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$course->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm ">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$course->code}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$course->stream->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0 text-dark">{{$course->category->name}}</p>
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
</div>
@endsection