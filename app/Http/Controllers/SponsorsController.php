<?php

namespace App\Http\Controllers;

use Session;
use App\Sponsor;

use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::orderBy('fullName', 'asc')->get();

        return view ('sponsors.index')->with('sponsors', $sponsors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('sponsors.create');
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
            'fullName'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'occupation'=> 'required'
        ]);
        
        if($request->hasFile(image)){
        $filenamewithExt = $request->file('image')->getClientOriginalname();
        
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        
        $extension = $request->file('image')->getClientOriginalExtension();
        
        $newfilename = $filename .'_' . time() . '.'. $extension ;
        
        $image = $request->file('image') ;
        $image->move('uploads/sponsors', $newfilename);

        $path = 'uploads/sponsors/' . $newfilename;
        }
        else {
            $path = '';
        } 

        $sponsor = new Sponsor ;

        $sponsor->image = $path;
        $sponsor->title = $request->title;
        $sponsor->fullName = $request->fullName;
        $sponsor->address = $request->address;
        $sponsor->email = $request->email;
        $sponsor->occupation = $request->occupation;
        $sponsor->phone = $request->phone;

        $sponsor->save();
        
        Session::flash('success', 'New Sponsor Profile added!');
        return redirect()->route('sponsors.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);

        return view('sponsors.show')->with('sponsor', $sponsor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.edit', ['id'=>$sponsor->id])->with('sponsor', $sponsor);
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
            'fullName'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'occupation'=> 'required'
        ]);

        
        $sponsor = new Sponsor ;
        
        if($request->hasFile('image')){
        $filenamewithExt = $request->file('image')->getClientOriginalname();
        
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        
        $extension = $request->file('image')->getClientOriginalExtension();
        
        $newfilename = $filename .'_' . time() . '.'. $extension ;
        
        $image = $request->file('image') ;
        $image->move('uploads/sponsors', $newfilename);

        $path = 'uploads/sponsors/' . $newfilename;
        
        $sponsor->image = $path;
        }
        

        $sponsor->title = $request->title;
        $sponsor->fullName = $request->fullName;
        $sponsor->address = $request->address;
        $sponsor->email = $request->email;
        $sponsor->occupation = $request->occupation;
        $sponsor->phone = $request->phone;

        $sponsor->save();
        
        Session::flash('success', 'Sponsor Profile ' . $sponsor->fullName . '  has been Updated!');
        return redirect()->route('sponsors.show', ['id'=>$sponsor->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);
        $sponsor->delete();

        Session::flash('success', 'Sponosr profile has been deleted successfully');

        return redirect()->route('sponsors.index');
    }
}
