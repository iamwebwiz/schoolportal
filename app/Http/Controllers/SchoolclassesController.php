<?php

namespace App\Http\Controllers;

use Session;
use App\Schoolclass;
use App\Section;
use App\Staff;
use App\Setting;
use App\Sessionsetting;
use App\Student;
use App\Subject;

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

        return view('schoolclass.index')->with('schoolclasses', $schoolclasses)->with('staff', $staff)->with('section', $section)->with('session', $session)->with('students', Student::all());
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

        $staff = Staff::where([
            ['staffType', 'staff'],
            ['status', 'active'],
            ])->get();
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

        Session::flash('success', 'New Class has been added');
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
        $schoolclass = Schoolclass::find($id);
        return view('schoolclass.show')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('staff', Staff::all())->with('sessions', Sessionsetting::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolclass = Schoolclass::find($id);
        
        $staff = Staff::where([
            ['staffType', 'staff'],
            ['status', 'active'],
            ])->get();


        return view('schoolclass.edit')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('staff', $staff)->with('sessions', Sessionsetting::all());
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
            'section' => 'required',
            'name' => 'required'
        ]);
        $schoolclass = Schoolclass::find($id);

        $schoolclass->section_id = $request->section;
        $schoolclass->name = $request->name;
        $schoolclass->session_id = $request->session;

        $schoolclass->save();
        $schoolclass->staff()->attach($request->staff);

        Session::flash('success', 'Class has been updated');
        return redirect()->route('schoolclass.show', ['id'=> $schoolclass->id]);

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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addstudent($id)
    {
        $schoolclass = Schoolclass::find($id);
       // Find how to display only students from that section. $students = Student::where('section_id', )
        return view('schoolclass.addstudents')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('staff', Staff::all())->with('sessions', Sessionsetting::all())->with('students', Student::all());
    }
    
    public function addsubject($id)
    {
        $schoolclass = Schoolclass::find($id);
        
        $staff = Staff::where([
            ['staffType', 'staff'],
            ['status', 'active'],
            ])->get();


        return view('schoolclass.addsubjects')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('staff', $staff)->with('sessions', Sessionsetting::all());
    } 


    public function addbook($id)
    {
        $schoolclass = Schoolclass::find($id);
        
        return view('schoolclass.addbooks')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('sessions', Sessionsetting::all());
    }


    public function addattendance($id)
    {
        $schoolclass = Schoolclass::find($id);
        
        return view('schoolclass.addattendance')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('sessions', Sessionsetting::all())->with('students', Student::all());
    }

    public function addassignment($id)
    {
        $schoolclass = Schoolclass::find($id);
        
        return view('schoolclass.addassignment')->with('schoolclass', $schoolclass)->with('sections', Section::all())->with('sessions', Sessionsetting::all())->with('students', Student::all())->with('subjects', Subject::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storestudent(Request $request, $id)
    {
        $schoolclass = Schoolclass::find($id);

        $schoolclass->name = $request->name;
        $schoolclass->save();
        $schoolclass->students()->attach($request->students);
        Session::flash('success', 'You have added new students to '. $schoolclass->name);
        return redirect()->route('schoolclass.show', ['id' => $schoolclass->id ]);
    }

    public function removestudent(Request $request, $id) {
        $schoolclass = Schoolclass::find($id);
        
        $schoolclass->students()->detach($request->student);

        Session::flash('success', 'Student removed from Class');

        return redirect()->back();
    }
}
