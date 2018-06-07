<?php

namespace App\Http\Controllers;

use Session;
use App\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        return view('sections.index')->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required|min:2'
        ]);

        $section =  Section::create([
            'name'=> $request->name,
            'slug'=>str_slug($request->name),
            'description'=>$request->description,
            'head'=>$request->head
        ]);

        
        Session::flash('success', 'New Section Created');
        return redirect()->back();
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);

        return view('sections.show')->with('section', $section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]); 

        $section = Section::find($id);

        $section->name = $request->name;
        $section->slug =str_slug($request->name);
        $section->description = $request->description;
        $section->head = $request->head;

        $section->save();

        Session::flash('success', 'Section updated!');

        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Section::destroy($id);
        $section = Section::find($id);
        $section->delete();
        Session::flash('success', 'Section has been successfully trashed');
        return redirect()->back();
    }
}
