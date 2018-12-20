<?php

namespace App\Http\Controllers;

use View;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\book_author;
use App\book_category;
use App\book_contributor;
use App\book_genre;
use App\book_items;
use App\book_publisher;
use App\book_rating;
use App\user_reader;
use App\read_record;
use App\book_review;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     $books = DB::table('book_items')
            ->leftjoin('book_publisher', 'book_publisher.publisher_id', '=', 'book_items.publisher_id')
            ->leftjoin('book_category', 'book_category.book_id', '=', 'book_items.book_id')
            ->leftjoin('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
            ->get();
            return view ('pages.index') -> with ('books', $books);
        
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

    public function recommend()
    {
        $id = Auth::user()->user_id;
        $user = DB::table('user_preference')
                ->join('user_reader', 'user_reader.user_id', '=', 'user_preference.user_id')
                ->join('book_genre', 'book_genre.genre_id', '=', 'user_preference.genre_id')
                ->where('user_reader.user_id',$id)
                //->groupBy('book_genre.user_id')
                ->get();
                //return $id;
        
        return view ('pages.recommended') -> with ('user', $user);

    }

    public function search()
    {
        $q = Input::get ('q');
        if($q != ''){
            $items = book_items::where('book_id', 'LIKE', '%'. $q .'%') 
                            ->orWhere('book_title', 'LIKE', '%'. $q .'%')
                            ->orWhere('book_isbn', 'LIKE', '%'. $q .'%')
                            ->paginate(15);
            $items-> appends(['q'=> $q]); //Maintain result for next page

            if(count($items) > 0)
                return view ('pages.search')->withDetails ($items)->withQuery ($q);       
            else
                return view ('pages.search')->withMessage ("Oops!, record not found. Please try again");
        }
        return view ('pages.search')->withMessage ("Oops!, record not found. Please try again");
    }
}
