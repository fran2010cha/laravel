<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome() {
        $arts       = Article::orderBy('id', 'desc')->take(5)->get();
        $cats       = Category::all();
        $artsbycats = Article::all();
        return view('welcome')->with('arts', $arts)
                              ->with('cats', $cats)
                              ->with('artsbycats', $artsbycats);
    }
    public function loadcat(Request $request) {
        //return dd($request->all());
        if($request->cid == 0) {
            $cats        = Category::all();
            $artsbycats  = Article::all();
            return view('loadcat')->with('cats', $cats)
                                  ->with('artsbycats', $artsbycats);
        } else {
            $cat        = Category::where('id', $request->cid)->first();
            $artsbycats = Article::where('category_id', $request->cid)->get();
            return view('loadcat')->with('cat', $cat)
                                  ->with('artsbycats', $artsbycats);
        }


    }

}
