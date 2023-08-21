@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Create Stream'])
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
                            <x-form.input type="text" name="name" labelname="Stream" :value="$stream->name" required="true" attribute="name" placeholder="Enter Stream" />

                            <x-form.textarea attribute="description" label="{{ __(' Description') }}" name="description"> {{$stream->description}}</x-form.textarea>
    
                            <x-form.input type="text" name="code" labelname="Code" :value="$stream->code" required="true" attribute="code" placeholder="Enter Stream Code"  />
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="{{ route('streams.index') }}" type="button" name="button" class="btn btn-light m-0">Back</a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">{{ __($form['form_button_title']) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection