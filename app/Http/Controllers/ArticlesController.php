<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class ArticlesController extends Controller
{
    public function index() {

        // without cache
            // $articles = Article::all();
            // return response()->json($articles);        

        // with cache  [tested: file, database]
            $articles = Cache::remember('articles',600, function() {

                return Article::all();
            });   

        //alt
        // $articles = cache()->remember('articles',600, function() {

        //     return Article::all();
        // });   
            
            
            return response()->json($articles);
            
           
    }
}
