<?php

namespace App\Http\Controllers;

use Session;
use App\Book;
use App\Section;
use Illuminate\Http\Request;

class BooksController extends Controller
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
        //$subjects = array();
        $books = $request->books;
        $author = $request->authors;
        $price = $request->price;


         if(count($books) > count($author)) {
            $count = count($author);
        }
        else {$count = count($books);}

           $count = count($books);

        for($i = 0; $i < $count ; $i++ ){
            $book = new Book();
                        $book->schoolclass_id = $request->schoolclass_id;
                        $book->book = $books[$i];
                        $book->author = $author[$i];
                        $book->price = $price[$i];
            $book->save();
        }


            Session::flash('success', 'Books added to Class');
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
        $book = Book::find($id);
        $book->delete();

        Session::flash('success', 'Book removed from Class');

        return redirect()->back();
    }
}
