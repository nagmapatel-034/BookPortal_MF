<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use View;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Query\Builder;
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

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     #AutoComplete
    function index()
    {
     return view('inc.header');
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('book_items')
        ->where('book_title', 'LIKE', "%{$query}%")
        ->take(15)
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:sticky;">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->book_title.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }
    #/AutoComplete

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    
    public function processForm() {
       
        if($q == ''){
            return view ('pages.search')->withMessage ("Oops!, search field cannot be empty");
        }
        else{
            return Redirect::to('search/'.$q) ;
        }    
    }

    public function show()
    {   
        $q  = Input::get('q') ;

        if($q!=''){
            $items = book_items::where('book_id', 'LIKE', '%'. $q .'%') 
                                ->orWhere('book_title', 'LIKE', '%'. $q .'%')
                                ->orWhere('book_isbn', 'LIKE', '%'. $q .'%')
                                ->orderBy('book_id')
                                ->paginate(15);
            $items->appends(['q'=>$q]);
            
            if(count($items) > 0)
                return view ('pages.search')->withDetails($items)->withQuery ($q);
                
            else
                return view ('pages.search')->withMessage ("Oops!, record not found. Please try again"); 
        }
        else{
            return view ('pages.search')->withMessage ("Oops!, record not found. Please try again"); 
        }  
       
    }


}
