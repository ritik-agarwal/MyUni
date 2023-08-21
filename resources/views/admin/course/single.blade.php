@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Course'])
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
                            <x-form.input type="text" name="name" labelname="Course" :value="$course->name" required="true" attribute="name" placeholder="Enter Course" />

                            <x-form.textarea attribute="description" label="{{ __(' Description') }}" name="description"> {{$course->description}}</x-form.textarea>
                            
                            <label>Select Stream</label>
                            <x-common.select name="stream_id" attribute="stream_id" id="stream" >
                                <option disabled selected>Choose Stream</option>
                                    @foreach ($streams as $stream)
                                        <option value={{$stream->id}} {{$course->stream_id == $stream->id ? "selected" : "" }}>{{$stream->name}}</option>
                                    @endforeach
                            </x-common.select>

                            <label>Select Course Category</label>
                            <x-common.select name="category_id" attribute="category_id" id="category" >
                                <option disabled selected>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value={{$category->id}} {{$course->category_id == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                    @endforeach
                            </x-common.select>

                            <x-form.input type="text" name="code" labelname="Code" :value="$course->code" required="true" attribute="code" placeholder="Enter Course Code"  />
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="{{ route('courses.index') }}" type="button" name="button" class="btn btn-light m-0">Back</a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">{{ __($form['form_button_title']) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection