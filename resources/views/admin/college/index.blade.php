@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Colleges'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Colleges</h6>
                        @if($addNew)
                        <div class="justify-content-end  d-flex">
                            <a href="{{route('college.create')}}" class="btn btn-sm btn-success ">Add College</a>
                        </div>
                    @endif
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            College Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Contact Info</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Code & Streams</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colleges as $college)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                <img src="{{asset('storage/banner_image/'.$college->banner_image) }}" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$college->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">Principal Name : {{$college->principal_name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$college->email}}</p>
                                            <p class="text-xs text-secondary mb-0">{{$college->phone}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$college->code}}</p>
                                            <p class="text-xs text-secondary mb-0">{{$college->streams}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$college->addresss}}</p>
                                            <p class="text-xs text-secondary mb-0">{{$college->state.",".$college->city.",
                                            ".$college->zip}}</p>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a href="{{ route('college.edit', $college) }}" type="button" name="button"
                                                class="btn btn-info mx-2">Edit</a>   
                                                <x-form.button-delete route="{{ route('college.destroy', $college) }}" class="btn btn-danger mx-2" />   
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
@endsection
