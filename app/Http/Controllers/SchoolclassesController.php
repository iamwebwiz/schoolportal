<?php

namespace App\Http\Controllers;

use Session;
use App\Schoolclass;
use App\Section;
use App\Staff;
use App\Setting;
use App\Sessionsetting;

use Illuminate\Http\Request;

class SchoolclassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolclasses = Schoolclass::all();
        $staff = Staff::all();
        $section = Section::all();
        $session = Sessionsetting::all();

        return view('schoolclass.index')->with('schoolclasses', $schoolclasses)->with('staff', $staff)->with('section', $section)->with('session', $session);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Section::all()->count() == 0 || Sessionsetting::all()->count() == 0 || Staff::all()->count() == 0) {
            Session::flash('info', 'You must have created School Section, Academic Session and Staff Profile before adding Class');
            return redirect()->back();
        }

        $staff = Staff::where('staffType', 'staff')->get();
       return view('schoolclass.create')->with('sections', Section::all())->with('staff', $staff)->with('sessions', Sessionsetting::all());

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
            'section' => 'required',
            'name' => 'required'
        ]);
        $schoolclass = New Schoolclass;

        $schoolclass->section_id = $request->section;
        $schoolclass->name = $request->name;
        $schoolclass->session_id = $request->session;

        $schoolclass->save();
        $schoolclass->staff()->attach($request->staff);

        Session::flash('success', 'New Class has been added to');
        return redirect()->route('schoolclass.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
