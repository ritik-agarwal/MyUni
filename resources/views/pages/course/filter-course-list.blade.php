@if(!$courses->isEmpty())
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
@else
    <p>No result found</p>
@endif
