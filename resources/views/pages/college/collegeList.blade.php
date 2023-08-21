@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Colleges</h6>
                    <h1 class="display-4">Checkout Our Colleges</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <form  method="get" id="filter-form">
                <div class="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Stream</label>
                                <x-common.select name="stream" attribute="stream" id="stream" >
                                    <option selected disabled>Choose Streams</option>
                                        @foreach ($allStreams as $stream)
                                            <option value={{$stream->id}}>{{$stream->name}}</option>
                                        @endforeach
                                </x-common.select>
                              </div>
                        </div>
                        <div class="col-md-3" id="dependent-course">
                            <div class="form-group">
                                <label>Select Course</label>
                                <x-common.select name="course" attribute="course" id="course" >
                                  <option selected disabled>Choose Course</option>
                                        @foreach ($allCourses as $course)
                                            <option value={{$course->id}}>{{$course->name}}</option>
                                        @endforeach
                                </x-common.select>
                              </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Course</label>
                                <x-common.select name="course" attribute="course" id="course" >
                                  <option selected disabled>Choose College</option>
                                        @foreach ($allCourses as $course)
                                            <option value={{$course->id}}>{{$course->name}}</option>
                                        @endforeach
                                </x-common.select>
                              </div>
                        </div> --}}
                        <div class="col-md-3">
                            <button class="btn btn-primary mt-2 p-3" type="submit">Search</button>
                        </div>
                    </div>
                   
                </div>
                
              </form>
        </div>
        <div class="row mt-5" id="college-list">
            @foreach ($colleges as $college)
            <div class="col-lg-4 col-md-6 pb-4" >
                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('show.collegeDetail',$college->id)}}">
                        <img class="img-fluid" src="{{asset('storage/banner_image/'.$college->banner_image)??asset('img/img/courses-1.jpg')}}" alt="" style="height: 300px; width:100%">
                        <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{$college->name}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4"> 
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>{{$college->streams??"No Streams"}}</span>
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
@push('js')                   
    <script>
        $(document).ready(function() {
          $('#filter-form').on('submit', function(event) {
              event.preventDefault();
              var formData = $(this).serialize();
              $.ajax({
                  url: '{{route('college.filter')}}',
                  type: 'GET',
                  data: formData,
                  success: function(response) {
                      $('#college-list').html(response);
                  }
              });
          });
          $('#input-stream').on('change', function() {
            var streamId = $(this).val();
            $.ajax({
                url: '{{ route('show.courseOption') }}',
                type: 'GET',
                data: { stream: streamId },
                success: function(response) {
                    $('#dependent-course').html(response);
                }
            });
        });
      });
    </script>    
@endpush