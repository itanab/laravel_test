<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return DB::table('reviews')
                 ->get();
    }

    public function store()
    {
        $new_id=DB::table('reviews')
            ->insertGetId([
                'movie_id' => 389,
                'user_id' => 1,
                'text' => 'Valar Morghulis',
                'rating' => 8
            ]);
        return [
            'status' => 'success',
            'message' => 'Inserted successfully',
            'data' => [
                'id' => $new_id
            ]
        ];
    }

    
    
}
