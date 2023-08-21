@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Courses</h6>
                    <h1 class="display-4">Checkout Our Courses</h1>
                </div>
            </div>
        </div>
        <div class="container">
                <form  method="get" id="filter-form">
                    <div class="row mb-3">
                        <div class=" col-md-3 ">
                        <div class="form-group">
                            <label>Select Stream</label>
                            <x-common.select name="stream" attribute="stream" id="stream" >
                                <option selected disabled>Choose Streams</option>
                                    @foreach ($streams as $stream)
                                        <option value={{$stream->id}}>{{$stream->name}}</option>
                                    @endforeach
                            </x-common.select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Select College</label>
                            <x-common.select name="college" attribute="college" id="college" >
                            <option selected disabled>Choose College</option>
                                    @foreach ($colleges as $college)
                                        <option value={{$college->id}}>{{$college->name}}</option>
                                    @endforeach
                            </x-common.select>
                        </div>
                        </div>
                        <div class="col-md-3 mt-4">
                        <div class="form-group">
                            <label for="customRange1" class="form-label">Fee</label>
                            <input type="range" class="form-range" id="feeRange" step="1000" name="fee" value="0" min="0" max="500000">
                            <p id="feeValue"></p>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
        </div>
        <div class="row" id="course-list">
            @foreach ($courses as $course)
                <div class="col-lg-4 col-md-6 pb-4">
                     <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('show.courseDetail',$course->id)}}">
                        <img class="img-fluid" src="{{asset('img/img/courses-1.jpg')}}" alt="">
                        <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{$course->name}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                <span class="text-white"><i class="fa fa-user mr-2"></i>{{$course->stream->name}}</span>
                                <span class="text-white"><i class="fa fa-star mr-2"></i>{{$course->category->name}}</span>
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
  var slider = document.getElementById("feeRange");
  var output = document.getElementById("feeValue");
  output.innerHTML = slider.value;
  slider.oninput = function() {
    output.innerHTML = this.value;
  }

  $(document).ready(function() {
      $('#filter-form').on('submit', function(event) {
          event.preventDefault();
          var formData = $(this).serialize();
          $.ajax({
              url: '{{route('course.filter')}}',
              type: 'GET',
              data: formData,
              success: function(response) {
                  $('#course-list').html(response);
              }
          });
      });
  });
</script>

@endpush