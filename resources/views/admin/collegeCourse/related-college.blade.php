<label>Select College</label>
<x-common.select name="college_id" attribute="college_id" id="college" >
    <option>Choose College</option>
    @foreach ($colleges as $college)
        <option value={{$college->id}}>{{$college->name}}</option>
    @endforeach
</x-common.select>