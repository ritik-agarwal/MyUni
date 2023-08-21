@extends('student.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('student.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->guard('student')->user()->first_name ?? 'Firstname' }} {{ auth()->guard('student')->user()->last_name ?? 'Lastname' }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('student.profile.update') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"  value="{{ old('firstname', auth()->guard('student')->user()->first_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                        <input class="form-control" type="text" name="lastname" value="{{ old('lastname', auth()->guard('student')->user()->last_name) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-body pt-0">
                        <div class="justify-content-center pt-4">
                            <div class="d-grid text-center card bg-primary text-white p-3">
                                <span class="text-lg font-weight-bolder">Course</span>
                            <span class="text-sm opacity-8">{{auth()->guard('student')->user()->course->name}}</span>
                            </div>
                            <div class="d-grid text-center mt-3 card bg-info text-white p-3">
                                <span class="text-lg font-weight-bolder">Preffered College</span>
                                <span class="text-sm opacity-8">{{auth()->guard('student')->user()->college->name??"No College Selected"}}</span>
                            </div>
                            <div class="d-grid text-center mt-3 card bg-success text-white p-3">
                                <span class="text-lg font-weight-bolder">Exam</span>
                                <span class="text-sm opacity-8">{{auth()->guard('student')->user()->exam->name??"No Exam Selected"}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
