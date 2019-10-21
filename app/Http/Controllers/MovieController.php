<?php

namespace App\Http\Controllers;
use Facades\App\Services\MovieService;

use DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //exercies wednesdya

    public function index(Request $request)
    {
        $orderby = $request->input('orderby', 'name');
        //we want to make sure that no malicious code gets in so everything but these two wil be translated into orderby name
        if(!in_array($orderby, ['name', 'rating', 'year'])){
            $orderby = 'name';
        }

        $orderway   = $request->input('orderway', 'asc');
        $limit      = $request->input('limit', 10);
        $page       = max(1,$request->input('page', 1));
        $search     = $request->input('search', null);
        $year       = $request->input('year', null);
        $minrating  = $request->input('minrating', null);
            

        //initialising the query builder
        $query=DB::table('movies');

        //modify the query builder

        $query->orderby($orderby, $orderway)
              ->limit($limit)
              ->offset($page * $limit - $limit);


        if($search !== null){
            $query->where('name', 'like', "%{$search}%");
        }

        if($year !== null){
            $query->where('year', $year);
        }
          
        if($minrating <= 10 AND $minrating !== null){
            $query->where('rating', '>=', $minrating);
        }


        //executing the query and getting the results
        $movies = $query->get();

        return $movies;
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $movie = \App\Movie::find($id);

        //$ratings = $movie->ratings;
        return $movie;
    }
    public function cast_and_crew(Request $request)
    {
        $id = $request->input('id');

        if($id === null){
            return [];
        }

        $person_ids = DB::table('movie_person')
                    -> where('movie_id', $id)
                    ->pluck('person_id');

        $people = DB::table('people')
                ->whereIn('id', $person_ids)
                ->get();

        return $people;

        /*If the parameter is found, try to find the people that worked on this movie (directors, writers, actors).
        Use the query builder, first select their ids from the table movie_person and then use the whereIn method to select them using their ids.Then return the results (an array of people).*/

    }


    public function top_movies()
    {
        //using services - because we dont want to have a messy code and we want to not repeat oursevles
        //return app(MovieService::class)->getTopRatedMovies();

        //if we prefix facades then the syntax is as following

        return MovieServices::getTopRatedMovies();

    }
    public function top_rated()
    {
        $results = DB::table('movies')
                ->orderBy('rating', 'desc')
                ->limit(10)
                ->get();

        return $results;
    }

    public function movie_of_the_week()
    {
        $movie_id = 234;

        //SELECT *
        //FROM `movies`
        //WHERE `id` = 234;

        $movie = DB::table('movies')
                ->where('id', $movie_id)
                ->first();
        //dd($movie);

        $genre_ids = DB::table('genre_movie')
                    ->where('movie_id', $movie_id)
                    ->pluck('genre_id');

        $genre = DB::table('genres')
                ->whereIn('id', $genre_ids)
                ->pluck('name');
        //dd($genre);

        $people_ids = DB::table('movie_person')
                    ->where('movie_id', $movie_id)
                    ->where('profession_id', 3)
                    ->pluck('person_id');

        $people = DB::table('people')
                ->where('id', $people_ids)
                ->limit(3)
                ->pluck('name');

    }
}
