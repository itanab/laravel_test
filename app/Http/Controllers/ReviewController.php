<?php

namespace App\Http\Controllers;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use App\Review;
use App\Movie;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movie)
    {
        if(\Gate::allows('admin')){
            //$reviews = Review::where('movie_id', $movie)->get();
            $movie = Movie::findOrFail($movie);
            $reviews = $movie ->reviews()->get();
    
            return view('reviews/index', compact('reviews','movie'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $movie=Movie::find($id);
        return view('reviews/create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($movie, ReviewRequest $request)
    {
        //validation code
        /*
        $this->validate($request, [
            'text.required' => 'Oh come on, write that review'
        ]);*/

        $review = new Review();
        //$review->user_id = auth()->user()->id;
        //this line shortened
        $review->user_id = auth()->id();
        $review->movie_id = $movie;
        $review->text = $request->input('text');
        $review->save();

        return redirect(action('ReviewController@index', $movie));
        return $review;
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
}
