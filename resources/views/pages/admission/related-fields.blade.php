@if($colleges->count() > 0)
<label>Select College</label>
<x-common.select name="college_id" attribute="college_id" id="college" >
    <option>Choose College</option>
    @foreach ($colleges as $college)
        <option value={{$college->college_id}}>{{$college->college->name}}</option>
    @endforeach
</x-common.select>
@if($errors->has(convert_attr_name('college_id')))
    <span id="college_id-error" class="error d-block text-danger" for="input-college_id">
        {{ $errors->first(convert_attr_name('college_id')) }}
    </span>
@endif
@endif