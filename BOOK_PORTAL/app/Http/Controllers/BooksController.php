<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book_items;
use App\book_author;
use DB;
use App\book_review;
use App\book_rating;
use App\book_genre;

class BooksController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $books = book_items::orderby('book_title','asc')
        ->paginate(15);
        
        return view ('books.category') -> with ('books', $books);
       
    }
    public function about()
    {
        return view ('books.about');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = DB::table('book_items')
        ->leftjoin('book_publisher', 'book_publisher.publisher_id', '=', 'book_items.publisher_id')
        ->leftjoin('book_category', 'book_category.book_id', '=', 'book_items.book_id')
        ->leftjoin('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
        ->select('book_items.*','book_publisher.publisher_name','book_genre.*')
        ->where('book_genre.genre_id',$id)
        ->paginate(15);
        $genre = book_genre::find($id);

        return view('books.category') -> with ('books', $books)->with('genre',$genre);
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
