<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StreamCreateRequest;
use App\Http\Requests\StreamUpdateRequest;
use App\Models\Stream;
use Exception;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $streams = Stream::all();
        $addNew = true;
        return view("admin.streams.index",compact(['streams','addNew']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stream = new Stream();
        $form = [
            'form_type' => 'Create Stream',
            'form_method' => 'POST',
            'form_button_title' => 'Save',
            'form_route' => route('streams.store'),
        ];

        return view('admin.streams.single',compact(['form','stream']) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StreamCreateRequest $request)
    {
        $stream = new Stream();
        $stream->name = $request->name;
        $stream->description = $request->description;
        $stream->code = $request->code;
        $stream->save();
        return redirect()->route('streams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stream $stream)
    {
        $form =  [
            'form_type' => 'Edit Stream',
            'form_method' => 'PATCH',
            'form_button_title' => 'Update',
            'form_route' => route('streams.update', $stream->id),
        ];

        return view('admin.streams.single',compact(['form','stream']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StreamUpdateRequest $request, Stream $stream)
    {
        $stream->fill($request->only([
           'name', 'description' , 'code'
       ]));
       $stream->save();
       return redirect()->route('streams.index')->with('success', __('Stream updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stream $stream)
    {
        $stream->delete();
        return redirect()->route('streams.index')->with('success', __('Stream Deleted'));
    }
}
