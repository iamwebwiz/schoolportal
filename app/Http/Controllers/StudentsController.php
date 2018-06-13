<?php

namespace App\Http\Controllers;

use Session;
use App\Section;
use App\Student;
use App\Schoolclass;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::orderBy('fullName', 'asc')->get();
        return view('students.index')->with('students', $student)->with('sections', Section::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = Section::all();
        $schoolClass = Schoolclass::all();
        if($section->count() == 0 || $schoolClass->count() == 0)    {
            Session::flash('info', 'You must have created School Section and added Class before you can register a Student!');
            return redirect()->back();
        }
        return view('students.create')->with('sections', $section);
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
            'fullName' => 'required',
            'dateOfBirth' => 'required',
            'section'=>'required'
        ]);
        
        $filenamewithExt = $request->file('image')->getClientOriginalname();
        
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        
        $extension = $request->file('image')->getClientOriginalExtension();
        
        $newfilename = $filename .'_' . time() . '.'. $extension ;
        
        $image = $request->file('image') ;
        $image->move('uploads/students', $newfilename);

        $student = new Student ;

        $student->image = 'uploads/students/' . $newfilename;
        $student->fullName = $request->fullName;
        $student->gender = $request->gender;
        $student->dateOfBirth = $request->dateOfBirth;
        $student->admissionDate = $request->admissionDate;
        $student->peculiarities = $request->peculiarities;
        $student->parentRelationship = $request->parentRelationship;
        $student->section_id = $request->section;
        $student->status = $request->status;

        $student->save();

        Session::flash('success', 'New Student has been successfully added');

        return redirect()->route('students.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student)->with('section', Section::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit')->with('students', $student)->with('sections', Section::all());
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
            'fullName' => 'required',
            'dateOfBirth' => 'required',
            'section'=>'required'
        ]);

        $student = Student::find($id) ;

        if($request->hasFile('image')) {
                $filenamewithExt = $request->file('image')->getClientOriginalname();
                $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $newfilename = $filename .'_' . time() . '.'. $extension ;
                $image = $request->file('image') ;
                $image->move('uploads/students', $newfilename);

                
                $student->image = 'uploads/students/' . $newfilename;

        }

        $student->fullName = $request->fullName;
        $student->gender = $request->gender;
        $student->dateOfBirth = $request->dateOfBirth;
        $student->admissionDate = $request->admissionDate;
        $student->peculiarities = $request->peculiarities;
        $student->parentRelationship = $request->parentRelationship;
        $student->section_id = $request->section;
        $student->status = $request->status;

        $student->save();

        Session::flash('success', $student->fullName.' has been successfully updated');

        return redirect()->route('students.show', ['id' => $student->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        Session::flash('success', 'Student profile has been deleted successfully');

        return redirect()->route('students.index');
    }
}
