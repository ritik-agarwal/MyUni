@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'College'])
<main class="main-content mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">{{ __($form['form_type']) }}</h6>
                    <hr class="horizontal dark my-3">
                    <form method="POST" action="{{ $form['form_route'] }}" autocomplete="off" id="form" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method($form['form_method'])
                        <div class="form-group-wrapper p-3">
                            <x-form.image-upload type="file" name="banner_image" labelText="Banner Image" required="true" attribute="banner_image" fieldName="banner_image"/>

                            <x-form.input type="text" name="name" labelname="College" :value="$college->name" required="true" attribute="name" placeholder="Enter College Name" />

                            <x-form.textarea attribute="description" label="{{ __(' Description') }}" name="description"> {{$college->description}}</x-form.textarea>
                            
                            <x-form.input type="text" name="code" labelname="Code" :value="$college->code" required="true" attribute="code" placeholder="Enter Course Code"  />
                            
                            <x-form.input type="text" name="principal_name" labelname="Principal Name" :value="$college->principal_name" required="true" attribute="principal_name" placeholder="Enter Principal Name"  />

                            <x-form.input type="email" name="email" labelname="Email" :value="$college->email" required="true" attribute="email" placeholder="Enter email"  />

                            <x-form.input type="number" name="phone" labelname="Contact Number" :value="$college->phone" required="true" attribute="phone" placeholder="Enter Contact Number"  />
                            
                            <div class="mb-3">
                                <label>Streams</label>
                                <select class="form-control" id="streams" multiple="multiple" name="streams[]" attribute="streams" required>
                                    @foreach($streams as $stream)
                                        <option value="{{ $stream->id }}" {{ in_array($stream->id, $college->streams??[]) ? 'selected' : '' }} >
                                            {{ $stream->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has(convert_attr_name('streams')))
                                        <span id="streams-error" class="error d-block text-danger" for="input-streams">
                                            {{ $errors->first(convert_attr_name('streams')) }}
                                        </span>
                                @endif
                            </div>

                            <x-form.input type="text" name="addresss" labelname="Address" :value="$college->addresss" required="true" attribute="addresss" placeholder="Enter address"  />
                            <x-form.input type="text" name="city" labelname="City" :value="$college->city" required="true" attribute="city" placeholder="Enter city"  />
                            <x-form.input type="text" name="state" labelname="State" :value="$college->state" required="true" attribute="state" placeholder="Enter state"  />
                            <x-form.input type="number" name="zip" labelname="Zip" :value="$college->zip" required="true" attribute="zip" placeholder="Enter zip"  />
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="{{ route('college.index') }}" type="button" name="button" class="btn btn-light m-0">Back</a>
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
        // Select2 Multiple
        $('#streams').select2({
            tags:false
        });     
    });
</script>
@endpush