@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div >
            <div>
                <div class="mb-5">
                    <div class="section-title position-relative mb-5">
                        <a href="{{route('show.collegeList')}}" type="button" class="btn btn-danger mr-3">Back</a>
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">
                            College Detail</h6>
                    <h1 class="display-4">
                        {{$college->name}}
                    </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <img class="img-fluid rounded w-100 mb-4" src="{{asset('storage/banner_image/'.$college->banner_image)??asset('img/img/header.jpg')}}" alt="Image">
                            <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                            
                            <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.
                                Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam
                                consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit
                                gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea
                                sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero.</p>
                        </div>
                        <div class="col-lg-4 mt-5 mt-lg-0">
                            <div class="bg-primary mb-5 py-3">
                                <h3 class="text-white py-3 px-4 m-0">College Details</h3>
                                <div class="d-flex border-bottom px-4">
                                    <h6 class="text-white my-3">Streams</h6>
                                    <h6 class="text-white my-3 ml-5">
                                        {{$college->streams}}
                                </h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">College Code</h6>
                                    <h6 class="text-white my-3">{{$college->code}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Email</h6>
                                    <h6 class="text-white my-3">{{$college->email}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Contact Number</h6>
                                    <h6 class="text-white my-3">{{$college->phone}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Address</h6>
                                    <h6 class="text-white my-3">{{$college->addresss.",".$college->city.",".$college->state.",".$college->zip}}</h6>
                                </div>
                                <div class="d-flex justify-content-between border-bottom px-4">
                                    <h6 class="text-white my-3">Principal Name</h6>
                                    <h6 class="text-white my-3">{{$college->principal_name}}</h6>
                                </div>
                                <div class="py-3 px-4">
                                    <a class="btn btn-block btn-secondary py-3 px-5" href="{{route('show.admissionform')}}">Take Admission</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white py-3 px-4 m-0">Courses</h3>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fee</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($collegeCourses as $course)
                                        <tr>
                                            <td class="align-middle text-center text-sm ">
                                                <div class="d-flex py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$course->course->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm ">
                                                <p class="text-sm font-weight-bold mb-0">{{$course->course->description}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{$course->course->category->name}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{$course->fee}}</p>
                                            </td>
                                            <td class="align-middle text-end">
                                                <div class="d-flex justify-content-center align-items-center">
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