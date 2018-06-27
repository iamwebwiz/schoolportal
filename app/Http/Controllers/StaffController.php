<?php

namespace App\Http\Controllers;

use Session;
use App\Staff;
use App\Sponsors;
use App\Section;
use App\User;
use App\Schoolclass;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::orderBy('fullName', 'asc')->get();
        $user = User::where('privliedge', 'staff');

        return view('staff.index')->with('staff', $staff)->with('sections', Section::orderBy('id', 'asc')->get())->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();

        if($sections->count() == 0){
            Session::flash('info', 'You must have created School Sections before attmepting to create Staff Pofile');
            return redirect()->back();
        }

        
        $user = User::where('priviledge', 'staff')->get();
        return view('staff.create')->with('sections', Section::all())->with('users', $user);
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
            'gender' => 'required',
            'email' => 'required',
            'qualifications'=> 'required',
            'status' => 'required',
            'designation' => 'required',
            'phone' => 'required'
        ]);
            // Get file name with extension
        $filenamewithExt = $request->file('image')->getClientOriginalname();
            // Get file name without extension
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            // Extract extension
        $extension = $request->file('image')->getClientOriginalExtension();
            // Create with file name with timestamp
        $newfilename = $filename .'_' . time() . '.'. $extension ;
            // upload images
        $image = $request->file('image') ;
        $image->move('uploads/staff', $newfilename);


        $staff = new Staff;

        $staff->title = $request->title;
        $staff->fullName = $request->fullName;
        $staff->gender = $request->gender;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->dateOfBirth = $request->dateOfBirth;
        $staff->qualifications = $request->qualifications;
        $staff->staffType = $request->staffType;
        $staff->status = $request->status;
        $staff->dateOfEmployment = $request->dateOfEmployment;
        $staff->designation = $request->designation;
        $staff->section_id = $request->section;
        $staff->phone = $request->phone;
        $staff->user_id = $request->user;
        $staff->image = 'uploads/staff/' . $newfilename;


        $staff->save();

        $staff->sections()->attach($request->sections);
        Session::flash('success', 'New Staff Profile Added!');
        
        return redirect()->route('staff.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        $user = User::where('privliedge', 'staff');
        $class = Schoolclass::all();
        return view('staff.show')->with('staff', $staff)->with('sections', Section::all())->with('users', $user)->with('classes', $class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        $user = User::where('priviledge', 'staff')->get();
        return view('staff.edit')->with('staff', $staff)->with('sections', Section::all())->with('users', $user);
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
            'gender' => 'required',
            'email' => 'required',
            'qualifications'=> 'required',
            'status' => 'required',
            'designation' => 'required',
            'phone' => 'required',
        ]);

        
        $staff = Staff::find($id) ;

        if($request->hasFile('image')) {
                $filenamewithExt = $request->file('image')->getClientOriginalname();
                $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $newfilename = $filename .'_' . time() . '.'. $extension ;
                $image = $request->file('image') ;
                $image->move('uploads/staff', $newfilename);

                
                $staff->image = 'uploads/staff/' . $newfilename;

        }

        
        $staff->title = $request->title;
        $staff->fullName = $request->fullName;
        $staff->gender = $request->gender;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->dateOfBirth = $request->dateOfBirth;
        $staff->qualifications = $request->qualifications;
        $staff->staffType = $request->staffType;
        $staff->status = $request->status;
        $staff->dateOfEmployment = $request->dateOfEmployment;
        $staff->designation = $request->designation;
        $staff->section_id = $request->section;
        $staff->phone = $request->phone;
        $staff->user_id = $request->user;

        $staff->save();
        $staff->sections()->sync($request->sections);

        Session::flash('success', 'Staff Profile  for ' . $staff->fullName . ' has been updated!');

        return redirect()->route('staff.show', ['id' => $staff->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();

        Session::flash('success', 'Staff profile has been deleted successfully');

        return redirect()->route('staff.index');
    }
}
