<?php

namespace App\Http\Controllers;

use Session;
use App\Sessionsetting;
use Illuminate\Http\Request;

class SessionsettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessionsettings = Sessionsetting::all();
        return view('sessionsettings.index')->with('sessionsettings', $sessionsettings);
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
            'session'=> 'required'
        ]);
        $session = New Sessionsetting;

        $session->session = $request->session;
        $session->session_details = $request->session_details;

        $session->save();

        Session::flash('success', "New Session has been added!");

        return redirect()->route('sessions.index');

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
        
        $session = Sessionsetting::find($id);
        return view('sessionsettings.edit')->with('session', $session);
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
            'session'=> 'required'
        ]);
        $session = Sessionsetting::find($id);

        $session->session = $request->session;
        $session->session_details = $request->session_details;

        $session->save();

        Session::flash('success', "Session has been updated!");

        return redirect()->route('sessions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Sessionsetting::find($id);
        $session->delete();

        Session::flash('success', 'Session has been deleted');
        return redirect()->route('sessions.index');
    }
}
