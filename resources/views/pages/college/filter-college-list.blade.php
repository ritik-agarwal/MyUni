@if(!$colleges->isEmpty())
    @foreach ($colleges as $college)
    <div class="col-lg-4 col-md-6 pb-4">
        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="{{route('show.collegeDetail',$college->id)}}">
                <img class="img-fluid" src="{{asset('storage/banner_image/'.$college->banner_image)??asset('img/img/courses-1.jpg')}}" alt="">
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
@else
    <p>No result found</p>
@endif
