<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Article extends Controller
{   /**
    *
    * @return Illuminate\Http\Response
    */
   
   
    public function index()
    {
        $articles = Article::all();
        return view('articles',[
            'articles' => $articles
        ]);
    }
}
