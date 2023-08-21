@extends('layouts.app')

@section('content')
<div class="col-12">
    @include('layouts.navbars.guest.navbar')
</div>
<!-- End Navbar -->
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Admission Form</h5>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('submit.admissionform')}}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group-wrapper">
                                <x-form.input type="text" labelname="First Name" value="{{ old('first_name') }}" placeholder="First Name" attribute="first_name" required="true" />
                                <x-form.input type="text" labelname="Last Name" value="{{ old('last_name') }}" placeholder="Last Name" attribute="last_name" required="true" />
                                <x-form.input type="email" labelname="Email" value="{{ old('email') }}" placeholder="Email" attribute="email" required="true" />
                                <div class="form-group">
                                    <label>Select Course</label>
                                    <x-common.select name="course_id" attribute="course_id" id="course" >
                                        <option>Choose Course</option>
                                            @foreach ($courses as $course)
                                                <option value={{$course->id}}>{{$course->name}}</option>
                                            @endforeach
                                    </x-common.select>
                                    @if($errors->has(convert_attr_name('course_id')))
                                        <span id="course_id-error" class="error d-block text-danger" for="input-course_id">
                                            {{ $errors->first(convert_attr_name('course_id')) }}
                                        </span>
                                    @endif
                                </div>
                                <div id="related-colleges" class="form-group"></div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-1 mt-lg-2 px-5 w-100">Submit Form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#input-course').on('change', function() {
            var courseId = $(this).val();
            $.ajax({
                url: '{{ route('show.collegeAdmission') }}',
                type: 'GET',
                data: { course: courseId },
                success: function(response) {
                    $('#related-colleges').html(response);
                }
            });
        });
    });
</script>
@endpush
