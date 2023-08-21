@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div >
            <div>
                <div class="mb-5">
                    <div class="section-title position-relative mb-5">
                        <a href="{{route('show.courseList')}}" type="button" class="btn btn-danger mr-3">Back</a>
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">
                            Course Detail</h6>
                    <h1 class="display-4">
                        
                        {{$course->name}}
                    </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <img class="img-fluid rounded w-100 mb-4" src="{{asset('img/img/header.jpg')}}" alt="Image">
                            <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                            
                            <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.
                                Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam
                                consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit
                                gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea
                                sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero.</p>
                        </div>
                        <div class="col-lg-4 mt-5 mt-lg-0">
                            <div class="bg-primary mb-5 py-3">
                                <h3 class="text-white py-3 px-4 m-0">Course Features</h3>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Category</h6>
                                <h6 class="text-white my-3">{{$course->category->name}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Stream</h6>
                                <h6 class="text-white my-3">{{$course->stream->name}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Course Code</h6>
                                <h6 class="text-white my-3">{{$course->code}}</h6>
                                </div>
                                <div class="d-flex justify-content-between px-4">
                                    <h6 class="text-white my-3">Language</h6>
                                    <h6 class="text-white my-3">English</h6>
                                </div>
                                <div class="py-3 px-4">
                                    <a class="btn btn-block btn-secondary py-3 px-5" href="{{route('show.admissionform')}}">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">College Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($course->collegeCourse as $college)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$college->college->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{$college->college->email}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{$college->college->phone}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{$college->college->addresss.",".$college->college->city.",".$college->college->state}}</p>
                                            </td>
                                            <td class="align-middle text-end">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('show.admissionform') }}" type="button" name="button"
                                                    class="btn btn-info mx-2">Apply Now</a>   
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
</div>
@endsection