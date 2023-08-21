@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'College Course'])
<main class="main-content mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">{{ __($form['form_type']) }}</h6>
                    <hr class="horizontal dark my-3">
                    <form method="POST" action="{{ $form['form_route'] }}" autocomplete="off" id="form" novalidate>
                        @csrf
                        @method($form['form_method'])
                        <div class="form-group-wrapper p-3">

                            <x-form.select label="Select Course" name="course_id" attribute="course_id" id="course" >
                                <option disabled selected>Choose Course</option>
                                    @foreach ($courses as $course)
                                        <option value={{$course->id}} {{$collegeCourse->course_id == $course->id ? "selected" : "" }}>{{$course->name}}</option>
                                    @endforeach
                            </x-common.select>

                            <div id="related-college" class="mb-3"></div>

                            <x-form.input type="text" name="code" labelname="Code" :value="$collegeCourse->code" required="true" attribute="code" placeholder="Enter Code"  />

                            <x-form.input type="number" name="fee" labelname="Fee" :value="$collegeCourse->fee" required="true" attribute="fee" placeholder="Enter fee"  />
                            
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="{{ route('college-course.index') }}" type="button" name="button" class="btn btn-light m-0">Back</a>
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
        $('#input-course_id').on('change', function() {
            var courseId = $(this).val();
            $.ajax({
                url: '{{ route('show.colleges') }}',
                type: 'GET',
                data: { course: courseId },
                success: function(response) {
                    $('#related-college').html(response);
                }
            });
        });
    });
</script>
@endpush