<div class="form-group">
<label>Select {{$attributeName}}</label>
<x-common.select name="{{$attributeName}}" attribute="{{$attributeName}}" id="{{$attributeName}}" >
    <option selected disabled>Choose {{$attributeName}}</option>
    @foreach ($courses as $course)
        <option value={{$course->id}}>{{$course->name}}</option>
    @endforeach
</x-common.select>
</div>