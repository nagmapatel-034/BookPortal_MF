<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book_rating;
use App\book_items;
use App\book_genre;
use App\book_review;
use DB;
use Session;
use Auth;
class ratingCont extends Controller
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
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'rating'=>'required',
        ]);
        
        //create rating
        $rating = new book_rating;
        
        $rating->rating = $request->input('rating');
        $rating->user_id = Auth::id();
        $rating->book_id = $id;
        $rating->timestamps = false;
        $rating->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    $booksingle = DB::table('book_items')
    ->leftjoin('book_publisher', 'book_items.publisher_id','=','book_publisher.publisher_id')
    ->where(['book_id'=>$id])
    ->first();

    $genre=DB::table('book_genre')
    ->leftjoin('book_category', 'book_genre.genre_id', '=', 'book_category.genre_id')
    ->where(['book_id'=>$id])
    ->first();
    
    $contributor = DB::table('book_contributor')
    ->leftjoin('book_author', 'book_contributor.author_id','=','book_author.author_id')
    ->where(['book_id'=>$id])
    ->get();

    $rating = book_rating::leftjoin('user_reader', 'book_rating.user_id','=','user_reader.user_id')
    ->where(['book_id'=>$id])
    ->where('book_rating.user_id',Auth::id())
    ->first();

    $avgrating = book_rating::select(DB::raw('avg(rating) AS average'))
    ->leftjoin('user_reader', 'book_rating.user_id','=','user_reader.user_id')
    ->where(['book_id'=>$id])
    ->first();

    $reviews = book_review::leftjoin('user_reader', 'book_review.user_id','=','user_reader.user_id')
    ->leftjoin('book_rating',function($join){
        $join->on('book_review.user_id', '=','book_rating.user_id');
        $join->on('book_review.book_id','=','book_rating.book_id');
        })
    ->where('book_review.user_id','!=',Auth::id())
    ->where('book_review.book_id',$id)
    ->orderBy('review_date','desc')
    ->paginate(10);
    
    $userreviews = book_review::leftjoin('user_reader', 'book_review.user_id','=','user_reader.user_id')
    ->where('book_review.user_id',Auth::id())
    ->where('book_review.book_id',$id)
    ->first();
    
    $pred = app(ExecutePython::class)->executePython();
    
    $text = str_replace(array("\n", "\r"),'', $pred);
    $text = str_replace(' ', ',', $text);
    $text = substr($text,0,-1);

    $book_reco = DB::select('select * from book_items where book_id in ('.$text.')');
    
    return view('books.singlebook') 
    ->with('book', $booksingle)
    ->with('authors',$contributor)
    ->with('ratings',$rating)
    ->with('avgratings',$avgrating)
    ->with('reviews',$reviews)
    ->with('userreviews',$userreviews)
    ->with('recos',$book_reco) #Prediction
    ->with('genre', $genre);
        
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
     * Update the specified resource in storage.     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'rating'=>'required',
        ]);
            
        
            if (book_rating::where('book_id', '=', $id)
            ->where('user_id',Auth::id())
            ->exists()) {

            
            $ratings = book_rating::where('book_id', '=', $id)
            ->where('user_id',Auth::id())
            ->first();
            $ratings->rating = $request->input('rating');
            $ratings->user_id = Auth::id();
            $ratings->book_id = "$id";
            $ratings->timestamps = false;
            $ratings->save();

            #app(ExecutePython::class)->re_train();

            return redirect()->action('ratingCont@show',$id);
            }
            else{
                self::store($request,$id);
                return redirect()->action('ratingCont@show',$id);
            }

        
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



