<?php

namespace App\Http\Controllers;

use Session;
use App\Subject;
use App\Schoolclass;
use App\Sessionsetting;
use App\Section;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjects = array();
        $subjects = $request->subjects;
        $staff = $request->staffs;


         if(count($subjects) > count($staff)) {
            $count = count($staff);
        }
        else {$count = count($subjects);}

           $count = count($subjects);

        for($i = 0; $i < $count ; $i++ ){
            $subject = new Subject();
                        $subject->schoolclass_id = $request->schoolclass_id;
                        $subject->name = $subjects[$i];
                        $subject->staff_id = $staff[$i];
            $subject->save();
            $subject->staff()->attach($staff[$i]);
        }


            Session::flash('success', 'Subjects added to Class');
        return redirect()->route('schoolclass.show', ['id' => $request->schoolclass_id ]);

      
        
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
        $subject = Subject::find($id);
        $subject->delete();
        
        $subject->staff()->detach($subject);

        Session::flash('success', 'Subject removed from Class');

        return redirect()->back();
    }
}
